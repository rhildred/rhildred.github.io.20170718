(function($) {
	$.fn.hoverBox = function() {
		this.addClass("hoverbox").find("a").each(function(index, a){
			jQuery(a).append("<img class=\"preview\" src=\"" + a.href + "\"/>");
		});
		return this;
	};
}(jQuery));
