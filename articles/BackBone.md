BackBone
========

BackBone is a complete web development framework. It un-tangles callback soup, by using an object paradigm. We will be extending 2 backbone objects.

1. A router object that handles links on a page like our CDList
1. A collection object that is our interface to our API.

![Protein BackBone](images/Protein_backbone_PhiPsiOmega_drawing.svg "Protein BackBone")

The router object is quite straightforward:

	// define a way to view individual cds
	
	var IndividualCdRouter = Backbone.Router.extend({
		// this function _MUST_ be named initialize
		initialize: function(){
			return this;
		},
		// the routes are places within the document that I can link to
		routes: {
			// this is a route for #cds/1, #cds/2 .... 
			"cds/:id": "showCD"
		},
		// this is the implementation of the above route
		showCD: function(id){
			jQuery("#cditemview").html("showing details for cd: " + id);
		}
	});
	
	
	jQuery("document").ready(function(){
		// this gets called when the document is loaded
		var oCDRouter = new IndividualCdRouter();
		// start routing requests
		Backbone.history.start();
	});

The router object has 3 members:

1. `initialize` which is a special constructor for a backbone router. In this case we simply return this, but the initialize method is required.
1. `routes` which is an associative array of the routes that can be handled by this router. In this case we are only supporting one route for #cds/1, #cds/2 ....
1. `showCD` which is the implementation of the one route that we have.

We also, of course, have a document.ready handler that constructs an instance of our router. There is one other piece besides, `Backbone.history.start` which we need to start the routing internally.

Lets see how backbone un-tangles our example:

	jQuery("document").ready(function(){
		// don't do anything until document fully retrieved
		var fTemplate = _.template(jQuery('#cditem').html());
		var fDetailsTemplate = _.template(jQuery('#cditemdetails').html());
		// we go out and get the initial list of cds 
		jQuery.ajax({url:"cds/", dataType:"json"})
		.done(function(oCdList){
			oCdList.forEach(function(oCd){
				// we append a single cd into the cdlist div 
				jQuery("#cdlist").append(fTemplate(oCd));
			});
					
			// be done when we click a link with class clickable
			jQuery(".clickable").click(function(evt){
				// we go and get an individual cd
				jQuery.ajax({url:this.href, dataType:"json"})
				.done(function(oCd){
					// we replace the html in the cditemview with the html from the cditemdetails template
					jQuery("#cditemview").html(fDetailsTemplate(oCd));
				})
				.fail(function(err){
					console.log(err);
				});
				// it is really important to return false here so that the event isn't passed on
				return false;
			});
	
		})
		.fail(function(err){
			console.log(err);
		});	
	});
	
The BackBone structure is much straighter with no nesting:

	var Cds = Backbone.Collection.extend({
		url : 'cds/',
	});
	
	var CdsRouter = Backbone.Router.extend({
		oCdList : new Cds(),
		fCdListTemplate : _.template(jQuery('#cditem').html()),
		fDetailsTemplate : _.template(jQuery('#cditemdetails').html()),
		initialize : function() {
			this.oCdList.fetch({
				success : jQuery.proxy(this.renderCds, this),
				error : function(collection, err) {
					throw err.status + " " + err.statusText;
				}
			});
		},
		renderCds : function() {
			this.oCdList.models.forEach(function(oCd) {
				// we append a single cd into the cdlist div
				jQuery("#cdlist").append(this.fCdListTemplate(oCd.attributes));
			}, this);
	
			Backbone.history.start();
		},
		routes : {
			"cds/:id" : "showCD",
			"*other" : "defaultRoute"
		},
		showCD : function(id) {
			jQuery("#errlist").html("");
			jQuery("#cditemview").html(
					this.fDetailsTemplate(this.oCdList.get(id).attributes));
		},
		defaultRoute : function(other) {
			jQuery("#errlist").html("");
			jQuery("#cditemview").html("Click on an item to see it's details");
		}
	});
	
	var cdsRouter = new CdsRouter();

Something that I found really helpful, while making my router and generally with JavaScript programming, is the `jQuery.proxy(this.renderCds, this)` construct. Because the callback (`this.renderCds`) is just a function, it is called in the global context. The global context defeats the purpose of objects, in that we have no access to the other members of the object. This is such a common problem that John Ressig (the creator of jQuery) wrote a method to supply a callback with a context (`jQuery.proxy(fCallback, oContext)`). In this case we need the context to access `oCdList` as well as our templates. There is a more complete backbone example [on my github.](https://github.com/rhildred/PROG8020phpjavascript/tree/master/php/projectStart).