# **Callout_Twilio_Twitter**

Program to call multiple numbers and read out Twitter top headline making use of Twilio and Twitter Apis.

Program written in php and deployed on Heroku

## Details

* Callout program (call-out.php) to call a number using Twilio API 
	* 	First built a callout program to call a single number
	* 	Updated to say a custom response message
	* 	Added ability to call multiple numbers simultaneously and read out custom message

* Use Twitter api to get top news story 
	* Built a program (test.php)in php to get top headline on Twitter (@cnnbrk) and display on terminal

* Integrate callout program with Twitter api
	* Passed the top news story gathered through twitter api as TWIML response 
	* Deployed the same on heroku at https://arcane-gorge-8254.herokuapp.com/test.php
	* Pass this url to callout program's parameter

* Schedule task to run at a specific time 
	* Used Heroku scheduler to schedule task to call and read out top headline at specific time (Wednesday 3pm)