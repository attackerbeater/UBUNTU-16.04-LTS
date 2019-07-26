<?php 

$data = array('username' => 'admin', 'password' =>
 'Internal1234');
$data_string = json_encode($data);
$ch = curl_init('http://localhost/lagunabigshoppingstore/rest/V1/integration
 /customer/token');
 curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
 curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
 curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
 curl_setopt($ch, CURLOPT_HTTPHEADER, array(
 'Content-Type: application/json',
 'Content-Length: ' . strlen($data_string))
);
$result = curl_exec($ch);

echo '<pre>';
print_r($result);
echo '<pre/>';