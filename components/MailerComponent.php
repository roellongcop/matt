<?php

namespace app\components;

class MailerComponent extends \yii\symfonymailer\Mailer
{
	const TRANSPORT = [
        'scheme' => 'smtps',
        'host' => '',
        'username' => '',
        'password' => '',
        'port' => 465,
        'dsn' => 'native://default',
    ];

	public $useFileTransport = true;

	// public function init()
	// {
	// 	parent::init();
	// 	$this->setTransport(self::TRANSPORT);
	// }
}