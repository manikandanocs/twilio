<?php 

namespace Oclock\TwilioMessenger;

use Twilio\Rest\Client;
use Illuminate\Support\Facades\Http;

class TwilioService
{
    protected $sid;
    protected $token;
    protected $client;
    protected $from_phone_number;
    protected $from_whatsapp;
    /**
     * Constractor
     * 
     * @return void
     */
    public function __construct()
    {
        $this->sid = config('twilio.twilio_sid');
        $this->token = config('twilio.twilio_token');
        $this->from_phone_number = config('twilio.twilio_phone_number');
        $this->from_whatsapp    = "whatsapp:".config('twilio.twilio_whatsapp');
        $this->client = new Client($this->sid, $this->token);
    }

    /**
     * Send SMS
     * 
     * @param string $to_phone_number
     * @param string $message
     */
    public function sendSMS($to_phone_number, $message)
	{
		try {
			$result = $this->client->messages->create(
			    $to_phone_number,
			    [
			        "from" => $this->from_phone_number,
			        "body" => $message
			    ]
			);
			$result = ['success' => true, 'data' => $result];

		} catch(\Exception $e) {
			$result = ['success' => false, 'data' => $e->getMessage()];
		}
		return $result;
	}


    /**
     * Send Whatsapp Message;
     * 
     * @param string $to_phone_number
     * @param string $message
     */
    public function sendWhatsapp($to_phone_number, $message, $media = '')
	{
        $body  = [
            "from" => $this->from_whatsapp,
            "body" => $message,
        ];
        if($media){
            $body["MediaUrl"] = $media;
        }
		try {
			$result = $this->client->messages->create(
			    "whatsapp:".$to_phone_number,
			     $body
			);
			$result = ['success' => true, 'data' => $result];

		} catch(\Exception $e) {
			$result = ['success' => false, 'data' => $e->getMessage()];
		}
		return $result;
	}
}