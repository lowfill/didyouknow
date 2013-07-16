<h1 id="dykLoadDefaults">
	<a href="#">Load Default Settings</a>
</h1>
<h2 class="dykMargin">
	Instructions
</h2>
<p class="dykMargin">
	1. Load the default settings.
</p>
<p class="dykMargin">
	2. Save.
</p>
<p class="dykMargin">
	3. Optional: Edit the textareas below. The tips are separated by two semi-colons (;;). Remember to add two semi-colons to the ends.
</p>
<?php
	// need this functions.php file
	require_once dirname(dirname(dirname(dirname(dirname(__FILE__))))) . '/lib/functions.php';

	//TODO Add hook for extend modules support
	$modules = array('event_calendar','groups','members','amigo_espacos','amigo_highlights');

	foreach($modules as $module){
		dyk_echo_setting($module);
	}
?>