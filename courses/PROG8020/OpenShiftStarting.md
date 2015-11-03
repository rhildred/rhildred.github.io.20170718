Starting Points with Openshift
==============================

An amazing thing about platform as a service (PAAS) is that it can be "whatever you want it to be." The value that OpenShift adds is that it provides some structure and starting points for "whatever you want it to be." If you look at the OpenShift create application screen:

![Open Shift Starting Points](https://rhildred.github.io/images/OpenShiftStartingPoints.png "Open Shift Starting Points")

you can see an almost bewildering array of choices. There are instant apps like Wordpress and Drupal as well as a host of programming environments. We selected PHP because it is part of the focus of this course. Modern PHP is also a very productive programming environment.

PHP is another one of these "whatever you want it to be" solutions. If you look back at the above image you will notice that it is possible to create your own starting points. I made a custom starting point on my github at https://github.com/rhildred/openshiftcomposerstart. This is a modern php setup that uses composer and serves static resources from a www folder.

To use my starting point you:

* go to your "my apps" screen, and click `Add Application`
* select the php5.4 (or whatever the latest is)
* on the below screen under source code paste or type `https://github.com/rhildred/openshiftcomposerstart.git` and click on `create application`.

![https://github.com/rhildred/openshiftcomposerstart.git](https://rhildred.github.io/images/StarterApp.png "https://github.com/rhildred/openshiftcomposerstart.git")

When the application is done being created you can click ` Continue to the application overview page`, on the page below you can click your application to surf there and see some silly start pages. To get the code into eclipse and start editing, you copy the `source code` url from the screen below:

![Source Code](https://rhildred.github.io/images/SourceCode.png "Source Code")

In brackets you:

1. go to file/open folder
1. create and select a new folder
1. open a bash prompt
1. run `git clone <the name of your repository> .`

You can change the code in the folder to be yours, and when you push it to Openshift it will be yours, with your dependencies included. To avoid confusion you probably want to rename your project name to match what it is on openshift.    