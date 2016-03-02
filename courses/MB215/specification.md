![slide0](slidestart://?class="step+slide"+data-x="-1000"+data-y="-2200")

<img src="https://rhildred.github.io/courses/MB215/Adzic.png" title="Specification by example" alt="Specification by example" style="height:300px;display:block;margin:0 auto 1em" />

#Specification By Example
## ... before it was cool

Rich Hildred - rhildred@wlu.ca - 519-594-0900

![notes](slidenotestart://)

How can we work together as a team? Excellent question and one that we are still considering! Specification by example, our text, describes a collaborative way of teamwork with customers.

![/notes](slidenoteend://)

![/slide0](slideend:://)

![slide1](slidestart://?class="step+slide"+data-x="-1000"+data-y="-1500")

#My ride in a parcel truck

<img src="https://upload.wikimedia.org/wikipedia/commons/5/54/UPS_truck_-804051.jpg" title="UPS Truck" alt="UPS Truck" style="height:500px;display:block;margin:0 auto 1em" />

![notes](slidenotestart://)

A few years ago I put on brown shorts and went on a ride in a parcel delivery truck. It may seem to make not much sense for a software development team leader to be riding around in the natural light with the wind blowing through the open door of a Gruman van and the highway whizzing by. In the context of team learning and specification by example however it makes some of the most sense of almost anything that I have done in my almost 20 year software career. 

The sense of what I was doing was gathering examples of what a system for depositing money directly into shipper’s accounts for deliveries to companies they didn’t know could mean to the stakeholders in the project.  One of my first stops was a guitar shop. I am a guitar nut so I was interested already. The owner of the small shop was interested too, because one of his customer’s guitars was being returned to him with a new neck. His shop was too small to have it’s own technician, so he had sent the work out to another small businessman that was a guitar technician. After quickly checking the guitar he writes a cheque for the guitar technician, hands it to the driver and the driver and I are on our way.  I learn that the cheque on delivery system allows small businesses to work together each having a relationship with the delivery company but not with each other. I also learn that the relationship that the small businesses have is also with the driver who considers them his customers.

The next stop is at a boat shop, also an interest of mine and I learn some more things for my team. The boat shop has a couple of packages from the same shipper. Some molding, and a new windshield for a boat that they are working on. The boat shop pays for both packages with the same cheque, and I learn why we need to be able to match a cheque for deposit into a shipper’s account to multiple packages from that shipper. The driver also explains to me how an exception condition is created when packages from 2 similarly named companies arrive on the same day, and the consignee writes one cheque for what was actually 2 shippers.

On to a kind of run down print-shop. There the proprietor was expecting some supplies and had some money orders ready to pay for them. 5 * $100 money orders for $410 worth of supplies. I learned that the delivery company handles such overpayments by passing the overpayment on to the shipper and allowing the shipper to deduct the overpayment from the consignee’s next order. I also learned that I need to be able to match multiple payments to the same delivery, and that the total may not match. I also learned later that if the overage (or underage) is past a certain limit that a person needs to deal with the transaction to try to determine the consignee’s intent.

All the time I was on the road I was aware of the people that the driver dealt with smiling at him and I. This might have been due to the strength of the relationship that the driver had with his customer. Of course it crossed my mind that it also might have had something to do with the fact that the shorts I borrowed (the whole uniform actually) was much too big for me and the pants were held up with a package strap. 

Picture: http://commons.wikimedia.org/wiki/File:UPS_truck_-804051.jpg

![/notes](slidenoteend://)

![/slide1](slideend:://)

![slide2](slidestart://?class="step+slide"+data-x="-1000"+data-y="-800")

#A few examples are a dangerous thing

<img src="https://upload.wikimedia.org/wikipedia/commons/d/dc/Notags.svg" title="Counter Examples" alt="Counter Examples" style="height:500px;display:block;margin:0 auto 1em" />

![notes](slidenotestart://)

When I got back to the UPS office there was a workshop in progress with the rest of the architecture team, and some anti-patterns were being discussed. The anti-patterns, it would turn out, were equally important to the project, and a naïve selection of key examples that ignored the anti-patterns could have led us down the seriously wrong path. When I walked in, one of the participants (there were actually representatives from my company and the delivery company’s bank there as well) was telling us how his big belly was actually his bottom that had been kicked so hard it was now on front because of a previous failed implementation. One of the problems with that implementation was tags, a piece of the shipping label that was torn off and included with the cheque to match it with the delivery. A problem with the tags was that they wouldn’t tear off cleanly and would literally gum up the works when the delivery company tried to get them to the shippers. Someone agreed that this was an example of a problem so bad that they would be still up in the wee hours of the morning processing payments while the next day’s were coming in. They had to work weekends, because they couldn’t do 24 hours of payments in 24 hours.

They also talked at the workshop about using flatbed scanners to input the cheques and tags as being an example of what didn’t work. One of the defining moments of the project for me was a few weeks later when I was standing in front of one of our high speed scanners with the architects of the system, looking at the output of our process, cheques for shippers neatly sorted in like pockets ready to go to a “statement” sort where they could be stuffed into an envelope for an individual shipper to deposit them or deposited by the bank on the shipper’s behalf. Looking at this from a learning perspective both the inefficient anti pattern of using flatbed scanners and considering the output of the new system connected the possible results with the decisions that we were making when designing the new system.

Image: http://commons.wikimedia.org/wiki/File:Notags.svg

![/notes](slidenoteend://)

![/slide2](slideend:://)

![slide3](slidestart://?class="step+slide"+data-x="-1000"+data-y="-100")

#A living document connects action with consequence

<img src="https://rhildred.github.io/courses/MB215/LivingDocument.png" title="Living Document" alt="Living Document" style="height:500px;display:block;margin:0 auto 1em" />

![notes](slidenotestart://)

What we were producing, while standing around the transport was a document that we called the “disposition matrix.” While the rumors that I actually had the “disposition matrix” tattooed on my forearm are untrue the whole team, architects, testers, developers and operations included lived and breathed the disposition matrix, when we were delivering the project.  The disposition matrix lived on for the more than 10 years that the project was in production, through major tech refreshes, my year long sojourn in India and new operations and support people.

A living document like this connects the actions of the entire system with it’s consequences. It tells us when we have an exception to the process that we haven’t considered, when we have an exception that was considered that is no longer being handled correctly, and the examples contained within it form the basis for training new people. For instance the example of an overpayment (with the money orders) was a disposition 25 (as much as I can remember). It resulted in a letter being sent to the shipper advising them of the overpayment with an image of the money orders in question.

As an interesting side effect these letters and the delivery company’s customer service reps being able to access payment information online lead to an unintended double digit decline in fraud consequence.  

Picture: from the book “Specification by Example” - Gojko Adzic 2011

![/notes](slidenoteend://)

![/slide3](slideend:://)
