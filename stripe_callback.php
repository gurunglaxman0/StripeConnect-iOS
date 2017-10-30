<?php
ini_set('display_errors',  true);
define('CLIENT_KEY', 'client_key'); // You can get it from https://dashboard.stripe.com/account/apikeys
define('CLIENT_SECRET', 'client_secret'); // You can get it from  https://dashboard.stripe.com/account/applications/settings

if (isset($_GET['code'])) { 
  $code = $_GET['code'];

  $token_request_body = array(
    'grant_type' => 'authorization_code',
    'client_id' => '',
    'code' => $code,
    'client_secret' => CLIENT_SECRET
  );

  $req = curl_init('https://connect.stripe.com/oauth/token');
  curl_setopt($req, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($req, CURLOPT_POST, true );
  curl_setopt($req, CURLOPT_POSTFIELDS, http_build_query($token_request_body));

  // TODO: Additional error handling
  $respCode = curl_getinfo($req, CURLINFO_HTTP_CODE);

  $resp =  curl_exec($req);

    echo "<div id='json'>" . $resp . "</div>";
  	curl_close($req);
} else if (isset($_GET['error'])) { // Error
  echo $_GET['error_description'];
} else { // Show OAuth link
  $authorize_request_body = array(
    'response_type' => 'code',
    'scope' => 'read_write',
    'client_id' => CLIENT_KEY
  );
  $url = 'https://connect.stripe.com/oauth/authorize' . '?' . http_build_query($authorize_request_body);
  header('Location: '. $url);
}