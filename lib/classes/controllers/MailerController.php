<?php

error_reporting(E_ALL ^ E_STRICT);

class MailerController extends AbstractController{
    public function get($request){
        // the get is going to actually send an email so that we can redirect afterwards
        $sGuid = "";
        if(count($request->url_elements) > 1){
			$sGuid = $request->url_elements[1];
		}
        $sth = Database::open()->prepare("SELECT * FROM accounts WHERE guid = ?");
		$sth->execute(array($sGuid));
		$oUser = $sth->fetch(PDO::FETCH_OBJ);
        // then we actually need to send the email

        // Include the Mail package
        set_include_path("../../libs" . PATH_SEPARATOR . get_include_path());
        require "Mail.php";

        // Identify the sender, recipient, mail subject, and body
        $sender    = $oUser->email;
        $recipient = $oUser->recipient;
        $subject   = $request->parameters["subject"];
        $sReplyTo = $request->parameters["email"];
        $body      = "Message from " . $sReplyTo . "\n" . $request->parameters["message"];

        // Identify the mail server, username, password, and port
        $server   = "tls://smtp.gmail.com";
        $username = $sender;
        $password = $oUser->secret;

        // Set up the mail headers
        $headers = array(
                "From"    => $sender,
                "To"      => $recipient,
                "Subject" => $subject,
                "Reply-To" => $sReplyTo
        );

        // Configure the mailer mechanism
        $smtp = Mail::factory("smtp",
                array(
                        "host"     => $server,
                        "username" => $username,
                        "password" => $password,
                        "auth"     => true,
                        "port"     => 465
                )
        );

        // Send the message
        $mail = $smtp->send($recipient, $headers, $body);

        $sReferer = dirname($_SERVER['HTTP_REFERER']);
        if (PEAR::isError($mail)) {
            $sResults = $mail->getMessage();
            if($oUser->failure != '') header("Location: " . $sReferer . '/' . $oUser->failure);

        }
        else {
            $sResults = "thank-you for your inquiry";
            if($oUser->success != '') header("Location: " . $sReferer . '/' . $oUser->success);
        }
        $rc = new stdClass();
        $rc->result = $sResults;
        $rc->referrer = $sReferer;
        return($rc);
    }

    public function post($request){
        // the post creates/updates an account
        session_start();
        $sId = $_SESSION["currentuser"]->id;
        $sName = $_SESSION["currentuser"]->name;
        $sEmail = $_SESSION["currentuser"]->email;
        $sSecret = $request->parameters['secret'];
        $sRecipient = $request->parameters['recipient'];
        $sSuccess = $request->parameters['success'];
        $sFailure = $request->parameters['failure'];
        $sGuid = substr(sha1(mt_rand() . microtime()), mt_rand(0,35), 25);;
        try{
            $nRows = Database::open()->prepare("INSERT INTO accounts(id, name, email, secret, recipient, success, failure, guid, created) VALUES(?,?,?,?,?,?,?,?, CURDATE())")
			->execute(array($sId, $sName, $sEmail, $sSecret, $sRecipient, $sSuccess, $sFailure, $sGuid));
        }catch(Exception $e){
            $nRows = Database::open()->prepare("UPDATE accounts SET name = ?, email = ?, secret = ?, recipient = ?, success = ?, failure = ?, guid = ? WHERE id = ?")
			->execute(array($sName, $sEmail, $sSecret, $sRecipient, $sSuccess, $sFailure, $sGuid, $sId));

        }
        $rc = new stdClass();
        $rc->rows = $nRows;
        $rc->url = "https://rich-hildred.rhcloud.com/Mailer/" . $sGuid;
        return $rc;
    }


}
