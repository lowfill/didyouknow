<?php
	// need this functions.php file
	require_once dirname(dirname(dirname(dirname(__FILE__)))) . '/lib/functions.php';
?>
<div class="elgg-module elgg-module-aside">
	<div class="elgg-head">
		<h3>
			<?php echo elgg_echo('didyouknow:title'); ?>
			<span class="elgg-icon-dyk elgg-icon-dykrefresh float-alt" id="dykrefresh" title="<?php echo elgg_echo('didyouknow:refresh'); ?>"></span>
			<span class="elgg-icon-dyk elgg-icon-dyktoggle float-alt" id="dyktoggle" title="<?php echo elgg_echo('didyouknow:toggle'); ?>"></span>
		</h3>
	</div>
	<?php //dyk_echo() is declared in the /lib/functions.php file ?>
	<div class="elgg-body" id="dyktip"><?php dyk_echo(); ?></div>
</div>