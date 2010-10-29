<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" >
<head>
	<title><?=$title?></title>
<link href="<?=$abs?>css/style.css" rel="stylesheet" type="text/css" />
<link href="<?=$abs?>images/silk_theme.css" rel="stylesheet" type="text/css" />
<link href="<?=$abs?>css/bc-stylesheet.css" rel="stylesheet" type="text/css" />
<?=$css_includes?>
</head>
<body>
<div id="loading">loading...</div>
<div id="container"> 
  <div id="header">
    <div> 
      <ul>
        <li><a href="index.php#idea" class="on">idea</a></li>
        <li><a href="index.php#code">code</a></li>
        <li><a href="index.php#author">author</a></li>
        <li><a href="index.php#contact">contact</a></li>
      </ul>
      <h1><a href="index.php"><?php $config['site_title'] ?></a></h1>
    </div>
  </div>
  <div id="content"> 
    <div id="right"> 

<div id="error-message" <?=($QUERY['error']) ? '':'style="display:none;"';?>><?php
	if(isset($PARAM['error'])) print strip_tags($PARAM['error']); //It comes from the URL
	else print $QUERY['error']; //Its set in the code(validation error or something.
?></div>
<div id="success-message" <?=($QUERY['success']) ? '':'style="display:none;"';?>><?=strip_tags(stripslashes($QUERY['success']))?></div>
<br />

<!-- Begin Content -->
<?php 
/////////////////////////////////// The Template file will appear here ////////////////////////////

include($GLOBALS['template']->template); 

/////////////////////////////////// The Template file will appear here ////////////////////////////
?>
<!-- End Content -->
 </div>
    <div id="left"><br />
    <h2>Search</h2>
    <form action="<?php echo $abs ?>search.php" method="post">
	<input type="text" name="keyword" id="keyword" value="<?php if(!empty($QUERY['keyword'])) echo $PARAM['keyword']; ?>" />
	<input type="submit" name="action" value="Image Search" />
	</form>
    </div>
  </div>
</div>

<div id="footer">An <a href="http://www.bin-co.com/php/scripts/iframe/">iFrame</a> Application</div>

<script src="<?=$abs?>js/library/jsl.js" type="text/javascript"></script>
<script src="<?=$abs?>js/application.js" type="text/javascript"></script>
<?=$js_includes?>
</body>
</html>