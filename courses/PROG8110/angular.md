Angular.js
=====

Angular has an, I think, unfair reputation as having a steep learning curve. I view it more as a fresh start on html5 programming. Consider this html `body` snippet

```

    <body ng-app="myApp" ng-controller="myCtrl">
        <h1>The Magic Puppy</h1>
        <figure>
            <img src="{{currentPicture}}" alt="picture of puppy"/>
            <figcaption>Picture by {{currentAuthor}}</figcaption>
        </figure>
        <button ng-click="nextPicture()">Next</button>
    </body>
    
```

In it, we have a couple of variables with nice descriptive names `currentPicture` and `currentAuthor`. The context for the `currentPicture` is an img src=. Likewise the context for `currentAuthor` starts with the phrase "Picture by". Hopefully you can see from this context how both variables are used.

The variables in angular have a scope, that is, a range of view. In fact the range of view is the `body` of the html5 page. The scope is defined by the `ng-controller` directive, which itself has a context defined by the `ng-app` directive to be an angular module named "myApp". This architecture is refered to as model view view-model (mvvm).

HTML5 elements like forms and buttons can also have interactive behaviour. For instance when the button is clicked the `nextPicture()` behaviour is triggered. Consider now the scope for the body of our html5 page:

```
            angular.module("myApp", []).controller("myCtrl", function ($scope) {
                $scope.aPictures = [{ url: "https://farm4.staticflickr.com/3088/2688916488_1a125cd0e7_z_d.jpg", author: "Ângela Antunes" },
                 { url: "https://farm4.staticflickr.com/3626/3390027827_56ca221e12_z_d.jpg?zz=1", author: "Jelene Morris"}];
                $scope.nextPicture = function () {
                    $scope.n = $scope.n + 1;
                    if ($scope.n >= $scope.aPictures.length) $scope.n = 0;
                    $scope.currentPicture = $scope.aPictures[$scope.n].url;
                    $scope.currentAuthor = $scope.aPictures[$scope.n].author;
                };
                $scope.n = -1;
                $scope.nextPicture();
            });


```

If we start with the behaviour `$scope.nextPicture()` we can see the currentPicture and currentAuthor variables being updated. The context of the update is the array containing our data `$scope.aPictures`. You can see the [complete example here](https://github.com/rhildred/simpleangular), or [view a demo here](https://rhildred.github.io/simpleangular). Hopefully you will agree that this is a very straightforward way to add behaviour to html5.