How to use Drupal for your Home Page
====================================

In [the text, Drupal for Education and E-learning](http://www.packtpub.com/drupal-for-education-and-elearning-2e/book), the authors Robinson and Fitzgerald make a good case for using drupal as a social media tool for learning. Often educators will have a home directory available to them on a machine running the apache web server, which often also has php installed. If this is the case, then it is quite easy to make Drupal handle the content on your home page.

Prepare the Server
------------------

You may not have much control over this but the following are the pre-requisites on a Ubuntu server:

1. php5-curl and php5-gd debian packages installed  
1. enabled userdir, php5, rewrite apache modules
1. a public_html folder inside your home folder with group www-data and permissions 2750 (2 is for the setgid bit)
1. a mysql schema, for which you have the username and password

Download and Configure Drupal
-----------------------------

1. Download and extract Drupal to a folder on your desktop
1. Edit the `.htaccess` file in the top level folder

	    # Modify the RewriteBase if you are using Drupal in a subdirectory or in a
	    # VirtualDocumentRoot and the rewrite rules are not working properly.
	    # For example if your site is at http://example.com/drupal uncomment and
	    # modify the following line:
	    # RewriteBase /drupal
	    RewriteBase /~your_username

1. Copy the sites/default/default.settings.php to sites/default/settings.php
1. Use a program like filezilla to copy the contents of the top level Drupal folder to your public_html folder on the Ubuntu host.
1. Browse to http://host/~your_username and go through the screens to do the initial setup of drupal
1. Make sure to note down the username you enter in the last step

Add the markdown module
-----------------------

Github and Stack Overflow have popularized the markdown syntax for creating content. It is important because syntax like markdown separates content from formatting. Control over formatting can the be maintained by the project team, with control over the content being handed over to the customer.

1. Download the markdown module [from here](https://drupal.org/project/markdown).
1. Expand markdown on to your desktop like drupal itself and copy it to the `sites/all/modules` folder
1. Enable the module by going to administration/modules and checking the markdown check boxes
1. Add a text format for markdown under administration/configuration/text formats

Add the gauth module
--------------------

Part of the appeal of using Drupal for education and e-learning is the interactivity of the medium. Using the Gauth module anyone with google plus credentials can participate in your site without being added individually. With non-anonimity of comments people will tend to contribute constructively.

The [gauth module](https://drupal.org/project/gauth) is dependent on the [libraries api module](https://drupal.org/project/libraries) as well as a [google php client](http://google-api-php-client.googlecode.com/files/google-api-php-client-0.6.0.tar.gz).

1. Expand the libraries api module on to your desktop and copy it to `sites/all/modules`
1. Enable the libraries module and create a `sites/all/libraries` folder
1. Expand and copy the google php client to the `sites/all/libraries` folder
1. Expand and copy the gauth module to the `sites/all/modules` folder

The gauth module depends on the page owner to establish an account with google, as well as the page visitor. A visitor and owner that are unknown to each other but both known to google can then interact securely.

The page owner signs up for this by going to the [apis console](https://code.google.com/apis/console).  You will need to create a project from which you will need:

![values copied from here](images/redactedGoogleApi.png "values copied from here")

You will need to paste these values into the `Administration/Configuration/Google Login Settings`.

If all goes well you will see a `login with google` button on your homepage. When you follow it you will be logged in and can see what a non administrator sees on your page.  