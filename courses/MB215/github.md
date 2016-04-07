# ... how do we work together on this

![git version control](https://rhildred.github.io/courses/MB215/github.svg "git version control")

On one of the first classes, someone asked, "How do we work together on this?" As we have progressed through the materials you will have seen that the answer is, "it depends." 

##According to Cockburn it depends

![different methodologies](http://alistair.cockburn.us/get/2357 "different methodologies")

on the criticality and number of people involved in the project.

According to Beck it depends on the "question" that the software is designed to answer:

**1) Will people use this?**

**2) Will people pay for this?**

* Building software to answer these questions involves just hacking something up ... a **minimum viable product**. We have the luxury of no users so this can be a pure experiment. That is we don't have to think about whether our experiment affects existing users, when there aren't any.

**3) Can more people use this?**

* Building software to answer this question requires tests to make sure that we don't break anything for the people that are already using this.

**4) Can another 10 times as many people use this?**

* Building software to answer this requires software engineering and processes of the type that were discussed in the previous lecture.

**5) How long can we keep this going, and make money from it?**

## Git was written ~11 years ago by Linus Torvalds

![Linus Torvalds](https://www.linux.com/sites/lcom/files/joomla/images/stories/714/Linus-Torvalds-LinuxCon-Europe-2014.jpg "Linus Torvalds")

Common to all software methods is the need to do version control. More and more at the center of version control is git. [Linus Torvalds wrote git](https://www.linux.com/news/featured-blogs/185-jennifer-cloer/821541-10-years-of-git-an-interview-with-git-creator-linus-torvalds) to help with the maintenance of the Linux kernal. I was trying to find some sort of link between git and the success of Linux, but Linux was already pretty successful before git.

## [https://github.com/rhildred/coop-postings](https://github.com/rhildred/coop-postings)

![git version control](https://rhildred.github.io/courses/MB215/github.svg "git version control")

When we did our first Android game project, we didn't use revision control. The second project was as much to show you git and version control as it was to be a java project. In the project we went through the following steps:

1. I wrote a starting point and shared it via github.
1. One person on each of your teams **fork**ed the starting point.
1. That person added the rest of the team to the fork of the project as collaborators.
1. Each person on the team **clone**d the code in to Android Studio and their own development environments, some on OSX some on Windows. Almost all common platforms are supported by git.
1. Some time went by and I got some more background code going on [https://github.com/rhildred/coop-postings](https://github.com/rhildred/coop-postings)
1. One person on each of your teams created a **pull request** to update your teams github from mine.
1. You did a git **pull** in Android Studio to update the code in your local environment.
1. You made some changes to the page.phtml file **commit**ed and **push**ed the code back to your github.

## Start by creating a new repository or by forking someone else's

![forking](https://amscotti.github.io/advanced-github-workshop/images/pull_2.png "forking a repository")

Linus Torvald's, the inventor of git, has been a [bit critical of github](https://github.com/torvalds/linux/pull/17#issuecomment-5654674), particularly the commit comments that people make with github and as well the quality of the pull requests. What Linus does agree with is the [ease with which a new project can be started](https://www.linux.com/news/featured-blogs/185-jennifer-cloer/821541-10-years-of-git-an-interview-with-git-creator-linus-torvalds). In our case you `forked` a project that I started. You made a copy of my code that was under your team's control. Now, if I decide to delete that repository, and you decide to proceed to finish the coop-postings for your high school you are protected and the captains of your own ships.

It is also easy to create your own repository from scratch in github, ridiculously easy. Github also has the feature that it is a web server, so you can easily create a portfolio or project page and let github host it for free. There is an example [here](https://pku7.github.io/) and [here](https://babcockwebsolutions.com/) of portfolio sites from past students. Look how quick they are in your browser!

## Clone into your sandbox environment

![git clone](https://upload.wikimedia.org/wikipedia/commons/thumb/b/bc/Clone_troopers_march.jpg/1024px-Clone_troopers_march.jpg "git clone")

*picture By Michael Neel from Knoxville, TN, USA (Star Wars) [CC BY 2.0 (http://creativecommons.org/licenses/by/2.0)], via Wikimedia Commons*

Next we got a working copy of the code on to our computers. In our case we used android studio to do this. Once we have working copies of the code in our development environment we can make improvements to the code. We made fairly simple improvements to our code, taking fields from the database and adding them to the display page.phtml. In the meantime I was also making some changes in my development environment, adding functionality in other places than the place that you were making changes, and publishing it on my github. All working together on the project, we needed to combine our changes to get the best of both worlds.

## Pull requests, allow us to combine our changes

![pull request](https://upload.wikimedia.org/wikipedia/commons/8/87/Octicons-git-pull-request.svg "pull request")

*picture By GitHub (https://github.com/github/octicons) [MIT (http://opensource.org/licenses/mit-license.php) or OFL (http://scripts.sil.org/cms/scripts/page.php?item_id=OFL_web)], via Wikimedia Commons*

One of the great things about Git, is that even after you fork from someone else's work for instance copying and changing the code to use at your own high school, you are still not cut off from changes that the original author made. You can even help the original author by fixing his bugs, and sending them a request to pull your fixes back into their environment. In github we create a pull request by comparing commits across forks. Then we can merge the pull request back in to our code.

## pull, edit, commit and push your changes

![](https://rhildred.github.io/courses/MB215/github2.svg)

Perhaps this seems like a lot of messing around to make some simple changes, but remember that git was designed for the whole world to collaborate on the linux kernel. Now that you have cloned a copy on to your local environment, you can make changes, secure that others won't unknowingly erase them. You do this by:

1. editing a file perhaps page.phtml in your favorite editor, perhaps Android Studio.
2. testing your changes in your local environment.
3. if you make any additional files, you add them to the index that git uses to manage the files in the repository.
4. finally when you are happy that all of the files are added you can `commit` to your personal local repository and `push` to your team's remote repository.
5. your teammates do a pull to get your changes from the remote team repository on to their personal local repositories.

## Next Steps

![Yes we code](https://octodex.github.com/images/baracktocat.jpg "Yes we code")

*image from https://www.openaustraliafoundation.org.au/2013/12/31/easier-collaboration-for-openaustralia-foundation-projects/*

While software methods change depending on the situation, all team development depends on some type of version control system. Git and github have been responsible for a huge growth in collaboration by distributing power among the various people collaborating on the code.