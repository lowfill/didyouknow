<?php
	function didyouknow_init(){

		// this is the main function file - not sure if needed here, but why not
		require_once dirname(__FILE__) . '/lib/functions.php';

		// add javascript
		elgg_extend_view('js/elgg', 'didyouknow/js');

		// add css for sidebar module
		elgg_extend_view('css', 'didyouknow/css');

		// add css for admin panel
		elgg_extend_view('css/admin', 'didyouknow/admin-css');

		// if on event calendar page and event calendar is enabled in the admin panel,
		//		add the event calendar did you know module to the sidebar
		if(elgg_get_context() == 'event_calendar' && elgg_get_plugin_setting('event_calendar_toggle', 'didyouknow') == 'yes'){
			elgg_extend_view('page/elements/sidebar', 'didyouknow/event_calendar');
		}

		// if on groups page and groups is enabled in the admin panel,
		//		add the groups did you know module to the sidebar
		if(elgg_get_context() == 'groups' && elgg_get_plugin_setting('groups_toggle', 'didyouknow') == 'yes'){
			elgg_extend_view('groups/sidebar/find', 'didyouknow/groups', 1);
		}

		// this line is commented out because it just displays the current context at the top of the sidebar..
		//		useful for when adding support for other plugins
		// elgg_extend_view('page/elements/sidebar', 'didyouknow/get_context', 1);
	}
	elgg_register_event_handler('init', 'system', 'didyouknow_init');
?>