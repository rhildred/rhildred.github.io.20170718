Split Testing
===========

Programming, no matter how technically excellent isn't really excellent at all unless you are building the right thing. As Steve Blank says, “in a startup no facts exist inside the building, only opinions.” We need to verify the hypothesis in our code with customers. You also need to build the thing right. Take, for example, a change to the user interface that makes the "buy now" button render with white text on a white background. Really bad for sales!

Split testing is sending a small cohort of customers to a new change, while keeping the bulk of customers on the old faithful. We compare the behaviours of the 2 cohorts, and decide if the changed software is better than the classic software, if the vista is better than the 2000. In our white on white example we notice a sudden decrease in sales. We start sending all of the customers back to the classic, and manually test the "improved." We possibly stop all development on the new and improved so that we don't compound whatever mistake that was made.

**It is really important that when we discover the issue and make a new and improved version, we also add an automated test to make sure that white on white doesn't creep back in.**

When we have found the issue and made an automated test to keep it from recurring we try it again, (and again if necessary) with a small cohort of customers. When we are finally happy we ramp the number of users until it is the predominant software. Luckily it is very easy to run [this type of experiment](http://viget.com/extend/split-test-traffic-distribution-with-nginx) with web application software using a load balancer like nginx. This easy:

```
    upstream appServer {
        ip_hash;
        server old.app.com weight=9;
        server new.app.com;
    }
    server {
        listen 80;
        location / {
            proxy_pass http://appServer;
        }
    }

```

If this is copied into the `/etc/nginx/sites-available` folder and soft linked in to the `/etc/nginx/sites-enabled` folder as the first entry alphabetically 9 times the requests will go to old.app.com and the other time the request will go to new.app.com. When I talked about this in class, one of my students made the point that this could frustrate some customers by showing them an intermittent problem. This is partly addressed with the `ip_hash` directive. The rest of addressing the possibility of customer frustration is by letting customers self select at first to see the latest and greatest, possibly by giving them a different url. Even your early adopter/beta customers can be further split into cohorts for testing changes.