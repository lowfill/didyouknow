<?php
	require_once dirname(dirname(dirname(dirname(__FILE__)))) . '/lib/functions.php';
?><div class="elgg-module elgg-module-aside">
	<div class="elgg-head">
		<h3>
			<?php echo elgg_echo('didyouknow:title'); ?>
			<span class="elgg-icon elgg-icon-refresh float-alt" id="dykrefresh"></span>
			<span class="elgg-icon elgg-icon-attention float-alt" id="dyktoggle"></span>
		</h3>
	</div>
	<div class="elgg-body" id="dyktip"><?php dyk_echo(); ?></div>
</div>