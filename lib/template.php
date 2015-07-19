<?php

$Viewbag = new stdClass();
$Viewbag->bInLayout = false;

function layout($sLayout){
	global $Viewbag;
	if(!$Viewbag->bInLayout){
        $Viewbag->sScript = __FILE__;
		$Viewbag->bInLayout = true;
		//don't want to output anything from sScript the first time
        include_once $sLayout;
		throw new Exception("Don't print twice");
	}
}

function renderBody(){
	global $Viewbag;
    include($Viewbag->sScript);
}

require_once(dirname(__FILE__) . '/php-markdown-lib/Michelf/MarkdownExtra.inc.php');

function renderMarkdown($sFname){
	echo \Michelf\MarkdownExtra::defaultTransform(file_get_contents($sFname));
}

function renderPartial($oCollection, $sPartial)
{
	global $Viewbag;
	if(!is_array($oCollection)){
		// Get cURL resource
		$curl = curl_init();
		// Set some options - we are passing in a useragent too here
		curl_setopt_array($curl, array(
		    CURLOPT_RETURNTRANSFER => 1,
		    CURLOPT_URL => $oCollection,
		    CURLOPT_USERAGENT => 'Codular Sample cURL Request'
		));
		// Send the request & save response to $resp
		$resp = curl_exec($curl);
		// Close request to clear up some resources
		curl_close($curl);


		$oCollection = json_decode($resp);
	}
	foreach($oCollection as $oModel){
		$Viewbag->model = $oModel;
		include $sPartial;
	}
}

if(!function_exists("showcopyright")) {
	function showcopyright(){
		$nYear = date("Y");
		if($nYear != 2013){
			echo "2013-";
		}
		echo $nYear;
	}
}
?>
