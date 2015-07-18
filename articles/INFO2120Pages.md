Pages
=====

The overall navigation of your site is managed by a menu structure that is changeable under Structure/Menus. As we saw when we looked at links and images, a page can be added to the menu structure by checking `Provide a menu link` when the page is edited.

In a pamphlet plus blog kind of scenario, which Drupal is particularly good at, we make the home page without adding it to the menu. Then to set this page as the home page one navigates to Configuration/Site Information and puts the number of the node as the default front page:

![default front page](images/INFO2120DefaultFrontPage.png "default front page")

When additional static/basic pages are added the `Provide a menu link` checkbox is checked. That leaves the structure of the blog page.

To structure the blog page, the [Views module is required](https://www.drupal.org/project/views). The views module also has a [dependency on ctools](https://www.drupal.org/project/ctools). When the module is installed and activated in the normal way, you will have an `Views` choice under `Structure`. To create the Blog View:

![add a view](images/INFO2120Views.png "add a view")
 
1. add a view
1. select show content of type `article`
1. select `Create a Page`
1. select `Create a Menu Link`

Once your static pages and views are the way that you want them, you can reorder them by going to Structure/Menus and dragging and dropping them into place. 