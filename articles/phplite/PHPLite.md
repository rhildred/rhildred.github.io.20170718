Light-weight, multi-platform, free and open-source software PHP development environment
======

Just start coding and testing on your local machine. Well ... after these simple steps. 

Git
----

The first thing that you will need will be the git software configuration management system. If you are on windows you will need the 1.9.x version of git which you [can get here](https://github.com/msysgit/msysgit/releases). Git keeps your local machine testing environment consistent with your cloud based deployment environment. You can install it according to the instructions on the site, unless you are working in a portable usb-drive environment.

In the case of a **usb-drive environment** you will make a `brackets+git` folder that will serve as the root folder of your environment. You will install git in `bracket+git/git`. If you get portable 7zip first you can get the portable `PortableGit-1.9.5-preview20150319.7z` version and extract it to the `bracket+git/git` folder.

![brackets+git](articles/phplite/bracketsgit.svg "brackets+git")

In windows git provides a `Git Bash.vbs` that we will use to run php command line tools from.

Brackets
-------

The next thing that you will need to install is adobe brackets. You [can get it here](http://brackets.io/). I picked the one without extract.

If you are running from a usb stick you will need portable brackets, which you [can get here](https://github.com/sagiegurari/brackets-portable/releases)

Brackets has quite a number of extensions built for it. There are 4 that I use for PHP:

1. Brackets Git
1. Indentator
1. PHP Debugger
1. PHP Smarthints

You can install them by searching for them in file/extension manager.

PHP
----

With PHP things get a little more complicated. If you are on windows you can get a [zip of php here](http://windows.php.net/download/) . You want the 64 bit threadsafe one.

If you are on windows you will unzip that file into the folder that git is in ... in the example `bracket+git/git/php`:

![brackets+git+php](articles/phplite/bracketsgitphp.svg "brackets+git+php")

If you are on OSX you can install php with `curl -s http://php-osx.liip.ch/install.sh | bash -s 5.6`. You will need to change your path by editing `~/.bash_profile` in your home folder and adding the following line at the end `export PATH=/usr/local/php5/bin:$PATH`.

Likewise in windows you will also need to put php in your path. You can do this, using brackets, by adding to `brackets+git/git/etc/profile` the line:
`export PATH=/php:$PATH`

Now if all is well on windows or OSX you can click the git icon on the right hand edge of your brackets, click the > sign in the black rectangle, type `php --version` in the resulting shell window and see these results:

```

PHP 5.6.11 (cli) (built: Jul 10 2015 21:46:48) 
Copyright (c) 1997-2015 The PHP Group
Zend Engine v2.6.0, Copyright (c) 1998-2015 Zend Technologies
    with Zend OPcache v7.0.6-dev, Copyright (c) 1999-2015, by Zend Technologies
    with Xdebug v2.2.5, Copyright (c) 2002-2014, by Derick Rethans

```

You can give php some code to execute by starting a new file in brackets called index.php.

```
<?php
phpinfo()
?>
```
If you type in `php -S localhost:8000` you will be running a web server listening on localhost port 8000. Surfing to http://localhost:8000 in your favourite browser should yield an informational screen, similar to the above but with more detail.

Downloading the xdebug debugger
-----------

Many people work with PHP incrementally, starting with something that is working and adding code to it a bit at a time. PHP also has a debugger, like the inspect element debugger in chrome or firebug. On OSX, I discovered that xdebug was included. For windows xdebug php [debugger is here](http://xdebug.org/download.php). You will want to download the correct dll into your `brackets+git/git/php/ext` folder. In my case I downloaded: `php_xdebug-2.3.3-5.6-vc11-x86_64.dll`. In the `ext` folder it was with a number of other .dll files for other php extensions.

Enabling the php debugger and other extensions
---

PHP is controlled by a php.ini file. You may notice the location of the file from the phpinfo() index.php above:

|||
|-|-|
|Loaded Configuration File|	/usr/local/php5/lib/php.ini|

In windows, you won't have a php.ini file yet. Using brackets you can load the file `php.ini-development`. Do a file/Save as and save the file as php.ini. The file has all of the lines that you need but 2. You just delete the `; ` in front of something to enable it:

```
; Directory in which the loadable extensions (modules) reside.
; http://php.net/extension-dir
; extension_dir = "./"
; On windows:
extension_dir = "ext"
```

You will also enable extensions:

```
extension=php_curl.dll
;extension=php_fileinfo.dll
;extension=php_gd2.dll
;extension=php_gettext.dll
;extension=php_gmp.dll
;extension=php_intl.dll
;extension=php_imap.dll
;extension=php_interbase.dll
;extension=php_ldap.dll
;extension=php_mbstring.dll
;extension=php_exif.dll      ; Must be after mbstring as it depends on it
;extension=php_mysql.dll
;extension=php_mysqli.dll
;extension=php_oci8_12c.dll  ; Use with Oracle Database 12c Instant Client
extension=php_openssl.dll
;extension=php_pdo_firebird.dll
;extension=php_pdo_mysql.dll
;extension=php_pdo_oci.dll
;extension=php_pdo_odbc.dll
;extension=php_pdo_pgsql.dll
extension=php_pdo_sqlite.dll
```

Finally you will need to add 2 lines to your php.ini

```
zend_extension=php_xdebug-2.3.3-5.6-vc11-x86_64.dll
xdebug.remote_enable=1
```

Composer
----

Like all modern programming languages, PHP includes dependency management. Microsoft has nuget, java has maven and php has composer. To get composer, press `ctrl-c` in the shell window where you were running `php -S localhost:8000`. At the prompt type: 
```
php -r "readfile('https://getcomposer.org/installer');" | php
```
then if you are on windows type:
```
mv composer.phar /php/composer
```
If you are on OSX type:
```
sudo mv composer.phar /usr/local/bin/composer
```

Then type `composer --version`. If you were succesful, you should see something like this:
```
Composer version 1.0-dev (417516098edb9b3c9d433c9b6527b0f1492362f4) 2015-07-16 09:51:31
```

Conclusion
====
If you were able to get all of this working you have a good solid sandbox for full stack web development with php. Your web development stack is .5 gb in size, and possibly on your usb stick. Hopefully it will open up a whole new world to you.