<?php
require 'common.php';

if(empty($current_user['screen_name'])) {
	render('redirect_to_twitter_login.php');
	exit;
}

if(!empty($_GET['url'])) $file_name = getImage($_GET['url']);
elseif(!empty($_GET['file'])) $file_name = $_GET['file'];
else exit;

try {
	$response = $twitter->post('/account/update_profile_image.json', array('@image' => '@dp/full/'.$file_name));
	
	$sql->insert('Latest', array(
			'file'		=> $file_name,
			'added_on'	=> 'NOW()'
		));
} catch(Exception $e) {
	echo "Couldn't set the DP - some error.";
}

$latest_dps = $sql->getAll("SELECT file,used_by FROM Latest ORDER BY added_on DESC LIMIT 0,10");
$QUERY['success'] = "The DP has been changed";
render('index.php');
