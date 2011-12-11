<?php

return array(
	'files' => array(
		'users' => __DIR__.'/htusers' // The file where the users are stored in. This users are managed and are the only one who can login here.
	),
	'firewall' => array(
		'acceptEncryptionClasses' => array(
			'EncryptionCrypt',
			'EncryptionMd5',
			//'EncryptionPlainText', Please only enable if really needed
		),
		'admin' => 'admin' // Which user should have admin-rights?
	),
	'userController' => array(
		'savePasswordEncryptionClass' => 'EncryptionCrypt' // You can also use EncryptionPlainText or EncryptionMd5
	)
);