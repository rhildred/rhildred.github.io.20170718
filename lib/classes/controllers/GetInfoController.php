<?php

class GetInfoController extends AbstractController{
    public function get($request){
        // the get is going to actually send an email so that we can redirect afterwards
        $sId = "";
        if(count($request->url_elements) > 1){
			$sId = $request->url_elements[1];
		}
        $sth = Database::open()->prepare("SELECT * FROM accounts WHERE id = ?");
		$sth->execute(array($sId));
		return $sth->fetch(PDO::FETCH_OBJ);
    }
}
?>
