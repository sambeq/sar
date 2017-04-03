<?php
session_start();

//Include Google client library 
include_once 'src/Google_Client.php';
include_once 'src/contrib/Google_Oauth2Service.php';

/*
 * Configuration and setup Google API
 */
$clientId = '716687190384-tqf1s4l84ogtpsk32rqu8kl8k0sjr7tf.apps.googleusercontent.com'; //Google client ID
$clientSecret = 'hBmSCCJbbBYlAjU0bH70mjqB'; //Google client secret
$redirectURL = 'http://localhost/sar/en/'; //Callback URL

//Call Google API
$gClient = new Google_Client();
$gClient->setApplicationName('Login to CodexWorld.com');
$gClient->setClientId($clientId);
$gClient->setClientSecret($clientSecret);
$gClient->setRedirectUri($redirectURL);

$google_oauthV2 = new Google_Oauth2Service($gClient);
?>