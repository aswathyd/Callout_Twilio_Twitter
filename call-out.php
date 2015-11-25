<?php
    // Include the Twilio PHP library
    require 'twilio-php/Services/Twilio.php';
 
    // Twilio REST API version
    $version = "2010-04-01";
 
    // Setting Account SID and AuthToken
    $sid = 'AC839877b1d952651b4a951d2b0bbc66c6';
    $token = 'e994020278ec5f4570293d5cb36e60ae';
     
    // A phone number previously validated with Twilio
    $phonenumber = '+15309243291';

    //The phone numbers of the people to be called
   $participants = array('+19783024998','+13868529262','+15082159392');
     
    // Instantiate a new Twilio Rest Client
    $client = new Services_Twilio($sid, $token, $version);

     foreach ($participants as $participant)
     {
        try {
        // Initiate a new outbound call
        $call = $client->account->calls->create(
            $phonenumber, // The number of the phone initiating the call
            $participant, // The number of the phone receiving call 
            'https://arcane-gorge-8254.herokuapp.com/test.php' // The URL Twilio will request when the call is answered
        );
        echo 'Started call: ' . $call->sid;
    } catch (Exception $e) {
        echo 'Error: ' . $e->getMessage();
    }
}
  
   
 
    

    