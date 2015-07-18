Web Forms
=========

Canadian Anti Spam Law came into effect July 1, 2014. One of the provisions of that law is that customers must give their consent to receive emails. [Web forms](https://www.drupal.org/project/webform) are an excellent way to collect and record that consent. If [SMTP auth](https://www.drupal.org/project/smtp) is also used, consent can be recorded through a contact form that emails customer service. For instance data from a contact form might look like this:

Showing all results. 2 results total.
							
 |	Submitted|	User|	IP Address|	your email	|subject of your inquiry|	your inquiry|	receive emails
--|--|--|--|--|--|--|--
2|	08/13/2014 - 17:42|	rhildred|	::1|	rhildred@syndicateme.net|	another test|	dunno|	Don't receive emails
1|	08/13/2014 - 17:41|	rhildred|	::1|	rhildred@syndicateme.net|	this is a test|	does this work?|	Receive Emails

This data can then be saved and used with some sort of mail merge program for CASL compliant emailing.

There are a few things to remember when using webforms:

1. You aren't creating a new content type for users to add content like an article or basic page
1. You are making a page like a contact page that users can use to send you information
1. If you want to email the results, you will likely need to send them through a SMTP server like gmail
1. Setting drupal up as a mail client involves the [SMTP Auth](https://www.drupal.org/project/smtp) Drupal module (instructions for this module abound).

Web forms are an excellent way to structure communications with your users, while achieving CASL compliance!