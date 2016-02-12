#Angular Mobile UI

Along with the you are here example, I included the demo site. In fact I renamed the www folder from the dist folder in the [angular mobile ui code.](https://github.com/mcasimir/mobile-angular-ui). For the demo folder to keep working I needed to fix the links, but there was one other small change that I made:

```

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <base href="/demo/" />
    <title>Mobile Angular UI Demo</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="viewport" content="user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimal-ui" />
    <meta name="apple-mobile-web-app-status-bar-style" content="yes" />
    <link rel="shortcut icon" href="/favicon.png" type="image/x-icon" />
    <link rel="stylesheet" href="/dist/css/mobile-angular-ui-hover.min.css" />
    <link rel="stylesheet" href="/dist/css/mobile-angular-ui-base.min.css" />
    <link rel="stylesheet" href="/dist/css/mobile-angular-ui-desktop.min.css" />
    <link rel="stylesheet" href="demo.css" />
    <script src="//cdnjs.cloudflare.com/ajax/libs/angular.js/1.3.0/angular.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/angular.js/1.3.0/angular-route.min.js"></script>
    <script src="/dist/js/mobile-angular-ui.min.js"></script>
    <!-- Required to use $touch, $swipe, $drag and $translate services -->
    <script src="/dist/js/mobile-angular-ui.gestures.min.js"></script>
    <script src="demo.js"></script>
  </head>

```

was changed to:

```

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <title>Mobile Angular UI Demo</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="viewport" content="user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimal-ui" />
    <meta name="apple-mobile-web-app-status-bar-style" content="yes" />
    <link rel="shortcut icon" href="favicon.png" type="image/x-icon" />
    <link rel="stylesheet" href="../www/css/mobile-angular-ui-hover.min.css" />
    <link rel="stylesheet" href="../www/css/mobile-angular-ui-base.min.css" />
    <link rel="stylesheet" href="../www/css/mobile-angular-ui-desktop.min.css" />
    <link rel="stylesheet" href="demo.css" />
    <script src="//cdnjs.cloudflare.com/ajax/libs/angular.js/1.3.0/angular.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/angular.js/1.3.0/angular-route.min.js"></script>
    <script src="../www/js/mobile-angular-ui.min.js"></script>
    <!-- Required to use $swipe, $drag and Translate services -->
    <script src="../www/js/mobile-angular-ui.gestures.min.js"></script>
    <script src="demo.js"></script>
  </head>


```

*Note:* the removal of `<base href="/demo/" />`. For it to work on gh-pages `<base href="/youarehere/demo/" />` could also be used. The other day I noticed that this was also in a file produced by ember.js. For this to work the file with the base line in it can't be in a subdirectory. This means that if a file on gh-pages contains this directive a [cname must be applied to get it into the root of the domain name space](https://help.github.com/articles/adding-a-cname-file-to-your-repository/).

In the demo folder, we added a new page in class. In order to do this, there were 3 things that we had to touch:

1. we had to add a new link in the sidebar.html `<a class="list-group-item" href="#/richrocks">Rich Rocks <i class="fa fa-chevron-right pull-right"></i></a>`. Angular, like backbone, routes client side so we have a hash symbol at the start of the route.
1. we had to add a new route to the demo.js file
```
    $routeProvider.when('/richrocks', {
        templateUrl: 'richrocks.html',
        reloadOnSearch: false
    });
```
3. we created the actual richrocks.html file. I had a little demo, where I used some radio buttons, so I included the demo:
```
<form role="form">
    <fieldset>
        <legend>Rich Rocks Radio!</legend>
        <div class="form-group">
            <input id="radio1" type="radio" ng-model="color.name" value="red">
            <label for="radio1">Red</label>
            <br/>
            <input id="radio2" type="radio" ng-model="color.name" ng-value="specialValue">
            <label for="radio2">Green</label>
            <br/>
            <input id="radio3" type="radio" ng-model="color.name" value="blue">
            <label for="radio3">Blue</label>
            <br/>
        </div>
        <tt>color = {{color.name | json}}</tt>
        <br/>
    </fieldset>
</form>
Note that `ng-value="specialValue"` sets radio item's value to be the value of `$scope.specialValue`.
```
4. Finally for the demo to work, I made another little change to the demo.js file:
```
    //radio
    $scope.color = {
        name: 'blue'
    };
    $scope.specialValue = {
        "id": "12345",
        "value": "green"
    };
```

This routing pattern, minus the radio buttons, is consistent across all mvc environments that I am aware of. We didn't need it in the actual you are here app because there was a single view. Despite the difficulty of using the info window, I think that angular with google maps is pretty neat. I really like the way that the latitude and longitude input fields are hot linked to the map. It is fun to be able to change the latitude, and see what's due east of here.... It is also neat the way the fields change as you scroll the map. Adding new markers, just by pushing them on to the array is also pretty cool.
