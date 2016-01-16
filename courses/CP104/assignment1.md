#Assignment 1

In a game, you want to decide if 2 balls on a flat surface are touching each other. If the center of the balls are at x1, y1 and x2, y2, the distance between the centers of the balls will be found from the Pythagorean theorem :

```
distance = math.sqrt((x2 - x1)**2 + (y2 - y1)**2) 
```

![](https://rhildred.github.io/courses/CP104/pythagorean.svg)

Once you have the distance, if the sum of the radius is >= to the distance the balls are touching. 

1. Input the x, y and radius of 2 balls
2. Output the x, y and radius as they were input
1. Output the distance between the center of the balls
2. Output whether the balls are touching or not.

###Marking
1 mark will be awarded for inputing and outputing, x, y and radius of 2 balls.

2 marks will be awarded for outputing the distance between the balls correctly.

2 marks will be awarded for correctly deciding and outputing whether the balls are touching.