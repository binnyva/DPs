<h2>Results for <em><?php echo $PARAM['keyword']; ?></em></h2>

<?php foreach($images as $img) { ?>
<a class="image-preview" href="set_dp.php?url=<?php echo urlencode($img) ?>"><img src="system/thumb.php?url=<?php echo urlencode($img) ?>" longdesc="<?php echo $img ?>"  /></a>

<?php } ?>