The "Truth" About Responsive
============================

When we started, I said that your big opportunity is Mobile. Of course the details are where the fun is, but the actual principles of a mobile/responsive design are very simple. In the following examples you can see Lets say that I have an ugly [website like this](uglyMobile/uglyMobile1.html):

	<!DOCTYPE html>
	<html>
	<head>
	<meta charset="ISO-8859-1" />
	<title>This is an ugly html file</title>
	</head>
	<body>
	<h1>This is an ugly html file</h1>
	<img src="images/gitEnvironment1.svg" />
	</body>
	</html>

This site doesn't look good no matter how big the display is. On mobile, only a corner of the graphic is visible. The other thing that you may notice on mobile is that the text looks overly small. The reason for the text being small on mobile is that some mobile devices scale their viewports to try to fit more on. On your mobile device you can see this on an [unscaled viewport here](uglyMobile/uglyMobile2.html):

	<!DOCTYPE html>
	<html>
	<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta charset="ISO-8859-1" />
	<title>This is an ugly html file</title>
	</head>
	<body>
	<h1>This is an ugly html file</h1>
	<img src="images/gitEnvironment1.svg" />
	</body>
	</html>
	
The image still doesn't fit, but now at least the text looks like it belongs on a mobile device. Let's try [using CSS to set the size of the image](uglyMobile/uglyMobile3.html):

	<!DOCTYPE html>
	<html>
	<head>
	<meta charset="ISO-8859-1" />
	<title>This is an ugly html file</title>
	<style>
	img {
		width: 320px;
	}
	</style>
	</head>
	<body>
		<h1>This is an ugly html file</h1>
		<img src="images/gitEnvironment1.svg" />
	</body>
	</html>
	
Now the image is smaller but it is too small but for only the smallest of screens if we use the firefox developer tools plugin and select `resize` and `view responsive layouts` to see it on differently sized screens. If we look on an actual device with a 320 px screen we see that even there the image doesn't use the whole screen. The [meta viewport tag fixes that however](uglyMobile/uglyMobile4.html).

	<!DOCTYPE html>
	<html>
	<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta charset="ISO-8859-1" />
	<title>This is an ugly html file</title>
	<style>
	img {
		width: 320px;
	}
	
	@media screen and (min-width: 480px) {
		img {
			width: 480px;
		}
	}
	
	@media screen and (min-width: 600px) {
		img {
			width: 600px;
		}
	}
	
	@media screen and (min-width: 768px) {
		img {
			width: 768px;
		}
	}
	
	@media screen and (min-width: 800px) {
		img {
			width: 800px;
		}
	}
	
	@media screen and (min-width: 1024px) {
		img {
			width: 1024px;
		}
	}
	
	
	</style>
	</head>
	<body>
		<h1>This is an ugly html file</h1>
		<img src="images/gitEnvironment1.svg" />
	</body>
	</html>

Using media queries and the meta viewport tag, we can get a page that displays the image correctly on [all of the differently sized screens](uglyMobile/uglyMobile5.html) in the `view responsive layouts` page. In a desktop browser, though the image never gets bigger than 1024 pixels wide. The following code solves the image problem in another way that is also less code!

	<!DOCTYPE html>
	<html>
	<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta charset="ISO-8859-1" />
	<title>This is an ugly html file</title>
	<style>
	img {
		max-width: 100%;
	}
	</style>
	</head>
	<body>
		<h1>This is an ugly html file</h1>
		<img src="images/gitEnvironment1.svg" />
	</body>
	</html>
	
Notice also the use of `max-width` as opposed to `width` in [this example](uglyMobile/uglyMobile6.html). 