<?php  

// include google client library for php autoload file
require_once 'vendor/autoload.php';

// make object of google API client
$google_client = new Google_Client();

// set google oauth client ID
$google_client->setClientId('56109275176-3t0s4t70ot7smt8gq4jarad162uqn0vm.apps.googleusercontent.com');

// set google oauth client secret key
$google_client->setClientSecret('oL3kMH2wZsYVHxz6VdiH5Anx');

// set google oauth redirect uri
$google_client->setRedirectUri('http://localhost/php-learning/index.php');

// to get email and profile
$google_client->addScope('email');
$google_client->addScope('profile');

// start session on web page
session_start();

?>