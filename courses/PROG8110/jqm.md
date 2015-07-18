JQuery Mobile
===========

Possibly the simplest way to make a useful mobile web-app is using jQuery mobile. jQuery mobile, combines the pages of a wizard like app into one file. I have set up a simple app, [on my github.](https://github.com/rhildred/jQuerymobileForms). You can [see it in action here.](http://rhildred.github.io/jQuerymobileForms/www/). 

To construct this app, I started out with a fairly basic html containing 2 pages.

```

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Multi-page template</title>
    <link rel="stylesheet" href="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.css" />
    <script src="https://code.jquery.com/jquery-1.11.2.min.js"></script>
    <script src="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
    <script src="cordova.js"></script>
    <script src="js/index.js"></script>
</head>


<body>

    <!-- Start of first page: #one -->
    <div data-role="page" id="one">

        <div data-role="header">
            <h1>Multi-page</h1>
        </div>
        <!-- /header -->

        <div data-role="content">
            <p><a href="#two" data-role="button">Show page "two"</a>
            </p>
        </div>
        <div data-role="footer" data-theme="d">
            <h4>Page Footer</h4>
        </div>
        <!-- /footer -->
    </div>
    <!-- /page one -->


    <!-- Start of second page: #two -->
    <div data-role="page" id="two" data-theme="a">

        <div data-role="header">
            <h1>Two</h1>
        </div>
        <!-- /header -->
        <div data-role="content">
            <p><a href="#one" data-role="button">Show page "one"</a>
            </p>
        </div>


        <div data-role="footer">
            <h4>Page Footer</h4>
        </div>
        <!-- /footer -->
    </div>
    <!-- /page two -->

</body>

</html>

```

I didn't like the way that `data-role="footer"` was repeated on both pages so I deleted the footers and added this to the existing initialize method in my javascript:

```

    initialize: function() {
        this.bindEvents();
        jQuery(document).on("pagecreate", jQuery.proxy(this.headerAndFooter, this));
    },
   headerAndFooter: function (event) {
        var sId = event.target.id;
        jQuery("#" + sId).append('<footer><p>&copy;&nbsp;Copyright ' + new Date().getFullYear() + '&nbsp;Rich Hildred.</p></footer>');
    },

```

Finally I added a form to the html (Note the way that the checkbox and radio buttons are).

```

<form id="purchase">
    <label>
        <input id="allowgps" type="checkbox" name="GPS" value="GPS" />Allow GPS access</label>
    <input id="amount" type="number" required="required" step=".01" name="amount" placeholder=" ($) Total Amount Before Tax and Gratuity:">

    <div data-role="fieldcontain">
        <fieldset data-role="controlgroup">
            <legend>Promotion Type:</legend>
            <input type="radio" name="promotioncode" id="radio-choice-1" value="Everyday Discount" checked="checked" />
            <label for="radio-choice-1">Everyday Discount</label>

            <input type="radio" name="promotioncode" id="radio-choice-2" value="Epic Promotion" />
            <label for="radio-choice-2">Epic Promotion</label>

        </fieldset>
    </div>
    <p>
        <button type="submit" data-role="button">Next</button>
    </p>
</form>


```

To deal with the form submit, I added the following code to my index.js:

```
    initialize: function() {

        jQuery(document).on("submit", "#purchase", jQuery.proxy(this.purchase, this));
    },
    purchase: function(){
        jQuery.mobile.changePage("#two", {
            transition: 'none',
            changeHash: true
        });
        jQuery("#confirmamount").html(jQuery("#amount").val());
        return false;
    }


```

**Notice:** how the purchase method returns false. With jQuery mobile, we can use a standard jQuery coding style to create small apps that have a few related screens, very quickly.