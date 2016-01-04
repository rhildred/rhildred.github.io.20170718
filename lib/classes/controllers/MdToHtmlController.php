<?php

require_once(dirname(__FILE__) . '/../../php-markdown-lib/Michelf/MarkdownExtra.inc.php');

class MdToHtmlController extends AbstractController{
    public function get($request){
        // the get is going to actually send an email so that we can redirect afterwards
        $sPath = "";
        if(count($request->url_elements) > 1){
            array_splice($request->url_elements, 0, 1);
			$sPath = "https://rhildred.github.io/" . join("/", $request->url_elements) . ".md";
		}
        echo <<<EOT
<!Doctype html>
<html>
<head>
    <link rel="stylesheet" href="https://rhildred.github.io/css/external.css" />
    <style>
        #slide0{
            display:none;
        }
    </style>
</head>
<body>
EOT;
		$sHtml = \Michelf\MarkdownExtra::defaultTransform(file_get_contents($sPath));
        $sHtml = preg_replace('|<img src="slide(.+)nd(.+)>|', "</div>", $sHtml);
        $sHtml = preg_replace('|<img src="slidestart(.+)>|', '<div class="slide">', $sHtml);
        $sHtml = preg_replace('|<img src="slidenotestart(.+)>|', '<div class="notes">', $sHtml);
        echo $sHtml;
        echo "</body>";
        
        return null;
    }
}
?>
