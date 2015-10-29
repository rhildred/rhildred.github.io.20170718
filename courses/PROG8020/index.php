<?php

require_once "../../vendor/autoload.php";
$sDsn = "sqlite:" . __DIR__ . "/test.sqlite";
$oDb = new PDO($sDsn);
$oDb->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$app = new \Slim\Slim();
$app->get("/", function() use($oDb){
    $oStmt = $oDb->prepare("SELECT * FROM cds");
    $oStmt->execute();
    $oResult = $oStmt->fetchAll(PDO::FETCH_OBJ);
    echo json_encode($oResult);
});
$app->get("/:id", function($nId) use($oDb){
    $oStmt = $oDb->prepare("SELECT * FROM cds WHERE id = :id");
    $oStmt->bindParam("id", $nId);
    $oStmt->execute();
    $oResult = $oStmt->fetchAll(PDO::FETCH_OBJ);
    echo json_encode($oResult);
});

$app->run();