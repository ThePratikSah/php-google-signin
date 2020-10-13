<?php  

// include google client library for php autoload file
require_once 'vendor/autoload.php';

// make object of google API client
$google_client = new Google_Client();

// set google oauth client ID
// enter your google client id here
$google_client->setClientId('your-client-id-here-apps.googleusercontent.com');

// set google oauth client secret key
// enet your google oauth client secret key here
$google_client->setClientSecret('client-secret-here-xz6VdiH5Anx');

// set google oauth redirect uri
$google_client->setRedirectUri('http://localhost/php-learning/index.php');

// to get email and profile
$google_client->addScope('email');
$google_client->addScope('profile');

// start session on web page
session_start();

?>