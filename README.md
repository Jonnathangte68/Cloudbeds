# Cloudbeds

Answer By: Jonnathan Guarate


# Installation

Download and extract to you web server directory 

then access by path (URL):

(webserver or localhost) /IntervalProject/Main.php

# TEST CASES 

CASE 1:



Step
Operation
Result

1
Add (1-10:15)
(1-10:15)

2
Add (5-20:15)
(1-20:15)

3
Add (2-8:45)
(1-1:15), (2-8:45), (9-20:15)

4
Add (9-10:45)
(1-1:15), (2-10:45), (11-20:15)


CASE 2:



Step
Operation
Result

1
Add (1-5:15)
(1-5:15)

2
Add (20-25:15)
(1-5:15), (20-25:15)

3
Add (4-21:45)
(1-3:15), (4-21:45), (22-25:15)

4
Add (3-21:15)
(1-25:15)
