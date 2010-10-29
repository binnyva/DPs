<h2>Most Popular DPs</h2>

<p>Click on any of the images shown below to set it as your DP. If you don't like the images listed here, use the search option to get more images.</p>

<?php foreach($latest_dps as $dp) { ?>
<a class="image-preview" href="set_dp.php?file=<?php echo $dp['file'] ?>"><img src="dp/thumbs/<?php echo $dp['file'] ?>" longdesc="dp/full/<?php echo $dp['file_name'] ?>" /></a>

<?php } ?>
<br />

<?php if(empty($current_user['screen_name'])) { ?>
<p><a href="<?php echo $twitter->getAuthenticateUrl(); ?>">Please Login using Twitter to use this</a></p>
<?php } ?>