<?php

require_once __DIR__ . '/../../../vendor/autoload.php';


class StaticPages{
  static function generate($sRoot, $sPattern){
      $app = new \Slim\Slim(array(
        'view' => new \PHPView\PHPView(),
        'templates.path' => __DIR__ . "/../../../"));
    $ite=new RecursiveDirectoryIterator($sRoot);
    foreach (new RecursiveIteratorIterator($ite) as $filename) {
      if(preg_match("/". $sPattern . "$/", $filename) && strpos($filename, "/_") === false){
        $nTime = filemtime($filename);
        $sOutfile = str_replace("phtml", "", $filename);
        $nTime2 = 0;
        if(file_exists($sOutfile)){
          $nTime2 = filemtime($sOutfile);
        }
        //if($nTime2 < $nTime){
            ob_start();
            $sPage = preg_replace("/[\.\/]/", "", $sOutfile);
            $app->render($filename, array("page"=>$sPage));
            file_put_contents($sOutfile . "html", ob_get_contents());
          ob_end_clean();
        //}

      }
    }
  }
}
