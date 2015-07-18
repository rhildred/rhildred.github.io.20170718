

var SlideShow = Toolbox.Base.extend({
	// interval between items (in milliseconds)
	itemInterval: 10000,

	// cross-fade time (in milliseconds)
	fadeTime: 2500,

	// count number of items
	numberOfItems: 0,

	// set current item
	currentItem: 0,

	// list of items
	aItems: null,

	//actual slideshow div
	slideshow: null,

	//need to be able to cancel timer on a click
	infiniteLoop: null,

	//when we click on one of the little circles
	onClick: function(evt) {
		evt.stopPropagation();
		clearInterval(this.infiniteLoop);
		var nNew = parseInt(evt.target.id);
		this.swapImage(nNew);
	},
	constructor: function(slideshow){
		this.slideshow = slideshow;
		// loop through the images using the swapImage method
		this.infiniteLoop = setInterval(jQuery.proxy(this.swapImage, this), this.itemInterval);
		this.aItems = slideshow.children();
		this.numberOfItems = this.aItems.length;
		if (this.numberOfItems > 0) {
			var oNew = $('<div class="pictureLinks">');
			for ( var i = 0; i < this.numberOfItems; i++) {
				// 1 button for each item
				var oLink = $('<button id="' + i
						+ '">&nbsp;</button>');
				if (i == 0) {
					oLink.attr('class', 'active');
				}
				oLink.click(jQuery.proxy(this.onClick, this));
				oNew.append(oLink);
			}
			slideshow.append(oNew);
		}
		return this;
	},
	swapImage: function(nNew){
		// .stop true makes it not save up events
		if (typeof nNew == 'undefined') {
			jQuery(this.aItems[this.currentItem]).stop(true, true)
					.fadeOut(this.fadeTime);
		} else {
			jQuery(this.aItems[this.currentItem]).hide();
		}
		this.slideshow.find('#' + this.currentItem).attr('class', '');
		if (typeof nNew !== 'undefined') {
			this.currentItem = nNew;
		} else if (this.currentItem == this.numberOfItems - 1) {
			this.currentItem = 0;
		} else {
			this.currentItem++;
		}
		// find out if there is an anchor tag and no image tag
		// in the current item, and if so swap it for the img
		// tag
		var dCur = jQuery(this.aItems[this.currentItem]);
		var aCur = dCur.find('a');
		var aImg = dCur.find('img');
		if (aCur.length && !aImg.length) {
			var img = $('<img>'); // Equivalent:
									// $(document.createElement('img'))
			img.attr('src', aCur.attr('href'));
			img.attr('class', aCur.attr('class'));
			img.appendTo(dCur);
			aCur.remove();
		}
		this.slideshow.find('#' + this.currentItem).attr('class', 'active');
		if (typeof nNew == 'undefined') {
			jQuery(this.aItems[this.currentItem]).fadeIn(this.fadeTime);
		} else {
			jQuery(this.aItems[this.currentItem]).show();
		}
	}
});


(function($) {
	$.fn.slideshow = function() {
		this.addClass("slideshow").children().addClass("swapImage");
		for(var i = 0; i < this.length; i++){
			new SlideShow(jQuery(this[i]));
		}
};
}(jQuery));
