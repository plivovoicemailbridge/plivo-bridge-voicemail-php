<?php

require 'config.php';
require 'lib/security.php';
require 'lib/plivo.php';

$response = new Response();

$response->addHangup();

header("Content-Type: text/xml");
echo($response->toXML());

?>
