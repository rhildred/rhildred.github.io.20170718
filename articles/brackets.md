Goodbye Eclipse ... Hello Brackets
==================================

Eclipse used to be my friend. Then, on our last project together in a year-long intensive program, it started to hang on my students when you typed an equal/assignment sign in Javascript. At first this happened when we ran Eclipse from a USB key, but eventually it started happening on OSX and Windows fixed drives as well. My students and I were using a git based workflow, so for a while we used eclipse to avoid using git from the command line. We edited our files in a number of editors, old and new. After trying a number of editors I started to like Adobe Brackets more and more. Martin Zagora's Brackets Git was the deciding factor for me:

![Brackets Git](images/BracketsGit.png "Brackets Git")

Other than for cloning it gives a non-command line interface to our private Bitbucket repository. For cloning we need to use the command line to be prompted for the password. To install Brackets on a USB key:

1. Download and install portable Brackets.
2. Use the extension manager to install Brackets Git, Beautifier and spell-checker
3. Use help/Show Extensions folder to copy the extensions to the www/extensions/dev folder
4. When you restart brackets after a reboot, the extensions should still be there
5. Configure the place for the Git Executable:

![Git settings](images/GitSettings.png "Git Settings")

So far Brackets is usable with xampp running on my slow USB drive. Eclipse, except maybe for Java Development, your time is up!

Note: Installing Development environment on OSX (or Linux)
----------------------------------------------------------

There are some prerequisites that I found useful when I installed on my MAC and Linux machine.

1. *Google Chrome* (you can get this on ubuntu by running `sudo apt-get install google-chrome-stable`) or on OS X by [surfing here](https://www.google.com/chrome/browser/?platform=mac)
1. *Git* (ubuntu `sudo apt-get install git`) or OS X [surfing here](http://git-scm.com/download/mac)

When you have those prerequisites, you can use the extension manager to install Brackets Git, Beautifier and spell-checker. You won't need to configure git settings as git will be in your path.