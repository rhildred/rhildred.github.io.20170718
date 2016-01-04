<?php

require_once(dirname(__FILE__) . '/../../php-markdown-lib/Michelf/MarkdownExtra.inc.php');

class MdToSlideController extends AbstractController{
    public function get($request){
        // the get is going to actually send an email so that we can redirect afterwards
        $sPath = "";
        if(count($request->url_elements) > 1){
            array_splice($request->url_elements, 0, 1);
			$sPath = "https://rhildred.github.io/" . join("/", $request->url_elements) . ".md";
		}
        echo <<<EOT
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=1024" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <title>impress.js | presentation tool based on the power of CSS3 transforms and transitions in modern browsers | by Bartek Szopka @bartaz</title>
    
    <meta name="description" content="impress.js is a presentation tool based on the power of CSS3 transforms and transitions in modern browsers and inspired by the idea behind prezi.com." />
    <meta name="author" content="Bartek Szopka" />

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:regular,semibold,italic,italicsemibold|PT+Sans:400,700,400italic,700italic|PT+Serif:400,700,400italic,700italic" rel="stylesheet" />
    <link href="https://rhildred.github.io/impress.js/css/impress-demo.css" rel="stylesheet" />
    
    <link rel="shortcut icon" href="https://rhildred.github.io/impress.js/favicon.png" />
    <link rel="apple-touch-icon" href="https://rhildred.github.io/impress.js/apple-touch-icon.png" />
    <style>
        .notes{
            display:none;
        }
    </style>
</head>

<body class="impress-not-supported">

<div class="fallback-message">
    <p>Your browser <b>doesn't support the features required</b> by impress.js, so you are presented with a simplified version of this presentation.</p>
    <p>For the best experience please use the latest <b>Chrome</b>, <b>Safari</b> or <b>Firefox</b> browser.</p>
</div>

<div id="impress">
EOT;
		$sHtml = \Michelf\MarkdownExtra::defaultTransform(file_get_contents($sPath));
        $sHtml = preg_replace_callback(
            '|<p><img src="slidestart://\?(.+?)alt(.+?)></p>|',
            function ($matches) {
                $sMatched = str_replace('+', ' ', $matches[1]);
                //$sMatched = $matches[1];
                return htmlspecialchars_decode("<div $sMatched id$matches[2]>");
            },
            $sHtml
        );
        $sHtml = preg_replace('|<p><img src="slide(.+?)nd(.+?)></p>|', "</div>", $sHtml);
        $sHtml = preg_replace('|<p><img src="slidenotestart(.+?)></p>|', '<div class="notes">', $sHtml);
        echo $sHtml;
        echo <<<EOT2
</div>

<div class="hint">
    <p>Use a spacebar or arrow keys to navigate</p>
</div>
<script>
if ("ontouchstart" in document.documentElement) { 
    document.querySelector(".hint").innerHTML = "<p>Tap on the left or right to navigate</p>";
}
</script>
<script src="https://rhildred.github.io/impress.js/js/impress.js"></script>
<script>impress().init();</script>
</body>
</html>
EOT2;
        
        return null;
    }
}

