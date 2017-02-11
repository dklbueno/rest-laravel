<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

<?php

//next example will insert new conversation
$service_url = 'http://localhost/rest-laravel/public/api/user';
$curl = curl_init($service_url);
$curl_post_data = array(
        'first_name' => 'Karina',
        'last_name' => 'de Oliveira Bueno',
        'email' => 'karinacbueno@gmail.com',
        'password' => '123',
        'city' => 'Suzano',
        'state' => 'SP'
);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, $curl_post_data);
$curl_response = curl_exec($curl);
if ($curl_response === false) {
    $info = curl_getinfo($curl);
    curl_close($curl);
    die('error occured during curl exec. Additioanl info: ' . var_export($info));
}
//echo "<pre>"; print_r($curl_response); exit;
curl_close($curl);
$decoded = json_decode($curl_response);
if (isset($decoded->response->status) && $decoded->response->status == 'ERROR') {
    die('error occured: ' . $decoded->response->errormessage);
}
echo 'response ok!';
var_export($decoded->response);