Phonegap Build
=============

[![Phonegap, from MSDN](https://rhildred.github.io/images/hh771462.HowToCreateHTML5AppsWindowsPhoneGap-2.png "Phonegap, from MSDN")
](https://msdn.microsoft.com/en-us/hh771462.aspx)

Phonegap build is an amazing way to make apps for smartphones!!!!! With cordova/phonegap, the underlying bridge between native device code and html5/javascript, the same codebase can be used on BB10, Android, IOS and Windows Phone. There is one small gotcha that I discovered later, but a [basic app](https://github.com/rhildred/hellophonegapbuild) looks like this:

```

<!DOCTYPE html>
<!--
    Licensed to the Apache Software Foundation (ASF) under one
    or more contributor license agreements.  See the NOTICE file
    distributed with this work for additional information
    regarding copyright ownership.  The ASF licenses this file
    to you under the Apache License, Version 2.0 (the
    "License"); you may not use this file except in compliance
    with the License.  You may obtain a copy of the License at
    http://www.apache.org/licenses/LICENSE-2.0
    Unless required by applicable law or agreed to in writing,
    software distributed under the License is distributed on an
    "AS IS" BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY
     KIND, either express or implied.  See the License for the
    specific language governing permissions and limitations
    under the License.
-->
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="format-detection" content="telephone=no" />
        <meta name="viewport" content="user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1, width=device-width, height=device-height, target-densitydpi=device-dpi" />
        <link rel="stylesheet" type="text/css" href="css/index.css" />
        <title>Hello World</title>
    </head>
    <body>
        <div class="app">
            <h1>PhoneGap</h1>
            <div id="deviceready" class="blink">
                <p class="event listening">Connecting to Device</p>
                <p class="event received">Device is Ready</p>
            </div>
        </div>
        <!-- BB10, seems to prefer cordova.js here to phonegap.js -->
        <script type="text/javascript" src="cordova.js"></script>
        <script type="text/javascript" src="js/index.js"></script>
        <script type="text/javascript">
            app.initialize();
        </script>
    </body>
</html>

```

This is pretty straightforward html 5. Some people would put the javascript app object right into the script tags, before the `app.initialize`. In this example it is in a seperate file `js/index.js':

```

/*
 * Licensed to the Apache Software Foundation (ASF) under one
 * or more contributor license agreements.  See the NOTICE file
 * distributed with this work for additional information
 * regarding copyright ownership.  The ASF licenses this file
 * to you under the Apache License, Version 2.0 (the
 * "License"); you may not use this file except in compliance
 * with the License.  You may obtain a copy of the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing,
 * software distributed under the License is distributed on an
 * "AS IS" BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY
 * KIND, either express or implied.  See the License for the
 * specific language governing permissions and limitations
 * under the License.
 */
var app = {
    // Application Constructor
    initialize: function() {
        this.bindEvents();
    },
    // Bind Event Listeners
    //
    // Bind any events that are required on startup. Common events are:
    // 'load', 'deviceready', 'offline', and 'online'.
    bindEvents: function() {
        document.addEventListener('deviceready', this.onDeviceReady, false);
    },
    // deviceready Event Handler
    //
    // The scope of 'this' is the event. In order to call the 'receivedEvent'
    // function, we must explicity call 'app.receivedEvent(...);'
    onDeviceReady: function() {
        app.receivedEvent('deviceready');
    },
    // Update DOM on a Received Event
    receivedEvent: function(id) {
        var parentElement = document.getElementById(id);
        var listeningElement = parentElement.querySelector('.listening');
        var receivedElement = parentElement.querySelector('.received');

        listeningElement.setAttribute('style', 'display:none;');
        receivedElement.setAttribute('style', 'display:block;');

        console.log('Received Event: ' + id);
    }
};

```

Finally a config.xml is used to version the app, provide the location of file assets, and describe the permissions required by the app.

```
<?xml version="1.0" encoding="UTF-8" ?>
<widget xmlns="http://www.w3.org/ns/widgets" xmlns:gap="http://phonegap.com/ns/1.0" id="com.salesucation.hello" version="0.0.1">

    <name>Hello Phonegap Build</name>

    <description>
        Example from phonegap build
    </description>

    <author href="https://rhildred.github.io" email="rhildred@gmail.com">
        Rich Hildred and various Web Development Classes
    </author>
    <gap:config-file platform="ios" parent="CFBundleVersion">
        <string>1.0.1</string>
    </gap:config-file>
    <gap:config-file platform="ios" parent="CFBundleShortVersionString">
        <string>1.0</string>
    </gap:config-file>
    <!-- We'll include the Barcode plugin as an example -->
    <gap:plugin name="com.phonegap.plugins.barcodescanner" />
    <gap:plugin name="de.appplant.cordova.plugin.badge" />
</widget>


```

One can test this "app" in the chrome browser using the [ripple emulator beta](https://chrome.google.com/webstore/search/ripple%20emulator%20beta?hl=en-US) from the chrome store. It is important when using the ripple emulator to make sure that the platform is set to `Apache Cordova/Phonegap` and that the version is set to 2.0.0.

Finally you can get your app in an android IOS or Windows phone device using phonegap build service from adobe. Phonegap build, doesn't support BB10 anymore, but phonegap/cordova itself does. Your codebase can be built and put on a bb10 device using Blackberry HTML5 Webworks, or by loading an apk from somewhere. BB10 also supports apk files from the Amazon Store, or your development environment.
