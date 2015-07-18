Don't Repeat Yourself (DRY)
================

![Grounded, the new Book](images/Grounded.png "Grounded, the new Book")

One of my students got a job working for a web design firm. They insisted that the student implement designs in plain html. For repeating things like menus, they used javascript with document.write to write the content. I took a couple of cracks at writing a framework that would express repeating elements as html. 

The first time I used a .htaccess to remove the file extension altogether. You can [see my results here](https://github.com/rhildred/phpassetchain). This worked well for the site which you are reading now. I have a reverse index based search which uses a sqlite database, and I have written my articles in markdown. Server side processing converts my markdown to html in time for processing by the google bots.

The second time I stuck with browser side code. The big advantage of browser side code is that it can be hosted on github.io. Good for student portfolios as well as really simple demos. I used html5 `rel="import"` syntax. I found the results jerky as I did a complete page load everytime I switched pages.

Finally in the [staticFramework](https://github.com/rhildred/staticFramework), I used jQuery and require.js with browser side code. On accessing a local link, I am only reloading the page contents, which makes for a flicker free experience without a page load. Loading the page contents only also gives me a chance to go full screen when a game is selected for a game project that I am working on. I also made a [single page](https://github.com/rhildred/singlePage) static framework inspired by [Chad Fullerton](http://fullertonmedia.com/).

The Static Framework in Action
----

A student did a webpage for an author of a new book. The student graduated, got a job, and is too busy to provide support. I purchased the account from her, and will be providing support. [The site](https://authorsmhartung.ysaas.ca) was formerly written in server side javascript to run on node.js. I think that the idea was a reasonable teaching idea, but a lousy idea as far as ongoing development operations. I took the student's code and moved it into the staticFramework github example, updating the staticFramework github example where necessary. This is what I learned:

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <title>Contact Failure</title>
        <meta charset="utf8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta name="google-site-verification" content="QzgKmB-CCGUS25H9omR9mH-wvv6PVv2uyuHa5djP6kU" />
        <link rel="stylesheet" href="css/main.css" />
        <link rel="shortcut icon" href="GroundedIco.ico" />
    </head>

    <body>
        <div id="nav" data-role="include"></div>

        <div class="container" id="content">
            <h1>Thank-you for your interest</h1>
            <p>Unfortunately your message was not sent properly. Please try again later, or call us at 519-570-4912.</p>
        </div>
        <div id="footer" data-role="include"></div>

        <script data-main="js/app" src="js/lib/require.js"></script>
    </body>

    </html>

... Is a basic page in the framework. We have one invocation of css, and one invocation of javascript. There are a couple of `head` items that are repetitive but when a google bot sees this it is pretty much just the things that are different about this page from others that it sees. The main.css imports all the rest of the css. The require.js loads all of the javascript dependencies. Repetitive html is loaded with `<div id="footer" data-role="include"></div>`

In the node.js server side site that my student did, there was some javascript mixed in with the html. This made the code look messy, but had the advantage of being right in the file that was using it. The static framework seperates the css from the javascript from the html. It puts common code in the main.js which loads when the application loads. For the .html pages there is a .html.js file which gets run whenever the page changes. You can think of this as a `jQuery(document).ready` replacement. We also want to run the google analytics javascript whenever a page changes. This is done in the nav with a call to `analytics()` which is defined in triggeranalytics.js as:

    define(['ga'], function () {
        // analytics number goes here
        window.ga('create', 'UA-48714216-1');
        return function () {
            //this gets done everytime we load a new page
            window.ga('send', 'pageview');
        };
    });

This site took me a lot longer to use the new framework with than I thought it would. As well as the analytics the prettyphoto took a lot longer than I expected, because it took me a while to learn about the `deeplinking` option :

    define(["jquery", "prettyphoto"], function (jQuery) {
        return function () {
            jQuery("a[rel^='prettyPhoto']").prettyPhoto({deeplinking:false});
        };
    });
    
The main benefit to the author for this site is that it is now written in html and can be served from any web host. Shirley, the author, was concerned about her source code and now has it in a form that she can give to anyone to host. I also set her up with [cloudflare](https://cloudflare.com) ssl, which Google says will temporarily improve her page rankings.

Overall, it was good for me to actually implement a small website with my framework. Hopefully there are examples in there that will also be helpful to you!

