<?php
if(!session_id()) {
    session_start();
}
	require_once "vendor/facebook-php-sdk/src/Facebook/autoload.php";

	$FB = new \Facebook\Facebook([
		'app_id' => '295401187735904',
		'app_secret' => 'be7bc54633bfdf742cb22c0810fb9ca4',
		'default_graph_version' => 'v2.10'
	]);

	$helper = $FB->getRedirectLoginHelper();
?>