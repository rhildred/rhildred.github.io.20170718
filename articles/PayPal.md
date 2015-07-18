Getting Paid!
=============

![I like a little Competition!](http://upload.wikimedia.org/wikipedia/commons/thumb/6/64/I_Like_a_Little_Competition.jpg/179px-I_Like_a_Little_Competition.jpg "I like a little competition")

A lot of people, when they think of having a web presence, think of selling things with that web presence. Especially when starting out, PayPal is a very good choice as there is no monthly fee. Instead of a monthly fee there is a per transaction fee as well as a percentage. Like most payment tools PayPal has a sandbox that can be used to experiment with and code a user interface, without spending real money. To use the sandbox, you [sign up for a merchant account here.](https://www.paypal.com/ca/webapps/mpp/home).

Once you have a merchant account, you can go [here to set up a sandbox buyer and seller.](https://developer.paypal.com/) 

1. Follow the `Applications` hyperlink.
1. Go to the `sandbox accounts` hyperlink.
1. `Create account`(s) by clicking on the button.
1. Make sure to give the buyer a $1000 paypal balance.

When you have buyer and seller accounts, you can [go here to create product buttons](https://www.sandbox.paypal.com/ca/webapps/mpp/home). Login as the seller that you just created. Creating product buttons isn't as straightforward as one might think. The easiest way that I have found is to click on the `profile` hyperlink:

![profile](images/PayPalOptions.png "profile")

Once on the profile screen, you can create product buttons by clicking on the `My Saved Buttons` hyperlink:

![saved buttons](images/PaypalProfileChoices.png "saved buttons").

When you have created a product button, you can get a short url for the button by switching to the email tab while viewing the code for your button:

![email code](images/PayPalEmailTab.png "email tab")

Please also note the hyperlink to create a `View Cart` button on this screen. You only need to create one view cart button that you can use anywhere in your "store". Again the view cart button hyperlink can be accessed through the email tab. For goods that can be fulfilled electronically there is also an opportunity to set a success page:

![success page](images/PayPalAdvanced.png "success page")

To keep your electronic goods from being stolen this should be a dynamic page that at least checks the referrer page, before giving a link to download the electronic goods.

Once I have created product buttons on paypal it is up to me to link them with descriptions and pictures of items for sale: ![a sunny morning](https://www.sandbox.paypal.com/en_US/i/btn/btn_cart_LG.gif "a sunny morning")

	<form target="paypal" action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
	<input type="hidden" name="cmd" value="_s-xclick">
	<input type="hidden" name="hosted_button_id" value="SM2GNBLAULSMQ">
	<input type="image" src="https://www.sandbox.paypal.com/en_US/i/btn/btn_cart_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
	<img alt="" border="0" src="https://www.sandbox.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1">
	</form>

As you can see the paypal version of the button can really clash with your color theme. To put your own button in you replace:

	<input type="image" src="https://www.sandbox.paypal.com/en_US/i/btn/btn_cart_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
	<img alt="" border="0" src="https://www.sandbox.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1">

With your bootstrap or other button like this:

	<form target="paypal" action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
	<input type="hidden" name="cmd" value="_s-xclick">
	<input type="hidden" name="hosted_button_id" value="SM2GNBLAULSMQ">

	<button class="btn btn-lg btn-primary" type="submit" name="submit">Add To Cart</button>

	</form>

Under the email tab for the same form there is a url  `https://www.sandbox.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=SM2GNBLAULSMQ` There is a neater integration in many ways that can be done using the url like this:

	<a class="btn btn-primary" href="https://www.sandbox.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=SM2GNBLAULSMQ">Add To Cart</a> 
	
There is an email tab under view cart too that makes for this easier to style type of integration.
  