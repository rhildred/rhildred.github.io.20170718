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
        hr {
            margin-top: 20px;
            margin-bottom: 20px;
            margin-left: .2em;
            margin-right: .2em;
            border: 0;
            border-top: 1px solid #666;
        }
    </style>
</head>
<body>
EOT;
		$sHtml = \Michelf\MarkdownExtra::defaultTransform(file_get_contents($sPath));
        $sHtml = preg_replace('|<img src="slideend(.+?)>|', "<hr /></div>", $sHtml);
        $sHtml = preg_replace('|<img src="slidenoteend(.+?)>|', "</div>", $sHtml);
        $sHtml = preg_replace_callback(
            '|<p><img src="slidestart://\?(.+?)alt(.+?)></p>|',
            function ($matches) {
                $sMatched = str_replace('+', ' ', $matches[1]);
                return htmlspecialchars_decode("<div $sMatched id$matches[2]>");
            },
            $sHtml
        );
        $sHtml = preg_replace('|<img src="slidenotestart(.+?)>|', '<div class="notes">', $sHtml);
        echo $sHtml;
        echo "</body>";
        
        return null;
    }
}
?>
