# ... how do we work together on this

![git version control](https:///rhildred.github.io/courses/MB215/github.svg "git version control")

On one of the first classes, someone asked, "How do we work together on this?" As we have progressed through the materials you will have seen that the answer is, "it depends." According to Cockburn it depends on the criticality and number of people involved in the project.

![different methodologies](http://alistair.cockburn.us/get/2357 "different methodologies")

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

[Linus Torvalds](https://www.linux.com/sites/lcom/files/joomla/images/stories/714/Linus-Torvalds-LinuxCon-Europe-2014.jpg "Linus Torvalds")

Common to all software methods is the need to do version control. More and more at the center of version control is git. [Linus Torvalds wrote git](https://www.linux.com/news/featured-blogs/185-jennifer-cloer/821541-10-years-of-git-an-interview-with-git-creator-linus-torvalds) to help with the maintenance of the Linux kernal. I was trying to find some sort of link between git and the success of Linux, but Linux was already pretty successful before git.

## [https://github.com/rhildred/coop-postings](https://github.com/rhildred/coop-postings)

When we did our first Android game project, we didn't use revision control. The second project was as much to show you git and version control as it was to be a java project. In the project we went through the following steps:

1. I wrote a starting point and shared it via github.
1. One person on each of your teams **fork**ed the starting point.
1. That person added the rest of the team to the fork of the project as collaborators.
1. Each person on the team **clone**d the code in to Android Studio and their own development environments, some on OSX some on Windows. Almost all common platforms are supported by git.
1. Some time went by and I got some more background code going on [https://github.com/rhildred/coop-postings](https://github.com/rhildred/coop-postings)
1. One person on each of your teams created a **pull request** to update your teams github from mine.
1. You did a git **pull** in Android Studio to update the code in your local environment.
1. You made some changes to the page.phtml file **commit**ed and **push**ed the code back to your github.