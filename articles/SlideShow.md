SlideShows Carousels FancyBox ...
=================================

All of these techniques add interactivity to a page. They also all follow the same basic pattern, put this link in your document head:

	<link rel="stylesheet" href="//rhfp-syndicateme.rhcloud.com/css/slideshow.css" />
    
Mark up your document like so:

    <div class="slideshow">
        <div>
            <img src="http://farm6.staticflickr.com/5204/5358960598_6364a0f183_z_d.jpg" />
        </div>
        <div style="display:none">
            <a href="http://farm6.staticflickr.com/5203/5358345317_b6a3cf06a7_z_d.jpg"></a>
        </div>
	</div>

Then, after including jQuery, include the following:
	
	<script src="//rhfp-syndicateme.rhcloud.com/js/toolbox.js"></script>
	<script src="//rhfp-syndicateme.rhcloud.com/js/slideshow.js"></script>
	<script type="text/javascript">

		jQuery("document").ready(function(){
			jQuery(".slideshow").slideshow();
		});
	</script>

You can see an [example here](http://rawgithub.com/rhildred/slideshowExample/master/public/slideShow.html).

hoverBox Example
================

An effect for an image gallery, where when the image is hovered over it is enlarged. To use this put this link in your document head:

	<link rel="stylesheet" href="//rhfp-syndicateme.rhcloud.com/css/hoverBox.css" />
    
Mark up your document like so:

    <div class="myhoverbox">
		<a href="http://farm3.staticflickr.com/2865/10662105933_2269c9fbe7.jpg"><img src="http://farm3.staticflickr.com/2865/10662105933_2269c9fbe7_m.jpg" /></a>
    	
    	<a href="http://farm3.staticflickr.com/2830/10636622654_e6c402312c.jpg"><img src="http://farm3.staticflickr.com/2830/10636622654_e6c402312c_m.jpg" /></a>
    	
        <a href="http://farm6.staticflickr.com/5546/10636866303_179c9103f4.jpg"><img src="http://farm6.staticflickr.com/5546/10636866303_179c9103f4_m.jpg" /></a>
	</div>

Then, after including jQuery, include the following:
	
	<script src="//rhfp-syndicateme.rhcloud.com/js/hoverBox.js"></script>
	<script type="text/javascript">

		jQuery("document").ready(function(){
			jQuery(".myhoverbox").hoverBox();
		});
	</script>

You can see an [example here](http://rawgithub.com/rhildred/slideshowExample/master/public/hoverBox.html). I put complete code on [my github page](http://github.com/rhildred/slideshowExample).
