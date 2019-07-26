<?php
echo 1;

//Authentication rest API magento2.Please change url accordingly your url
// $adminUrl='http://technotrends.local/rest/V1/integration/admin/token';
// $ch = curl_init();
// $data = array("username" => "Attacker", "password" => "Internal123");
// $data_string = json_encode($data);
// $ch = curl_init($adminUrl);
// curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
// curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
// curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// curl_setopt($ch, CURLOPT_HTTPHEADER, array(
//     'Content-Type: application/json',
//     'Content-Length: ' . strlen($data_string))
// );
// $token = curl_exec($ch);
// $token=  json_decode($token);
//
// print_r($token);


//Magento admin user data
// $userData = array("username" => "Attacker", "password" => "Internal1234");
// $ch = curl_init("http://technotrends.local/rest/V1/integration/admin/token");
// curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
// curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($userData));
// curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type: application/json", "Content-Length: " . strlen(json_encode($userData))));
//
// $token = curl_exec($ch);
//
// print_r($token);

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "http://technotrends.local/rest/V1/integration/admin/token",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => "{\r\n  \"username\": \"Attacker\",\r\n  \"password\": \"Internal1234\"\r\n}",
  CURLOPT_HTTPHEADER => array(
    "cache-control: no-cache",
    "content-type: application/json",
    // "postman-token: e3deae08-0436-af2d-0449-450720bb7086"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  echo $response;
}
