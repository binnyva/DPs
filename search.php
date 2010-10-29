<?php
require('common.php');

// http://code.google.com/apis/ajaxsearch/documentation/
//		http://code.google.com/apis/ajaxsearch/documentation/reference.html#_restUrlBase
$google_api_key = 'ABQIAAAAoTppHXZm8I6jmHi3CGc1xRSxKLG9ZfTNdUc84c1EROtXVd-0XhTkXlYDltHjrw3JhmuKfBDxTGk4Ag';
$keywords = $QUERY['keyword'];

$response = load('http://ajax.googleapis.com/ajax/services/search/images?v=1.0&rsz=8&q='.urlencode($keywords).'&key='.$google_api_key, array('cache'=>true));
$results = json_decode($response);
$images = array();

foreach($results->responseData->results as $image) {
	$images[] = $image->url;
}

render();
