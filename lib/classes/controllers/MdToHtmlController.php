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
</head>
<body>
EOT;
		echo \Michelf\MarkdownExtra::defaultTransform(file_get_contents($sPath));
        echo "</body>";
        
        return null;
    }
}
?>
