// Copyright (c) 2010 TrendMedia Technologies, Inc., Brian McNitt.
// All rights reserved.
//
// Released under the GPL license
// http://www.opensource.org/licenses/gpl-license.php
//
// **********************************************************************
// This program is distributed in the hope that it will be useful, but
// WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
// **********************************************************************

$(window).load(
		function() { // start after HTML, images have loaded

			var InfiniteRotator = {
				init : function() {
					// initial fade-in time (in milliseconds)
					var initialFadeIn = 1000;

					// interval between items (in milliseconds)
					var itemInterval = 10000;

					// cross-fade time (in milliseconds)
					var fadeTime = 2500;

					// count number of items
					var numberOfItems = $('.swapImage').length;

					// set current item
					var currentItem = 0;

					var swapImage = function(nNew) {
						// .stop true makes it not save up events
						if (typeof nNew == 'undefined') {
							$('.swapImage').eq(currentItem).stop(true, true)
									.fadeOut(fadeTime);
						} else {
							$('.swapImage').eq(currentItem).hide();
						}
						$('#' + currentItem).attr('class', '');
						if (typeof nNew !== 'undefined') {
							currentItem = nNew;
						} else if (currentItem == numberOfItems - 1) {
							currentItem = 0;
						} else {
							currentItem++;
						}
						// find out if there is an anchor tag and no image tag
						// in the current item, and if so swap it for the img
						// tag
						var dCur = $('.swapImage').eq(currentItem);
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
						$('#' + currentItem).attr('class', 'active');
						if (typeof nNew == 'undefined') {
							$('.swapImage').eq(currentItem).fadeIn(fadeTime);
						} else {
							$('.swapImage').eq(currentItem).show();
						}

					};

					// loop through the items
					var infiniteLoop = setInterval(swapImage, itemInterval);

					if (numberOfItems > 0) {
						var oParent = $('.swapImage')[0].parentNode;
						var oNew = $('<div class="pictureLinks">');
						for ( var i = 0; i < numberOfItems; i++) {
							// 1 button for each item
							var oLink = $('<button id="' + i
									+ '">&nbsp;</button>');
							if (i == 0) {
								oLink.attr('class', 'active');
							}
							oLink.click(function(evt) {
								evt.stopPropagation();
								clearInterval(infiniteLoop);
								var nNew = parseInt(this.id);
								swapImage(nNew);
							});
							oNew.append(oLink);
						}
						$(oParent).append(oNew);
					}

				}
			};

			InfiniteRotator.init();

		});
