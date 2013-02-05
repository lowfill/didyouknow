<?php

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
		if($input !== '' && strstr($input, ";;") !== false){
			$input = str_replace("\n", '', $input);
			$tips = explode(";;", $input);
			array_pop($tips);
		}
		return $tips;
	}

	function dyk_prepare(){
		$input = '';
		$tips = dyk_get_tips();
		$keys = array();
		for($i = 0; $i < count($tips); $i++){
			$keys[] = elgg_get_context() . ':dyk:' . $i;
		}
		return array_combine($keys, $tips);
	}

	function dyk_count(){
		return count(dyk_get_tips());
	}

	function dyk_echo(){
		if(dyk_count() !== 0){
			$max = dyk_count() - 1;
			$dykRandom = mt_rand(0, $max);
			if(!isset($_SESSION['dyk'])){
				$_SESSION['dyk'] = $dykRandom;
			}else{
				while($_SESSION['dyk'] == $dykRandom){
					$dykRandom = mt_rand(0, $max);
				}
				$_SESSION['dyk'] = $dykRandom;
			}
			echo elgg_echo(elgg_get_context() . ':dyk:' . $dykRandom);
		}else{
			echo elgg_echo('didyouknow:error');
		}
	}

?>