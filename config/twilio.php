<?php

return [
    /*
    | ------------------------------------------------------------------------
    | SMS 
    | ------------------------------------------------------------------------
    | TWILIO Credential
    */
    'twilio_sid'          => env('TWILIO_SID','XXXX'),
    'twilio_token'        => env('TWILIO_TOKEN','XXXX'),
    'twilio_phone_number' => env('TWILIO_FROM_NUMBER','+XXXX'),
    'twilio_whatsapp'     => env('TWILIO_WHATSAPP','+XXXX')
];