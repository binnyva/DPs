<?php
require '../common.php';

if(empty($_GET['url'])) exit;
$file_name = getImage($_GET['url']);
header("Location: ../dp/thumbs/$file_name");
