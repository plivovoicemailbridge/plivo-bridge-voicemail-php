<?php

if(count(get_included_files()) ==1) {
    header('HTTP/1.0 403 Forbidden');
    exit("Direct access not permitted.");
}

// Random strings for security
$sec_key = 'BzUH8';
$sec_value = '3anuXngVqV';

// Plivo authorization
$auth_id = 'PLIVO_AUTH_ID';
$auth_token = 'PLIVO_AUTH_TOKEN';

// Script location and voicemail mp3
$script_url = 'http://example.com';
$voicemail_url = 'http://example.com/voicemail.mp3';

// Phone numbers
$main_number = '15551234567';
$plivo_number = '19997654321';

// Email settings
$mail_host = 'mail.example.com';
$mail_port = '465';
$mail_address = 'mail@example.com';
$mail_password = '1234567890';

?>
