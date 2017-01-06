# Assignment 4 Trivia Game

(based on "starting out with python" by Gaddis)
 
In this assignment you will create a simple trivia game for two players. The program will work like this:

* Starting with player 1, each player gets a turn at answering 5 trivia questions. (There should be a total of 10 questions.) When a question is displayed, 4 possible answers are also displayed. Only one of the answers is correct, and if the player selects the correct answer, he or she earns a point.

* After answers have been selected for all the questions, the program displays the number of points earned by each player and declares the player with the highest number of points the winner.

To create this program, write a Question class to hold the data for a trivia question. The Question class should have attributes for the following data:

* A trivia question

* Possible answer a

* Possible answer b

* Possible answer c

* Possible answer d

* The number of the correct answer (a, b, c, or d)
The Question class also should have an appropriate __init__ method, accessors, and mutators.
The program should have a list or a dictionary containing 10 Question objects, one for each trivia question. Make up your own trivia questions on the subject or subjects of your choice for the objects.

##Marking

* Up to 40% will be awarded for displaying prompts for 2 players to answer 5 questions each.

```

enter guess for player 1
>a
enter guess for player 2
>b
enter guess for player 1
>a
enter guess for player 2
>c
enter guess for player 1
>d
enter guess for player 2
>e
enter guess for player 1
>f
enter guess for player 2
>f
enter guess for player 1
>f
enter guess for player 2
>f

```

* up to 10 further marks will be added for creating an object with an __init__ and displaying it. *Hint use pprint

```

from pprint import pprint

oQuestion = Question("Question 1", "answer a", "answer b", "answer c", "answer d", "d")

pprint(vars(oQuestion))

```

output should look like this:

```

{'ansCorrect': 'd',
 'answers': {'a': 'answer a',
             'b': 'answer b',
             'c': 'answer c',
             'd': 'answer d'},
 'text': 'Question 1'}


```

* up to 10 further marks will be awarded for puting questions in an array, displaying them one at a time and prompting for an answer

```

Question 1
a: answer a
b: answer b
c: answer c
d: answer d
enter your answer player 1
>b
Question 2
a: answer a
b: answer b
c: answer c
d: answer d
enter your answer player 2
>b
Question 3
a: answer a
b: answer b
c: answer c
d: answer d
enter your answer player 1
>b
Question 4
a: answer a
b: answer b
c: answer c
d: answer d
enter your answer player 2
>b

```

* up to a further 10 marks will be awarded for testing the entered answer, adding it to the correct player's score and printing out a summary at the end

```

Question 8
a: answer a
b: answer b
c: answer c
d: answer d
enter your answer player 2
>b
Question 9
a: answer a
b: answer b
c: answer c
d: answer d
enter your answer player 1
>b
Question 10
a: answer a
b: answer b
c: answer c
d: answer d
enter your answer player 2
>b
good game player 1's score was 2 player 2's score was 1


```

* up to 5 additional marks will be awarded for making the questions and answers interesting 

The total to this point is 75%. According to a paper by Dr. Scott Nicholson, an improvement on this game is to get each player to answer each question. An additional 5% will be awarded for accepting each player's name, prompting them by name, adding a point to their score for each correct answer and deducting for each incorrect answer. 

It would be even more engaging if players could "wager" based on how confident they are in their answers. They start out with 20 points and can choose the number of points they will chance on a particular question. The penalty for guessing incorrectly would be to loose the "wagered" points. The reward for choosing correctly could be the points from the players with incorrect answers. Another possible reward would be to add an element of playing against the computer by letting the computer make a random choice and "wager" and also crediting correct answers with a share of the computer's mistakes.

Up to 100% will be awarded as the mark for this asignment for trying to engage players using some strategy like "wagering" or of your own invention.
