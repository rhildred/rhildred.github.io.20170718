Lab Setup For PHP/Javascript
============================

Code Production
---------------

You will need a way to edit your code, and a way to maintain control over the changes that you make in the editor.

In our case we will also be using a shell program to provide some extra
commands that are useful to web developers.

1. Installing a new shell (MSys)
--------------------------------
To install Msys, you will also need 7zip. You can [find 7Zip here](http://portableapps.com/apps/utilities/7-zip_portable). Download it and double click to install.
	
You can [find MSys here]
(http://sourceforge.net/projects/mingwbuilds/files/external-binary-packages/).
Download it and unzip it with 7Zip to your desktop.

2. Installing a code editor (eclipse)
------------------------------------- 

You can [find eclipse here] (http://www.eclipse.org/downloads/). Download
eclipse and unzip it to your desktop in the msys folder from step 1. To save
copying time you should leave eclipse installed on the desktop until after you
install java in the next step.
	
To go with eclipse you will also need to add Java. There is a copy of Java
already on the lab machines, but we will install java in the `jre` subfolder of
`msys/eclipse` so that it will always be available to eclipse.
	
You can [find java here]
(http://www.oracle.com/technetwork/java/javase/downloads/index.html). You will
install java in the `jre` subfolder of eclipse on your desktop. Java will prompt
you to uninstall the existing copy, which will be restored the next time the
machine is rebooted.

	  
When you have installed eclipse and Java copy the eclipse folder from your desktop onto your usb drive as a subfolder of the msys folder.

3. Adding eclipse plugins for php and javascript
------------------------------------------------

Once you have completed steps 1, 2 and 3 above, you will login to eclipse for the first time. When you are prompted for a workspace enter `../phpworkspace`. 

After logging in you want to add plugins to make your programming more fruitful. Plugins are added to eclipse by going to `Help` / `Install New Software ...`. You will see a screen something like this:

![Eclipse add software screen](images/InstallNewSoftware.png "Eclipse Screen")

On the add software screen you will navigate to the bottom of the list and expand the Web, XML, Java EE, and OSGi enterprise development item. Underneath this item you will select 4 tools from this sub-list 1) Eclipse Web Developer tools, 2) Eclipse XMLEditors and Tools 3) Javascript Development Tools and 4) PHP Development tools (PDT).

Code Testing
------------

Javascript and PHP are both scripting languages. Both require a runtime environment to execute. There is a javascript runtime built in to browsers. The same runtime that is built in to the chrome browser is also available as a standalone runtime called node.js. We will be running our javascript code within the browser.

There is no web browser runtime for PHP so PHP web code is run on a server to produce resources that a browser can consume. The php runtime that we will be using is Xampp.

1. Installing a PHP runtime and web server(xampp)
-------------------------------------------------

You can [find Xampp here](http://www.apachefriends.org/en/xampp-windows.html). The one that you will want is _XAMPP Portable Lite 1.8.3 PHP 5.5_. You should unzip it onto your desktop and then copy the xampp folder into the root or first folder of your USB drive.

2. Configuring PHP runtime and web server(xampp/apache)
-------------------------------------------------------

You may already have a web server running on the default port of 80. To set the port that apache runs on you need to edit the file: `/xampp/apache/conf/httpd.conf`. You will click the right mouse button over this file and select "Edit with Notepad++". In the editor you will go to about line 58 and change:

	#Listen 12.34.56.78:80
	Listen 80
	
to:

	#Listen 12.34.56.78:80
	Listen 8000

You will also need to set the place that apache serves documents from on about line 234:

	# DocumentRoot: The directory out of which you will serve your
	# documents. By default, all requests are taken from this directory, but
	# symbolic links and aliases may be used to point to other locations.
	#
	DocumentRoot "\msys\phpworkspace"
	<Directory "\msys\phpworkspace">
	
When you have modified the httpd.conf file you can start apache by navigating to the `/xampp` folder and runnning `xampp-control.exe`. If apache starts then you can surf in your browser to http://localhost:8000. You should see an empty folder listing.

If apache won't start then you can run `apache_start.bat`. This will start the program in a command prompt where you can see any error messages.

3. Configuring Eclipse to use your PHP runtime
----------------------------------------------

Eclipse can make use of your php runtime to debug code within eclipse. You tell eclipse where your php executable is by going to `Window` / `Preferences`. You will see a screen like:

![PHP Preferences](images/Preferences.png "PHP Preferences")

You need to add a php runtime like:

![Add Runtime](images/AddPhp.png "Add Runtime")

When you have a PHP runtime you need to enable `CLI` debugging on the debug screen as well:

![Enable CLI debugging](images/PHPDebug.png "Php debugging") 

You can also enable xdebug debugging in php by going to the `/xampp/php` folder and using notepad++ on about line 2078 of php.ini and making the following changes:

	[XDebug]
	zend_extension = "\xampp\php\ext\php_xdebug.dll"
	;xdebug.profiler_append = 0
	;xdebug.profiler_enable = 1
	;xdebug.profiler_enable_trigger = 0
	;xdebug.profiler_output_dir = "\xampp\tmp"
	;xdebug.profiler_output_name = "cachegrind.out.%t-%s"
	xdebug.remote_enable = 1
	;xdebug.remote_handler = "dbgp"
	;xdebug.remote_host = "127.0.0.1"
	;xdebug.trace_output_dir = "\xampp\tmp"

Code Publishing
---------------

You will also need to be able to show off your work on the internet, to prospective employers and to the cousin that has been asking you to make a website for his d-jay business. We will use a service that is free for the first 3 years for this task called Openshift. Openshift is provided by RedHat a company that does support for Linux.

You can [sign up for openshift here](https://www.openshift.com/). Once signed up, you will need to be able to get your code on to openshift without the risk of someone defacing it or worse. To protect your site, openshift uses asymmetric cryptography. You give openshift your public key. When you commit, your commit is encrypted with your private key. Only openshift can read the code, and it can only have been produced by someone that has your private key (hopefully you).

1) Creating a public-private key pair
-------------------------------------

In order for more than one program to use your public-private key pair, a standard place is used for key storage by the shell and eclipse.

A `.ssh` folder for key storage is created by navigating to your msys folder and double clicking on `msys.bat`. You will be faced by a command prompt. If you type in `pwd` (print working directory) you will see that you are in your "home folder". The convention is to make a sub folder of your home folder by typing `mkdir .ssh`. When you have completed this task you can navigate in windows explorer or eclipse to `msys/home/` your name to see your home directory.

You point eclipse at the `.ssh` folder in `Windows` / `Preferences`:

![Preferences SSH2](images/ssh2Preferences.png)

When you have the correct .ssh folder configured, you will need to generate your key. You do this from the key management tab, pictured below:

![Preferences SSH2](images/KeyManagement.png)

Copy the public key and don't forget to click the `Save Private Key` button. When you have saved the private key you will need to copy it in to Openshift. 

  

 	