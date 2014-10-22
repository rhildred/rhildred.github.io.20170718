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
		return $_SESSION["currentuser"];
	}


}
