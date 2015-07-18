Database Approaches
===================

![trendlines](http://upload.wikimedia.org/wikipedia/commons/5/53/Energy-trends.png "trendlines")

Did you know that there are [more than 9000 tweets per second?](http://www.statisticbrain.com/twitter-statistics/) Please follow the link to see more astonishing numbers from twitter. Last spring I wrote a little example app to "mine" data from twitter. It used a now deprecated API so it doesn't work any more, but it produced a graph like the above, color coded by key-phrase. I am not the only one to try to mine data from twitter, according to the above source twitter gets 21 billion search requests per day. According to my math that's 27 search requests for every tweet and even more people are reading than tweeting. 27 is an interesting number because it is roughly equal to the average number of words in each tweet so we could surmise that we have 21 billion new search target tokens each day. This makes for a really interesting data management problem.

Twitter uses mysql to manage it's data. But at various times they have tried other approaches. One other approach that is being tested is Cassandra, which you can [read about here](http://nosql.mypopescu.com/post/407159447/cassandra-twitter-an-interview-with-ryan-king) and [here.](http://nosql.mypopescu.com/post/41701899085/monty-widenius-about-nosql-big-data-and-obvioulsy) While looking at this I also stumbled on [this interesting article](http://arstechnica.com/business/2012/04/exclusive-a-behind-the-scenes-look-at-facebook-release-engineering/) about how big websites like facebook and twitter do partial deployments.

![tableau software](images/PROG1730Tableau.png "tableau software")

Speaking of data mining and OLAP, we also looked in class at a user interface for visualizing data. The tool tableau is a drag and drop data visualization tool that can act as another client for MySQL. As does Eclipse, tableau [has a driver](http://downloads.tableausoftware.com/drivers/mysql/mysql.msi) that adapts between MySQL and tableau. Tableau also has a trial that you can [download here.](http://www.tableausoftware.com/products/desktop/download?os=windows)
