<?php 
namespace App\Helpers;
use App\Models\SMSModel;
use Illuminate\Contracts\Queue\ShouldQueue;

class Helper
{ 

    public static function sendMessage($reciver, $text, $type) {

     
 
        $apiKey = 'igrlK8G7BaluoUkj9Egh';
        $senderId = '8809617615162';

        $url = 'http://bulksmsbd.net/api/smsapi';

        $number =$reciver;
        $message = $text;
        $queryParams = http_build_query([
            'api_key' => $apiKey,
            'type' => 'text',
            'number' => $number,
            'senderid' => $senderId,
            'message' => $message,
        ]);

        $url .= '?' . $queryParams;

        // Initialize cURL session
        $ch = curl_init();

        // Set cURL options
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // Only for testing, remove in production

        // Execute cURL request
        $response = curl_exec($ch);

        // Check for errors
        if (curl_errno($ch)) {
            $error = curl_error($ch);
            curl_close($ch);
            return response()->json(['error' => $error], 500);
        }

        // Close cURL session
        curl_close($ch);


        SMSModel::create([
            'sms_body' => $text,
            'receiver_number' => $reciver,
            'response'=>  json_encode(json_decode($response)),
            'sms_type' => $type
        ]);

        return $response;
    }

}