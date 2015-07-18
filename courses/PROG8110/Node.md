Node.js and engine.io
==================

As I mentioned, if you have used webworks you have used node.js. Webworks uses node.js to host the backend pieces that actually assemble your app, and copy it to the phone, basically phonegap build for your local machine. Ember-cli and Adobe Brackets also uses node.js as a live update/push server and a way of building the asset chain for your webapp. Linked In [uses these best practices with node.js](http://engineering.linkedin.com/nodejs/blazing-fast-nodejs-10-performance-tips-linkedin-mobile) to do push notifications to their mobile apps. Although linkedin mentions specifically that it is a bad idea, I am going to start with [serving static content from node.js](https://github.com/rhildred/hellonodeexpress). This file is `index.js`.

```

var express = require("express"),
    app = express(),
    server = require('http').createServer(app),
    port = process.env.PORT || 8080;

server.listen(port, function(){
    console.log("Server listening at port %d", port);
});

app.use(express.static(__dirname + '/www/'));

```

This server depends on express middleware. Express middleware is a npm (node dependency manager) module. We signal that the dependency is required with a `package.json` file in the same folder as index.js:

```
{
    "name": "chatapp",
    "dependencies":{
        "express": "*",
        "debug": "*"

    }
}

```

To run a node program:

1. run `npm install` from the folder containing your index.js to install any dependencies.
1. run `node index.js` in this case to start the server.

I included the debug dependency so that you can also start your process with:

`DEBUG=* node index.js`


Of course, serving static files is *not* a good use case for node.js. To do something really useful, a programmatic endpoint should be defined, in this case /student/:id:

```

var express = require("express"),
    app = express(),
    server = require('http').createServer(app),
    port = process.env.PORT || 8080;

server.listen(port, function(){
    console.log("Server listening at port %d", port);
});

app.get("/student/:id", function(req, res){
    res.end(req.params.id + " rocks!");
});

app.use(express.static(__dirname + '/www/'));

```

Where node.js is really great though is push notifications. In this case we will [use engine.io to make a chat app](https://github.com/rhildred/updatedsocketiochat). Additional dependencies:

```

{
    "name": "chatapp",
    "main": "index.js",
    "dependencies":{
        "express": "*",
        "engine.io": "*",
        "socket.io": "*",
        "debug": "*",
        "underscore":"*"
    }
}

```

The server uses sockets for push communications between clients:

```

var express = require("express"),
    app = express(),
    server = require('http').createServer(app),
    io = require('socket.io')(server),
    _ = require('underscore'),
    debug=require("debug")("index.js");

var ipaddr = process.env.OPENSHIFT_NODEJS_IP || "127.0.0.1";
var port = process.env.OPENSHIFT_NODEJS_PORT || parseInt(process.argv.pop()) || 8080;

debug(ipaddr, port);

server.listen(port, ipaddr, function(){
    console.log("Server listening at port %d", port);
});

io.on('connection', function (socket) {
  // when the client emits 'receive message', this listens and executes
  socket.on('receive message', function (data) {
      var oOut = {
          from: _.escape(data.from),
          message: _.escape(data.message)
      };
      socket.broadcast.emit("receive message", oOut);
  });
});

app.use(express.static(__dirname + '/www/'));

```

There is one really important piece in here that I want to draw your attention to. **Never**, *never* trust data taken from the web. Data from the web **will** contain attempts at both html and sql injection. Here we use `_.escape(data.message)` to make sure that there is no html in our message. If we were using this with a database we would also use bind variables to prevent sql injection. I don't want to focus too much on node.js as it isn't mobile development per se, but node.js is still a valuable tool for building and doing push notifications. Also some of you are using this technology for your capstone projects.