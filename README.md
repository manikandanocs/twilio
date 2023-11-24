# Twilio Messenger

This is sample Laravel Package to be used to use twilio/sdk services

## Getting started

`composer require oclock/twilio-messenger`

## Update .ENV 
```env
TWILIO_SID=xxxxxxxxxxxx
TWILIO_TOKEN=xxxxxxxxxx
TWILIO_FROM_NUMBER=+xxxxxx
TWILIO_WHATSAPP=+xxxxxxx
```

## Add the below code to app.php under service prodiver if not discovered automatically in Lower versions of laravel 

```php
Oclock\TwilioMessenger\TwilioServiceProvider::class
```

## Sample Code
```php
namespace App\Http\Controllers; 

use Illuminate\Http\Request; 
use Oclock\TwilioMessenger\TwilioService; 

class HomeController extends Controller 
{
    //
    public function index(Request $request, TwilioService $twilio)
    {
        if($request->phonenumber && $request->message){
            $media = 'Your media url';
            $send =  $twilio->sendWhatsapp($request->phonenumber, $request->message, $media);
        }
        
    }
}
```

