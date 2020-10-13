<?php  

include 'config.php';

$login_btn = '';

if (isset($_GET['code'])) {

	// fetching the token
	$token = $google_client->fetchAccessTokenWithAuthCode($_GET['code']);

	// check for any error while 
	if (!isset($token['error'])) {
		
		// set access token used for requests
		$google_client->setAccessToken($token['access_token']);


		// store access token in session for future use
		$_SESSION['access_token'] = $token['access_token'];

		// create object of google service oauth2 class
		$google_service = new Google_Service_Oauth2($google_client);

		// get user profile data from google
		$data = $google_service->userinfo->get();

		// find profile data and store it in session variable
		if (!empty($data['given_name'])) {
			$_SESSION['fname'] = $data['given_name'];
		}

		if (!empty($data['family_name'])) {
			$_SESSION['lname'] = $data['family_name'];
		}

		if (!empty($data['email'])) {
			$_SESSION['email'] = $data['email'];
		}

		if (!empty($data['picture'])) {
			$_SESSION['picture'] = $data['picture'];
		}

	}

}

// check of the user is logged in using google account.
if (!isset($_SESSION['access_token'])) {
	$login_btn = '<a href="'.$google_client->createAuthUrl().'">Login with Google</a>';
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Google Login</title>
</head>
<body>
	
	<?php if ($login_btn == '') {
		
		// if login btn is blank string, it means we have the auth token

	?>

	<div>
		<h1>Welcome to Google Profile</h1>
		<p>Name: <?php echo $_SESSION['fname']; ?></p>
		<p>Email: <?php echo $_SESSION['email']; ?></p>
		<img src="<?php echo $_SESSION['picture']; ?>">
		<a href="logout.php">Logout</a>
	</div>


	<?php } else { ?>

		<!-- we don't have the auth token, we need to login the user -->
		<div>
			<?php echo($login_btn); ?>
		</div>

	<?php } ?>

</body>
</html>