<?php
require 'common.php';

$twitter->setToken($_GET['oauth_token']);
$token = $twitter->getAccessToken();
$twitter->setToken($token->oauth_token, $token->oauth_token_secret);

$user_info = $twitter->get('/account/verify_credentials.json');

$current_user = array(
		'screen_name'	=> $user_info->screen_name,
		'name'			=> $user_info->name,
		'current_dp'	=> $user_info->profile_background_image_url,
		'oauth_token'	=> $token->oauth_token,
		'oauth_token_secret' => $token->oauth_token_secret
	);
$_SESSION['current_user'] = $current_user;

header("Location: index.php");
