<?php
session_start();

//Include Facebook SDK
require_once 'inc/facebook.php';

/*
 * Configuration and setup FB API
 */
$appId = '405746949756628'; //Facebook App ID
$appSecret = '5ced5f22a2a3bad456f4c37ac405d7fb'; // Facebook App Secret
$redirectURL = 'http://localhost/sar/facebook/'; // Callback URL
$fbPermissions = 'email';  //Required facebook permissions

//Call Facebook API
$facebook = new Facebook(array(
  'appId'  => $appId,
  'secret' => $appSecret
));
$fbUser = $facebook->getUser();
?>