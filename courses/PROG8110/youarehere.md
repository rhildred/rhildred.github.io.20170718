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
