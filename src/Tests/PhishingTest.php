<?php

namespace Informagenie\Tests;

use PHPUnit\Framework\TestCase;

class PhishingTest extends TestCase
{

	public function testEmailIsSent(){
		$ph = new \Informagenie\Phishing();

		$datas = [
			'my_name' => 'Mbungu ngoma',
			'my_email' => 'hackmmn@gmail.com',
			'subject' => 'Nouveau poisson'];

		$sent = PHPUnitUtil::callMethod($ph, 'mail', $datas);
		$this->assertTrue($sent);
        }

}
