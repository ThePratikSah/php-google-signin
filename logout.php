<?php  

include ('config.php');

$accesstoken = $_SESSION['access_token'];

// reset oauth token
$google_client->revokeToken($accesstoken);

// destroy entire session data
session_destroy();

// redirect page to index.php
header('location:index.php');

?>