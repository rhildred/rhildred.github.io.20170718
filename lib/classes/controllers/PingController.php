<?php
class PingController extends AbstractController
{
	/**
	 * GET method.
	 *
	 * @param  Request $request
	 * @return string
	 */
	public function get($request)
	{
		$rc = new stdClass();
		$rc->result = "success";
		return $rc;
	}


}
