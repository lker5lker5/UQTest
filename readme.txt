==============================================================================
Kaner Lu: 0450370715

Get the source code and live test

Source Code: 
    => https://github.com/lker5lker5/UQTest.git

Host On Web Server:
    => http://uqtest-kaner.rhcloud.com/index.php


Problems Solved:
    => P3. Largest Prime Factor (shown as Q1 on the web)
    => P5. Smallest Multiple    (shown as Q2 on the web)
    => P7. 10001st prime
       |
       |——> The reason I chose this one is because when I was solving P3, I 
       |    wrote a function to test whether a given number is prime or not.
       |    So, I can reuse that part of code to solve P7, and that’s the reason
       |    why I chose calculating 10001st prime.

Assumption:
    => The website is not only to show answers, but also is important to 
       show visitors the way I thought to solve these problems; so in the future,
       it can be further extended to become a forum to sharpen problem solving
       skills

==============================================================================
1. Basic Structure
------------------------------------------------------------------------------
/
|—> index.php (homepage)
|-> admin.php (admin page)
|-> assets/
|    |-> css/ (stylesheets)
|    |-> js/  (js/jq scripts)
|    |-> img/ (related images)
|
|-> dataHandler/
|    |-> * dbCfg.php (mysql connection config)
|    |-> createDBAndTable.sql (the scripts for creating DB and tables)
|    |-> controllers/
|	|-> all those files dealing with logics
|    |-> models/
|	|-> files directly interact with the DB
|
|-> views/
|    |-> font-end components

==============================================================================
2. Quick Setup 
------------------------------------------------------------------------------
Basically, what you only need to modify is the dbCfg.php, change values 
accordingly:

$dbcfg = array(
    'dbhost'  =>  ‘localhost:8889’, //db's host
    'dbuser'  =>  ‘root’, // db's username
    'dbpwd'   =>  ‘root’, // db's
    'dbname'  =>  'pro_sol', //the db we want to use
); 

———>2.1. Setup locally
    
    a. For example, I set up the application on Mac, and I have PHP and installed,
       You can just place the entire folder into ~/Sites (Sites folder by de-
       fault is not created, you need to create by yourself);after that, you can
       visit in my case localhost/~vinson/UQTest/index.php.
    
    b. If you are using integerated developing environment, you just need to place
       the folder to that specific folder. On my machine, I have MAMP installed (
       with APACHE and MySQL deployed), I can move the whole folder to “htdocs” (
       /Applications/MAMP/htdocs), and you can visit, in this case,
       http://localhost:8888/UQTest/

———>2.2. Setup on host server
    
    You can simply upload to the target folder depending on which server you are 
    going to host the web application.

    *=> when hosting on the web sever, it is better to add /index.php at
        the end of the url when you try to visit the site, 
	i.e.http://uqtest-kaner.rhcloud.com/index.php

==============================================================================
3. Technologies
------------------------------------------------------------------------------

     3.1 Backend development

     I did not use any framework to simplify the development. (PHP + MySQL)

     3.2 Front-end development
         a. HTML5
	 b. CSS3 (partially)
	*c. Bootstrap:
	    |-> The main reason I adopted Bootstrap is that I want to make the web
	    |	responsive;
	    |-> and I don’t need to pay too much time on some basic styling, such 
	    |   as forms, inputs and buttons (mainly for these tags)
	 
	 d. Javascript/jQuery:
	    |-> for the first several days, I used purely Javascript;
	    |-> For later, I adopted jQuery, because I do reckon adding attributes 
	    |   like “onclick” etc. is not a wise option, although I added some.
	    |-> It is a pity I didn’t apply ReactJS; otherwise, the js part could
	    |   be more stable with better scalability.

	 e. Git:
	    |-> The whole development process can be checked on my github repository

==============================================================================
4. Additional functionality
------------------------------------------------------------------------------

For testing each function’s performance, I also make it show the execution time.
At this stage, the performance is fairly acceptable to me, and it is probably 
because testing implemented by myself is not sufficient and “creative” enough.
However, in the future, when more and more people come to crash the system, we 
will notice the code is not efficient to solve some problems; thus, we can further
examine the code part to further improve it. 

I did implement the login and administrative functions. However, it is not about
editing the problem statements, but I did similar functions, which are inserting
new normal users, updating the current administrator’s password, and deleting 
exist normal user records, because I could not think of a better way to efficiently
implement the functions editing the problems by just clicking some buttons in such
a short period of time.
