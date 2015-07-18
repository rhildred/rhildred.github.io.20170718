PROG8020 Project Rubric
=======================

Many found [the project start](https://github.com/rhildred/PROG8020phpjavascript/tree/master/php/projectStart), a little daunting on first look([you can see it running here](http://apps.syndicateme.net/BoatProject/)). Hopefully a rubric will provide a starting place for making this project your own.

|Item|Explanation|Marks|
|---|---|---|
|Openshift| You will want a portfolio when you go looking for a coop job in the spring. Your project could be a good step! Prospective employers can see your project on OpenShift|55%|
|Products|I purposely picked boats, thinking that you are likely interested in something else. Change the products and pictures to something that you are interested in.|+1-5% |
|Branding|The look and feel of the site was generated with [lavish bootstrap](http://www.lavishbootstrap.com/). The special fonts [are google fonts](http://www.google.com/fonts). You will want to create your own site branding.|+1-5% |
|categories/index.php|This could purposely use a little work. The numbers can't have a slash after them but the non-numerics must. Please make this consistent, without creating new problems.|+1-10%|
|js/swag.js|I also purposely left a bug in here. If you have products in a category that are not an even multiple of 4 they are not displayed in the filmstrip element at the bottom. For instance with my boats, [I actually have 9](http://apps.syndicateme.net/BoatProject/#1/9), but only 8 are reachable. Get the 9th boat to display in the bottom portion of the screen, without creating new problems.|+1-10%|
|Paypal|What good is a store if you can't purchase anything? You will need paypal buttons for all of the items that are for sale on your site. These will also need to be in the database|+1-5%|
|Your own touch|You could add fields to the product like country of origin, gluten free, organic .... You can add another display element altogether. There are no about or contact pages really. These can be where you can really make this your own.|+1-10%|

Writing this, I see a lot of scope for different web sites based on the same theme. Good Luck!


_Update_: While working with students on the bug in `js/swag.js` I inadvertently hit on a solution for my bug:

		var i = 0;
		var curDiv = null;
		jQuery("#myCarousel2PlaceHolder").html("");
		this.oItemList.models.forEach(function(oItem) {
			if(!(i % 4)){
				// then we need to render an item div
				if(curDiv) jQuery("#myCarousel2PlaceHolder").append(curDiv);
				curDiv = jQuery("<div class=\"item\"></div>");
				if(i==0){
					curDiv.addClass("active");
				}
			}
			curDiv.append(this.fPreviewTemplate(oItem.attributes));
			i++;
		}, this);

I append the div to the placeholder with this: `if(curDiv) jQuery("#myCarousel2PlaceHolder").append(curDiv);`. If you look carefully you will notice that right after I append the div, I make a new one. If we never make it to a multiple of 4 again that new div is never appended and we are short some image(s). The answer is to do another `if(curDiv) jQuery("#myCarousel2PlaceHolder").append(curDiv); ` after the loop.

		var i = 0;
		var curDiv = null;
		jQuery("#myCarousel2PlaceHolder").html("");
		this.oItemList.models.forEach(function(oItem) {
			if(!(i % 4)){
				// then we need to render an item div
				if(curDiv) jQuery("#myCarousel2PlaceHolder").append(curDiv);
				curDiv = jQuery("<div class=\"item\"></div>");
				if(i==0){
					curDiv.addClass("active");
				}
			}
			curDiv.append(this.fPreviewTemplate(oItem.attributes));
			i++;
		}, this);
		if(curDiv) jQuery("#myCarousel2PlaceHolder").append(curDiv);
	
I am publishing this to even the playing field for everyone to get the marks for fixing this bug.