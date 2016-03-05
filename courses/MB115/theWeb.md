HTML is the foundation of the thing that we now know as the world wide web. How would you describe the web if you went back in time to before it existed. I want to show you this video of the inventor of the world wide web Tim Berners Lee doing just that and also going on to describe the next great collaboration for learning:

<iframe width="560" height="315" src="https://www.youtube.com/embed/OM6XIICm_qo" frameborder="0" allowfullscreen></iframe>

#HTML ...
was invented by Tim Berners-Lee for physicists to collaborate on research. Of course it took off beyond his wildest dreams to be the foundation of what we know as the world-wide web. Let's take, for example [an article on cats from wikipedia](https://wikipedia.org/wiki/cat). In that article we see that cats are from the [phylum chordata](https://wikipedia.org/wiki/chordate). If you don't know what that is, just click on the link and, "bam," you find out. If I was Tim Berners-Lee I would be thrilled to see how all of the knowledge in wikipedia is connected in a web that can be followed and followed. Followed so much that research can take way to long as we get distracted by peripherally related and interesting information.
##Separate content and formatting ...
allows us to choose whether we read over the links, or follow them to another place in the web. Separation of content and formatting is an important principle of the web, supported by tags that tell us about the structure of our document. The link to [phylum chordata](https://wikipedia.org/wiki/chordate) is actually formatted like this in html:
```
<a href="https://wikipedia.org/wiki/chordate">phylum chordata</a>
```

This structure is called an anchor tag. The tag is `<a></a>`. "phylum chordata," is the content of the tag, the meat within the tag sandwich if you like. href="https://wikipedia.org/wiki/chordate" is an attribute of the anchor tag, that takes you to what is at that url.

Often when we are writing, we want to have headings that break up the paragraph text. To denote a heading we use  a`<h1>This is a heading</h1>` tag. Notice the similarity between the heading and the anchor tag. They have a start and an ending in `<>`. The ending has the `</>` pattern. They both have content, that is presented to the user in a way that is determined by a web browser.

This `<>content</>` structure is the invention of another Tim, a Canadian, Tim Bray. It is called xml. Often when we are doing scripting we want to leave a message for the person maintaining the script, a comment. In xml and html a comment is like this:

```
<!-- this is a message for the person maintaining this script, it is not displayed to the end user -->

```
HTML and XML are ways that we can provide structure to writing, graphics and data. The structure lets programs like web browsers, drawing programs and search engines make those documents more useful to end users like you and I.

##Multimedia ...
like images is a natural extension of the need to present research on the web. A picture is after all worth 1000 words.

![Tim Bray, wikipedia](https://upload.wikimedia.org/wikipedia/commons/3/33/Tim_Bray.jpg "Tim Bray, wikipedia")

In html:
```
<img src="https://upload.wikimedia.org/wikipedia/commons/3/33/Tim_Bray.jpg" alt="Tim Bray, wikipedia" title="Tim Bray, wikipedia" />
```

The `img` tag is similar to the `a` tag, with important differences. One difference is that there is no content. If a tag has no content we can sometimes leave off the `</>` closing tag, instead putting a closing slash at the end of the start tag. An `img` tag uses the `src` attribute where the `a` tag uses the `href` attribute. The `img` tag has an `alt` attribute, which screen readers use to "read" the image to blind people.

##Videos ...
are important to today's internet. Videos of lectures can even be envisioned as an extension of the original vision. Take for instance this lecture, which I encourage you to actually watch, by Tim Berners-Lee:

<iframe width="100%" height="80%" src="https://www.youtube.com/embed/yF5-6AcohQw" frameborder="0" allowfullscreen></iframe>  

```
<iframe width="640" height="360" src="https://www.youtube.com/embed/yF5-6AcohQw" frameborder="0" allowfullscreen></iframe>
```
You can certainly see some similarities to the `img` tag. There are differences too. Even though we have no content we have a `</iframe>` closing tag. That is something that just "happened" a little inconsistency like the difference between `href` and `src`. 

##User interfaces ...
can also be done with html. Take for instance the ui for our simple little app that we did in the last lecture:

```
<form>
<label>Input test score</label><input />
<button>Get Status</button>
<p>You passed or failed would go here</p>
</form>
```
You can see tags with content nested as content of other tags, you can also see an example of a self-closing tag without any content. That user interface is kind of "high schooley" though. The world wide web has become so sophisticated, and people's expectations of it are so high. That is where something like:

##impress.js ....
comes in. Impress.js is a framework that places html in the context of a presentation. To understand impress.js, you need a new tag `<div></div>`. The `div` tag is used to **div**ide content on a page. `div`s can be nested within each other. An impress.js presentation is basically:

```
<div id="impress">

	<!-- slide 1 -->
    <div id="bored" class="step slide" data-x="-1000" data-y="-1500">
        <q>Aren't you just <b>bored</b> with all those slides-based presentations?</q>
    </div>

	<!-- slide 2 -->
	<div class="step slide" data-x="0" data-y="-1500">
        <q>Don't you think that presentations given <strong>in modern browsers</strong> shouldn't <strong>copy the limits</strong> of 'classic' slide decks?</q>
    </div>    
</div>
```

You make a presentation, by starting with the [sample presentation](https://rhildred.github.io/impress.js) and changing those `class="slide"` divs to contain your content. You can also use zooming in and out and rotation to show things on an infinite canvas.

Making a presentation was the assignment this past week. Since some people really struggled, I will make this week's lab be on html as well.
