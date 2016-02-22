<?php

require 'config.php';
require 'lib/security.php';
require 'lib/plivo.php';

$dial_status = htmlspecialchars($_REQUEST['DialStatus']);

$response = new Response();

if($dial_status === 'timeout' || $dial_status === 'no-answer'):

    $response->addPlay($voicemail_url);
    $response->addRecord(
        array(
            'action' => $script_url.'/send.php?'.$sec_key.'='.$sec_value,
            'maxLength' => '90',
            'finishOnKey' => '#'
        ));

    header("Content-Type: text/xml");
    echo($response->toXML());

else:

    $response->addRedirect($script_url.'/hangup.php?'.$sec_key.'='.$sec_value);

    header("Content-Type: text/xml");
    echo($response->toXML());

endif;

?>
