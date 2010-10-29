<?php
require 'twitter-async/EpiCurl.php';
require 'twitter-async/EpiOAuth.php';
require 'twitter-async/EpiTwitter.php';

//Keys for DP Switcher app.
$oauth_consumer_key = 'wnCLeSkyqaxkoGq1TiYhGA';
$oauth_consumer_secret = 'AXBx7QJiGi6TGzcB1vOSLgi4CuGn2e8BYgGpxf7clFA';

if(empty($_SESSION['current_user'])) {
	// User NOT logged in.
	$current_user = array(
		'screen_name' => false,
		'oauth_token' => false,
		'oauth_token_secret' => false
	);
	$twitter =  new EpiTwitter($oauth_consumer_key, $oauth_consumer_secret);
} else {
	// User Logged in.
	$current_user = $_SESSION['current_user'];
	$twitter =  new EpiTwitter($oauth_consumer_key, $oauth_consumer_secret, $current_user['oauth_token'], $current_user['oauth_token_secret']);
}

function getImage($url) {
	global $config;
	
	$url = $_GET['url'];
	$hash = md5($url);
	
	$info = pathinfo($url);
	$extension = strtolower($info['extension']);
	if($extension == 'gif' or $extension == 'bmp') $extension = 'jpg';
	
	if($extension != 'jpeg' and $extension != 'jpg' and $extension != 'png') {
		print "Invalid file. Only image files accepted. Exting now.";
		exit;
	}
	
	$full_file = joinPath($config['site_folder'], "dp/full/$hash.$extension");
	$thumb_file = joinPath($config['site_folder'], "dp/thumbs/$hash.$extension");
	
	if(!file_exists($full_file)) {
		$content = load($url);
		file_put_contents($full_file, $content);
		
		// Make a thumb nail
		$image = new Image($full_file);
		$image->resize(50,50)->save($thumb_file);
	}
	
	return "$hash.$extension";
}