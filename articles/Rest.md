A RESTfull API
==============

Representational State Transfer (REST) is the predominant way to connect html and javascript code to an Application Programming Interface (API) on the internet. By accepting parameters and returning JSON we are already 80% of the way to a RESTFUL API. We would like to have an API to the CDs in a MySQL database. This is the structure of the database:

	CREATE TABLE IF NOT EXISTS `cds` (
	  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'artificial auto-increment index',
	  `disk_id` varbinary(255) DEFAULT NULL COMMENT 'calculated id',
	  `Title` varchar(255) NOT NULL COMMENT 'name of cd',
	  `Arranger` varchar(255) NOT NULL COMMENT 'primary artist or arranger',
	  `Genre` varchar(255) DEFAULT NULL COMMENT 'genre ie "blues"',
	  PRIMARY KEY (`id`)
	) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='this is my cd collection' AUTO_INCREMENT=11 ;

Sample Data
-----------

|id	|disk_id	|Title		|Arranger		|Genre|
|---|-------|--------------------------|------------------------|-------|
|1 	|NULL	|Rumours 	|Fleetwood Mac 	|POP|
|2 	|NULL	|Dark Side of the Moon 	|Pink Floyd 	|Album Rock|
|3 	|NULL	|8 Miles 	|Eminem 	|Hip-Hop|
|4 	|NULL	|Dusty foot philosopher 	|Knaan 	|Hip-Hop|
|5 	|NULL	|2112 	|Rush 	|Rock and Roll|
|6	|NULL	|Cardboard Castles	|George Watsky	|Hip-Hop|

We want to be able to access our data at the following urls:

When we go to the `cds/` url we want to see all of the data as JSON like so:

	[ {
		"id" : "1",
		"disk_id" : null,
		"Title" : "Rumours",
		"Arranger" : "Fleetwood Mac",
		"Genre" : "POP"
	}, {
		"id" : "2",
		"disk_id" : null,
		"Title" : "Dark Side of the Moon",
		"Arranger" : "Pink Floyd",
		"Genre" : "Album Rock"
	}, {
		"id" : "3",
		"disk_id" : null,
		"Title" : "8 Miles",
		"Arranger" : "Eminem",
		"Genre" : "Hip-Hop"
	}, {
		"id" : "4",
		"disk_id" : null,
		"Title" : "Dusty foot philosopher",
		"Arranger" : "Knaan",
		"Genre" : "Hip-Hop"
	}, {
		"id" : "5",
		"disk_id" : null,
		"Title" : "2112",
		"Arranger" : "Rush",
		"Genre" : "Rock and Roll"
	}, {
		"id" : "6",
		"disk_id" : null,
		"Title" : "Cardboard Castles",
		"Arranger" : "George Watsky",
		"Genre" : "Hip-Hop"
	} ] 
	
When we go to the `cds?Genre=Hip-Hop` url we want to see only the hip hop cds. Like so:

	[ {
		"id" : "3",
		"disk_id" : null,
		"Title" : "8 Miles",
		"Arranger" : "Eminem",
		"Genre" : "Hip-Hop"
	}, {
		"id" : "4",
		"disk_id" : null,
		"Title" : "Dusty foot philosopher",
		"Arranger" : "Knaan",
		"Genre" : "Hip-Hop"
	},  {
		"id" : "6",
		"disk_id" : null,
		"Title" : "Cardboard Castles",
		"Arranger" : "George Watsky",
		"Genre" : "Hip-Hop"
	} ] 

Similarly we need to be able to filter on `Title` and `Arranger` using the corresponding query strings; `cds?Title=2112` or `cds?Arranger=Knaan`. Finally when we go to the `cds/6` resource we need to see:

	{
		"id" : "6",
		"disk_id" : null,
		"Title" : "Cardboard Castles",
		"Arranger" : "George Watsky",
		"Genre" : "Hip-Hop"
	} 
 
If we have a simple `cds/index.php` file like this:

	<?php
	echo "Hello World\n";
	print_r($_GET);
	?>

we will see that we can already handle requests for the `cds/` resource, but if we go to the `cds/6` resource we get a 404 error. To get everything for the `cds` and sub-resources like `cds/6` we need to redirect all Apache requests to the cds directory and its sub-directories to the index.php file using a .htaccess file like we see here:

	RewriteEngine On
	
	RewriteCond %{REQUEST_FILENAME} !-f
	RewriteRule ^ index.php [QSA,L]
	
Then when we examine the `$_SERVER['REQUEST_URI'];` element we see that index.php is still handling a request for `cds/6`. To get the cd in question we can use: `array_pop(explode('/',$_SERVER['REQUEST_URI']))` which just gives us the numeral 6 (the last element in the array). 

So altogether the code to form a RESTFull API is:

	<?php
	
	$db = new PDO ( "mysql:host=localhost;dbname=cds", "root", "" );
	
	// check if last part of url is numeric
	$aUrls = explode('/', $_SERVER['REQUEST_URI']);
	$nId =  array_pop($aUrls);
	
	if (is_numeric ( $nId )) {
		// get a single cd
		$stmt = $db->prepare("SELECT * FROM cds WHERE id = ?");
		$stmt->execute(array($nId));
		$result = $stmt->fetchObject();
		echo json_encode($result);
	} else {
		// initialize to wildcards
		$sGenre = '%';
		$sArranger = '%';
		$sTitle = '%';
		
		// make them specific if data
		if (isset ( $_GET ['Genre'] )) {
			$sGenre = $_GET ['Genre'];
		}
		
		if (isset ( $_GET ['Arranger'] )) {
			$sArranger = $_GET ['Arranger'];
		}
		
		if (isset ( $_GET ['Title'] )) {
			$sTitle = $_GET ['Title'];
		}
		
		// prepare with 3 placeholders
		$stmt = $db->prepare ( "SELECT * FROM cds WHERE genre LIKE CONCAT('%', ?, '%') AND arranger LIKE CONCAT('%', ?, '%') AND title LIKE CONCAT('%', ?, '%')" );
		
		// execute with 3 parameters
		$stmt->execute ( array (
				$sGenre,
				$sArranger,
				$sTitle 
		) );
		
		$results = $stmt->fetchAll ( PDO::FETCH_OBJ );
		
		echo json_encode ( $results );
	}
	
	?> 
	
I committed [this file here](https://github.com/rhildred/PROG8020php/blob/master/php/restfull.php) to make it easier to run and refer to.