<?php

class LoginController extends AbstractController
{
	private $sUrl;

	public function __construct()
	{
		$this->sUrl = "http";
		if(!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443)
		{
			$this->sUrl .= "s";
		}
		$this->sUrl .= "://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];
	}


	public function get($request)
	{
        session_start();
        $oOauth2 = new Oauth2($this->sUrl);
        if(array_key_exists("code", $request->parameters))
        {
            $rc= $oOauth2->handleCode($request->parameters["code"]);
            $rc->since = date('l jS \of F Y h:i:s A');
            $_SESSION["currentuser"] = $rc;
            if(array_key_exists("redirect", $_SESSION))
            {
                header("Location: " . $_SESSION["redirect"]);
            }
            return $rc;
        }
        else
        {
            if(array_key_exists("redirect", $request->parameters ))
            {
                $_SESSION["redirect"] = $request->parameters["redirect"];
            }
            $oOauth2->redirect();
        }
    }

    public function delete($request)
    {
        session_start();
        unset($_SESSION["currentuser"]);
        $rc = new stdClass();
        $rc->result = "success";
        return $rc;
    }

}

?>
