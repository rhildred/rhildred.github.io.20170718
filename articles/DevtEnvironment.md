MultiPlatform Development Environment
=====================================

Mike asked me about development on a Mac (OSX). If you saw this page before 9:16 pm on October 15th you could be forgiven for thinking that it is a lot more complicated then it actually is. That's because when I was writing these notes in something called markdown, I broke the markdown editor. The fix seemed to be to re-install eclipse. So then I reinstalled eclipse twice just to be sure that I was being as simple as possible.

* Start by [downloading eclipse here.](http://www.eclipse.org/downloads/download.php?file=/technology/epp/downloads/release/kepler/SR1/eclipse-standard-kepler-SR1-macosx-cocoa-x86_64.tar.gz)
* When the download dialog comes up select `open with archiver.`

![open with archiver](images/openWithArchiver.png "open with archiver")

* Find the `eclipse` directory created by the archiver in the `Downloads` folder and drag it into the `Applications` folder.
* Launch eclipse from your launcher, accepting the "this application was downloaded from the internet" dialog.
* When prompted for a workspace choose a convenient location.
* Go to `Help/Install New Software`. You will see a screen like this: 

![install new software](images/webxmlosgi.png "install new software")

* From the Web XML ... group select the following: 

![web xml ...](images/toolsPart1.png "web xml ...")

* I am also teaching a class in php during the afternoon so I additionally selected: 

![php](images/toolsphp.png "php")

* Click through the prompts and when prompted to reboot decline and go to `help/Eclipse MarketPlace`
* Select nodeclipse and again decline a reboot when asked; 

![nodeclipse](images/nodeclipse.png "nodeclipse")

* Finally search for openshift in the Eclipse MarketPlace select JBoss Tools and click to deselect all but the `JBoss Openshift Tools`. 

![Jboss Openshift Tools](images/jbossopenshiftttools.png "Jboss Openshift Tools")

* When prompted you can restart eclipse and you have a development environment on your Mac similar to what we have in class.

Incidentally the same basic instructions will work on your home windows machine [downloading here instead](http://www.eclipse.org/downloads/download.php?file=/technology/epp/downloads/release/kepler/SR1/eclipse-standard-kepler-SR1-win32-x86_64.zip). What you download will be a zip file so you will want to extract it someplace.

    