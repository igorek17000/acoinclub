<?php
require 'vendor/autoload.php';


// require "domain.php";
$clientID = "767950210192-1sa950ja845v2dt90m41442habhui9bb.apps.googleusercontent.com";
$clientSecret ="screte=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";
$redirectUri =MYURL+"app/googleapi.php";

$client = new Google_Client();
$client->setClientId($clientID);
$client->setClientSecret($clientSecret);
$client->setRedirectUri($redirectUri);
$client->addScope("email");
$client->addScope("profile");


?>