<?php

namespace app\components;

class MailerComponent extends \yii\symfonymailer\Mailer
{
	const TRANSPORT = [
		// LIVE
		'scheme' => 'smtps',
		'host' => 'matt1820.org',
		'username' => '',
		'password' => '',
		'port' => 465,
	];

	public $useFileTransport = true;

// public function init()
// {
// 	parent::init();
// 	$this->setTransport(self::TRANSPORT);
// }
}