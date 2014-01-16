<?php
/**
 * @file
 * User has successfully authenticated with Twitter. Access tokens saved to session and DB.
 */

/* Load required lib files. */
session_start();
require_once('twitteroauth/twitteroauth.php');
require_once('config.php');

if(isset($_SERVER['HTTP_REFERER'])) {
	$_SESSION['oauth_referer'] = $_SERVER['HTTP_REFERER'];
} else {
	$_SESSION['oauth_referer'] = 'http://'.$_SERVER["HTTP_HOST"];
}

/* If access tokens are not available redirect to connect page. */
if (empty($_SESSION['access_token']) || empty($_SESSION['access_token']['oauth_token']) || empty($_SESSION['access_token']['oauth_token_secret'])) {
    header('Location: ./clearsessions.php');
    exit;
}
/* Get user access tokens out of the session. */
$access_token = $_SESSION['access_token'];

/* Create a TwitterOauth object with consumer/user tokens. */
$connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, $access_token['oauth_token'], $access_token['oauth_token_secret']);

if($connection) {
    $content = $connection->get('account/verify_credentials');
    $_SESSION['oauth_user']['id'] = $content->id;
    $_SESSION['oauth_user']['name'] = $content->name;
    $_SESSION['oauth_user']['type'] = 2;
    header('Location:http://'.$_SERVER["HTTP_HOST"].'/appuser/');
}
/* If method is set change API call made. Test is called by default. */