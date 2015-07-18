Test Driven Development With Angular
===

Software development has been compared by Alistair Cockburn to a resource constrained cooperative game like rock-climbing. Test driven development helps you to make the next move in this game before you get too tired and fall off the wall.

![rock climbing by Jonathan Fox](http://upload.wikimedia.org/wikipedia/commons/thumb/7/77/Rock_Climbing_Owens_River_Gorge.jpg/360px-Rock_Climbing_Owens_River_Gorge.jpg "by Jonathan Fox")

Test driven development helps you to make your next move in 3 ways

1. it keeps your batch size small, you make a failing test for an incremental functionality, make the test pass and move on to the next challenge
1. it lets you climb with confidence that your next move won't break your last move, or if it does you will know
1. it prevents waste by making the work possibly seem less overwhelming ... just make the test pass, don't work out all of the possibilities ahead of time.

Angular supports test driven development by separating logic from the document object markup. Controllers or view models can be tested in isolation from the view. For example, lets look at a [simple adding machine that calculates HST](https://rhildred.github.io/jasmineangulartdd/). Like the magic puppy example it can be easily broken in to 2 parts. The html5 view:

```
<body ng-app="myApp" ng-controller="hstController">
    <div id="tape">
        <p ng-repeat="amount in amounts" ng-bind="amount"></p>
    </div>
    <form id="addingmachine">
        <table>
            <tr>
                <td>
                    <input ng-model="amount" />
                </td>
            </tr>
            <tr>
                <td ng-bind="subtotal"></td>
                <td>subtotal</td>
            </tr>
            <tr>
                <td ng-bind="hst()"></td>
                <td>hst</td>
                <td>
                    <select ng-model="province">
                        <option value="ON">Ontario
                        </option>
                        <option value="AB">Alberta
                        </option>
                        <option value="QC">Quebec
                        </option>

                    </select>
                </td>
            </tr>
            <tr>
                <td ng-bind="grandtotal"></td>
                <td>
                    <input ng-click="addAmount()" type="submit" value="Total" />
                </td>
            </tr>
        </table>
    </form>
</body>
```

As I might have said of the previous example, it is thrilling to me how the logic of the form is declared with the html. In this case we have 2 behavioural bits `addAmount()` and `hst()`. It is also thrilling to know that we can test these behavioural bits independent of the declarative markup. Lets have a look at the view-model or controller in its own file hstcontroller.js.

```
angular.module("myApp", []).controller("hstController", function ($scope) {
    $scope.amounts = [];
    $scope.subtotal = 0;
    $scope.grandtotal = 0;
    $scope.province = "ON";
    $scope.addAmount = function (nAmount) {
        $scope.amounts.push($scope.amount);
        $scope.subtotal += Number($scope.amount);
        $scope.grandtotal = $scope.subtotal + $scope.hst();
        $scope.amount = "";
    };
    $scope.hst = function () {
        var nRc = 0;
        switch($scope.province){
            case 'AB':
                nRc = Number($scope.subtotal) * .05;
                break;
            case 'QC':
                nRc = Number($scope.subtotal) * .14975;
                break;
            default:
                nRc = Number($scope.subtotal) * .13;

        }
        return nRc;
    }

});

```

All of [the source is here](https://github.com/rhildred/jasmineangulartdd). 

Because the controller is in it's own file we can include it from a `hstTestRunner.html`. The actual tests set the province and amount, calls `addAmount()` and then `hst()`

```
            describe('$scope.hst', function () {
                var $scope, controller;
                beforeEach(function () {
                    $scope = {};
                    controller = $controller('hstController', {
                        $scope: $scope
                    });
                });
                it('sets the province to on and calculates hst', function () {
                    $scope.province = 'ON';
                    $scope.amount = "10";
                    $scope.addAmount();
                    expect($scope.hst()).toEqual(1.3);
                });
                it('sets the province to ab and calculates hst', function () {
                    $scope.province = 'AB';
                    $scope.amount = "10";
                    $scope.addAmount();
                    expect($scope.hst()).toEqual(0.5);
                });
                it('sets the province to qc and calculates hst', function () {
                    $scope.province = 'QC';
                    $scope.amount = "10";
                    $scope.addAmount();
                    expect($scope.hst()).toEqual(1.4975);
                });
            });
        });
```

By using 10 for each amount we can easily see in the results what the HST rate is. This is important because when I gave this example I said that `//sales tax in Ontario is 7% + 8%`. If I had a comment in my code like this and fixed the code to have the new rate without fixing the comment my comment has "decayed". The [tests in this case](https://rhildred.github.io/jasmineangulartdd/hstTestRunner.html) form reliable documentation along with the code itself.