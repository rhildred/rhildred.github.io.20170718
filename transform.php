<?php
require_once 'lib/template.php';
$sScript = dirname(__FILE__) . $_SERVER['PATH_INFO'];
if(substr($sScript, -1) == "/") $sScript .= "index";
$Viewbag = new stdClass();
$Viewbag->bInLayout = false;
$Viewbag->sScript = $sScript;
if (file_exists($sScript . ".phtml")){
	ob_start();
	include $sScript . ".phtml";
	ob_end_clean();
	echo $Viewbag->sOut;
}

function showcopyright(){
	$nYear = date("Y");
	if($nYear != 2013){
		echo "2013-";
	}
	echo $nYear;
}


?>
