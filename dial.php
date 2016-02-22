<?php

require 'config.php';
require 'lib/security.php';
require 'lib/plivo.php';

$digits = htmlspecialchars($_REQUEST['Digits']);

$response = new Response();

$record_params = array(
    'startOnDialAnswer' => 'true'
);

$dial_params = array(
    'action' => $script_url.'/hangup.php?'.$sec_key.'='.$sec_value,
    'callerId' => $plivo_number
);

$response->addRecord($record_params);
$dial = $response->addDial($dial_params);
$dial->addNumber('1'.$digits);

header("Content-Type: text/xml");
echo($response->toXML());

?>
