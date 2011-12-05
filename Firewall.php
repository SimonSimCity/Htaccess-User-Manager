<?php

require_once __DIR__ . "/UserManager.php";

class Firewall {

	/**
	 * @return bool
	 */
	public function isAutenticated() {
		global $userManager;

		return
				array_key_exists('PHP_AUTH_USER', $_SERVER) && array_key_exists('PHP_AUTH_PW', $_SERVER) &&
				$userManager->userExists($_SERVER['PHP_AUTH_USER']) &&
				$userManager->getCurrentUser()->getPassword() === crypt($_SERVER['PHP_AUTH_PW'], base64_encode($_SERVER['PHP_AUTH_PW']));
	}

	/**
	 * @return bool
	 */
	public function hasUserAccess() {
		global $userManager, $config;

		if ($userManager->getCurrentUser()->getUsername() === $config['firewall']['admin'])
			return true;
		else
			return false;
	}
}
