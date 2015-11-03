Starting Points with Openshift
==============================

An amazing thing about platform as a service (PAAS) is that it can be "whatever you want it to be." The value that OpenShift adds is that it provides some structure and starting points for "whatever you want it to be." If you look at the OpenShift create application screen:

![Open Shift Starting Points](images/OpenShiftStartingPoints.png "Open Shift Starting Points")

you can see an almost bewildering array of choices. There are instant apps like Wordpress and Drupal as well as a host of programming environments. We selected node.js because it is a server side JavaScript programming environment and my thinking was that it has the shortest learning curve.

Node.js is another one of these "whatever you want it to be" solutions. Yesterday we changed the index page on the sample server that comes with it, but today you will notice that if you change any other pages that the changes aren't served. If you look back at the above image you will notice that it is possible to create your own starting points. I made a custom starting point on my github at https://github.com/rhildred/nodetest. This is a web server in a more traditional sense in that it serves resources from a `public` directory rather than just a hardcoded index.html page.

To use my starting point you:

* go to your "my apps" screen, and click `Add Application`
* select the node.js 0.10 (or whatever the latest is)
* on the below screen under source code paste or type `https://github.com/rhildred/nodetest.git` and click on `create application`.

![https://github.com/rhildred/nodetest.git](images/StarterApp.png "https://github.com/rhildred/nodetest.git")

When the application is done being created you can click ` Continue to the application overview page`, on the page below you can click your application to surf there and see some silly start pages. To get the code into eclipse and start editing, you copy the `source code` url from the screen below:

![Source Code](images/SourceCode.png "Source Code")

In eclipse you right mouse click in a blank area of the `project explorer`, select `import` then `projects from Git` then `URI` and the URI should be filled in for you. Click through the succeeding dialogs:

![Eclipse Import](images/eclipseImport.png "Eclipse Import")

You can change the code in the public directory to be yours, and when you push it to Openshift it will be yours. To avoid confusion you probably want to rename your project name to match what it is on openshift.    