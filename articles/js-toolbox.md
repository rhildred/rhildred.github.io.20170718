Class Based Inheritance in the Style of BackBone.js
=================================================== 

![Shere Khan](http://upload.wikimedia.org/wikipedia/commons/thumb/a/ae/Jungle_Book_Rudyard_Kipling_poster.jpeg/175px-Jungle_Book_Rudyard_Kipling_poster.jpeg "Shere Khan")
Suppose that I wanted to have a [domain model](http://martinfowler.com/eaaCatalog/domainModel.html) that included different sorts of tigers!

I might start out with something like this:

	var Animal = Toolbox.Base.extend({
	    constructor: function (name) {
	        this._name = name;
	    },
	    sayName: function () {
	        return('Hi, my name is ' + this._name);
	    }
	});
	
Then I could make a Tiger sub-type of an animal something like this:

	var Tiger = Animal.extend({
		constructor: function () {
			// all tigers are named Tony
			this._name = "Tony";
		}
	});
	
But you can't call a Bengal Tiger Tony, so we need something like this:

	var BengalTiger = Tiger.extend({
		constructor: function () {
			// you can't name a Bengal tiger Tony
			this._name = "Shere Khan";
		},
	    sayName: function () {
	        return('Hi, my name is ' + this._name + ' and I am the true lord of the jungle!');
	    }
	});

Seems like a user story for inheritance and polymorphism to me! JavaScript
implements prototypical inheritance, which is fine but in this case I would like
to be able to have class based inheritance like I might find in the BackBone.js
library.

	  var Router = Backbone.Router.extend({
	    routes: {
	      'lists/:id': 'openList'
	    },
	
	    initialize: function() {
	    },
	
	    openList: function(id) {
	    }
	  });

In fact it was BackBone.js that I drew my inspiration from. I am working on a
large project, where I have a domain model that doesn't map completely to
BackBone models views and Router. I was looking for something to carry the same
style but that wasn't one of these things and came across [this on the web](https://github.com/jimmydo/js-toolbox). That js-toolbox is fine for browser
based code, but didn't work with node where I really want to keep some domain
logic so I made a npm for it. To enable a domain model using the BackBone style in node.js simply use `npm install js-toolbox --save`.
You can see the [code at my github](https://github.com/rhildred/js-toolbox).

 