<?php
$url = "https://www.google.com/recaptcha/api/siteverify";
$data = [
  'secret' => "6LeOJYYcAAAAAIUfSLK8h8VwLiqxYoPL9xgF5RKa", /*your secret key */
  'response' => $_POST['token'],
  'remoteip' => $_SERVER['REMOTE_ADDR']
];

$options = array(
  'http' => array(
    'header' => "Content-type: application/x-www-form-urlencoded\r\n",
    'method' => 'POST',
    'content' => http_build_query($data)
  )
);

$context = stream_context_create($options);
$response = file_get_contents($url, false, $context);
/*convert json */
$res = json_decode($response, true);
print_r($res);

?>