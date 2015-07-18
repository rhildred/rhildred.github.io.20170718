Interactive Data Visualization
==================

![Northwest Passage 1788](http://upload.wikimedia.org/wikipedia/commons/thumb/6/64/1788_Schraembl_Map_of_the_Northwest_Passage_%28Alaska%2C_Pacific_Northwest%29_-_Geographicus_-_NorthwestPassage-schraembl-1788.jpg/320px-1788_Schraembl_Map_of_the_Northwest_Passage_%28Alaska%2C_Pacific_Northwest%29_-_Geographicus_-_NorthwestPassage-schraembl-1788.jpg "Northwest Passage 1788")

We ended our introduction to C# with a simple animation. ActionScript is also often used for this kind of work in games and "flashy" graphics. At NCR we put Actionscript and Flex to a more practical use. Data Visualization for decision making. A lot had to go right for our back office banking solution to process millions of payments each day. We use ActionScript to show the bank's operations people in real time where their bottlenecks are. They could then make decisions based on that information that helped things to go right.

A lot was done in the last decade to advance the science of Data Visualization. I would like you to consider an older work by Tufte that some of you may have already come across. Like the Headfirst web design, and the Database book, Tufte presents many many examples of good (and bad) design that help get past the blank page of "what information does a visualizer need to quickly make an informed decision." Tufte talks with passion about his topic of what constitutes good and bad design.

For implementing data visualization, we will get basic principles by focusing on chapters 2-4 and 8-10 from Schupe's Learning ActionScript. Since we will be writing both the client and server side of visualization, we will use adobe flex and the fdt eclipse plugin to write our actionscript. The server side of our visualizations will be in node.js, re-using many of the concepts from Database. Instead of jQuery.ajax to communicate between  the client and the server we will need to use the UrlLoader and UrlRequests from chapter 10.

Certain data visualizations, like those using google maps for instance, are just easier to do in Javascript. We will be also looking at an ActionScript like library for JavaScript called Easeljs, and comparing and contrasting ways of organizing code in ActionScript and JavaScript.

To begin with, an example:

1. Start FDT in the usual way
1. Go to File/New/Other/Fdt Project

	![FDT Project](images/Prog1750FDTProject.png "FDT Project")

3. On the first panel, select web, and delete the package (just to make it simpler we will use the default package)

	![Delete Package](images/Prog1750Package.png "Delete Package")

4. Next through the remaining screens until you have to click finish
5. FDT will create a class that looks like this for you:

		package {
			import flash.display.Sprite;
		
			/**
			 * @author rhildred
			 */
			public class DataVisualizationExample extends Sprite {
				public function DataVisualizationExample() {
				}
			}
		}
		
6. Add some code to this to draw a red circle:

		package {
			import flash.display.Shape;
			import flash.display.Sprite;
		
			/**
			 * @author rhildred
			 */
			public class DataVisualizationExample extends Sprite {
				public function DataVisualizationExample() {
					var circle: Shape = new Shape();
					circle.graphics.beginFill(0xff0000);
					circle.graphics.drawCircle(20, 20, 20);
					addChild(circle);
				}
			}
		}

7. Click the "easy button" and select "FDT SWF Application"

	![Easy Button](images/Prog1750EasyButton.png "Easy Button")	
	
1. Look in awe at your red circle!

The timings for the course are:

Timeframe|Topic|Resource
-------|----|------
Week 1 (Mar 3-7)|Data Visualization Mechanics|Shupe and Rosser 2-4 and 8-10, Skim Tufte
Week 2 (Mar 10-14)|Example as a class|https://github.com/rhildred/DataVisualizationExample
Mar 14|Midterm|Shupe and Rosser 2-4 and 8-10, and Tufte as it applies to https://github.com/rhildred/DataVisualizationExample
Week 3-4 (Mar 17-27)|Project|Tufte and /https://github.com/rhildred/DataVisualizationExample
Mar 28|project Demos and TBD (by EOD Mar 14) Final|https://github.com/rhildred/DataVisualizationExample and learnings from Project
      