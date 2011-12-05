<?php

return array(
	'files' => array(
		'users' => __DIR__.'/htusers' // The file where the users are stored in. This users are managed and are the only one who can login here.
	),
	'firewall' => array(
		'admin' => 'admin' // Which user should have admin-rights?
	)
);