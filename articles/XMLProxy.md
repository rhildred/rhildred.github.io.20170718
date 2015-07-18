Proxying XML
============

A fairly common problem when making mashups ... combining content from different places is content that is only available in XML. For instance an RSS feed. To get xml into your pages from other sites, it is often necessary to serve/proxy the content from your site. This can be done quite easily using server side code. For instance in node.js to proxy a google groups rss feed at `/fancybox` we would need to add a route `app.get("/fancyBox", fancyBox)`. The route could be implemented like:

	var jQuery = require('js-toolbox')._jQuery;
	
	var fancyBox = function(req, res, callback){
		jQuery.ajax({url: "https://groups.google.com/forum/feed/fancybox/msgs/rss_v2_0.xml?num=50"})
		.done(function(html){
			//*** this is really important for the content to be parsed correctly on the receiving end
			res.setHeader("Content-Type", "text/xml"); 
			res.end(html);
		});
	};
	
	
	module.exports.fancyBox = fancyBox;
	
In our browser we can consume the xml like so:

	<!Doctype html>
	<html>
	<body>
	<h1>Wow Jobs in Kitchener</h1> 
	<div class="jobDisplay"></div>
	
	
	<!-- scripts at end of body -->
	<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/1.8.3/jquery.js"></script>
	<script type="text/javascript">
	jQuery("document").ready(function(){
	
		jQuery.ajax("/fancyBox").done(function(sXML){
			jQuery(sXML).find("item").each(function(){
				jQuery(".jobDisplay").append(
						"<p>" + jQuery(this).find("title").text() + "</p>"
						);			
			});
		})
		.fail(function(err){
			alert(err);
		});
	});
	
	</script>
	</body>
	</html>
	
The way that our content is displayed in the browser is of course controlled by the way that we insert it into the page. In this case each of my titles are paragraphs, but using CSS and different tags I can format them however I would like. For instance to make the titles also be links I can do something like this:

	jQuery.ajax("/fancyBox").done(function(sXML){
		jQuery(sXML).find("item").each(function(){
			jQuery(".jobDisplay").append(
					"<p><a href=\"" + jQuery(this).find("link").text() + "\">" + jQuery(this).find("title").text() + "</a></p>"
					);			
		});
	})
	.fail(function(err){
		alert(err);
	});

A more complete example, [borrowed liberally from here](http://codeforbrowser.com/blog/parse-an-rss-feed-with-jquery/)

        jQuery.ajax('/fancyBox').done(function(xml) {
                jQuery(xml).find('item').each(function() {
                    var title = jQuery(this).find("title").text();
                    var des = jQuery(this).find("description").text();
                    var link = jQuery(this).find("link").text();
                    var $des = jQuery('<div class="linkitem"></div>').html(des);
                    var $link = jQuery('<a></a>').attr('href',link).attr('target','_blank').html(title);
                    var pubDate = new Date(jQuery(this).find("pubDate").text());
                    var day = pubDate.getDate();
                    var month = pubDate.getMonth() + 1;
                    var year = pubDate.getFullYear();
                    var date = day + '/' + month + '/' + year;
                    var $date = jQuery('<div class="date"></div>').text(date)   
                    var wrapper = "<li class='single-feed'>";
                    jQuery(".feed-container").append(jQuery(wrapper).append($link,$date,$des));                   })

            })
        .fail(function() {
                alert("I am sorry, But I can't fetch that feed");
            }
        );
 
 Massaging Data
 --------------
 
There is no requirement to send back xml that you proxy on the server exactly as it is to the browser. In fact there is no requirement to send it as xml at all. For instance, it may be more convenient in the browser to process the data with a template that takes JSON as input. An additional benefit of proxying the data on the server is that you can also massage the data to be in the format that you need. Lets look at this tumblr feed:
 
	var tumblr_api_read = {"tumblelog": "lots of other stuff here ..."};
	
This actually isn't JSON, but javascript code that needs to be evaluated to be used. To make this in to actual JSON is easy on your server. If this gets the tumblr code:

	var jQuery = require('js-toolbox')._jQuery;
	
	module.exports.tumblr = function(req, res, next, callback){
		jQuery.ajax("http://<your user name>.tumblr.com/api/read/json").done(function(sJs){
			res.setHeader("Content-Type", "application/json");
			res.end(sJs);
			if(callback)callback(null);
		}).fail(function(err){
			console.log(err);
			res.send(err.status, err.code);	
			if(callback)calback(err);
		});
	}
	
then you can strip off the tumblr_api_read and the closing `;` with the following:

	res.end(sJs.replace("var tumblr_api_read = ", "").replace(/;\s.*$/, ""));
	
This may look a little daunting, but the first call to replace gets rid of the `tumblr_api_read`. The second, more daunting one, is a regular expression. the `/..../` part says that it is a regular expression. If you start at the `$` and work backwards, the `$` matches the end of a string. The `\s.*` matches any amount of whitespace, and the `;` matches the rogue semi colon that we are trying to get rid of. What will be put into the response is:

	{"tumblelog": "lots of other stuff here ..."}
 
... only the json.
 
It is even possible to get a rss feed in xml, convert it to json on your server and process it on the browser. Why would you want to do this? you may ask. If you have json instead of xml, you can render the json in a template, like we did with the internationalization example. For instance to display an rss item, you can use the following template:

	<script id="jobTemplate" type="text/template">
		<p><a href="<%= link %>" ><%= title %></a></p>
		<p><%= author %></p>
		<p><%= description %></p>
		<hr />
	</script>

The link, title, author and description all come from a javascript object that is rendered with the template:

	<!-- underscore is used to render the template with the object from the api -->
	<script
		src="//cdnjs.cloudflare.com/ajax/libs/underscore.js/1.5.2/underscore-min.js"></script>
	<script type="text/javascript">
	jQuery("document").ready(function(){
		var fTemplate = _.template(jQuery('#jobTemplate').html())
		
		jQuery.ajax("/wowJSON").done(function(oRSS){
			oRSS.forEach(function(oItem){
				jQuery(".jobs").append(fTemplate(oItem));
			});
		});	
	});
	</script>

To convert the xml to JSON on the server, we need to add another library to our `package.json` file.

	"dependencies": {
	    "assert-runner": "*",
	    "express": "*",
	    "js-toolbox": "*",
	    "xml2js": "*"
	},

Then in our server code:

	var jQuery = require('js-toolbox')._jQuery;
	var parseString = require('xml2js').parseString;
	
	module.exports.wowJSON = function(req, res, next, callback){
		jQuery.ajax({url: "http://www.wowjobs.ca/wowrss.aspx?q=Web+Developer&l=N2T1G8&s=r&sr=25&t=30&f=r&e=&si=A&Dup=H"})
		.done(function(xml){
			parseString(xml, function (err, result) {
				if(err){
					console.log(err);
					res.send(err.status, err.code);	
					if(callback)calback(err);
				}else{
					res.setHeader("Content-Type", "application/json");
					res.end(JSON.stringify(result.rss.channel[0].item));
					if(callback)callback(null);
				}
			});		
		});
	}

The other interesting thing about this code is that we aren't even sending back all of the data that we get as xml. We are only sending `JSON.stringify(result.rss.channel[0].item)`. By sending back, just what the browser needs, we simplify the code on the browser. This technique can also be used with server templates.
 
This technique of making and consuming resources is the foundation of web services. To make a feature rich web application, it is often necessary to provide and consume many web services, your own and those of others.