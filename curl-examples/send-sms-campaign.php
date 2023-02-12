<?php

$payload = [
    'recipients' => [
        [
            'phone_number' => '+201022769785',
            'param1' => 'John'
        ],
    ],
    'text' => 'Hello {param1}. STOP au XXXXX @THE_PHARAOHSS',
    'type' => 'sms_premium',
    'purpose' => 'wholesale',
    'sender' => 'THE PHARAOH',
    'send_at' => '2020-10-03T07:42:39-07:00',
    'with_replies' => false,
];

/*
{
    "recipients":[{"phone_number":"+201022769785","param1":"John"}],
    "text":"Hello {param1}. STOP au XXXXX",
    "type":"sms_premium",
    "purpose":"wholesale",
    "sender":"SMS",
    "send_at":"2020-10-03T07:42:39-07:00",
    "with_replies":false
}
 */
$jsonEncodedPayload = json_encode($payload);

$curl = curl_init();

curl_setopt_array(
    $curl,
    [
        CURLOPT_URL => 'https://api.octopush.com/v1/public/sms-campaign/send',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => $jsonEncodedPayload,
        CURLOPT_HTTPHEADER => [
            'Content-Type: application/json',
            'api-key: 0ImhFxnpGELVboQWBrzavf7T9yqwOeU4',
            'api-login:  xa7medbodax@gmail.com',
            'cache-control: no-cache'
        ],
    ]
);

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
    echo 'cURL Error #:'.$err;
} else {
    echo $response;
    // {"sms_ticket":"sms_5f6c4ba715694","number_of_contacts":1,"total_cost":0.062}
}
