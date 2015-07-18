Accessing a Form in ...
=======================

![jQuery logo](http://upload.wikimedia.org/wikipedia/commons/8/81/JQuery_logo_text.svg "jQuery logo")

Today was a big day for us. We delved deeper into the jQuery library. JavaScript has its own library of builtin functions and objects. HTML5 also added some new objects to JavaScript. But still to a large extent it is jQuery that makes it possible to write multi-browser programs that just work. Programmers have built on jQuery to produce many more plugins to do things like fancybox, prettyphoto and bootstrap that we have already used. With phonegap, programmers write mobile code that also often uses jQuery mobile or bootstrap to provide a user interface. Both jQuery mobile and Bootstrap depend on jQuery.

A fairly common use of jQuery is to post the contents of a form without refreshing the page. Looking at this use of jQuery in some detail tells us a lot about using jQuery to access a browser's document object model. Let's consider a form that we have looked at before.

	<div class="container">
		<h1>Contact Ben</h1>
		
		<form id="contact" action="emailjs/" method="post">
		<p>
		<label for="from">from:</label><br />
		<input type="email" name="from" placeholder="email where Ben can get back to you" required="required" />
		</p> 
		<p>
		<label for="subject">subject:</label><br />
		<input type="text" name="subject" placeholder="subject of your inquiry" required="required" />
		</p> 
		<p>
		<label for="text">message:</label><br />
		<textarea name="text" placeholder="your message for Ben" required="required"></textarea>
		</p>
		<p>
		<label for="moreInfo">Please send me more information:</label><br />
		<input type="checkbox" name="moreInfo" checked="checked" />
		</p> 
		<button type="submit" class="btn btn-primary" name="submit">Contact Ben</button>
		</form>
	</div>

If you look carefully you will notice one small difference from the form that we used previously. The form tag now has an id attribute (`id="contact"`). This is important because it allows us to easily refer to the form using javascript. For instance I can do something like this to attach functionality to the form submit `jQuery("form#contact").submit(function(){ ...` If I return `false` from this function I can handle the submit myself with JavaScript.

You will notice that my form has html5 attributes in it like `type="email"` and `required="required"`. A very good thing about the way that browser's have implemented these attributes is that the submit doesn't even get called until these attributes have been satisfied. There is even a new HTML5 object FormData that gets the contents of the form. Unfortunately FormData is append only. One can't read the data in the object at all. jQuery and a little bit of our code to the rescue!

To get at the inputs and text area for the form we can do something like this:

	//get all of the inputs
	var aInputs = jQuery(this).find("input");
	//add the text area
	aInputs.push(jQuery(this).find("textarea"));
 
Once we have these form controls in an array it is fairly easy to walk the array and make an object from its elements:

	var getFormData = function(aInputs){
		// we will return an object that is representative of what would be in a post
		var oFormData = {};
		// go through each of the controls ... passed in because there may be special circumstances
		for(var i = 0; i < aInputs.length; i++){
			//make our controls be jQuery
			var oControl = jQuery(aInputs[i]);
			//checkbox .val doesn't give us what we need here
			if(oControl.attr('type') == 'checkbox'){
				if(oControl.attr('checked')){
					// just set value to Yes
					oFormData[oControl.attr('name')] = 'Yes';
				}
			}else{
				// set value to contents of control
				oFormData[oControl.attr('name')] = oControl.val();
			}
		}
		return(oFormData);
	}

As Lee would say, there is one gotcha with respect to a `type="checkbox"` input. The value of a `type="checkbox"` input isn't changed when the checkbox is checked. Instead there is a separate `checked` attribute. For this reason we need to test for the `type="checkbox"` input separately. getFormData returns all of the values in our form in a JavaScript object that looks like this:

	{
		from:"test@example.com",
		moreInfo: "Yes",
		subject: "test 3"
		text:	"just make sure this still works" 
	}
	
Tomorrow we will look at how to use this with Ajax.