Test Driven Development
=======================

![Test Dummy - Brady Holt](http://upload.wikimedia.org/wikipedia/commons/thumb/d/d6/IIHS_crash_test_dummy_in_Hyundai_Tucson.jpg/154px-IIHS_crash_test_dummy_in_Hyundai_Tucson.jpg "Test Dummy - Brady Holt")

Test driven development is a powerful idea for a number of reasons. The first reason I talked about when I spoke on specification by example. As a system grows and evolves over time, the tests and the code itself become the only reliable indication of its behavior. Consider the following code:

	var getOntarioTax = function(nAmt){
		// Ontario tax is 7% sales tax plus 8% GST
		return (nAmt * 1.13).toFixed(2);
	}
	
What has happened here? Likely this code was written a few years ago, and the tax rate has been adjusted since then, while the comment in the code remains from before. The following test:

	var nIn = 10;
	var nWithTax = getOntarioTax(nIn);
	assert(nWithTax == 11.30);
	
makes sure that the tax rate is up to date, but also quickly tells us that the Ontario tax rate is not 15% as we would conclude from the comment.

The second reason that test driven development is important is because it leads to writing just enough code to do the job, which is important from a waste elimination perspective when writing code for a system but also when maintaining code for a system. If we make our getOntarioTax method be a getCanadianTax method by taking a second parameter for the province that defaults to Ontario, then we would start with the Ontario test that we have already written. To do another province we would add a second test:

	var tests = {
		"Test of getTax with no province": function(){
			var nIn = 10;
			var nWithTax = getCanadianTax(nIn);
			assert(nWithTax == 11.30);
		},
		"Test of getTax for PEI": function(){
			var nIn = 10;
			var nWithTax = getCanadianTax(nIn, 'PEI');
			assert(nWithTax == 11.40);		
		}
	}
	
When we implemented, just that additional functionality, we might do something like this:

	var getCanadianTax = function(nIn, sProv){
		if(sProv == 'PEI'){
			return (nIn * 1.14).toFixed(2);
		}
		return (nIn * 1.13).toFixed(2);
	};
 
Then as we implemented more provinces we would discover that there are a number of provinces that have a 13% tax rate and we might end up with code like this:

	var getCanadianTax = function(nIn, sProv){
		if(typeof sProv == "undefined") sProv = 'ON';
		if(sProv == 'PEI'){
			return (nIn * 1.14).toFixed(2);
		}else if(sProv == 'NB' || sProv == 'NL' || sProv == 'ON'){
			return (nIn * 1.13).toFixed(2);
		}else if(sProv == 'NS'){
			return (nIn * 1.15).toFixed(2);
		}
		return (nIn * 1.05).toFixed(2);
	};

which would be pretty much the minimum that is needed.

Finally test driven development makes sure that later changes don't break things that were working previously. For instance if we were to omit the test for an undefined second parameter in the previous method, the "Test of getTax with no province" will start failing. We can have confidence that we will write code that doesn't break something else.

To use the `assert-runner` npm module that I wrote to do test driven development myself you simply add the dependency to the package.json file in the root directory of your node project.

	"dependencies": {
		"assert-runner": "*"
	},

 A simple passing first test requires the following code:
 
	var assert = require('assert');
	var TestRunner = require('assert-runner');

	var tests = {
		"Test of assert": function(){
			assert(true == true);
		}
	};
	
	new TestRunner(tests).again(0);	
	
You say the test didn't pass???? Starting with a failing test is sometimes easier than you think. After you add the dependency to the package.json file, you will need to run a `npm install` inside your project directory.

So the basic pattern is

1. Write a failing test (or a trivial passing one)
1. Write the code under test and get the test to pass.
1. Write another failing test ... write more code ....

You can see a [complete example here](https://github.com/rhildred/PROG1250Javascript).