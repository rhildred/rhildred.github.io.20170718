Wordpress, with Git and Eclipse
===============================

Once you have a php development environment, it is tempting to use it with Wordpress. That is a good thing as eclipse and particularly git provide control and reproducibility. Wordpress is important in that it allows developers to create something that can largely be maintained by end users. It separates content from the presentation of that content. The presentation can be controlled by the team, and the content by the users of the site.

I set up a Wordpress starting point on my github at https://github.com/rhildred/gitwordpress. I did this by starting a php project, creating a www directory and unzipping the latest version of Wordpress in there. Then I copied `wp-config-sample.php` to `wp-config.php`, and made the following edits:

	// ** MySQL settings - You can get this info from your web host ** //
	/** The name of the database for WordPress */
	$sDBName = isset($_ENV['OPENSHIFT_APP_NAME']) ? $_ENV['OPENSHIFT_APP_NAME'] : 'gitwordpress';
	define('DB_NAME', $sDBName);
	
	/** MySQL database username */
	$sUName = isset($_ENV['OPENSHIFT_MYSQL_DB_USERNAME']) ? $_ENV['OPENSHIFT_MYSQL_DB_USERNAME'] : 'root';
	define('DB_USER', $sUName);
	
	/** MySQL database password */
	$sPwd = isset($_ENV['OPENSHIFT_MYSQL_DB_PASSWORD']) ? $_ENV['OPENSHIFT_MYSQL_DB_PASSWORD'] : null;
	define('DB_PASSWORD', $sPwd);
	
	/** MySQL hostname */
	$sHost = isset($_ENV['OPENSHIFT_MYSQL_DB_HOST']) ? $_ENV['OPENSHIFT_MYSQL_DB_HOST'] : '127.0.0.1:3306';
	define('DB_HOST', $sHost);

I did this so that I could create a database named `gitwordpress` on my localhost and run Wordpress in a local sandbox, and then when I was ready I could push the database to Openshift and it would run there as well. I didn't find that was the case though, so to troubleshoot I also added a print_r, like so:

			if ( $this->dbh->connect_errno ) {
				print_r($this);
				$this->dbh = null;

on line 1348 of wp-include/wp-db.php. Unfortunately, when we did this in class the problem just went away and we never got to troubleshoot.

The class started by forking my github repository, getting it working on their local machine and doing a commit. Once that was done, we started a project on Openshift that cloned the new repository:

![openshift repo](images/WordpressOpenshift.png "openshift repo")

Finally we pushed to openshift, by going in to team/remote/push, choosing a custom repo and setting the master branch from dropdown.  

![eclipse push](images/WordpressTeamRemotePush.png "eclipse push")

When it was pushed on Openshift, we went through the screens to finalize the setup.
