<?php
/**
 * Copyright 2011 Facebook, Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License"); you may
 * not use this file except in compliance with the License. You may obtain
 * a copy of the License at
 *
 *     http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS, WITHOUT
 * WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the
 * License for the specific language governing permissions and limitations
 * under the License.
 */
session_start();
require 'facebook.php';

if(isset($_SERVER['HTTP_REFERER'])) {
  $_SESSION['oauth_referer'] = $_SERVER['HTTP_REFERER'];
}else{
  $_SESSION['oauth_referer'] = 'http://'.$_SERVER["HTTP_HOST"];
}

// Create our Application instance (replace this with your appId and secret).
$facebook = new Facebook(array(
  'appId'  => '603517049713705',
  'secret' => 'd52267acdcd923c247c805347fe3f6df',
));

// Get User ID
$user = $facebook->getUser();

// We may or may not have this data based on whether the user is logged in.
//
// If we have a $user id here, it means we know the user is logged into
// Facebook, but we don't know if the access token is valid. An access
// token is invalid if the user logged out of Facebook.

if ($user) {
  try {
    // Proceed knowing you have a logged in user who's authenticated.
    $user_profile = $facebook->api('/me');
  } catch (FacebookApiException $e) {
    error_log($e);
    $user = null;
  }
}

// Login or logout url will be needed depending on current user state.
if ($user) {
  $logoutUrl = $facebook->getLogoutUrl();
} else {
  $statusUrl = $facebook->getLoginStatusUrl();
  $loginUrl = $facebook->getLoginUrl(array("scope"=>"email"));
}

if($user) {
    $_SESSION['oauth_user'] = $user_profile;
    $_SESSION['oauth_user']['type'] = 1;
    header('Location:http://'.$_SERVER["HTTP_HOST"].'/appuser/');
} else {
  header("Location:".$loginUrl);
}

?>
