<?php

	function dykGetValuesEN($context){
		$input = '';
		if($context == 'event_calendar'){
			$input = elgg_get_plugin_setting('dykEventCalendarEN', 'didyouknow');
		}
		if($context == 'groups'){
			$input = elgg_get_plugin_setting('dykGroupsEN', 'didyouknow');
		}
		if($input !== ''){
			$input = str_replace("\n", '', $input);
			$values = explode(";;", $input);
			array_splice($values, count($values) - 1);
		}else{
			$values = array();
		}
		return $values;
	}

	function dykMakeKeysEN($context, $length){
		$keys = array();
		if($length == 0){
			return $keys;
		}
		for($i = 0; $i < $length; $i++){
			$keys[] = $context . ':dyk:' . $i;
		}
		return $keys;
	}

	function dykPrepareEN($context){
		$values = dykGetValuesEN($context);
		$keys = dykMakeKeysEN($context, count($values));
		return array_combine($keys, $values);
	}

	function dykGetValuesFR($context){
		$input = '';
		if($context == 'event_calendar'){
			$input = elgg_get_plugin_setting('dykEventCalendarFR', 'didyouknow');
		}
		if($context == 'groups'){
			$input = elgg_get_plugin_setting('dykGroupsFR', 'didyouknow');
		}
		if($input !== ''){
			$input = str_replace("\n", '', $input);
			$values = explode(";;", $input);
			array_splice($values, count($values) - 1);
		}else{
			$values = array();
		}
		return $values;
	}

	function dykMakeKeysFR($context, $length){
		$keys = array();
		if($length == 0){
			return $keys;
		}
		for($i = 0; $i < $length; $i++){
			$keys[] = $context . ':dyk:' . $i;
		}
		return $keys;
	}

	function dykPrepareFR($context){
		$values = dykGetValuesFR($context);
		$keys = dykMakeKeysFR($context, count($values));
		return array_combine($keys, $values);
	}

	function dykGetMaxGroups(){
		$input = '';
		if(get_current_language() == 'en'){
			$input = elgg_get_plugin_setting('dykGroupsEN', 'didyouknow');
		}
		if(get_current_language() == 'fr'){
			$input = elgg_get_plugin_setting('dykGroupsFR', 'didyouknow');
		}
		if($input !== '' && strstr($input, ';;') !== false){
			$values = explode(";;", $input);
			$max = count($values);
		}else{
			$max = 0;
		}
		return $max;
	}

	function dykGetMaxEventCalendar(){
		$input = '';
		if(get_current_language() == 'en'){
			$input = elgg_get_plugin_setting('dykEventCalendarEN', 'didyouknow');
		}
		if(get_current_language() == 'fr'){
			$input = elgg_get_plugin_setting('dykEventCalendarFR', 'didyouknow');
		}
		if($input !== '' && strstr($input, ';;') !== false){
			$values = explode(";;", $input);
			$max = count($values);
		}else{
			$max = 0;
		}
		return $max;
	}

?>