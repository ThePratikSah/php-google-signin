<?php  

include 'config.php';

// reset oauth token
$google_client->revokeToken();

// destroy entire session data
session_destroy();

// redirect page to index.php
header('location:index.php');

?>