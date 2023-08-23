# A SMALL CODE CALLENGE 

### Techs: Javascript and PHP, plus a bit SQL, HTML, CSS, Bootstrap

This represents a small code challenge that was requested of me: it consists of 3 sessions that I will explain in detail:

* In the first session (JS Challenge) I was asked to give feedback to a potential customer of an e-commerce, when he adds an item to
the cart the button should have changed color and given a message

How I tackled the task: I simulated a call to the server with a Set TimeOut and I hung a preloader for the duration of the set
timeout to the DOM, at the end of the time I simulated a cart, hanging a list of fake items. I managed everything with a try catch,
so in case of response errors the user would have feedback.

* Second and third sessions (admin-modul) are together: the task was that the customer of the Web App requests to be able to access an
admin page so as to be able to manage the FAQs of the items, to be able to add, modify or delete them, the FAQs must be connected to
the reference item + the customer requests to be able to access the admin page and be able to manage a page for his team, so that he
can be visible on the main page.

How I approached the task: I created a quick simulation of Showcase (Frontend taken from my previous project), creating a DB
containing items, logged in users, FAQs and members of a fake team. I connected the showcase to the DB so as to make the Web app
dynamic, I created a quick access with connection to an admin section, then a management system where the customer had an overview
of the FAQs and the team and could manage them, the contents are therefore dynamic and are automatically shown on the personal page.

Thank you for this challenge, it was fun even if it was tiring, I had to do everything in a few days, but I was able to take a step
forward and improve my skills.