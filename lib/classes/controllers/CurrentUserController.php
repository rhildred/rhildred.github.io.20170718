<?php
class CurrentUserController extends AbstractController
{
	/**
	 * GET method.
	 *
	 * @param  Request $request
	 * @return string
	 */
	public function get($request)
	{
        session_start();
        if(!isset($_SESSION["currentuser"])) throw new Exception('no user logged in');
		return $_SESSION["currentuser"];
	}


}
