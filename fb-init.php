<?php

//start the session


//include autoload file from vendor folder
require './vendor/autoload.php';


$fb = new Facebook\Facebook([
    'app_id' => '623571614991315', // replace your app_id
    'app_secret' => '5d64c546b7434eb22aba0b3d7f3cd9e7',   // replace your app_scsret
    'default_graph_version' => 'v2.7'
        ]);


$helper = $fb->getRedirectLoginHelper();
$login_url = $helper->getLoginUrl("http://localhost/fb-login/");

try {

    $accessToken = $helper->getAccessToken();
    if (isset($accessToken)) {
        $_SESSION['access_token'] = (string) $accessToken;  //conver to string
        //if session is set we can redirect to the user to any page
        header("Location:index.php");
    }
} catch (Exception $exc) {
    echo $exc->getTraceAsString();
}


//now we will get users first name , email , last name
if (isset($_SESSION['access_token'])) {

    try {

        $fb->setDefaultAccessToken($_SESSION['access_token']);
        $res = $fb->get('/me?locale=en_US&fields=name,email');
        $user = $res->getGraphUser();
        echo 'Hello, ',$user->getField('name');

    } catch (Exception $exc) {
        echo $exc->getTraceAsString();
    }
}
