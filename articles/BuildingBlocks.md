Building Blocks of PHP
======================

PHP is a server-side scripting language designed for web development but also used as a general-purpose programming language. PHP is now installed on more than 244 million websites and 2.1 million web servers. Originally created by Rasmus Lerdorf in 1995, the reference implementation of PHP is now produced by The PHP Group. While PHP originally stood for Personal Home Page, it now stands for PHP: Hypertext Preprocessor, a recursive acronym. http://en.wikipedia.org/wiki/PHP

PHP can be included in web pages. So that it can easily be parsed with web pages PHP is delimited by `<?php` and `?>`. The closing `?>` isn't strictly necessary at the end of a file. A "hello world" program in PHP looks like this:

	<?php
	
		echo "Rich Rocks!";
	
	?>
	
`echo` in this case writes what follows it into the output stream. Following the `echo` can be a list of things to be output as we shall see in the next example on variables.

PHP variables begin with a `$` dollar sign. For instance:

	<?php
		$nOriginalPrice = 12.53;
		
		echo ($nOriginalPrice * 1.13), " is the price of ", $nOriginalPrice, " with 13% HST added\n";
	?>

A student showed me the "if this then that" iPhone app the other day. This is the PHP equivalent:

	<?php
	$nTestScore = 65;
	
	if($nTestScore < 55)
	{
		echo "You failed \n";
	}
	elseif ($nTestScore > 79)
	{
		echo "You got an A \n";
	}
	else
	{
		echo "You passed \n";
	}

There is another decision making structure called a switch statement. A switch statement is useful for choosing from a number of discrete options.

To continue on with our test score idea:

	<?php
	
	$nTestScore = 'A';
	
	switch($nTestScore)
	{
		case 'A':
			echo "You got an a";
			
		case 'B':
			echo "Solid effort";
			break;
			
		case 'C':
			echo "You should have studied more";
			break;
		default:
			echo "You failed";
			break;
	} 
	
Doing things over and over is what computers do best! We looked at a couple of iterative or looping constructs:

	<?php
	for($i = 0; $i < 10; $i++)
	{
		echo $i, " is the next number \n";
	}
	
	?>
	
While:

	<?php
	$i = 0;
	
	while($i < 0)
	{
		echo $i, " was the next number for while \n";
		$i++;
	}
	
	
	$i = 0;
	
	do 
	{
		echo $i, " was the next number for do while \n";
		$i++;
		
	}
	while($i < 0);
	
	?>
	
We looked at simple PHP array literals, where we also learned about the `print_r` for outputting more complex structures:

	<?php
	
	$aStrings = ["string1", "string2", "string3"];
	
	print_r($aStrings);
	
Then our attention turned to associative arrays. To create an associative array, both the key and the value are defined:

	<?php
	$aAssociative = [1 => "August", 0 => "March", 4 => "April", 256 => "May"];
	
	print_r($aAssociative);
	
	echo "\n";
	
	echo "the month with the short-form 'ap' is ", $aAssociative[0];
	
	echo "\n";
	
	print_r(array_keys($aAssociative));
	
We finished up with objects, where we also looked at functions. Following is a simple class hierarchy:
 
	<?php
	
	
	class Animal
	{
		public $sSound = "";
		public $sMethodOfReproduction = "";
		
		public function Animal()
		{
			
		}
		
	}
	
	
	class Sheep extends Animal
	{
		public $sMethodOfReproduction = "live birth";
		public function Sheep()
		{
			$this->sSound = "baah";
		}
	}
	
	
	$oAnimal = new Animal();
	
	print_r($oAnimal);
	
	echo " was oAnimal \n";
	
	$oDolly = new Sheep();
	
	print_r($oDolly);
	
	echo " was oDolly \n"; 
 
 One thing that I forgot to talk about, that I will mention here is the idea of defining constants to improve the readability of your code. Here is an internationalization example from my github:
 

	<?php
	
	define("CHARACTERSET", "ISO-8859-1");
	define("HELLO", "Localized Hello");
	define("EXPLANATION", "This is an application that can change languages");
	
	?>
 
 And en francais:
 

	<?php
	
	define("CHARACTERSET", "ISO-8859-1");
	define("HELLO", "Bonjour localis&eacute;e");
	define("EXPLANATION", "Il s'agit d'une application qui permet de changer de langue");
	
	?>
 
 Then in my web page I have:

	... 
	switch ($lang)
	{
	case "fr":
	include("strings_fr.php");
	break;
	
	default: //default to english
	include("strings_en.php");
	break;
	}
	
	header("Content-Type: text/html;charset= " .CHARACTERSET);
	header("Content-Language: " .$lang);
	...

A simpler use case for a define is:

	<?php
	define("HSTRATE", .13);
	
	$nPriceBefore = 12.95;
	
	echo $nPriceBefore, " with HST is ", (HSTRATE + 1) * $nPriceBefore; 

This concludes the basics of PHP. Next database! 