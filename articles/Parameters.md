Parameters in PHP
=================

In our examples we were very careful to not parse parameters in SQL. The reason for this was:

![Red Light Camera SQL Injection](images/RedLight.jpg "Red Light Camera SQL Injection")

Rather than take parameters directly into our SQL using string concatenation we
prepared our SQL with `?` placeholders and used `$stmt->execute` with parameters
to complete the work. Our example is a little contrived however because we
didn't cover how to get parameters from the internet. Parameters come from the
internet in PHP in special variables `$_GET` and `$_POST` . $_GET and $_POST are arrays of name value parameter pairs. Following is an example that uses the $_GET array. Note the use of the `isset()` built-in PHP function to check for the existence of the key `Genre`. 


	<?php 
	
	//print_r($_GET);
	
	$sGenre = '%';
	
	if(isset($_GET['Genre']))
	{
		$sGenre = $_GET['Genre'];
	}
	
	$db = new PDO("mysql:host=localhost;dbname=cds", "root", "");
	
	
	
	$stmt = $db->prepare("SELECT * FROM cds WHERE genre LIKE CONCAT('%', ?, '%')");
	
	$stmt->execute(array($sGenre));
	
	$results = $stmt->fetchAll(PDO::FETCH_OBJ);
	
	echo json_encode($results);
	
	
	?>
	
We can pass parameters to our php programs `$_GET` or `$_POST` array with a javascript program. We can also pass parameters to the `$_GET` array using the URL. For example, in our case, http://localhost:8000/buildingblocksofphp/php/goodparametersConcat.php?Genre=POP will retrieve all of the POP cds from the above script. Parameters can be used likewise to insert data into the database, although we are about to learn that `$_GET` isn't normally used for inserts.

	<?php 
	
	try {
		if(!isset($_GET['title']) || !isset($_GET['arranger']) || !isset($_GET['genre']))
		{
			throw new Exception("missing information");
		}
		$sTitle = $_GET['title'];
		$sArranger = $_GET['arranger'];
		$sGenre = $_GET['genre'];
		$db = new PDO("mysql:host=localhost;dbname=cds", "root", "");
		
		
		$stmt = $db->prepare("INSERT INTO cds(title, arranger, genre) VALUES (?,?,?)");
		
		
		
		$stmt->execute(array($sTitle, $sArranger, $sGenre));
		
		$count = $stmt->rowCount();
		echo '{"insert":{"rows":'. $count .'}}';
	}
	catch(Exception $e)
	{
		echo "{\"error\" : \"", $e->getMessage(), "\"}";
	}
	
	?>
	
In this example we use exception handling to deal with missing parameters. First we `try` to just execute our code. If we don't have a title, arranger and genre to insert, we `throw` an error message. The error message is `caught` and we echo the error message in the same way that we would have echoed the count of rows inserted had we successfully inserted.  