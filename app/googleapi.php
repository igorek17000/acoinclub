<?php

require '../vendor/autoload.php';
require "./Apis/database/DataBase.php";
require "../domain.php";
// client id =767950210192-1sa950ja845v2dt90m41442habhui9bb.apps.googleusercontent.com
// client screte=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
 $clientID = DataBase::getApiPublic("google")??"818881695167-96f0chbv1pctnltdcf2n8kunrkctqei3.apps.googleusercontent.com";
  $clientSecret =DataBase:: getApiPrivate("google")??"rdquOpaJHjbW3Qkbs-6tM97G";
  $redirectUri =MYURL+"app/googleapi.php";

$client = new Google_Client();
$client->setClientId($clientID);
$client->setClientSecret($clientSecret);
$client->setRedirectUri($redirectUri);
$client->addScope("email");
$client->addScope("profile");


if (isset($_GET['code']) and !empty($_GET['code'])) {
    $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
    $client->setAccessToken($token['access_token']);
    $client=$client->getOAuth2Service();
    print($client->getUsername());
    // $this->m_oauth = $this->m_client->getOAuth2Service();

    // // // get profile info
    // $google_oauth = new Google_Service_Oauth2($client);
    // $google_account_info = $google_oauth->userinfo->get();
    // $email = $google_account_info->email;
    // $name = $google_account_info->name;
    // $gender = $google_account_info->gender;
    // $image = $google_account_info->picture;
    // $id = $google_account_info->id;

    //  $locale = DataBase::ip_visitor_country()??"not set";
  
    // $isActive = DataBase::signin_user($email, $id);

    // if ($isActive==true) {
    //     header("location:../client");
    // } else {
    //     $valu = DataBase::google_register($name, $email, $id, $locale, $image, $gender, $id);
        
    //     if($valu=="true"){
    //       header("location:../client"); 
    //     }else{
    //         $_SESSION['message']=$valu;
    //         header("location:../login");

    //     }
    // }

    // now you can use this profile info to create account in your website and make user logged in.
} else {
    
    // header("location:../login");
}

?>