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

	function dyk_get_context($context){
		//TODO Get modules
		$modules = array('event_calendar','groups','members','amigo_espacos','amigo_highlights');
		if($context == ''){
			return elgg_get_context();
		}
		if($context=='all'){
			$max = count($modules)-1;
			$dykLast = mt_rand(0, $max);
			$mod_context = $modules[$dykLast];
		}
		else{
			$mod_context = $context;
		}
		//TODO get hook for mapping
		$map = array('events'=>'event_calendar','espacos'=>'amigo_espacos','highlights'=>'amigo_highlights');
		if(in_array($mod_context,$map)){
			$mod_context = current(array_keys($map,$mod_context));
		}
		return $mod_context;

	}

	// dyk_get_tips parses the string saved in the settings and returns an array of the tips
	function dyk_get_tips($context=''){
		$tips = array();
		$input = dyk_get_setting(dyk_get_context($context), get_current_language());
		$input = str_replace("\n", '', $input);
		$tips = explode(";;", $input);
		$last = end($tips);
		if(empty($last)){
			array_pop($tips);
		}
		return $tips;
	}

	// dyk_prepare prepares the array of tips for adding to the language array by creating unique keys and all that jazz
	function dyk_prepare($context=''){
		$context = dyk_get_context($context);
		$tips = dyk_get_tips($context);
		$keys = array();
		for($i = 0; $i < count($tips); $i++){
			$keys[] = $context . ':dyk:' . $i;
		}
		$output = array_combine($keys, $tips);
		return $output;
	}

	// dyk_count simply retuns the amount of tips in the settings
	function dyk_count($context=''){
		return count(dyk_get_tips($context));
	}

	// dyk_echo is what displays the content of the did you know module and makes sure you don't see the same tip twice in a row
	function dyk_echo($context=''){
		$context = dyk_get_context($context);
		$count = dyk_count($context);
		if( $count == 0){
			echo elgg_echo('didyouknow:error');
		}
		else{
			$max = $count - 1;
			if($count >= 10){
				$dykLast = mt_rand(0, $max);
				if(!isset($_SESSION['dykRandy'])){
					$_SESSION['dykRandy'] = $dykLast;
				}else{
					while($_SESSION['dykRandy'] == $dykLast){
						$dykLast = mt_rand(0, $max);
					}
					$_SESSION['dykRandy'] = $dykLast;
				}
				echo elgg_echo($context . ':dyk:' . $dykLast);
			}
			if($count < 10){
				if(isset($_SESSION['dykIndex'])){
					if($_SESSION['dykIndex'] >= $max){
						$_SESSION['dykIndex'] = 0;
					}else{
						$_SESSION['dykIndex']++;
					}
				}else{
					$_SESSION['dykIndex'] = mt_rand(0, $max);
				}
				echo elgg_echo($context . ':dyk:' . $_SESSION['dykIndex']);
			}
		}
	}
?>