JavaScript is events
====================

Well of course JavaScript is a programming language, but it was designed for handling things that users do on web pages like filling out forms and clicking submit buttons. 

![click me](http://upload.wikimedia.org/wikipedia/commons/a/a4/Copyright_click.svg "click me")

As a result more things in JavaScript are events than in many other languages. My morning class and I thought of a good metaphor for events and handling them that I want to share here. Think of the event of a newspaper landing on the sidewalk leading up to your house. What do you need to do for that event to happen? You need to subscribe.

[![newspaper arrival event](http://farm6.staticflickr.com/5030/5555454223_2b1e341655_n.jpg "newspaper arrival event")](http://www.flickr.com/photos/quinnanya/5555454223)

JavaScript events are similar in that they are published and subscribed to. The subscriber is sometimes called a listener, sort of like the faithful dog that listens for the arrival of the paper, and handles it by running outside and bringing the paper in to his master. In JavaScript that might look like:

	jQuery("#sidewalk").on("paper arrival", function(paper){
		paper.bringToMaster();
	}); 
	
The first thing that is happening here is that we are subscribing or listening to an event. That is the `jQuery("#sidewalk").on("paper arrival"` part of our code. The second part of this snippet is what to do when the event happens. In JavaScript there is an overseer or event loop that calls the dog handler to bring the paper to it's master. 

	function(paper){
		paper.bringToMaster();
	}

The event subscription is through `jQuery.on` which in this case is taking 2 parameters, the name of the event and the handler to call to deal with the event. Often in JavaScript we have made to order events. Think of this as more like the sandwich shop.

![sandwich](images/JavaScriptSandwich.svg "sandwich")

A common example in web application programming is getting something from a web server instead of a sandwich server.

	jQuery.ajax({
		url: "cornBeefOnRye"
	}).done(function(sandwich){
		eatSandwich();
	}).fail(function(err){
		starve();
	});
	
You might have noticed a problem with the handlers of both events. There is no reference to who eats the sandwich. If we have more than one sandwich eater or paper bringer we have a problem. The solution to this problem is to have sandwich eating objects, Tony in our diagram. Tony is a stomach with legs and exists in our example to eat sandwiches. He is also the context for the sandwich order. We can define a Tony Object like so:

	var oTony = {
		name: 'Tony',
		state: 'famished`,
		eatSandwich: function(){
			this.state = 'replete for now';
		},
		starve: function(){
			this.state = 'deceased';
		}
	}
	
If we have more than one sandwich eater in a system, we don't know which one's state is replete ... a big problem for Tony our walking stomach. The solution is to establish a context for who we call when an event happens. We do this like so:

	jQuery.ajax({
		url: "cornBeefOnRye"
	})
	.done(jQuery.proxy(oTony.eatSandwich, oTony))
	.fail(jQuery.proxy(oTony.starve, oTony));

that way when the message comes in it comes with it's context. You can think of the proxy like the little stand they hand you at Williams that makes you get your right sandwich. 