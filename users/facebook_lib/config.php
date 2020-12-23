<?php

require_once 'vendor/autoload.php';

if (!session_id())
{
    session_start();
}

// Call Facebook API

$facebook = new \Facebook\Facebook([
  'app_id'      => '416385666171299',
  'app_secret'     => '7a0181b4aafdcfbb9adf7d602a636102',
  'default_graph_version'  => 'v2.3'
]);

?>
