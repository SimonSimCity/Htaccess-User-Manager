<?php

class UserController {

	private $templates = "/templatesEN";

	public function index() {
		global $userManager, $firewall;

		if ($firewall->hasUserAccess())
			include_once __DIR__ . $this->templates . "/user/index.phtml";
		else {
			header("HTTP/1.1 403 Forbidden");
			include_once __DIR__ . $this->templates . "/403.phtml";
		}
	}

	public function editPassword() {
		global $userManager, $firewall;
		include_once __DIR__.$this->templates . "/user/edit.phtml";
	}

	public function updatePassword() {
		global $userManager;

		if ($_SERVER['REQUEST_METHOD'] === "POST") {

			$message = '';
			$success = false;
			try {
				$user = $userManager->getCurrentUser();
				$user->setPassword($_POST['password']);
				$success = $userManager->updateUser($user);
			} catch(Exception $e) {
				$message = $e->getMessage();
			}

			header("HTTP/1.1 303 See Other");
			header("Location: {$_SERVER["SCRIPT_NAME"]}?action=changePassword&success=".(int)$success."&message=".urlencode($message));
		} else {
			header("HTTP/1.1 403 Forbidden");
			include_once __DIR__ . $this->templates . "/403.phtml";
		}
	}
}
