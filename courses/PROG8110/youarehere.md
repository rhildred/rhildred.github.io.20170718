You are Here
====

The second place team in the CAD capstones a couple of years ago made a google maps app that was based loosely on GRT routes and waypoints. They used jQuery mobile for their UI and produced something that looked really good. They also used localStorage and a WEB SQL database. I also had a student do a Christmas tree finder app using Google Maps. Google Maps are great fun. You may remember from last term, how we used Google maps with require.js.

![map from project](https://rhildred.github.io/courses/PROG8110/googleMap.png "map from project")

```

define(["jquery", "async!//maps.google.com/maps/api/js?sensor=false"], function(jQuery){
    return function(){
        var myOptions = {
            zoom: 14,
            center: new google.maps.LatLng(43.4531855, -80.55331509999996),
            mapTypeId: google.maps.MapTypeId.ROADMAP,
            scrollwheel: false
        };
        map = new google.maps.Map(document.getElementById("gmap_canvas"), myOptions);
        marker = new google.maps.Marker({
            map: map,
            position: new google.maps.LatLng(43.4531855, -80.55331509999996)
        });
        infowindow = new google.maps.InfoWindow({
            content: "<b>Salesucation.com Inc.</b><br/>5-420 Erb St . W<br/>N2L6K6 Waterloo"
        });
        google.maps.event.addListener(marker, "click", function () {
            infowindow.open(map, marker);
        });
        infowindow.open(map, marker);
    };
});

```

Note the async require.js reference. Google maps javascript bootstraps itself asynchronously so require.js needs to not wait for the dependency to be satisfied ... hence the use of async. Angular, likewise, has to deal with the asynchronous nature of google maps. As well as including the google maps with a script tag `<script src='js/angular-google-maps.min.js'></script>` and making a place in our document for the map `<ui-gmap-google-map center='map.center' zoom='map.zoom'></ui-gmap-google-map>` we need to activate them in the code:


```

var app = angular.module("myapp", [
    'mobile-angular-ui',

    // touch/drag feature: this is from 'mobile-angular-ui.gestures.js'
    // it is at a very beginning stage, so please be careful if you like to use
    // in production. This is intended to provide a flexible, integrated and and
    // easy to use alternative to other 3rd party libs like hammer.js, with the
    // final pourpose to integrate gestures into default ui interactions like
    // opening sidebars, turning switches on/off ..
    'mobile-angular-ui.gestures',
    'uiGmapgoogle-maps'
])

app.config(function (uiGmapGoogleMapApiProvider) {
    uiGmapGoogleMapApiProvider.configure({
        //    key: 'your api key',
        v: '3.17',
        libraries: 'weather,geometry,visualization'
    });
});

app.controller("mycontroller", function ($scope, uiGmapGoogleMapApi) {
    angular.extend($scope, {
        init: function () {
            uiGmapGoogleMapApi.then($scope.mapsReady);
            $scope.setCurrentPosition();
        },
        mapsReady: function (maps) {
         // could do any initialization here like setting a marker
        },
        map: { center: { latitude: 45, longitude: -73 }, zoom: 12 },
        positionReady: function(position){
            $scope.map.center.latitude = position.coords.latitude;
            $scope.map.center.longitude = position.coords.longitude;
            $scope.$apply();
        },
        setCurrentPosition: function(){
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition($scope.positionReady);
            } else {
                x.innerHTML = "Geolocation is not supported by this browser.";
            }

        }
    }).init();


});

```

At the end of the async loading of the maps api we have a callback to say that the maps are ready. 


Lets add a marker at this point, like we had in our require.js example last term. To add a marker, one adds a tag inside the `<ui-gmap-google-map center='map.center' zoom='map.zoom'></ui-gmap-google-map>`:

```

            <ui-gmap-google-map center='map.center' zoom='map.zoom'>
                <ui-gmap-markers models="map.markers" coords="'coords'" icon="'icon'"></ui-gmap-markers>
            </ui-gmap-google-map>

```

Then to your model you need to add:

```

        map: { center: { latitude: 45, longitude: -73 }, zoom: 12, markers:[] },
        positionReady: function(position){
            $scope.map.center.latitude = position.coords.latitude;
            $scope.map.center.longitude = position.coords.longitude;
            $scope.map.markers.length = 0;
            var oMarker = {id:0, data: "you are here", coords: position.coords};
            $scope.map.markers.push(oMarker);
            $scope.$apply();
        },

```

I wasn't able to find a working example of infowindows on the internet, nor was I able to get my infowindow to work. There must be a way to hack this in using the underlying map object, but I didn't find that way.

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
