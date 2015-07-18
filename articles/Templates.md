Templates
=========

![PEI highway](http://upload.wikimedia.org/wikipedia/commons/8/8d/PEI_Highway_template.svg "PEI Highway")

Templates are those things that you spray paint in to make signs. If you will, lines to color within.  If you type "template" in a wikimedia commons search you will find that there are lots of SVG files that are templates for various things. The PEI one caught my eye, because I like PEI.

In web design templates are for sure lines to color in, but they also serve a similar function to the `Master Page` in fireworks. A template can contain all of the common elements on your site, and then be reused in all of your sub pages. A simple example is what I did for [my `Dad` page](dad/). The index page in index.js.html looks like this:

	<!--
	This is a slideshow, using some of my public images on flickr. 
	The good thing about the swapImage div is that it can contain anything and it will be swapped one for the other.
	Only the first image is an actual image, the rest are anchors that get loaded the first time.
	The .js code is somewhat modified gpl courtesy of TrendMedia Technologies, Inc., Brian McNitt. 
	-->
	<% locals.title = "John Hildred 1933-2013"; layout('_layout') -%>
	<div class="slideshow">
		<div class="swapImage">
			<h1>Dad and Bovas</h1>
			<img
				src="http://farm3.staticflickr.com/2250/1524508774_93c0f4b027_z_d.jpg" />
		</div>
	
		<div class="swapImage" style="display: none">
			<h1>Christmas 2004</h1>
			<a
				href="http://farm1.staticflickr.com/129/396132921_5afe669d5d_z_d.jpg"></a>
		</div>
	
	</div>

You can see that it is missing a ton of html markup. A second page is also missing a ton of markup:

	<% locals.title = "My Favourite"; layout('_layout') -%>
	<% include mypick.md %>

The missing markup is in a `_layout.js.html` file that is shared, using the `layout('_layout')` method, among all (2) pages in the site. In the second page you will also notice the use of the `include` keyword. In this case the `mypick.md` is "sprayed" where the include symbol is. `mypick.md` is written in markdown, as is this page.

	My Favorite Dad Picture
	=======================
	
	![Dad and Bovas portaging](http://farm3.staticflickr.com/2250/1524508774_93c0f4b027_z_d.jpg "Dad and Bovas portaging")
	
	Grant Birks and I wanted to take our buddy Bovas (on the right) for his first canoe trip. I asked Dad to go along as a 4th. We went to McRae lake, and I forgot about the little portage at the start. Grant and I carried the stuff while Dad and Bovas sat and enjoyed the perfect late August or early September weather.

The `_layout.js.html` has the boilerplate html in it as well as a `<%- body %>` instruction. The real page is sprayed inside this `<%- body %>` directive. You may also notice the use of `locals.title` as another example of content that is sprayed inside a template. 

	<!DOCTYPE html>
	<html lang="en">
	<head>
	<title><%= locals.title %></title>
	<!-- Bootstrap core CSS -->
	<link href="css/lavish-bootstrap.css" rel="stylesheet">
	<link href="css/dad.css" rel="stylesheet">
	</head>
	<body>
		<div class="navbar navbar-inverse navbar-fixed-top">
			<div id="<%= locals.page %>" class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse"
						data-target=".navbar-collapse">
						<span class="icon-bar"></span> <span class="icon-bar"></span> <span
							class="icon-bar"></span>
					</button>
					<a class="navbar-brand active" href=".">John Hildred 1933-2013</a>
				</div>
				<div class="collapse navbar-collapse">
					<ul class="nav navbar-nav">
						<li><a href="mypick.js.html">My Pick</a></li>
					</ul>
				</div>
				<!--/.nav-collapse -->
			</div>
		</div>
		<div class="container">
			<!-- Example row of columns -->
			<div class="row"><%- body %></div>
	
		</div>
		<!-- /container -->
	
	</body>
	<script type="text/javascript"
		src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
	<!-- Bootstrap core JavaScript
	    ================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->
	<script
		src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
	
	<script type="text/javascript" src="js/rotator.js">
		
	</script>
	</html>

Internationalization
--------------------

Templates can also have localized text sprayed within them. This is done using a `gettext()` or `__()` method. For instance here is a short internationalized example:

	<!DOCTYPE html>
	<html lang="<%= lang %>" dir="<%= lang_dir %>">
	<head>
	<meta charset="utf-8" />
	<title><%= gettext("Hello") %></title>
	</head>
	<body>
		<h1><%= gettext("Hello") %></h1>
		<p><%= __("Hello from my Grandson") %></p>
		<img src="images/DSCF0117.jpg" />
	</body>
	</html>
	
The pattern is that the whole english string is placed inside `gettext()` or `__()`. In a directory named `i18n` we have sub-directories named after the other supported languages. Within that directory we have a `messages.json` file that looks like this:

	{
		"Hello":"Bonjour",
		"Hello from my Grandson":"Bonjour &agrave; mon petit-fils"
	}
	
Notice the use of an XML escape for the a accent grave. I find that this approach is the best for french. You can see the [grandson example complete here](https://github.com/rhildred/nodetest).