#High/Low number guessing game

1. You will make a game that chooses a random number between 1 and 100 and prompts you to guess it. 
1. If your guess is too high, then it prompts you for a lower number. 
1. If too low a higher number. 
1. Otherwise it tells you the number of guesses that you needed to get the number. 
1. If you have fewer guesses than previous it writes your new low/high score to a file.
1. When a new game starts it reads your lowest score until now from the file and displays it
1. Use exception handling to prevent non-numeric guessing and to deal with the file not being there at startup

###Sample Output

```
Your previous high score was 7
Picked a number between 1 and 100
Your guess
> 50
Higher
Your guess
> 75
Lower
Your guess
> 63
Higher
Your guess
> 69
Higher
Your guess
> 72
Higher
You have a new highscore of 5
Your previous high score was 5
Picked a number between 1 and 100
Your guess

```

As previously your mark will be 85% based on you getting the higher/lower functionality going, and handling non-numeric input with a try/except.

Additional marks up to 100 will be awarded for the summary of how many tries, and saving the high/low score.
