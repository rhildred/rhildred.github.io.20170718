Permissions
===========

When creating a pamphlet plus blog type of web site for a customer, it may be a good idea to restrict the customer's access to adding new articles. If a customer adds new pages or forms she may impact overall usability of the site. Drupal comes with built in site search capability, but it is only available to the administrator by default.

Controlling permissions is done by navigating to `People` and then to the permissions tab. The permissions look like:

![Permissions](images/INFO2120Permissions.png "Permissions")

Note how `Use Search` is only allowed to the administrator. To have the search available to all users the anonymous and authenticated users would also need to be checked. Notice that along with permissions there is also a roles tab. To create a user that can only do blogging, I made a role "blogger" and created a user with that role. The blogger only has the article content or node type available to them:

![Blogger]( images/INFO2120Blogger.png "Permissions")

Controlling the node types available to a role, also simplifies the choices a user must make to add the appropriate content, and reduces the learning curve for the user.