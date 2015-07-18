PHP Database
============

The database we will be accessing with PHP and, through PHP, with JavaScript is MySQL.
MySQL is included as part of the Xampp. The MySQL server is started from the Xampp control panel.
To work with MySQL databases, we will use a web app called phpmyadmin. You get to phpmyadmin by surfing to
http://localhost/phpmyadmin.  You are faced with a page like this:

![phpMyAdmin](images/phpMyAdmin.png "phpMyAdmin")

phpMyAdmin is a GUI to perform the basic CRUD operations on a MySQL database. phpMyadmin can also import and export .sql files which is important.

Connecting to a Database
------------------------

MySQL is a database server. To get at the data contained within it is necessary to form a connection to the server by providing a host name, port username and password.

PhpMyadmin uses some defaults to list the available databases down the left side of the screen. Programmatically, to connect to a database one does something like this:

	function getConnection() {
	    $dbhost="127.0.0.1";
	    $dbuser="root";
	    $dbpass="";
	    $dbname="directory";
	    $dbh = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);  
	    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	    return $dbh;
	}
	
Once connected we use the resulting $dbh to build and execute queries. Following is an example of a select (Read) query:

	function getModifiedEmployees($modifiedSince = "1000-01-01") {
	    $sql = "select * from employee WHERE lastModified > :modifiedSince";
	    try {
	        $db = getConnection();
	        $stmt = $db->prepare($sql);
	        $stmt->bindParam("modifiedSince", $modifiedSince);
	        $stmt->execute();
	        $employees = $stmt->fetchAll(PDO::FETCH_OBJ);
	
            echo json_encode($employees);
	
	    } catch(PDOException $e) {
	        echo '{"error":{"text":'. $e->getMessage() .'}}';
	    } finally {
	        $db = null;
	    }
	}
    
There are a couple of interesting new things in here. We replaced our print_r statements with json_encode in anticipation of database work, so that our database output could be read programmatically.

The really interesting part of this from a programmer's perspective is the `try` and `catch`. This construct is called structured exception handling. The basic idea is that we code the non-exceptional case in a block preceded by a try statement.
If an exception occurs then the catch code is executed, which in this case does some JSON formatted error reporting.

Try and catch also has a third verb `finally`, which happens when the try and possible catch are complete.      

The select case is the most complex of the queries to deal with in PHP. Following is an example of a delete statement:


	<?php
		/* Delete all rows from the FRUIT table */
		$del = $dbh->prepare('DELETE FROM fruit');
		try{
			$del->execute();
	
			/* Return number of rows that were deleted */
			print("Return number of rows that were deleted:\n");
			$count = $del->rowCount();
		    echo '{"delete":{"rows":'. $count .'}}';
	    } catch(PDOException $e) {
	        echo '{"error":{"text":'. $e->getMessage() .'}}';
	    } finally {
	        $db = null;
	    }
	?>
	
There is a pretty good [reference on PHP Data Objects (PDO) here.](http://php.net/manual/en/book.pdo.php)	

