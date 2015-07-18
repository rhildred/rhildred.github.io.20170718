CSS Buttons:
============

I was inspired by Mike's and Justin's exploration of a cool CSS effect that they saw on the internet. CSS is used to style almost everything on a web page. But CSS also lets you give elements on your web page behaviors. If you think of states in fireworks, you will have the basic idea. The states that we will talk about are normal, hover and active. 

[![css states](http://somadesign.ca/wp-content/uploads/2010/05/buttons2.png "css states")](http://somadesign.ca/2010/realistic-css3-buttons-redux/)

States in css are selected with pseudo selectors like `.button:hover` and `.button:active`. There is also a 3rd state that wasn't really applicable in fireworks for checkboxes. If a checkbox is checked it has the `checked` state. This will be useful when we look at the coffee switch on the demo. Once we have these states we can use all different kinds of css to make a change in appearance and make the button interactive. I took the demo from the above link, and [pulled it into my page](buttons-redux.js.html) because I wanted to see how the buttons interacted with bootstrap. This is important to me because, although I want you to learn the basics of CSS3, I also want you to use your programming time wisely. Bootstrap seems like a nice way of dealing with responsive and cross-browser issues without spending a lot of time on them.

To get the buttons to play nicely with Bootstrap, I had to wrap them in a div that I gave the `demo` id to. Then I put the `#demo` selector in front of all of the rules like this:

	#demo .button:hover, #demo .button:focus, #demo button:hover, #demo button:focus, #demo input[type=button]:hover, #demo input[type=button]:focus, #demo input[type=submit]:hover, #demo input[type=submit]:focus {
		background-color:#a8c0cb;
	}
 
 You can see even more [examples of CSS buttons here](http://valuedstandards.com/static/test/buttons/) or on the internet by searching for `pure css buttons`. For good measure, I threw in another one that I found. It is for a checkbox, but with style!
 
		<label class="switch_wrap" for="field">
		  <input id="field" type="checkbox" value="1" />
  		 <div class="switch"><span class="bullet"></span></div>
 		 Coffee Machine
		</label>
		
The css is quite extensive:

	.switch_wrap input[type="checkbox"] {
		display: none;
	}
	
	.switch_wrap input[type="checkbox"]:checked+.switch {
		background-color: #6cbc43;
	}
	
	.switch_wrap input[type="checkbox"]:checked+.switch:before {
		display: block;
	}
	
	.switch_wrap input[type="checkbox"]:checked+.switch:after {
		display: none;
	}
	
	.switch_wrap input[type="checkbox"]:checked+.switch .bullet {
		left: 33px;
	}
	
	.switch_wrap .switch {
		position: relative;
		display: inline-block;
		width: 65px;
		height: 24px;
		line-height: 24px;
		margin-right: 1em;
		margin-top: -3px;
		vertical-align: middle;
		background-color: #c1272d;
		border-radius: 3px;
		border: 1px solid rgba(0, 0, 0, 0.2);
		-webkit-box-shadow: 0 0 3px rgba(0, 0, 0, 0.25) inset, 0 1px 0
			rgb(255, 255, 255);
		box-shadow: 0 0 3px rgba(0, 0, 0, 0.25) inset, 0 1px 0
			rgb(255, 255, 255);
	}
	
	.switch_wrap .switch:before,.switch_wrap .switch:after {
		content: 'ON';
		display: none;
		width: 50%;
		position: absolute;
		top: 0;
		font-size: 11px;
		font-weight: bold;
		color: white;
		text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.25);
		text-align: center;
	}
	
	.switch_wrap .switch:after {
		content: 'OFF';
		display: block;
		right: 0;
	}
	
	.switch_wrap .switch .bullet {
		position: relative;
		display: block;
		width: 32px;
		height: 26px;
		top: -2px;
		left: -2px;
		background-color: #f0f0f0;
		background-image: -webkit-gradient(linear, left top, left bottom, from(#f0f0f0),
			to(#e6e6e6));
		background-image: -webkit-linear-gradient(top, #f0f0f0, #e6e6e6);
		background-image: -moz-linear-gradient(top, #f0f0f0, #e6e6e6);
		background-image: -ms-linear-gradient(top, #f0f0f0, #e6e6e6);
		background-image: -o-linear-gradient(top, #f0f0f0, #e6e6e6);
		background-image: linear-gradient(top, #f0f0f0, #e6e6e6);
		border: 1px solid rgba(0, 0, 0, 0.3);
		border-radius: 3px;
		-webkit-box-shadow: 0 1px 0 white inset, 0 1px 1px rgba(0, 0, 0, 0.25);
		box-shadow: 0 1px 0 white inset, 0 1px 1px rgba(0, 0, 0, 0.25);
		-webkit-transition: left 0.1s linear;
		-moz-transition: left 0.1s linear;
		-ms-transition: left 0.1s linear;
		-o-transition: left 0.1s linear;
		transition: left 0.1s linear;
	}
	
	.switch_wrap .switch .bullet:before,.switch_wrap .switch .bullet:after
		{
		content: '';
		display: block;
		height: 15px;
		width: 3px;
		position: absolute;
		top: 5px;
		left: 50%;
		margin-left: -6px;
		border: 1px solid #cccccc;
		border-width: 0 1px;
		-webkit-box-shadow: 1px 0 0 white, 1px 0 0 white inset;
		box-shadow: 1px 0 0 white, 1px 0 0 white inset;
	}
	
	.switch_wrap .switch .bullet:after {
		margin-left: 2px;
	}

Mostly, I hope that we will be able to accomplish our goals with bootstrap, but for one or 2 special elements it is good to know you can do something fancier.
 

 