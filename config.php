<?php


require_once 'vendor/autoload.php';

if (!session_id()) {
  session_start();
}

$facebook = new Facebook\Facebook([
    'app_id' => '918447432015781', // replace your app_id
    'app_secret' => '87b03114b98e90cf514fee50d0e09a8c',   // replace your app_scsret
    'default_graph_version' => 'v2.10'
        ]);
 ?>
