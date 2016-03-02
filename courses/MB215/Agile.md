![slide0](slidestart://?class="step+slide"+data-x="-1000"+data-y="-2900")

<img src="http://www.nenutech.com/wp-content/uploads/2012/12/dilbert-xp02.gif" title="Extreme Programming" alt="Extreme Programming" style="display:block;margin: 2em auto 2em"/>

#Agile and Test Driven Development

Rich Hildred - rhildred@wlu.ca - 519-594-0900

![notes](slidenotestart://)

Agile is development doing whatever it wants. - my former leader

![/notes](slidenoteend://)

![/slide0](slideend:://)

![slide1](slidestart://?class="step+slide"+data-x="-1000"+data-y="-2200")

#Geek Comedy

<iframe width="700" height="550" src="https://www.youtube.com/embed/7uvkVczjR80" frameborder="0" allowfullscreen style="display:block;margin: 1em auto"></iframe>

![notes](slidenotestart://)

OK .... He had me at, "I'm a programmer at facebook." This guy:

1. Pioneered software design patterns, a way for less experienced people to understand and talk about the code of others.
2. Signed the [agile manifesto](http://www.agilemanifesto.org/), a way of developing software that has become popular.
3. Invented [extreme programming](https://en.wikipedia.org/wiki/Extreme_programming), a way for teams to work better together on software projects of various size.
4. Invented [test driven development](https://en.wikipedia.org/wiki/Test-driven_development), a very popular way of doing development currently.

![/notes](slidenoteend://)

![/slide1](slideend:://)

![slide2](slidestart://?class="step+slide"+data-x="-1000"+data-y="-1500")

#Software has to get better

<iframe width="700" height="550" src="https://www.youtube.com/embed/mnEsrZ__qbU" frameborder="0" allowfullscreen style="display:block;margin: 1em auto"></iframe>

![notes](slidenotestart://)

My industry has a real quality problem. And this guy is also a big Kent Beck fan. He actually says (and I agree) that the ["waterfall method"](https://en.wikipedia.org/wiki/Waterfall_model) that we discussed last time is appropriate for some situations. He also talks a lot about waste, especially the waste of "shelfware." Software that is written but never used. When we are starting to write software, both the problem and the solution are not while understood. Eric Ries, (and Steven Blank) adds the build, measure learn cycle to the idea of creating software, following the scientific method.

1. build something to test a hypothesis
2. measure the results
3. learn from those results what your next experience should be

![/notes](slidenoteend://)

![/slide2](slideend:://)

![slide2.5](slidestart://?class="step+slide"+data-x="-1000"+data-y="-800")

#Learning through Systematic Problem Solving

<img src="https://rhildred.github.io/courses/CP102D/scientificmethod__92804.1405401363.1280.1280.jpg" style="display:block;margin: 1em auto;height:550px" />

![notes](slidenotestart://)

Eric Ries and I are big on Systematic Problem Solving, a process of learning by asking and answering questions. In the illustration, the baby asks and answers the question, "Is this good to eat?" According to Ries Business Technology management asks 2 fundamental questions:

1. Does this solve a problem that somebody has, and is willing to pay to have solved?
2. Will this scale?

In the Kent Beck presentation that follows, Kent elaborates on these questions and says that different software methods are required when building software to answer different questions.

![/notes](slidenoteend://)

![/slide2.5](slideend:://)

![slide3](slidestart://?class="step+slide"+data-x="-1000"+data-y="-100")

#Kent Beck himself gets the last word

<iframe width="700" height="550" src="https://www.youtube.com/embed/d4qldY0g_dI" frameborder="0" allowfullscreen style="display:block;margin: 1em auto"></iframe>

![notes](slidenotestart://)

The great software innovator's ideas in 2010. Especially strong because he builds on the agile manifesto values in his slide deck:

**Individuals and interactions** over processes and tools

**Working software** over comprehensive documentation

**Customer collaboration** over contract negotiation

**Responding to change** over following a plan

Kent Beck, and Alistair Cockburn were among the original signers of the Agile Manifesto.

There is also newer, but longer material, that leads me to believe he is still thinking along these lines. Facebook, as well is a champion of his ideas.

The point towards the end about the agile guys moving on to the next thing, and them bringing in real sotware engineers towards the end is really strong. That very much happened to me at NCR.

Beck makes 2 really strong points:

###1) different situations create pull for different techniques by asking developers to learn the answers to different questions.

**1) Will people use this?**

**2) Will people pay for this?**

* Building software to answer these questions involves just hacking something up ... a **minimum viable product**. We have the luxury of no users so this can be a pure experiment. That is we don't have to think about whether our experiment affects existing users, when there aren't any.

**3) Can more people use this?**

* Building software to answer this question requires tests to make sure that we don't break anything for the people that are already using this.

**4) Can another 10 times as many people use this?**

* Building software to answer this requires software engineering and processes of the type that were discussed in the previous lecture.

**5) How long can we keep this going, and make money from it?**

* The **Technology Adoption Life Cycle** happens on a normal distribution to a large extent:

![technology adoption](https://upload.wikimedia.org/wikipedia/en/4/45/DiffusionOfInnovation.png "technology adoption")

* As we sell, the limiting factor to customer adoption becomes the customers that have already purchased. Good problem to have!
* Things look great while we are climbing the new customer curve and we are successfully learning the answer to our other questions. 
* The final question is, when new sales start dropping off, how can I reduce the cost of goods sold so that I still make money.
* One solution is to just abandon the product at the top of the market and not do any maintenance, but that can hurt a company's reputation and make it more difficult to sell other products to the same customers.
* Another solution is outsourcing, or offshoring but there is a high communications overhead to doing this and achieving good results.

I don't think that Beck's work has really addressed, this problem, nor has our industry as a whole. Beck just points out that it is a much different question than questions 1 - 4.

###2) making small increments, creates flow

Some software developers are terrible procrastinators. One of the strongest ways of getting an overwhelming task started is to remember that an elephant can only be eaten "one bite at a time."

![one bite at a time](https://upload.wikimedia.org/wikipedia/commons/thumb/0/00/Elefante_S%C3%A3o_Paulo_Sepia.jpg/320px-Elefante_S%C3%A3o_Paulo_Sepia.jpg "one bite at a time")

It seems much **less daunting to me to write a test of whether my code works than to write the code**. Then after I have written the test the code itself seems less of a mountain to climb, starting a flow towards the goal state.

Flow, to me, is a big strength of Kent's test driven development idea. **Developers can keep developing confident that they haven't broken previously working code.**

1. Add a test
2. Run all tests and see if the new one fails
3. Write just enough code to make the test pass, **not wasting time building things you won't need**
4. Run tests and make sure that the new one passes, as well as all of the previous
5. Refactor code
6. Repeat

Finally the tests become **reliable documentation of what the code actually does.** Static documentation becomes out of date. Tests, so long as they pass, describe the way the system really works. 

In Beck's words, 2 deliveries creates more value than 1 delivery. Beck goes on to tell the story of a Norwegian consultant who builds "tight software" that no one can find any fault with. 

Beck asks the question, "What value is the code if no one uses it?"

The consultant says, "0$"

Beck, "so $0 /year of effort. During that year what was the value of that code?"

"Generally non-working code is also of 0 value." says the consultant.

Beck, "So the faster I discover the true value of what I am working on, the faster I can work on something that has more value." 

![/notes](slidenoteend://)

![/slide3](slideend:://)

![slide4](slidestart://?class="step+slide"+data-x="-1000"+data-y="600")

#Will this be on the midterm?

![notes](slidenotestart://)

These ideas are central to the course. Beck is the quintessential, software methods person, I have updated my notes to catch the essence of what I want you to take away from this. Beck also makes a very strong business point at the start, when he talks about scratching his goats.  He says that out of the hundreds of good ideas that he has had, 4 of them scratched a real itch. He also speaks of Eric's idea lean startup occurring, right when the economy went sour being one of those real itch scratching idea. He also says, "You won't find it unless you start scratching." 

![/notes](slidenoteend://)

![/slide4](slideend:://)
