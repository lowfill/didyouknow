<?php
    function didyouknow_init(){
		require_once dirname(__FILE__) . '/lib/functions.php';
		elgg_extend_view('js/elgg', 'didyouknow/js');
		elgg_extend_view('css/admin', 'didyouknow/css');
        if(elgg_get_context() == 'event_calendar'){
            elgg_extend_view('page/elements/sidebar', 'didyouknow/event_calendar');
        }
        if(elgg_get_context() == 'groups'){
            elgg_extend_view('groups/sidebar/find', 'didyouknow/groups', 1);
        }
    }
    elgg_register_event_handler('init', 'system', 'didyouknow_init');
?>