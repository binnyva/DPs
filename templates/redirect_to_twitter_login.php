<h2>You have to <em>login</em> to use this feature</h2>

<p><a href="<?php echo $twitter->getAuthenticateUrl() ?>">Login to twitter...</a></p>

<p>... or wait 5 seconds and you will be automatically redirected.</p>

<script type="text/javascript">
window.setTimeout('document.location.href="<?php echo $twitter->getAuthenticateUrl() ?>";', 5000);
</script>