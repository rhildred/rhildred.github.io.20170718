BlackBerry 10 WebWorks SDK
=========================

We spent some time trying to get this to work in our lab environment and were thwarted, by a combination of factors. I think that it is still worth knowing webworks, because BB10 is a platform that you and your customers/employers can use to show that you have a well rounded app that works on all platforms. The first step with WebWorks is to [download the sdk from this link.](https://developer.blackberry.com/html5/downloads/)

Once downloaded and installed you are presented with this:

![command prompt running node.js](https://rhildred.github.io/courses/PROG8110/webworkscommand.png)

If you have installed on a portable device or without adding a menu item you can run `BB10 WebWorks SDK 2.2.0.15/webworks-ui/bin/start-ui` to start the web app.

You saw something like this before when you ran node.js. Webworks runs on top of node.js on your machine. The actual application is a web application that looks like this.

![webworks app screen](https://rhildred.github.io/courses/PROG8110/webworksscreen.png)

The screens in the web app are fairly straightforward. You follow the certificates menu item to set up your system:

![webworks app screen](https://rhildred.github.io/courses/PROG8110/certificates.png)

To actually make an app, you add a project and copy in the www folder from your phonegap build project. The project settings contribute to a config.xml in the root folder of your project, leaving the config.xml in your www folder untouched. As well as the project settings, you will also want to edit the plugins for your project, which again live outside of the www folder so your phonegap build code remains unchanged. 

For my epic network app, I tried to commit the webworks project to the repository. I could, but I think that I needed a better .gitignore file, because I was never really satisfied with the outcome, and had to start with a new webworks project and copy in the www folder whenever I did a new build anyways. Was my customer ever excited when she could run her app on her Q10!!!!
