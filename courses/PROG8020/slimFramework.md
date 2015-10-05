When we examined the building blocks of php we created a number of file resources, each for a particular building block. If we were writing a single web application, we would have to look at the contents of each file to know what it does. The slim framework encourages us to build all of our applications in a similar way, on top of code written by others and shared with the packagist archive. When we build applications with the slim framework, we can see what an application does, by looking at 1 or 2 files.

Index.php
---

The index.php defines all of the resources that will be available in our web app.

```

<?php

require 'vendor/autoload.php';

$app = new \Slim\Slim(array('templates.path' => __DIR__));

$app->get('/hello/:first/:last', function ($first, $last) {
    echo "Hello, $first $last";
});
$app->get("/goodbye", function(){
    echo "goodbye from php<br />";
});
$app->get("/arrayPrint", function(){
    $aStrings = array("Happy Monday", "Happy Friday");

    foreach($aStrings as $sString){
        echo $sString . "<br />";
    }
});
$app->get("/happyFriday", function(){
    for($n = 0; $n < 100; $n++){
        echo "Happy Friday! :)<br />";
    }
});
$app->get("/phpRocks", function() use($app) {
    $app->render("phpRocks.html");
});
$app->get("/", function(){
    echo "PHPRocks";    
});
$app->run();

```

As I mentioned your application is built on the shoulders of others and the packagist repository. To start our project, we type `composer require slim/slim` and composer creates a composer.json file with your dependency in it. It then acturally retrieves that package and puts in the vendor sub-folder of your project. This is the file that it created:

```

{
    "require": {
        "slim/slim": "^2.6"
    }
}


```

When you add more dependencies to the composer.json file, you run `composer update` to load them into the vendor folder. Finally when you want to run your application type `php -S localhost:8000` and surf to [http://localhost:8000 in your browser](http://localhost:8000).