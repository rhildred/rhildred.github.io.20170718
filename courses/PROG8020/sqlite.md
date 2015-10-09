We will be using an embedded database, SQLite with PHP this time. SQLite is contained within someting called a PHP Data Object (PDO). This is unlike databases like mysql where the database object simply connects to a database engine that is running in another process or even on another machine. To access SQLIte we will use the firefox sqlite extension. If you are running on a USB stick or network drive in "portable" mode, you will need to install [firefox portable from here.](http://portableapps.com/apps/internet/firefox_portable). Once installed you can go to addons and get sqlite:

![sqlite addon](https://rhildred.github.io/courses/PROG8020/sqlite.png "sqlite addon")

In this example we see SQLite manager operating on the database file `test.sqlite` with a table cds.

![manager in action](https://rhildred.github.io/courses/PROG8020/cdsTable.png "manager in action")

Generally when we have an app with the slim framework we make a single connection to the database and reuse it in the different methods.

```

require_once "../../vendor/autoload.php";
$sDsn = "sqlite:" . __DIR__ . "/test.sqlite";
$oDb = new PDO($sDsn);
$oDb->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$oApp = new \Slim\Slim();

```

Then we use the resulting $oDb object like we use the $app object in our routes:

```

$oApp->get("/", function() use($oDb){
    $oStmt = $oDb->prepare("SELECT * FROM cds");
    $oStmt->execute();
    $oResult = $oStmt->fetchAll(PDO::FETCH_OBJ);
    echo json_encode($oResult);
});
$oApp->get("/:id", function($nId) use($oDb){
    $oStmt = $oDb->prepare("SELECT * FROM cds WHERE id = :id");
    $oStmt->bindParam("id", $nId);
    $oStmt->execute();
    $oResult = $oStmt->fetchAll(PDO::FETCH_OBJ);
    echo json_encode($oResult);
});

$oApp->run();

```

There are a few things that we can learn from this, but basically we have the pattern here for a database driven php app.