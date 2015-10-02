<?php

require_once __DIR__ . "/../../../vendor/autoload.php";
class BitBucketController extends AbstractController
{
	/**
	 * GET method.
	 *
	 * @param  Request $request
	 * @return string
	 */
	public function post($request)
	{
        return BitBucket::submitBug($request->parameters['title'], $request->parameters['content'], $request->parameters['user'], $request->parameters['component'], "", $request->parameters['bbAccount']);
	}


}
