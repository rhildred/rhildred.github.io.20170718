Javascript (Browser) Test Driven Development
===

![Test Dummy - Brady Holt](http://upload.wikimedia.org/wikipedia/commons/thumb/d/d6/IIHS_crash_test_dummy_in_Hyundai_Tucson.jpg/154px-IIHS_crash_test_dummy_in_Hyundai_Tucson.jpg "Test Dummy - Brady Holt")

Test driven development is a hot topic right now. For good reason. 

1. It helps our people deal with a problem that some of us have called "procrastination" by breaking a problem into sub problems. 
2. It helps prevent us from breaking code that worked previously.
3. It helps keep us from writing code that we don't use, by just writing the code we need to pass the test.

[tdd with qunit](https://github.com/rhildred/tdd). In this example we use the requirejs javascript loader to pull unit tests into our project, a simple adding machine with HST. The tests are loaded and accessed through [test.html](https://rhildred.github.io/tdd/test.html). The tests themselves are in the js/tests folder. The calculation of hst that is under test is in the js/lib folder. The actual adding machine is in [index.html](https://rhildred.github.io/tdd).

Start by looking at the test.html:

    <div id="qunit"></div>
    <div id="qunit-fixture"></div>
    <script data-main="js/test" src="//cdnjs.cloudflare.com/ajax/libs/require.js/2.1.15/require.min.js"></script>
    
In this file we pull in require.min.js and tell it to start executing our code at `js/test`(.js). Require.js leaves off the .js. The `js/test` is where our code starts executing. This is an old convention from the c programming language.

    int main(int argc, char** argv)
    {
        printf("hello world");
    }
    
The require.js main is a little different:

    "use strict";
    require.config({
        paths: {
            'QUnit': 'https://code.jquery.com/qunit/qunit-1.15.0'
        },
        shim: {
            'QUnit': {
                exports: 'QUnit',
                init: function () {
                    QUnit.config.autoload = false;
                    QUnit.config.autostart = false;
                }
            }
        }
    });
    // require the unit tests.
    require(
    ['QUnit', 'tests/dummyTest', 'tests/hstTest'],
        function (QUnit, dummyTest, hstTest) {
            // run the tests.
            dummyTest.run();
            hstTest.run();
            // start QUnit.
            QUnit.load();
            QUnit.start();
        }
    );
    
The tests themselves are in `tests/hstTest`:

    "use strict";
    define(
    ["lib/hst"],
        function (getHst) {
            var run = function () {
                test('hst for Ontario', function () {
                    equal(getHst(10), 1.30, 'HST for $10 should be $1.30');
                });
                test('hst for Manitoba', function () {
                    equal(getHst(10, 'MB'), 1.30, 'HST for $10 should be $1.30');
                });
                test('hst for New Brunswick', function () {
                    equal(getHst(10, 'NB'), 1.30, 'HST for $10 should be $1.30');
                });
                test('hst for Newfoundland and Labrador', function () {
                    equal(getHst(10, 'NL'), 1.30, 'HST for $10 should be $1.30');
                });
                test('gst for Alberta', function () {
                    equal(getHst(10, 'AB'), 0.50, 'HST for $10 should be $0.50');
                });
                test('hst for Nova Scotia', function () {
                    equal(getHst(10, 'NS'), 1.50, 'HST for $10 should be $1.50');
                });
            };
            return {
                run: run
            }
        }
    );
    
This code pulls in `lib/hst` and starts executing it as `getHst`:

    "use strict";
    define([], function (getHst) {
        return function (nIn, sProvince) {
            switch (sProvince) {
            case 'AB':
                return (nIn * 0.05).toFixed(2);
            case 'MB':
            case 'NB':
            case 'NL':
            default:
                return (nIn * 0.13).toFixed(2);

            }
        };

    });
    
In class we made the Nova Scotia test pass, made failing tests for the [rest of the provinces and territories](http://en.wikipedia.org/wiki/Sales_taxes_in_Canada). We made these tests pass, and then updated the select in the index.html with options for the rest of the provinces and territories.

So .... stop procrastinating and write a failing test. Its easier than you think!