PHP templates + API with SEO friendly URI
==========================================

In my html classes I introduced the DRY principle. The first time I did this with server side includes. 
The second time with underscore style templates that rendered a layout and body server side with node.js. 
Node.js is offered by a lot of hosts, but not nearly as many as offer LAMP. 
LAMP also gives me the possibility of having a more WebMatrix like Database helper using PDO instead of 
mysql2 that I used on node.js.

Basically we have .phtml templates that look something like this:

	<?php
	if(!function_exists('layout')) include_once '../../lib/template.php';
	layout("_layout.phtml");
	?>
	So There!
	
The layout is intended to have all of the menu and common elements in it. The `renderBody()` like this:

	Rich was here, 
	<?php
	renderBody();
	?>
	
Produces output like this

	Rich was here,
	So There!
	
There is also a restful api associated with this. Given a class:

	<?php
	class PingController extends AbstractController
	{
		/**
		 * GET method.
		 *
		 * @param  Request $request
		 * @return string
		 */
		public function get($request)
		{
			$rc = new stdClass();
			$rc->result = "success";
			return $rc;
		}
		
		
	}
	
in `lib/classes/controllers/PingController.php` surfing to `http://localhost/~rhildred/phpassetchain/public/api/Ping` 
will produce `{"result":"success"}`