Consuming an API
================

(And Displaying it in a template)
---------------------------------

Today we had a really big day. We took the data that we served in our PHP page and used JavaScript to display it on the browser console and then on the screen.

![Consuming API](images/ConsumingAPI0.png "Consuming API")

To just retrieve the data from our API we did this:

	jQuery.ajax({url:"cds/", dataType:"json"})
	.done(function(oCdList){
		console.log(JSON.stringify(oCdList));
	})
	.fail(function(err){
		console.log(err);
	});

Then we made a template in our index.html:

	<script id="cditem" type="text/template">
	<div>
		<a href="cds/<%= id %>" class="clickable" ><%= Title %></a>
	</div>
	</script>

To use the template we did:

	var fTemplate = _.template(jQuery('#cditem').html());
	// we go out and get the initial list of cds 
	jQuery.ajax({url:"cds/", dataType:"json"})
	.done(function(oCdList){
		oCdList.forEach(function(oCd){
			// we append a single cd into the cdlist div 
			jQuery("#cdlist").append(fTemplate(oCd));
		});

This was the basics of displaying data from our API in a web page.

You will notice that in our template we displayed the cds as anchors. In class we went on to display the detail from the cds to the right of the list of cds [(see screen above)](#ConsumingAPI). To do this we created a second template:

	<script id="cditemdetails" type="text/template">
	<table>
		<tr><td>id:</td><td><%= id %></td></tr>
		<tr><td>title:</td><td><%= Title %></td></tr>
		<tr><td>arranger:</td><td><%= Arranger %></td></tr>
		<tr><td>genre:</td><td><%= Genre %></td></tr>
	</table>
	</script>

The second template is made in to a function with underscore the same as the first: `var fDetailsTemplate = _.template(jQuery('#cditemdetails').html());` It is rendered when an anchor is clicked like so:

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

What is happening here is that instead of following the link when an anchor is clicked on, we are retrieving the link with `jQuery.ajax`. It is really important to return false here or the link will still be followed per the default behaviour and the whole page will be refreshed. There are a couple of problems with our page however. The code is deeply nested in what some people call callback soup. If we hit the back button, we leave the page entirely rather than remembering where we were previously. In addition to jQuery and underscore, there is another JavaScript library, called BackBone that can help out here. 