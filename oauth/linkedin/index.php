<?php
// Change these
define('API_KEY',      '75sahsj3k7fe6t'                                             );
define('API_SECRET',   '3p90m1EzCHnvUv1h'                                           );
define('REDIRECT_URI', 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['SCRIPT_NAME']);
define('SCOPE',        'r_basicprofile r_emailaddress'         						);

// You'll probably use a database
session_name('linkedin');
session_start();

if(isset($_SERVER['HTTP_REFERER'])) {
	$_SESSION['oauth_referer'] = $_SERVER['HTTP_REFERER'];
} else {
	$_SESSION['oauth_referer'] = 'http://'.$_SERVER["HTTP_HOST"];
}

// OAuth 2 Control Flow
if (isset($_GET['error'])) {
	// LinkedIn returned an error
	print $_GET['error'] . ': ' . $_GET['error_description'];
	exit;
} elseif (isset($_GET['code'])) {
	// User authorized your application
	if ($_SESSION['state'] == $_GET['state']) {
		// Get token so you can make API calls
		getAccessToken();
	} else {
		// CSRF attack? Or did you mix up your states?
		exit;
	}
} else { 
	if ((empty($_SESSION['expires_at'])) || (time() > $_SESSION['expires_at'])) {
		// Token has expired, clear the state
		$_SESSION = array();
	}
	if (empty($_SESSION['access_token'])) {
		// Start authorization process
		getAuthorizationCode();
	}
}

// Congratulations! You have a valid token. Now fetch your profile 
$user = fetch('GET', '/v1/people/~:(firstName,lastName,emailAddress,id)');
$_SESSION['oauth_user']['id'] = $user->id;
$_SESSION['oauth_user']['name'] = $user->firstName." ".$user->lastName;
$_SESSION['oauth_user']['email'] = $user->emailAddress;
$_SESSION['oauth_user']['type'] = 3;
header('Location:http://'.$_SERVER["HTTP_HOST"].'/appuser/');
exit;

function getAuthorizationCode() {
	$params = array('response_type' => 'code',
					'client_id' => API_KEY,
					'scope' => SCOPE,
					'state' => uniqid('', true), // unique long string
					'redirect_uri' => REDIRECT_URI,
			  );

	// Authentication request
	$url = 'https://www.linkedin.com/uas/oauth2/authorization?' . http_build_query($params);
	
	// Needed to identify request when it returns to us
	$_SESSION['state'] = $params['state'];

	// Redirect user to authenticate
	header("Location: $url");
	exit;
}
	
function getAccessToken() {
	$params = array('grant_type' => 'authorization_code',
					'client_id' => API_KEY,
					'client_secret' => API_SECRET,
					'code' => $_GET['code'],
					'redirect_uri' => REDIRECT_URI,
			  );
	
	// Access Token request
	$url = 'https://www.linkedin.com/uas/oauth2/accessToken?' . http_build_query($params);
	
	// Tell streams to make a POST request
	$context = stream_context_create(
					array('http' => 
						array('method' => 'POST',
	                    )
	                )
	            );

	// Retrieve access token information
	$response = file_get_contents($url, false, $context);

	// Native PHP object, please
	$token = json_decode($response);

	// Store access token and expiration time
	$_SESSION['access_token'] = $token->access_token; // guard this! 
	$_SESSION['expires_in']   = $token->expires_in; // relative time (in seconds)
	$_SESSION['expires_at']   = time() + $_SESSION['expires_in']; // absolute time
	
	return true;
}

function fetch($method, $resource, $body = '') {
	$params = array('oauth2_access_token' => $_SESSION['access_token'],
					'format' => 'json',
			  );
	
	// Need to use HTTPS
	$url = 'https://api.linkedin.com' . $resource . '?' . http_build_query($params);
	// Tell streams to make a (GET, POST, PUT, or DELETE) request
	$context = stream_context_create(
					array('http' => 
						array('method' => $method,
	                    )
	                )
	            );


	// Hocus Pocus
	$response = file_get_contents($url, false, $context);

	// Native PHP object, please
	return json_decode($response);
}

?>