<?php
/**
 * @file
 * Clears PHP sessions and redirects to the connect page.
 */
 
/* Load and clear sessions */
session_start();
if(isset($_SESSION['oauth_referer'])) {
    $referer = $_SESSION['oauth_referer'];
}
session_destroy();
$_SESSION['oauth_referer'] = $referer;
 
/* Redirect to page with the connect to Twitter option. */
header('Location: ./connect.php');
