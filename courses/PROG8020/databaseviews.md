A good thing about a server side user interface is that it is also viewable by the google robot. This is important in the case of an ecommerce app, where we want our items for sale to show up on google.

Classical php might mix the database code in with the code that displays the data. With modern php we separate the database model from the view, something like this:

```

<?php

require_once "vendor/autoload.php";

$oApp = new \Slim\Slim(array(
        'view' => new \PHPView\PHPView(),
        'templates.path' => __DIR__));

$oDb = new PDO("sqlite:" . __DIR__ . "/datatest.sqlite");
$oDb->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$oApp->get("/", function() use($oApp, $oDb){
    $oStmt = $oDb->prepare("SELECT * FROM cds");
    $oStmt->execute();
    $oApp->render("index.phtml", array("model" => $oStmt->fetchAll(PDO::FETCH_OBJ)));
});

$oApp->run();

```

Then in the view:

```

<?php 

$this->layout("_layout.phtml"); ?>


<table>
<?php
foreach($this->data["model"] as $cd)
{
?>
    <tr><td><?php echo $cd->title ?></td><td><?php echo $cd->artist ?></td></tr>
<?php 
} 
?>
</table>

```

Finally, in a separate _layout.phtml file we can put common stuff like nav, css and javascript code.

```
<!-- common stuff goes here -->


<?php $this->renderBody(); ?>

<!-- more common stuff here potentially -->

```

Even though this is a trivial example, hopefully you can see the power of this approach.
