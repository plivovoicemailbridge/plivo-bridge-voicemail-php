<?php

require 'config.php';
require 'lib/security.php';
require 'lib/plivo.php';

$call_to = htmlspecialchars($_REQUEST['To']);
$call_from = htmlspecialchars($_REQUEST['From']);

$response = new Response();

$gather_body = 'Dial a number, then press the pound key';

$gather_params = array(
    'action' => $script_url.'/dial.php?'.$sec_key.'='.$sec_value,
    'timeout' => '7',
    'digitTimeout' => '3'
);

$record_params = array(
    'startOnDialAnswer' => 'true'
);

$dial_params = array(
    'action' => $script_url.'/voicemail.php?'.$sec_key.'='.$sec_value,
    'timeout' => '21'
);

if($call_from === $main_number):

    $gather = $response->addGetDigits($gather_params);
    $gather->addSpeak($gather_body);

    header("Content-Type: text/xml");
    echo($response->toXML());

else:

    $response->addRecord($record_params);
    $dial = $response->addDial($dial_params);
    $dial->addNumber($main_number);

    header("Content-Type: text/xml");
    echo($response->toXML());

endif;

?>
