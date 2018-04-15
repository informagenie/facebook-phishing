<?php

require_once __DIR__.'/vendor/autoload.php';

$detect = new Mobile_Detect();

$platform = $detect->isMobile() ? 'mobile' : 'web';

require_once __DIR__.'/platform/'.$platform. '.php';

