Tellme
===

[![munchkin game](http://whatchareading.com/wp-content/uploads/2015/01/Munchkin_001_coverD-214x140.jpg "munchkin game from watchareading.com")](http://whatchareading.com/knock-door-loot-treasure-stab-buddy-munchkin-1/)

A couple of years ago some of my students made a [Munchkin game](http://whatchareading.com/knock-door-loot-treasure-stab-buddy-munchkin-1/). I was reminded of their game when I saw the $scope pattern in Angular. With a socket.io server on the backend $scope can be shared among 4 players of a game. The pattern is, whenever the server hears about a change, he updates his shared scope and then broadcasts it to all of the listening client. I am interested in acceptance test driven development, so, rather than Munchkin I wrote [a little demo](https://rhildred.github.io/tellme/www) of a team ticketing application. You can see [the source code here.](https://github.com/rhildred/tellme)

On the server we have the following scope object:

```

var $scope = {
    model: {issues:[]},
    init: function () {
        io.set('origins', '*:*');
        io.on('connection', $scope.connection);
    },
...
};
$scope.init();

```

The client sends a message to add an issue:

`{"reporter":"Rob","title":"this is a test","id":"1eb5c404-d6c5-4f00-a3a6-c63081c0693b","comments":[]}`

or a comment:

`{"id":"1eb5c404-d6c5-4f00-a3a6-c63081c0693b","commenter":"Rob","comment":"this is a comment on a test"}`

When the server gets the message, it escapes any html, adds it in the correct place in the internal structure and sends the internal structure to all of the clients:

```

    newIssue: function(data) {
        var oCleaned = {
            reporter: _.escape(data.reporter),
            title: _.escape(data.title),
            id: _.escape(data.id),
            comments:[]
        }
        $scope.model.issues.unshift(oCleaned);
        io.emit("receive issue", $scope.model);
    },

```

What happens next on the client is a beautiful thing ... thanks to Angular:

```

       update: function (data) {
           angular.extend($scope.model, data);
           $scope.$apply();
       },

```

Amazing!!!!! when the client gets new data, it just extend's its model with it and does a $scope.apply. The angular markup takes care of the rest.

Making it Mobile
----

Tellme is set up as a hybrid, that either runs from the web or as a phonegap app. To make it a phonegap app, a config.xml was used. For this to work, from github as a free app,  with our node.js backend the config.xml was placed in the root of the project.

```
<?xml version="1.0" encoding="UTF-8" ?>
<widget xmlns="http://www.w3.org/ns/widgets" xmlns:gap="http://phonegap.com/ns/1.0" id="com.salesucation.youarehere" version="0.0.3">

    <name>Issue Editor</name>

    <description>
        Collaborative editing of issues
    </description>
    <content src="index.html" />
    <author href="https://rhildred.github.io" email="rhildred@gmail.com">
        Rich Hildred and Mobile App Class of 2015
    </author>
</widget>

```

The config.xml itself is pretty basic. I was never completely sure why this config.xml is different from the config.xml in the [youarehere app](https://github.com/rhildred/youarehere).

```
<?xml version="1.0" encoding="UTF-8" ?>
<widget xmlns="http://www.w3.org/ns/widgets" xmlns:gap="http://phonegap.com/ns/1.0" id="com.salesucation.youarehere" version="0.0.3">

    <name>You are here</name>

    <description>
        You are here example
    </description>
    <content src="www/index.html" />
    <author href="https://rhildred.github.io" email="rhildred@gmail.com">
        Rich Hildred and Mobile App Class of 2015
    </author>
    <!-- We'll include the Barcode plugin as an example -->
    <gap:plugin name="de.appplant.cordova.plugin.badge" />
    <gap:plugin name="org.apache.cordova.geolocation" />
    <gap:plugin name="org.apache.cordova.device" />
    <feature name="Geolocation">
        <param name="ios-package" value="CDVLocation" />
    </feature>
</widget>

```

The youarehere app, also had a demo folder in it with an index.html in it, and if I made the config the same it would get the index in the demo folder rather than the www folder. I have also had a similar experience when I put a website in the public folder of my project and the phonegap build part in the www folder. When you just pull the whole thing from github it gives you the wrong folder. As well as a config.xml I included a `cordova.js` in the index. (`<script src='cordova.js'></script>`). That and one other tweak relating to the backend was all that I did to make it a mobile app.

Backend
----

The backend app is a node.js socket.io app, based on the chatapp. To run the backend app from brackets in your own environment:

1. clone the project and open the folder in brackets.
1. click on the `Open Bash Terminal/Console` (black icon with > sign)
1. in the resulting console window type `npm install`
1. when that completes type `DEBUG=* node index.js`.

To run the front end in your environment you need to modify it from the gh-pages version that came from github. `gh-pages` has no backend capability. The app is set up to work when served locally for debugging purposes and against a backend server on openshift (or heroku or azure) when on a device. It accomplishes this by making a new connection to the backend in the `deviceready` callback.

```
       // commented out to put on gh-pages branch ... for local testing un-comment this
       //url: document.URL,
       url: "https://tellme-hildred.rhcloud.com/",
...

       deviceReady: function () {
           $scope.url = "https://tellme-hildred.rhcloud.com/";
           $scope.socket = io($scope.url, {
               'reconnection': true,
               'force new connection': true
           });


```

You will need to un-comment like so:

```
       // commented out to put on gh-pages branch ... for local testing un-comment this
       url: document.URL,
       //url: "https://tellme-hildred.rhcloud.com/",

```

Then when you surf to `http://localhost:8080` your front end and back-end will be communicating. You will be able to see this happening in the debug output in the console window. If you turn on ripple, the `deviceready` will fire and you will be communicating with my backend on openshift, unless you change the url:

```

       deviceReady: function () {
           $scope.url = "https://tellme-hildred.rhcloud.com/";
           $scope.socket = io($scope.url, {
               'reconnection': true,
               'force new connection': true
           });


```

I had grand plans of also making a little card game using this technique. Perhaps I will still get time so that you can use this for a project.