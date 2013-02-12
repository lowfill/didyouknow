<!-- <p>
	You may edit the textareas below. The tips are separated by two semi-colons (;;). There are a few bugs though, so if you need to, <a href="#" id="dykLoadDefaults">click here to load the defaults</a> and then click save.
</p> -->
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
	require_once dirname(dirname(dirname(dirname(dirname(__FILE__))))) . '/lib/functions.php';
	dyk_echo_setting("event_calendar");
	dyk_echo_setting("groups");
?>