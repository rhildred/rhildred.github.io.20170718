Lab Setup with MariaDB
======================

When Oracle bought SUN, some of the developers of MySQL left to form their own company. The result was MariaDB. The idea is that MariaDB gets bug fixes faster and has less bureaucracy for purchasing support than MySQL does under Oracle. I have chosen to use MariaDB to learn SQL on and to implement the portfolio database project. Many popular databases are client-server programs. Clients communicate with servers using a standardized adapter protocol for that particular database.

![client server](images/ClientServerDatabase.svg "client server")

In the lab environment we will have the mysqld server and the mysql client. We will also need the mysql2 client for node.js so that our server.js can act as a client of mysqld too. Eclipse has an easier sql editing environment than the mysql client, so we will also add mysqld client functionality to Eclipse. To install the lab environment:

On OSX
------

I didn't find OSX binaries so [I built some here](http://sourceforge.net/projects/syndicateme/files/mariadb-5.5.34-osx10.6-x86_64.zip/download). If you use the finder to put the zip file in the directory that you are working from, double-clicking will expand the archive to make a `mariadb-5.5.34-osx10.6-x86_64` folder. You can run the server right out of this folder by double clicking `mysqldAlias`.

If you want to be able to use eclipse to edit SQL, you will need the eclipse `./mysql-connector-java-5.1.27/mysql-connector-java-5.1.27-bin.jar` file that I included with the zip. First you will need the Database Toolkit. You can get the Database Toolkit by going to `Help/Install New Software` and selecting `Work With/All Available Sites`. Click the checkbox next to `Database Development` and follow the dialogs to install. When that is installed go to `Eclipse/Preferences` go to `Data Management/Connectivity/Driver Definitions` Create a new driver definition for mysql and go on the `JAR List` tab to browse to the `./mysql-connector-java-5.1.27/mysql-connector-java-5.1.27-bin.jar` extracted from the zip.

At this point you should have a `SQL File` option when you right mouse to create a new file. Follow the advanced dialog to create a connection to a database for your sql file. If you have a pre-existing SQL file, you can right mouse click over the text in it to `Set Connection Info`.

On Windows
-----------

There are [64 bit windows binaries here](http://fossies.org/windows/misc/mariadb-5.5.34-winx64.zip) and [32 bit windows binaries here](http://fossies.org/windows/misc/mariadb-5.5.34-win32.zip). You will also need to get the [jdbc driver from here.](http://dev.mysql.com/downloads/file.php?id=415332). Once you have unzipped the mariaDB binaries for your system, you can unzip the connector in the same subfolder. 

First, to edit SQL in Eclipse, you will need the Database Toolkit. You can get the Database Toolkit by going to `Help/Install New Software` and selecting `Work With/All Available Sites`. Click the checkbox next to `Database Development` and follow the dialogs to install. When that is installed go to `Eclipse/Preferences` go to `Data Management/Connectivity/Driver Definitions` Create a new driver definition for mysql and go on the `JAR List` tab to browse to the `./mysql-connector-java-5.1.27/mysql-connector-java-5.1.27-bin.jar` extracted from the zip.

At this point you should have a `SQL File` option when you right mouse to create a new file. Follow the advanced dialog to create a connection to a database for your sql file. If you have a pre-existing SQL file, you can right mouse click over the text in it to `Set Connection Info`.
