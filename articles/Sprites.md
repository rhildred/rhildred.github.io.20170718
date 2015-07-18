Sprite Sheets
=============

When he was still in elementary school my youngest son made a bunch of stick
figure animations in a [program called Pivot](http://pivotanimator.net/). Pivot is a simple to use program,
based on joints, that can make animated gifs and export to You Tube. The stick
figure animations that it makes are just a lot of fun for me.

![stick figure](images/tumble09.png "stick figure")

When I saw that Fireworks CSS6 would make sprite sheets I got pretty excited,
because sprite animation is the way that classic side scrolling games are
constructed. I was even more excited when I went to `File` -> `Open` in Fireworks,
selected a bunch of pngs exported from pivot and checked the `animation sequence`
box. FireWorks pulled all of my images into a single fw.png file, and when I
pressed play I could see my animation. Unfortunately my enthusiasm was dampened
when I realized that my frames were states rather than slices and fireworks
wouldn't export them as a sprite sheet no matter what I tried.

I finally got my sprite sheet using the [ImageMagick program](http://www.imagemagick.org).
To get my spritesheet I did `convert tumble_src/*.png -transparent white -resize x300 -append public/images/filmstrip.png`
where my images were in the tumble_src directory. The results of the conversion
was a long filmstrip. I could go over the filmstrip like this:

	      y = 0;
	      setInterval(function(){
	    	  if( y >= 100*canvas.height)
	    	  {
	    		 //I have 100 frames in my animation so will loop
	    	  	y = 0;
	    	  }
	          context.clearRect ( 0 , 0 , canvas.width , canvas.height );
	          // draw starting at offset y on spritesheet
	          context.drawImage(imageObj, 0, y, canvas.width, canvas.height, 0, 0, canvas.width, canvas.height);
	          y += canvas.height;
	      }, 50);

to create the animation. The code isn't really important, but hopefully the
idea of grabbing frames from a filmstrip like spritesheet is apparent. We will
have more opportunity to look at this sort of spritesheet when we do ECMAScript
(Action and JavaScript). The other use for a sprite sheet is to make images load
faster for css. This can even be done for vector images! You can see [the results of my animation here](filmstripDemo.phtml).
The [spritesheet itself is here.](images/filmstrip.png) To see it, you may want to click on the magnifying glass.

*Note: Firefox only does images up to 32,000 pixels high so I had to scale my image down a little. Hence the `-resize x300` in my convert command.
