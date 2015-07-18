<?php

class ReverseIndex{
  static function CreateIndex($sRoot, $sPattern){
    // Create (connect to) SQLite database in file
    $file_db = new PDO('sqlite:' . dirname(__FILE__) . '/reverseIndex.sqlite3');
    // Set errormode to exceptions
    $file_db->setAttribute(PDO::ATTR_ERRMODE,
                        PDO::ERRMODE_EXCEPTION);
    $sSQL = <<<EOF
CREATE TABLE IF NOT EXISTS stemsIndex(
  idStem INTEGER PRIMARY KEY,
  sStem VARCHAR(255),
  sFile VARCHAR(255),
  nOffset INTEGER
);
CREATE UNIQUE INDEX IF NOT EXISTS stems_idx ON stemsIndex (sStem, sFile, nOffset);
EOF;
    $file_db->exec($sSQL);


    $sSQL = <<<EOF
CREATE TABLE IF NOT EXISTS wordsIndex(
idWord INTEGER PRIMARY KEY,
sWord VARCHAR(255),
nFrequency INTEGER DEFAULT 1
);
CREATE UNIQUE INDEX IF NOT EXISTS words_idx ON wordsIndex (sWord);
EOF;
    $file_db->exec($sSQL);

    $sSQL = <<<EOF
CREATE TABLE IF NOT EXISTS fileMeta(
idWord INTEGER PRIMARY KEY,
sFname VARCHAR(255),
dIndexed INTEGER
);
CREATE UNIQUE INDEX IF NOT EXISTS meta_idx ON fileMeta (sFname, dIndexed);
EOF;
    $file_db->exec($sSQL);

    $ite=new RecursiveDirectoryIterator($sRoot);
    $oStmtMeta = $file_db->prepare("INSERT INTO fileMeta(sFname, dIndexed) VALUES(?,?)");
    $oStmtWords = $file_db->prepare("INSERT INTO wordsIndex (sWord) VALUES(?)");
    $oStmtWordsUpdate = $file_db->prepare("UPDATE wordsIndex SET nFrequency = nFrequency + 1 WHERE sWord = ?");
    $oStmtStems = $file_db->prepare("INSERT OR IGNORE INTO stemsIndex (sStem, sFile, nOffset) VALUES(?, ?, ?)");
    foreach (new RecursiveIteratorIterator($ite) as $filename) {
      if(preg_match("/". $sPattern . "$/", $filename)){
        $nTime = filemtime($filename);
        $oStmt = $file_db->prepare('SELECT count(*) AS count FROM fileMeta WHERE sFname = ? AND dIndexed = ?');
        $oStmt->execute(array($filename, $nTime));
	$rc = $oStmt->fetch();
        if($rc[0] != 1){
          $oStmtMeta->execute(array($filename, $nTime));
          $sFile = file_get_contents($filename);
          //$filename = str_replace($sRoot . '/', "", $filename);
          $aKeyWords = preg_split('/(<\s*p\s*\/?>)|(<\s*br\s*\/?>)|[\s,\-\/]/i', $sFile);
          foreach($aKeyWords as $nOffset=>$sKeyWord){
            $sKeyWord = preg_replace('/[^a-z0-9\']+/', '', strtolower($sKeyWord));
            if(strlen($sKeyWord) > 0 &&
                !StopWords::bStopWord($sKeyWord) ){
              try{
                $oStmtWords->execute(array($sKeyWord));
              }catch(Exception $e){
                $oStmtWordsUpdate->execute(array($sKeyWord));
              }
              $oStmtStems->execute(array(PorterStemmer::Stem($sKeyWord), $filename, $nOffset));
            }
          }
        }
      }
    }
  }
  static function getMatches($sQuery){
    $file_db = new PDO('sqlite:' . dirname(__FILE__) . '/reverseIndex.sqlite3');
    // Set errormode to exceptions
    $file_db->setAttribute(PDO::ATTR_ERRMODE,
                        PDO::ERRMODE_EXCEPTION);
    $oStmt = $file_db->prepare("SELECT sWord as label, sWord as value FROM wordsIndex WHERE sWord LIKE '%' || ? || '%' ORDER BY nFrequency");
    $oStmt->execute(array($sQuery));
    return $oStmt->fetchAll ( PDO::FETCH_OBJ );
  }
  static function getDocuments($sQuery){
    $file_db = new PDO('sqlite:' . dirname(__FILE__) . '/reverseIndex.sqlite3');
    // Set errormode to exceptions
    $file_db->setAttribute(PDO::ATTR_ERRMODE,
                        PDO::ERRMODE_EXCEPTION);
  	$aKeyWords = preg_split('/(<\s*p\s*\/?>)|(<\s*br\s*\/?>)|[\s,\-\/]/i', $sQuery);
		$aQuery = array();
		foreach($aKeyWords as $sKeyWord){
			$sKeyWord = preg_replace('/[^a-z0-9\']+/', '', strtolower($sKeyWord));
			if(strlen($sKeyWord) == 0) continue;
			$sKeyWord = PorterStemmer::Stem($sKeyWord);
			array_push($aQuery, $sKeyWord);
		}
		if(count($aQuery) == 0) throw "no keywords left for " . $sKeyWords;
		$sSelect = "SELECT A.sFile AS id, COUNT(*) AS relevance FROM ";
		$sWhere = " WHERE ";
		$sLetter = 'A';
		foreach ($aQuery as $sKeyWord){
			if($sLetter != 'A'){
				$sSelect .= " ,";
				$sWhere .= " AND A.sFile = " . $sLetter . ".sFile AND ";
			}
			$sSelect .= 'stemsIndex as ' . $sLetter;
			$sWhere .= $sLetter . ".sStem LIKE '%' || ? || '%'";
			$sLetter++;
		}
		$sSQL = $sSelect .  ' ' . $sWhere . " GROUP BY 1 ORDER BY relevance DESC";
    $oStmt = $file_db->prepare($sSQL);
    $oStmt->execute($aQuery);
    return $oStmt->fetchAll ( PDO::FETCH_OBJ );

  }
}

?>
