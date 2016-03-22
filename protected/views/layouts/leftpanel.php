<?php
	$user_type_id     = Yii::$app->session['users']['user_type_id'];
?>

<ul class='menulist'>
	<li><a href='/<?php print uri_segment(1); ?>/products' class='<?php echo getActivemenu(uri_segment(2),'products'); ?>' ><span class='fa fa-tag'></span>&nbsp; Products</a></li>
	<li><a href='/<?php print uri_segment(1); ?>/warehouse' class='<?php echo getActivemenu(uri_segment(2),'warehouse'); ?>' ><span class='fa fa-home'></span>&nbsp; Warehouse / Bin Location</a></li>
</ul>  