<?php
/*
 *
 * Add or edit tips like this:
 *
 *     'event_calendar:dyk:<#>' => "<tip goes here>!",
 *     'groups:dyk:<#>' => "<tip goes here>!",
 *
 * Don't forget to translate to french.. if you need to.
 * 
 * IMPORTANT: You must update '\views\default\didyouknow\event_calendar.php'
 *                         or '\views\default\didyouknow\groups.php'
 *            based on the number of tips in this file!
 *            look for the mt_rand() function.
 *            
 *
 */
	$english = array(
        'didyouknow:title' => "Did you know?",
        'event_calendar:dyk:1' => "You can view events by month, week and day!",
        'event_calendar:dyk:2' => "You can add events by clicking the add button!",
        'event_calendar:dyk:3' => "You can have an event calendar widget on your profile or dashboard!",
        'event_calendar:dyk:4' => "You can add group or site-wide events to your personal calendar to showcase you plan to attend or are interested in the event!",
        'event_calendar:dyk:5' => "The number of users who have added an event to their personal calendar is listed on the event page!",
		'groups:dyk:1' => "You can create and moderate as many groups as you like!",
		'groups:dyk:2' => "You can keep all group activity private to the group or you can share the activity with the wider public!",
		'groups:dyk:3' => "Each group produces RSS feeds, so it is easy to follow group developments!",
		'groups:dyk:4' => "Each group has its own URL!",
		'groups:dyk:5' => "Each group comes with a file repository, forum, pages and messageboard!",
	);
	add_translation("en",$english);
?>