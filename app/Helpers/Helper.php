<?php 
namespace App\Helpers;
use App\Models\SMSModel;
use Illuminate\Contracts\Queue\ShouldQueue;

class Helper
{ 

    public static function sendMessage($receiver, $text, $type)
{
    $apiKey   = 'S52hHvOvP2rAEm2AUeQp';
    $senderId = '8809617615541';
    $url      = 'http://bulksmsbd.net/api/smsapi';

            $queryParams = http_build_query([
            'api_key'  => $apiKey,
            'type'     => 'text',
            'number'   => $receiver,
            'senderid' => $senderId,
            'message'  => $text, // remove urlencode()
        ]);


    $ch = curl_init($url . '?' . $queryParams);

    curl_setopt_array($ch, [
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_SSL_VERIFYPEER => false,
        CURLOPT_CONNECTTIMEOUT => 10,
        CURLOPT_TIMEOUT        => 20,
    ]);

    $response = curl_exec($ch);

    // Save response even if failed
    SMSModel::create([
        'sms_body'        => $text,
        'receiver_number' => $receiver,
        'response'        => $response ?: curl_error($ch),
        'sms_type'        => $type
    ]);

    curl_close($ch);

    return $response;
}


}