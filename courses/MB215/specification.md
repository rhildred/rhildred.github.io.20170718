![slide0](slidestart://?class="step+slide"+data-x="-1000"+data-y="-2200")

<img src="https://rhildred.github.io/courses/MB215/Adzic.png" title="Specification by example" alt="Specification by example" style="height:300px;display:block;margin:3em auto 1em" />

#Specification By Example
## ... before it was cool

Rich Hildred - rhildred@wlu.ca - 519-594-0900

![notes](slidenotestart://)

How can we work together as a team? Excellent question and one that we are still considering! Specification by example, our text, describes a collaborative way of teamwork with customers.

![/notes](slidenoteend://)

![/slide0](slideend:://)

![slide1](slidestart://?class="step+slide"+data-x="-1000"+data-y="-1500")

#My ride in a parcel truck

<img src="https://upload.wikimedia.org/wikipedia/commons/5/54/UPS_truck_-804051.jpg" title="UPS Truck" alt="UPS Truck" style="height:500px;display:block;margin:1em auto" />

![notes](slidenotestart://)

A few years ago I put on brown shorts and went on a ride in a parcel delivery truck. It may seem to make not much sense for a software development team leader to be riding around in the natural light with the wind blowing through the open door of a Gruman van and the highway whizzing by. In the context of team learning and specification by example however it makes some of the most sense of almost anything that I have done in my almost 20 year software career. 

The sense of what I was doing was gathering examples of what a system for depositing money directly into shipper's accounts for deliveries to companies they didn't know could mean to the stakeholders in the project.  One of my first stops was a guitar shop. I am a guitar nut so I was interested already. The owner of the small shop was interested too, because one of his customer's guitars was being returned to him with a new neck. His shop was too small to have it's own technician, so he had sent the work out to another small businessman that was a guitar technician. After quickly checking the guitar he writes a cheque for the guitar technician, hands it to the driver and the driver and I are on our way.  I learn that the cheque on delivery system allows small businesses to work together each having a relationship with the delivery company but not with each other. I also learn that the relationship that the small businesses have is also with the driver who considers them his customers.

The next stop is at a boat shop, also an interest of mine and I learn some more things for my team. The boat shop has a couple of packages from the same shipper. Some molding, and a new windshield for a boat that they are working on. The boat shop pays for both packages with the same cheque, and I learn why we need to be able to match a cheque for deposit into a shipper's account to multiple packages from that shipper. The driver also explains to me how an exception condition is created when packages from 2 similarly named companies arrive on the same day, and the consignee writes one cheque for what was actually 2 shippers.

On to a kind of run down print-shop. There the proprietor was expecting some supplies and had some money orders ready to pay for them. 5 * $100 money orders for $410 worth of supplies. I learned that the delivery company handles such overpayments by passing the overpayment on to the shipper and allowing the shipper to deduct the overpayment from the consignee's next order. I also learned that I need to be able to match multiple payments to the same delivery, and that the total may not match. I also learned later that if the overage (or underage) is past a certain limit that a person needs to deal with the transaction to try to determine the consignee's intent.

All the time I was on the road I was aware of the people that the driver dealt with smiling at him and I. This might have been due to the strength of the relationship that the driver had with his customer. Of course it crossed my mind that it also might have had something to do with the fact that the shorts I borrowed (the whole uniform actually) was much too big for me and the pants were held up with a package strap. 

Picture: http://commons.wikimedia.org/wiki/File:UPS_truck_-804051.jpg

![/notes](slidenoteend://)

![/slide1](slideend:://)

![slide2](slidestart://?class="step+slide"+data-x="-1000"+data-y="-800")

#A few examples are a dangerous thing

<img src="https://upload.wikimedia.org/wikipedia/commons/d/dc/Notags.svg" title="Counter Examples" alt="Counter Examples" style="height:500px;display:block;margin:1em auto" />

![notes](slidenotestart://)

When I got back to the UPS office there was a workshop in progress with the rest of the architecture team, and some anti-patterns were being discussed. The anti-patterns, it would turn out, were equally important to the project, and a naïve selection of key examples that ignored the anti-patterns could have led us down the seriously wrong path. When I walked in, one of the participants (there were actually representatives from my company and the delivery company's bank there as well) was telling us how his big belly was actually his bottom that had been kicked so hard it was now on front because of a previous failed implementation. One of the problems with that implementation was tags, a piece of the shipping label that was torn off and included with the cheque to match it with the delivery. A problem with the tags was that they wouldn't tear off cleanly and would literally gum up the works when the delivery company tried to get them to the shippers. Someone agreed that this was an example of a problem so bad that they would be still up in the wee hours of the morning processing payments while the next day's were coming in. They had to work weekends, because they couldn't do 24 hours of payments in 24 hours.

They also talked at the workshop about using flatbed scanners to input the cheques and tags as being an example of what didn't work. One of the defining moments of the project for me was a few weeks later when I was standing in front of one of our high speed scanners with the architects of the system, looking at the output of our process, cheques for shippers neatly sorted in like pockets ready to go to a "statement" sort where they could be stuffed into an envelope for an individual shipper to deposit them or deposited by the bank on the shipper's behalf. Looking at this from a learning perspective both the inefficient anti pattern of using flatbed scanners and considering the output of the new system connected the possible results with the decisions that we were making when designing the new system.

Image: http://commons.wikimedia.org/wiki/File:Notags.svg

![/notes](slidenoteend://)

![/slide2](slideend:://)

![slide3](slidestart://?class="step+slide"+data-x="-1000"+data-y="-100")

#A living document connects action with consequence

<img src="https://rhildred.github.io/courses/MB215/LivingDocument.png" title="Living Document" alt="Living Document" style="height:500px;display:block;margin:1em auto" />

![notes](slidenotestart://)

What we were producing, while standing around the transport was a document that we called the "disposition matrix." While the rumors that I actually had the "disposition matrix" tattooed on my forearm are untrue the whole team, architects, testers, developers and operations included lived and breathed the disposition matrix, when we were delivering the project.  The disposition matrix lived on for the more than 10 years that the project was in production, through major tech refreshes, my year long sojourn in India and new operations and support people.

A living document like this connects the actions of the entire system with it's consequences. It tells us when we have an exception to the process that we haven't considered, when we have an exception that was considered that is no longer being handled correctly, and the examples contained within it form the basis for training new people. For instance the example of an overpayment (with the money orders) was a disposition 25 (as much as I can remember). It resulted in a letter being sent to the shipper advising them of the overpayment with an image of the money orders in question.

As an interesting side effect these letters and the delivery company's customer service reps being able to access payment information online lead to an unintended double digit decline in fraud consequence.  

Picture: from the book "Specification by Example" - Gojko Adzic 2011

![/notes](slidenoteend://)

![/slide3](slideend:://)

![slide4](slidestart://?class="step+slide"+data-x="-1000"+data-y="600")

#Gojko Adzic - software delivery consultant

<iframe src="https://player.vimeo.com/video/54811925" width="700" height="550" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen style="display:block;margin:1em auto"></iframe>

![notes](slidenotestart://)

My direct deposit experience was the best thing that happened to me career wise. While prospecting for new systems integration startup business with the people that I had worked on projects with, every single one of them mentioned how much fun the teamwork that we experienced on those projects was. Easy for me to say, I only saw people that I enjoyed working with. Well I did, but the inverse was also true. I saw people from each project that I worked on in that phase of my career. I can also explain some of this teamwork and flow with the idea of specification by example itself.

To help me explain here is Gojko Adzic, the author of a book with the title "Specification by Example:" 1:34 video

Photo: from vimeo video http://vimeo.com/54811925

![/notes](slidenoteend://)

![/slide4](slideend:://)

![slide5](slidestart://?class="step+slide"+data-x="-1000"+data-y="1300")

#Pattern language of Specification by Example

<img src="https://rhildred.github.io/courses/MB215/patternLanguage.png" title="A pattern language" alt="A pattern language" style="height:500px;display:block;margin:1em auto" />

![notes](slidenotestart://)

Adzic's pattern language of specification by example consists of these ladders on this snake and ladderish diagram.

* Deriving scope from goals
* Illustrating using Examples
* Specifying collaboratively
* Refining the Specification
* Automating Validation without changing specification
* Validating Frequently
* Evolving a documentation system

Beck, from the agile lecture, also made a contribution to pattern language. A pattern language is a way for people that share the language to speak of an abstract concept. The rest of this talk will be going through this diagram with a simple example.
Picture from "Specification By Example" Gojko Adzic 2011

![/notes](slidenoteend://)

![/slide5](slideend:://)

![slide6](slidestart://?class="step+slide"+data-x="-1000"+data-y="2000")

#A simple example that we can all relate to

<img src="https://rhildred.github.io/courses/MB215/facultyPage.png" title="A pattern language" alt="A pattern language" style="height:500px;display:block;margin:1em auto" />

![notes](slidenotestart://)

My life has changed quite a bit since the days when I worked on projects. The last big system that I worked on was as a curriculum developer and trainer of trainers. It was a system for clearing payments for the Reserve Bank of India. The teamwork was still fun, and the project is still being used years later as far as I know, but I never went to visit any of those people when I was prospecting for customers. I left my job as a product manager, by then at the same company that I developed the systems for to start my own company for my MBA project in Wilfrid Laurier's Innovation and Entrepreneurship program. To keep from burning through too much money I took computer teaching contracts at Conestoga College. Now in my third summer I am getting around to doing my faculty page. I want to work on my page together using specification by example.

![/notes](slidenoteend://)

![/slide6](slideend:://)

![slide7](slidestart://?class="step+slide"+data-x="-1000"+data-y="2700")

#deriving scope from goals

<img src="https://rhildred.github.io/courses/MB215/scopeFromGoals.png" title="scope from goals" alt="scope from goals   " style="width:700px;display:block;margin:1em auto" />

![notes](slidenotestart://)

My main goal is to have a site that looks like it was made by a competent web developer. 
It needs to look nice on mobile devices.
It needs to be social media-like
Particularly I want students to be able to participate as effortlessly as possible

Picture from "Specification By Example" Gojko Adzic 2011

![/notes](slidenoteend://)

![/slide7](slideend:://)

![slide8](slidestart://?class="step+slide"+data-x="-1000"+data-y="3400")

#illustrating using examples

<img src="https://rhildred.github.io/courses/MB215/usingExamples.png" title="using examples" alt="using examples" style="height:500px;display:block;margin:1em auto" />

![notes](slidenotestart://)

I want to put a lecture like this along with my notes on the site in a format that someone that missed the lecture can get something from

I want to be able to post notes for doing things, primarily on the cloud here so that people having problems or doing something on the cloud can be drawn to my faculty site, and hopefully hire Conestoga to do corporate training (which I love) in the areas of my interests - for example I got mvc razor syntax working on appharbour with mysql and here is how

I want a student to be able to make constructive comments on any paragraph in any of my aforementioned postings- my experience of apphrabor was different when I did this so I did this to overcome it

I want students to be able to post solutions that they have found - Go-Daddy is way better than Appharbour because of this experience that I had with them

I want students to be able to elaborate on things that they have found - I struggled with the user interface of eclipse so I took these screen shots and made red circles on them to remind myself how to stop my tomcat instance …

Picture: from the book "Specification by Example" - Gojko Adzic 2011

![/notes](slidenoteend://)

![/slide8](slideend:://)

![slide9](slidestart://?class="step+slide"+data-x="-1000"+data-y="4100")

#refining the specification

<img src="https://rhildred.github.io/courses/MB215/refiningSpecification.png" title="refining the specification" alt="refining the specification" style="width:700px;display:block;margin:1em auto" />

![notes](slidenotestart://)

How will I benefit by students being able to share their stories?

Are there any examples that are secondary examples, or totally contained in other examples?

How do I organize the examples into a living document like the distribution matrix, that I can show to other faculty to help them understand how to do something similar for themselves ...

Picture: from the book "Specification by Example" - Gojko Adzic 2011


![/notes](slidenoteend://)

![/slide9](slideend:://)

![slide10](slidestart://?class="step+slide"+data-x="-1000"+data-y="4800")

#automating validation without changing specifications

<img src="https://rhildred.github.io/courses/MB215/automating.png" title="refining the specification" alt="refining the specification" style="width:700px;display:block;margin:1em auto" />

![notes](slidenotestart://)

You can test the assumptions that you make about users, using analytics, surveys .... It's not really today's topic, but the point that Gojko and I are trying to make with this is that things like Google analytics are ongoing, and down the road when someone new is trying to understand what you did, the ongoing analytics say more about your system, then your notes or comments in the code, because they are about the working system as much as about how it was originally conceived.

Likewise, unit tests also miss something about the system. For instance if I do test driven development, Monday's topic, I would have a test to see if a user can enter a comment. That doesn't tell me nearly as much about the ongoing use of the system as analytics about how much the comment feature is used in real life.

Picture: from the book "Specification by Example" - Gojko Adzic 2011



![/notes](slidenoteend://)

![/slide10](slideend:://)

![slide11](slidestart://?class="step+slide"+data-x="-1000"+data-y="5500")

#evolving a documentation system

<img src="https://rhildred.github.io/courses/MB215/documentation.png" title="documentation system" alt="documentation system" style="height:500px;display:block;margin:1em auto" />

![notes](slidenotestart://)

The idea is then to document the analytics and what you are discovering about users in a way that can live past implementation. In my case, I want to use the system to improve the day to day operations of my instruction.

Picture: from the book "Specification by Example" - Gojko Adzic 2011



![/notes](slidenoteend://)

![/slide11](slideend:://)

![slide12](slidestart://?class="step+slide"+data-x="-1000"+data-y="6200")

#always wear a belt - but don't wear loose pants on airplanes

<img src="https://upload.wikimedia.org/wikipedia/commons/0/0d/Lightbulb_icon_vectorized.svg" title="documentation system" alt="documentation system" style="height:500px;display:block;margin:1em auto" />

![notes](slidenotestart://)

The book starts with some cautionary tales. I also am going to show you a counter example. The most important lesson to be learned here is don't jump right in to solutions. Understand the problem that you are trying to solve first.


Picture: http://commons.wikimedia.org/wiki/File:Lightbulb_icon_vectorized.svg


![/notes](slidenoteend://)

![/slide12](slideend:://)

![slide13](slidestart://?class="step+slide"+data-x="-1000"+data-y="6900")

#this is Adzic's 3rd work that I am aware of on the subject

<img src="https://farm9.staticflickr.com/8516/8496674827_1828471c49_z_d.jpg" title="Adzic's learning" alt="Adzic's learning" style="height:478px;display:block;margin:1em auto" />

![notes](slidenotestart://)

Gojko himself thinks that he has learned a few things. In particular he used to advocate "challenging" the need for things. I have heard developers say "let it fight it's way in." Instead Gojko now advocates the fighter airplane approach where you probe more deeply about what the goals are for something.

Photo: http://www.flickr.com/photos/92768755@N05/8496674827/in/photolist-dWPFpz-6nLsf2-dqTBTT


![/notes](slidenoteend://)

![/slide13](slideend:://)

![slide14](slidestart://?class="step+slide"+data-x="-1000"+data-y="7600")

#3 Amigos

<img src="https://rhildred.github.io/courses/MB215/3Amigos.png" title="3 Amigos" alt="3 Amigos" style="height:500px;display:block;margin:1em auto" />

![notes](slidenotestart://)

Many times one individual gets to wear all 3 sombreros. When that is the case, one gains a new understanding. When there are different individuals in different sombreros then it is really important to have a disciplinary approach where the 3 can work as one.

Picture: from the book "Specification by Example" - Gojko Adzic 2011



![/notes](slidenoteend://)

![/slide14](slideend:://)
