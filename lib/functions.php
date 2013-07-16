<?php

	// dyk_title takes the mod context and returns a title version of it
	function dyk_title($mod_context){
		return ucwords(str_replace('_', ' ', $mod_context));
	}

	// dyk_echo_toggle creates the setting for enabling or disabling the settings
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

	// dyk_echo_setting creates the structure for a plugin settings in the did you know admin panel
	function dyk_echo_setting($mod_context){
		$languages = get_installed_translations();
		echo "<table id=\"dyk_" . $mod_context . "\">";
			echo "<tr class=\"dykdark\">";
				echo "<td rowspan=\"3\" class=\"dyktitle\">";
					echo "<h3>" . dyk_title($mod_context) . "</h3><br />";
					dyk_echo_toggle($mod_context);
				echo "</td>";
				foreach($languages as $lang => $name){
					$completeness = get_language_completeness($lang);
					if($lang =='en' || $completeness > 60){
						echo "<td>";
							echo "<h3>{$name}</h3>";
						echo "</td>";
					}
				}
			echo "</tr>";
			echo "<tr>";
				foreach($languages as $lang =>$name){
					$completeness = get_language_completeness($lang);
					if($lang =='en' || $completeness > 60){
						echo "<td>";
							echo "<textarea class=\"elgg-input-plaintext\" id=\"dyken\" name=\"params[" . $mod_context . "_{$lang}]\">" . elgg_get_plugin_setting($mod_context . '_'.$lang, 'didyouknow') . "</textarea>";
						echo "</td>";
					}
				}
			echo "</tr>";
		echo "</table>";
	}

	// dyk_get_setting returns the string that is saved in the settings
	function dyk_get_setting($mod_context, $lang){
		//TODO Add hook for manage equivalent context
		$map = array('events'=>'event_calendar','espacos'=>'amigo_espacos','highlights'=>'amigo_highlights');
		if(array_key_exists($mod_context,$map)){
			$context = $map[$mod_context];
		}
		else{
			$context = $mod_context;
		}

		if(!is_array($context)){
			$context = array($context);
		}
		foreach($context as $dykcontext){
			$setting = elgg_get_plugin_setting($dykcontext . '_' . $lang, 'didyouknow');

			if(empty($setting)){
				$setting = elgg_get_plugin_setting($dykcontext . '_en', 'didyouknow');
			}
			if(!empty($setting)){
				break;
			}
		}
		return $setting;
	}

	// dyk_get_tips parses the string saved in the settings and returns an array of the tips
	function dyk_get_tips(){
		$tips = array();
		$input = dyk_get_setting(elgg_get_context(), get_current_language());
		$input = str_replace("\n", '', $input);
		$tips = explode(";;", $input);
		$last = end($tips);
		if(empty($last)){
			array_pop($tips);
		}
		return $tips;
	}

	// dyk_prepare prepares the array of tips for adding to the language array by creating unique keys and all that jazz
	function dyk_prepare(){
		$tips = dyk_get_tips();
		$keys = array();
		for($i = 0; $i < count($tips); $i++){
			$keys[] = elgg_get_context() . ':dyk:' . $i;
		}
		$output = array_combine($keys, $tips);
		return $output;
	}

	// dyk_count simply retuns the amount of tips in the settings
	function dyk_count(){
		return count(dyk_get_tips());
	}

	// dyk_echo is what displays the content of the did you know module and makes sure you don't see the same tip twice in a row
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
					if($_SESSION['dykIndex'] >= $max){
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