<?php

require 'config.php';
require 'lib/security.php';
require 'lib/plivo.php';
require 'lib/class.phpmailer.php';
require 'lib/class.smtp.php';

$recording_url = htmlspecialchars($_REQUEST['RecordUrl']);
$call_from = htmlspecialchars($_REQUEST['From']);
$call_status = htmlspecialchars($_REQUEST['CallStatus']);

$response = new Response();

if($call_status === 'completed'):

    $mailer = new PHPMailer(true);
    $mailer->IsSMTP();
    $mailer->SMTPSecure = 'ssl';
    $mailer->Host = $mail_host;
    $mailer->Port = $mail_port;
    $mailer->SMTPAuth = true;
    $mailer->Username = $mail_address;
    $mailer->Password = $mail_password;
    $mailer->SetFrom($mail_address, $mail_address);
    $mailer->AddAddress($mail_address);
    $mailer->Subject = 'Voicemail from '.$call_from;
    $mailer->Body = 'Listen: '.$recording_url;
    $mailer->Send();

    $response->addHangup();

    header("Content-Type: text/xml");
    echo($response->toXML());

else:;

    $response->addHangup();

    header("Content-Type: text/xml");
    echo($response->toXML());

endif;

?>
