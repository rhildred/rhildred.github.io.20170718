Links and Images
=====

We started out with links by looking at a simple example for the Riverssoft web site. Tony wanted to have a [video embedded in a page on his site from youtube](https://www.youtube.com/watch?v=q9DqEM92Sdg). Embedding the video in the site was super easy. We just went to the page on youtube, clicked on sharing and copied the iframe from the embed tab:

![embed tab](images/INFO2120videoEmbed.png "embed tab")

Before making a new page on the site, we need to think about how much control over the site we want to give to the customer. If we are embedding the video on a static page and not a blog entry, I would argue that this is a setup activity rather than one that the user should be doing. If the user can make new static pages and add them to the menu, the menu will quickly become unwieldy. If users are given full html access then they will be able to change the look and feel of the site, which is what _you_ were asked to do. My suggestion is that you leave adding static pages as an administrative function and also restrict use of full html to the administrator.

To add a new page with a video embedded to the site:

1. log on as administrator.
1. go to Add Content/Basic Page
1. make sure that you have the `full html` filter selected
1. past the iframe from the embed video into the page

![full html](images/INFO2120AddBasicPage.png "full html")

It is helpful, to add whatever text you need at the same time so that you can see the iframe code. It is also important to note that when you add a page like this the html for the page itself is stored in the database, not in your code for the site. The video itself remains on youtube. The asset chain is as follows.

1. template resources such as css, logos and other images come from the `sites/all/themes` folder
1. the template pulls in the menu and blocks of the page from the database, structured by a page.tpl.php file
1. the basic page node in the database contains an iframe for your video on youtube
1. when the browser renders the iframe it pulls the content from youtube

Similarly in class we added google calendar iframes using almost the exact same process.

![google calendar](images/INFO2120GoogleCalendar.png "google calendar")

1. on your calendar page go to it's settings
1. under `my calendars` click on the calendar you would like to embed

![my calendars](images/INFO2120MyCalendars.png "my calendars")

3. the actual embed code is midway down the screen

![embed calendar](images/INFO2120EmbedCalendar.png "embed calendar")

Finally, a topic that we all struggled with was embedding images in basic pages. There is a pre-built module for doing this that is already part of the article content type.

![Basic Page Image](images/INFO2120ArticleContentType.png "Basic page image")

You can add this field as an existing field to your basic page content type as well. It is also possible to use the ckeditor module to upload images, although not suggested. Once you have the image(s) associated with your page the preferred way of styling them is to use CSS. We will talk more about styling with CSS when we come to theming. That way some consistency of look and feel can be achieved. Another important lever for maintaining consistency of look and feel is the `manage display` tab.

![manage display](images/INFO2120ManageAppearance.png "manage display")

Using this you can get the image displayed first, get consistent size so that the positioning of the image can be controlled by css. Finally, a number of teams employed the disqus module in their site for authenticated comments without users having to sign in to the site.

The [disqus module](https://www.drupal.org/project/disqus) can be used to replace drupal comments with social media style comments that are centrally managed by a cloud service. The documentation is excellent, except it doesn't really mention how to get rid of Drupal comments. To get rid of Drupal comments:

1. Pick the content type under Structure/Content Types
1. Set commenting to `closed` for that content type
1. If necessary, find existing content with that content type and also set commenting to closed for the existing comments.

I have really only scratched the surface of the wide range of content options. Depending on your goals, Drupal has modules for  almost anything. The ones I have highlighted are suitable for a pamphlet plus blog style website wich is what most people have done for their customer.