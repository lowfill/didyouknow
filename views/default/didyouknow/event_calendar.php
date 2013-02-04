<?php
	require_once elgg_get_plugins_path() . 'didyouknow/lib/functions.php';
?>
<div class="elgg-module elgg-module-aside">
	<div class="elgg-head">
		<h3>
			<?php echo elgg_echo('didyouknow:title'); ?>
			<span class="elgg-icon elgg-icon-refresh float-alt" id="dykrefresh"></span>
			<span class="elgg-icon elgg-icon-attention float-alt" id="dyktoggle"></span>
		</h3>
	</div>
	<div class="elgg-body" id="dyktip">
		<?php
			if(dykGetMaxEventCalendar() !== 0){
				if(isset($_SESSION['dykCount'])){
					if($_SESSION['dykCount'] >= dykGetMaxEventCalendar() - 2 ){
						$_SESSION['dykCount'] = 0;
					}else{
						$_SESSION['dykCount']++;
					}
				}else{
					$_SESSION['dykCount'] = mt_rand(0, dykGetMaxEventCalendar() - 2);
				}
				echo elgg_echo('event_calendar:dyk:' . $_SESSION['dykCount']);
			}else{
				echo elgg_echo('didyouknow:error');
			}
		?>
	</div>
</div>