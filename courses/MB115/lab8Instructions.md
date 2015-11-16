A big problem with traditional power point type presentations is that they are just too low resolution. Tools like prezi and impress.js partially remedy this with a metaphor of moving a window over an infinite canvas.

#Impress.js

is of particular interest to us, because it allows a presenter to place things on this infinite canvas using html to script the presentation. In this lab, you will use html to script a 5 or 6 slide impress.js presentation about the 3 different programming control structures from chapter 10 panel 10.15 of your text. You will put this presentation on the internet using github and the following procedure:

1. Open a github account.
2. Login to your github account and create a new repository
![New repository](https://rhildred.github.io/courses/MB115/newRepositoryButton.png "New Repository")
3. Initialize the repository with a readme
![Initialize with readme](https://rhildred.github.io/courses/MB115/initializeWithReadme.png "Initialize with readme")
4. Create a gh-pages branch on your new repository
![gh-pages branch](https://rhildred.github.io/courses/MB115/gh-pages.png "gh-pages branch")
5. Goto the settings for your new repository
![goto settings](https://rhildred.github.io/courses/MB115/gotoSettings.png "goto settings")
6. Make the gh-pages the default branch
!["branches"](https://rhildred.github.io/courses/MB115/gh-pagesDefault.png "branches")

!["click update"](https://rhildred.github.io/courses/MB115/clickUpdate.png "click update")

![Yes I'm sure](https://rhildred.github.io/courses/MB115/yesImSure.png "Yes I'm sure!")<br />
7. Go back to the repository and click the plus sign to add a new file
![Go back to repository](https://rhildred.github.io/courses/MB115/controlStructures.png "Go back to repository")

![add a new file](https://rhildred.github.io/courses/MB115/clickThePlus.png "add a new file")
8. In a new tab navigate to [https://github.com/rhildred/impress.js](https://github.com/rhildred/impress.js) select the index.html file and click on the raw button.
![rhildred/impress.js](https://rhildred.github.io/courses/MB115/rhildredImpress.png "rhildred/impress.js")

![click on the raw button](https://rhildred.github.io/courses/MB115/rawButton.png "click on the raw button")
9. Hold command on the mac or cntrl on a pc and press the "a" key and then command or cntrl and the "c" key
![command or ctrl a and c](https://rhildred.github.io/courses/MB115/ctrlActrlC.png "command or control a and c")
10. Go back into your new file page and paste the index.html, enter the name and press commit
![commit new file](https://rhildred.github.io/courses/MB115/commitNewFile.png "commit new file")
11. You can view your new presentation at https://`<your github username>`.github.io/`<your project name>`
![view presentation](https://rhildred.github.io/courses/MB115/yourPresentationIsHere.png "view presentation")

##To Edit your presentation

You will be making a presentation of about 6 slides in length on the 3 control structures from panel 10.15 in your text, You can find some images to use in your presentation by doing a google images search:

![control structures image search](https://rhildred.github.io/courses/MB115/3ControlStructures.png "control structures image search")

to include an image in your presentation you will need to use an `<img` tag. If your image is wider than it is tall:

```

<img src="http://cnx.org/resources/e10b6f07f77a2597795e20b3e43544669ddf9d9c/graphics2.jpg" alt="case control structure" title="case control structure" style="width:100%" />

```

If your image is taller than it is wide:

```

<img src="http://photos1.blogger.com/blogger/1040/1790/320/c01-while.0.jpg" alt="while control structure" title="while control structure" style="height:80%;width:auto;margin:0 auto;display:block" />

```

You can edit your presentation by clicking on the pencil in github:

![click pencil](https://rhildred.github.io/courses/MB115/clickpencil.png "click pencil")

You would edit the presentation by finding and changing/deleting individual slides

![editing a slide](https://rhildred.github.io/courses/MB115/editingFirstSlide.png "editing a slide")

##Handing in the assignment

To hand in the assignment you will need to open a word document and put the url to your presentation in it. Once you upload the file, please also put the url in the comment.

There are lots of steps to this project which will be marked out of 2. 1 mark for getting anything at all on github, the second for getting a presentation about control structures up there.

