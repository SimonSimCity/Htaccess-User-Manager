<?php

require_once __DIR__ . "/UserManager.php";
require_once __DIR__ . "/UserController.php";
require_once __DIR__ . "/Firewall.php";

$config = require __DIR__."/config.php";
$userManager = new UserManager($config['files']['users']);
$firewall = new Firewall();

if (!$firewall->isAutenticated()) {
	header("HTTP/1.1 401 Authorization Required");
	header('WWW-Authenticate: Basic realm="Please login"');
	die();
}

if (!isset($_GET['action']))
	$_GET['action'] = '';

switch($_GET['action']) {

	case 'updatePassword':
		$controller = new UserController();
		$controller->updatePassword();
		break;

	case 'listUsers':
		$controller = new UserController();
		$controller->index();
		break;

	case 'changePassword':
	default:
		$controller = new UserController();
		$controller->editPassword();
}