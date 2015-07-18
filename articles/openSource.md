Open Source
===========

This is my 4th time doing web development at Conestoga, and I feel like I am getting to know a few things. One of these things that I am constantly reminded of is just how fun it is to develop software. A big part of the fun for me is open source. A big part of open source is [https://github.com](https://github.com). As someone who is helping others to learn his trade at Community College github is absolutely perfect. I can help students with examples on Github, while retaining the right to use the examples in my own work with an open source license.

A very cool thing about github is that if those examples are javascript and html based, they can also be hosted on github pages. My repositories [https://github.com/rhildred/slideShowExample](https://github.com/rhildred/slideShowExample), [https://github.com/rhildred/staticFramework](https://github.com/rhildred/staticFramework) and [https://github.com/rhildred/Pong](https://github.com/rhildred/Pong]) are like that. The even cooler thing about github pages is that every user gets one special github page to use as an entry point to their work on github. You can see mine at [https://rhildred.github.io](https://rhildred.github.io).

As I was setting this up and working on a course outline for a web development program for at risk teens for a social entrepreneurship club at Wilfrid Laurier, I got to wondering whether it was possible to do Web development using nothing but open source. I am already using quite a bit of open source, but to only use open source there would be 2 major hurdles to overcome. I have been using photoshop to introduce the idea of mobile first and mockup production. I originally thougt I would have to switch from PhotoShop to Gimp, but lately on my Mac and Linux machine I installed pinta, a paint.net clone. Pinta is written in C# and runs on Mono on the MAC and on Linux. To do .net web development I would also need to use mono. I have had some success with Mono and MVC using [https://github.com/wshearn/openshift-community-cartridge-mono](https://github.com/wshearn/openshift-community-cartridge-mono). I have had 0 luck trying to get web matrix like asp.net web pages going.

The reason that i tried to use mono was to do c# on my mac without sparking up windows, but now I am trying to take it a little further. I have a lightweight (lubuntu) installation. On top of that I have [installed adobe brackets from here.](https://github.com/adobe/brackets/releases/download/release-0.44/Brackets.Release.0.44.64-bit.deb) This installation was painless ... `dpkg -i Brackets.Release.0.44.64-bit.deb`. Then I also [installed xampp from here.](http://downloads.sourceforge.net/project/xampp/XAMPP%20Linux/1.8.3/xampp-linux-x64-1.8.3-5-installer.run). Installing it was a matter of:

    chmod u+x xampp-linux-x64-1.8.3-5-installer.run
    
    sudo ./xampp-linux-x64-1.8.3-5-installer.run
    
Then when that was installed I made a shortcut for the xampp control panel in `/usr/share/applications/xampp.desktop`. The shortcut looks like this:

    [Desktop Entry]
    Name=XAMPP Control
    Type=Application
    Categories=Development
    Exec=gksudo /opt/lampp/manager-linux-x64.run
    Icon=xampp
    MimeType=text/html;
    Keywords=apache mysql
    
After adding Brackets git, Beautify and spell-check, I was able to clone my projects from bitbucket and github and I am writing this article on a completely open source software stack. 