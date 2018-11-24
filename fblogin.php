<?php
if(!session_id()) {
    session_start();
}

	require_once "config.php";

	if (isset($_SESSION['access_token'])) {
		header('Location: signedin.php');
		exit();
	}

	$redirectURL = "http://localhost:8080/MusicEYEZv3/fb-callback.php";
	$permissions = ['email'];
	$loginURL = $helper->getLoginUrl($redirectURL, $permissions);
	echo '$loginURL ';
?>
