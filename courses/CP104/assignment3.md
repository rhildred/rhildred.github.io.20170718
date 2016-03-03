#[Bulls and Cows](https://en.wikipedia.org/wiki/Bulls_and_Cows)

##Sample Output

```

This is a game of bulls and cows. The computer picks a 4 digit number
consisting of digits from 1-9 inclusive. You enter 4 digits, the
computer gives you a bull for each digit that is in the same place
in your pick and it's pick. The computer gives you a cow for each
number that is in both of your picks but in the wrong place in yours.
You win when you get 4 bulls. Your pick is the same as the computer's
and in the same order
Enter your guess
> 1234
bulls 0 cows 1
Enter your guess
> 5678
bulls 0 cows 2
Enter your guess
> 1289
bulls 0 cows 2
Enter your guess
> 8888
bulls 0 cows 0
Enter your guess
> 9999
bulls 1 cows 0
Enter your guess
> 1111
bulls 1 cows 0
Enter your guess
> 1955
bulls 1 cows 2
Enter your guess
> 1956
bulls 0 cows 4
Enter your guess
> 9516
bulls 1 cows 3
Enter your guess
> 9651
bulls 1 cows 3
Enter your guess
> 9165
bulls 4 cows 0
play again?
>

```

##Marking

* Up to 75% will be awarded for generating and printing 4 integer digits, composed of the digits 1-9 with no digits repeating using an array.
* Up to another 10% will be awarded for inputing a player's guess and displaying it as an array of 4 integers
* Up to another 10% will be awarded for displaying the number of bulls and cows correctly
* Up to 100% will be awarded for finishing the game, and displaying the number of guesses and recording the lowest number of guesses in a file
