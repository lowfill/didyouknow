<?php
	function dyk_title($mod_context){
		return ucwords(str_replace('_', ' ', $mod_context));
	}
	function dyk_echo_toggle($mod_context){
		echo elgg_view('input/dropdown', array(
			'name' => 'params[' . $mod_context . '_toggle]',
			'value' => elgg_get_plugin_setting($mod_context . '_toggle', 'didyouknow'),
			'id' => $mod_context . '_toggle',
			'options_values' => array(
				'yes' => elgg_echo('enable'),
				'no' => elgg_echo('disable'),
			),
		));
	}
	function dyk_echo_setting($mod_context){
		echo "<table id=\"dyk_" . $mod_context . "\">";
			echo "<tr class=\"dykdark\">";
				echo "<td rowspan=\"3\" class=\"dyktitle\">";
					echo "<h3>" . dyk_title($mod_context) . "</h3><br />";
					dyk_echo_toggle($mod_context);
				echo "</td>";
				echo "<td>";
					echo "<h3>English</h3>";
				echo "</td>";
				echo "<td>";
					echo "<h3>French</h3>";
				echo "</td>";
			echo "</tr>";
			echo "<tr>";
				echo "<td>";
					echo "<textarea class=\"elgg-input-plaintext\" id=\"dyken\" name=\"params[" . $mod_context . "_en]\">" . elgg_get_plugin_setting($mod_context . '_en', 'didyouknow') . "</textarea>";
				echo "</td>";
				echo "<td>";
					echo "<textarea class=\"elgg-input-plaintext\" id=\"dykfr\" name=\"params[" . $mod_context . "_fr]\">" . elgg_get_plugin_setting($mod_context . '_fr', 'didyouknow') . "</textarea>";
				echo "</td>";
			echo "</tr>";
			echo "<tr class=\"dykdark\">";
				echo "<td colspan=\"2\" id=\"dykurl\">";
					echo "<h6><a href=\"http://translate.google.com/#en/fr/\" target=\"_blank\">→ Google Translate →</a></h6>";
				echo "</td>";
			echo "</tr>";
		echo "</table>";
	}
	function dyk_get_tips(){
		$input = '';
		$tips = array();
		if(elgg_get_context() == 'event_calendar' && get_current_language() == 'en'){
			$input = elgg_get_plugin_setting('event-calendar-en', 'didyouknow');
		}
		if(elgg_get_context() == 'event_calendar' && get_current_language() == 'fr'){
			$input = elgg_get_plugin_setting('event-calendar-fr', 'didyouknow');
		}
		if(elgg_get_context() == 'groups' && get_current_language() == 'en'){
			$input = elgg_get_plugin_setting('groups-en', 'didyouknow');
		}
		if(elgg_get_context() == 'groups' && get_current_language() == 'fr'){
			$input = elgg_get_plugin_setting('groups-fr', 'didyouknow');
		}
		$input = str_replace("\n", '', $input);
		$tips = explode(";;", $input);
		$last = end($tips);
		if(empty($last)){
			array_pop($tips);
		}
		return $tips;
	}
	function dyk_prepare(){
		$tips = dyk_get_tips();
		$keys = array();
		for($i = 0; $i < count($tips); $i++){
			$keys[] = elgg_get_context() . ':dyk:' . $i;
		}
		$output = array_combine($keys, $tips);
		return $output;
	}
	function dyk_count(){
		return count(dyk_get_tips());
	}
	function dyk_echo(){
		if(dyk_count() == 0){
			echo elgg_echo('didyouknow:error');
		}
		else{
			$max = dyk_count() - 1;
			if(dyk_count() >= 10){
				$dykLast = mt_rand(0, $max);
				if(!isset($_SESSION['dykRandy'])){
					$_SESSION['dykRandy'] = $dykLast;
				}else{
					while($_SESSION['dykRandy'] == $dykLast){
						$dykLast = mt_rand(0, $max);
					}
					$_SESSION['dykRandy'] = $dykLast;
				}
				echo elgg_echo(elgg_get_context() . ':dyk:' . $dykLast);
			}
			if(dyk_count() < 10){
				if(isset($_SESSION['dykIndex'])){
					if($_SESSION['dykIndex'] == $max){
						$_SESSION['dykIndex'] = 0;
					}else{
						$_SESSION['dykIndex']++;
					}
				}else{
					$_SESSION['dykIndex'] = mt_rand(0, $max);
				}
				echo elgg_echo(elgg_get_context() . ':dyk:' . $_SESSION['dykIndex']);
			}
		}
	}
?>