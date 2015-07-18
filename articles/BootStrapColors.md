Bootstrap Colors
================

![Dad and Bovas portaging](http://farm3.staticflickr.com/2250/1524508774_93c0f4b027_z_d.jpg "Dad and Bovas portaging")

I mentioned my Dad in [another note](DSGN1210.js.html). Dad was a second career computer programmer, but he really loved canoeing. Especially through swamps. When Grant Birks and I wanted to take our buddy Bovas (on the right) for his first canoe trip, I asked Dad to go along as a 4th. We went to McRae lake, and I forgot about the little portage at the start. Grant and I carried the stuff while Dad and Bovas sat and enjoyed the perfect late August or early September weather. If you [look at this](dad) you will hopefully see what this has to do with Twitter BootStrap and colors.

To make this demo, I used a [tool that automatically builds a BootStrap theme](http://www.lavishbootstrap.com/) from the colors in a photograph. I used the photograph above to generate a css file for me. I saved the .css file in the css folder where my project could get at it. I used the following code in my `<head>` to pull it in to my project:

	<link href="css/lavish-bootstrap.css" rel="stylesheet">

Shazam! I had my new color scheme. I did notice one thing however. The minified menu for mobile didn't work. To make that work, I had to do another little thing at the end of my `<body>` tag:

	<script type="text/javascript"
		src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
	<!-- Bootstrap core JavaScript
	    ================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->
	<script
		src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>

I needed this, because BootStrap does the mobile thing with JavaScript, reasoning that mobile browsers will have JavaScript while desktop browsers will possibly not. Chapter 5 in "Heads First Web Design" is more purposeful about color choosing than just getting the colors from a photo. Luckily there are other ways on line to generate a BootStrap theme from your color picks. [This site for instance](http://www.bootstrapthemeroller.com/) allows you to control just about everything and preview it too. There are also [pre-made BootStrap themes](http://bootswatch.com/).

Of course, the above code only gives a blank page. You still control what goes on the page. For instance a nav bar is marked up like so:

	<div class="navbar navbar-inverse navbar-fixed-top">
		<div class="container">
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

The best way to learn the markup, is from the theme preview in the various theme rollers. There is however a [basic demo here](http://getbootstrap.com/2.3.2/getting-started.html#examples). There is also a [showcase here](http://builtwithbootstrap.com/).