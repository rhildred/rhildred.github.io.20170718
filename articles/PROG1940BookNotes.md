Notes From Working Through the Book
===================================

Chapter 4
---------

The stored procedure creation has the delimiter setup on the previous page, should look like:

	DELIMITER $$
	-- Create catalog_get_departments_list stored procedure
	CREATE PROCEDURE catalog_get_departments_list()
	BEGIN
	SELECT department_id, name FROM department ORDER BY department_id;
	END$$
	DELIMITER ;
	
You will find that you [need the errata](http://www.cristiandarie.ro/errata/phpecommerce2.html). Particularly the problem with the `Smarty error: ERRNO: 2 TEXT: unlink(C:\tshirtshop.....) [function.unlink]: No such file or directory`. On mine it complained about line 44. I put a [patched file here](core.write_file.php) that you can copy in to your `lib/smarty/internals` folder.