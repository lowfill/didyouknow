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