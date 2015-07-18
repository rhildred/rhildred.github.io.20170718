PROG8020 Project
================

Someone asked me, in class, what is the application of the bits and pieces of Javascript and PHP that we have been learning. For a project in this course, I have built the bits and pieces into a larger Antique Boating Ecommerce Web App. You can see the [source code here.](https://github.com/rhildred/PROG8020phpjavascript/tree/master/php/projectStart). You can see the [code working here.](http://apps.syndicateme.net/BoatProject)

![Boating](http://farm1.staticflickr.com/58/195102390_6d9329e412_n.jpg "Boating")

The project start builds on the php that we learned by using php to access 3 mysql database tables. A categories table holds the types of items that we are selling. The categories are displayed across the NAV-Bar of the application:

	CREATE TABLE IF NOT EXISTS `categories` (
	  `id` int(11) NOT NULL AUTO_INCREMENT,
	  `name` varchar(64) COLLATE utf8_bin NOT NULL,
	  `display_id` int(11) NOT NULL,
	  PRIMARY KEY (`id`),
	  KEY `display_id` (`display_id`)
	) ENGINE=InnoDB;

The products are grouped by categories (Categories have products) and displayed on the different "pages" of the website in those groupings:

	CREATE TABLE IF NOT EXISTS `products` (
	  `id` int(11) NOT NULL AUTO_INCREMENT,
	  `category_id` int(11) NOT NULL,
	  `name` varchar(64) COLLATE utf8_bin NOT NULL,
	  `description` varchar(255) COLLATE utf8_bin NOT NULL,
	  `price` decimal(10,2) NOT NULL,
	  `paypal_url` varchar(255) COLLATE utf8_bin NOT NULL,
	  PRIMARY KEY (`id`),
	  KEY `category_id` (`category_id`)
	) ENGINE=InnoDB;
	
Products have images, and the first image for each product is displayed in a carousel at the bottom of the page:

	CREATE TABLE IF NOT EXISTS `images` (
	  `id` int(11) NOT NULL AUTO_INCREMENT,
	  `item_id` int(11) NOT NULL,
	  `sequence_id` int(11) NOT NULL,
	  `url` varchar(64) COLLATE utf8_bin NOT NULL,
	  PRIMARY KEY (`id`)
	) ENGINE=InnoDB;
	
The php code to provide this data as a restful web server is almost as simple as the cds php code:

	$db = new PDO ( "mysql:host=localhost;dbname=swag", "root", "" );
	
	// check if last part of url is numeric
	$aUrls = explode('/', $_SERVER['REQUEST_URI']);
	$nId =  array_pop($aUrls);
	
	$sTable = array_pop($aUrls);
	$sSQL = "SELECT * FROM ";
	$sWhere = "";
	$aBinds = array();
	switch($sTable){
		case 'categories':
			$sSQL .= 'categories';
			if(is_numeric($nId)){
				$sWhere .= 'id = ?';
				array_push($aBinds, $nId);
			}
			break;
		case 'products':
			$sSQL = 'SELECT a.*, b.url FROM products AS a, images AS b';
			$sWhere .= 'a.id = b.item_id AND b.sequence_id = 1 AND category_id = ?';
			array_push($aBinds, array_pop($aUrls));
			if(is_numeric($nId)){
				$sWhere .= ' AND a.id = ?';
				array_push($aBinds, $nId);
			}
			break;
		case 'images':
			$sSQL .= 'images';
			$sWhere .= 'item_id = ?';
			array_push($aBinds, array_pop($aUrls));
			if(is_numeric($nId)){
				$sWhere .= ' AND sequence_id = ?';
				array_push($aBinds, $nId);
			}
			break;
		default:
			throw(new Exception("bad path " . $sTable));
	}
	if(is_numeric($nId)){
		// get a single item
		$stmt = $db->prepare($sSQL . " WHERE ". $sWhere);
		$stmt->execute($aBinds);
		$result = $stmt->fetchObject();
	} else {
		// get all of the items
		if($sWhere != ""){
			$sSQL .= " WHERE " . $sWhere;
		}
		$stmt = $db->prepare($sSQL);
		$stmt->execute($aBinds);
		$result = $stmt->fetchAll ( PDO::FETCH_OBJ );
	}
	echo json_encode($result);

This code exposes the API in a categories folder with product and images sub-folders. This should look similar to our previous API with just more code.

Also similar are the templates that we use to display the screens. Again there are just more of them. Particularly interesting is a template to display the product details and a "Buy Now" button:

	<script id="productTemplate" type="text/template">
	<h1><%= name %></h1>
	<div class="row">
		<div class="col-md-8"><p class="lead"><%= description %></p></div>
			<% if(paypal_url !== ""){ %>
			<div class="col-md-4"><a class="btn btn-primary" href="<%= paypal_url %>">Buy Now</a></div>
			<% } %>
		</div>
	</script>

Please notice the use of the `if(paypal_url !== "")` to only display the Buy Now button if the paypal_url is populated in the database. A big part of getting your enhancements to this site working is to populate all of those paypal_urls with URLs that you set up in the sandbox.

Finally the router code:

	var SwagRouter = Backbone.Router.extend({
		oCategoryList : new Backbone.Collection(),
		oItemList : new Backbone.Collection(),
		oImageList : new Backbone.Collection(),
		nCategoryId: null,
		nProductId: null,
		fNavTemplate : _.template(jQuery('#navTemplate').html()),
		fProductTemplate : _.template(jQuery('#productTemplate').html()),
		fIndicatorTemplate : _.template(jQuery('#indicatorTemplate').html()),
		fImageTemplate : _.template(jQuery('#myCarousel1Template').html()),
		fPreviewTemplate: _.template(jQuery('#previewTemplate').html()),
		initialize : function() {
			this.oCategoryList.url = 'categories/';
			this.oCategoryList.fetch({
				success : jQuery.proxy(this.renderNav, this),
				error : function(collection, err) {
					throw err.status + " " + err.statusText;
				}
			});
			return this;
		},
		renderNav: function(){
			this.oCategoryList.models.forEach(function(oCategory) {
				// we append a single cd into the cdlist div
				jQuery("#navPlaceHolder").append(this.fNavTemplate(oCategory.attributes));
			}, this);
			jQuery("#navPlaceHolder").append(this.fNavTemplate({name: 'about', id: 10001}));
			jQuery("#navPlaceHolder").append(this.fNavTemplate({name: 'contact', id: 10002}));
			Backbone.history.start();
	
		},
		renderImages: function(){
			var nImage = 0;
			jQuery("#myCarousel1PlaceHolder").html("");
			jQuery("#indicatorPlaceHolder").html("");
			this.oImageList.models.forEach(function(oImage) {
				// we append a single image into #myCarousel1
				oImage.set('title', this.oItemList.get(this.nProductId).get('title'));
				var sActiveClass = "";
				if(nImage == 0){
					sActiveClass = 'active';
				}
				oImage.set('activeClass', sActiveClass);
				jQuery("#indicatorPlaceHolder").append(this.fIndicatorTemplate({nImage: nImage, activeClass: sActiveClass}));
				jQuery("#myCarousel1PlaceHolder").append(this.fImageTemplate(oImage.attributes));
				nImage++;
			}, this);
		},
		renderItem: function(){
			var oItem = this.oItemList.get(this.nProductId);
			jQuery('#productPlaceHolder').html(this.fProductTemplate(oItem.attributes));
			this.oImageList.url = 'categories/' + this.nCategoryId + '/products/' + this.nProductId + '/images/';
			this.oImageList.fetch({
				success : jQuery.proxy(this.renderImages, this),
				error : function(collection, err) {
					throw err.status + " " + err.statusText;
				}
			});			
		},
		renderItems: function(){
			if(!this.nProductId) this.nProductId = this.oItemList.models[0].id;
			this.renderItem();
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
		},
		routes : {
			"about" : "showAbout",
			"contact": "showContact",
			"(:category)(/:productid)" : "showProduct",
		},
		showProduct : function(nCategoryId, nProductId) {
			jQuery("#product").show();
			jQuery("#contact").hide();
			jQuery("#about").hide();
			jQuery("#home").hide();
			if(nCategoryId == null){
				nCategoryId = this.oCategoryList.at(0).id;
			}else if(isNaN(parseInt(nCategoryId))){
				nCategoryId = this.oCategoryList.findWhere({name: nCategoryId}).id;
			}
			this.nProductId = nProductId;
			if(this.nCategoryId != nCategoryId ){
				this.nCategoryId = nCategoryId;
				this.oItemList.url = 'categories/' + nCategoryId + '/products/';
				this.oItemList.fetch({
					success : jQuery.proxy(this.renderItems, this),
					error : function(collection, err) {
						throw err.status + " " + err.statusText;
					}
				});			
			}else{
				this.renderItem();
			}
		},
		showAbout: function(){
			jQuery("#product").hide();
			jQuery("#contact").hide();
			jQuery("#about").show();
			jQuery("#home").hide();
		},
		showContact: function(){
			jQuery("#product").hide();
			jQuery("#contact").show();
			jQuery("#about").hide();
			jQuery("#home").hide();
		}
	});
	
	
Again there is more code, but again it is not substantially different from what we did in the CD example. The simplest route to look at are the `showAbout` and `showContact` routes. These just hide all but the contents of the relevant div. You will see code at the start of the `showProduct` route that functions similarly. The various `render...` methods render the templates that are defined at the start of the object.