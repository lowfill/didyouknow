<p>
	You may edit the textarea's below. The tips are separated by two semi-colons (;;). There are a few bugs though, so if you need to, <a href="#" id="dykLoadDefaults">click here to load the defaults</a>.
</p>
<table id="dykevent-calendar">
	<tr class="dykdark">
		<td rowspan="3" class="dyktitle">
			<h3>Event Calendar</h3>
		</td>
		<td>
			<h3>English<h3>
		</td>
		<td>
			<h3>Français</h3>
		</td>
	</tr>
	<tr>
		<td>
			<textarea id="dyken" name="params[event-calendar-en]"><?php echo elgg_get_plugin_setting('event-calendar-en', 'didyouknow'); ?></textarea>
		</td>
		<td>
			<textarea id="dykfr" name="params[event-calendar-fr]"><?php echo elgg_get_plugin_setting('event-calendar-fr', 'didyouknow'); ?></textarea>
		</td>
	</tr>
	<tr class="dykdark">
		<td colspan = "2" id="dykurl">
			<a href="http://translate.google.com/#en/fr/" target="_blank">--- Google Translate --></a>
		</td>
	</tr>
</table>
<table id ="dykgroups">
	<tr class="dykdark">
		<td rowspan="3" class="dyktitle">
			<h3>Groups</h3>
		</td>
		<td>
			<h3>English<h3>
		</td>
		<td>
			<h3>Français</h3>
		</td>
	</tr>
	<tr>
		<td>
			<textarea id="dyken" name="params[groups-en]"><?php echo elgg_get_plugin_setting('groups-en', 'didyouknow'); ?></textarea>
		</td>
		<td>
			<textarea id="dykfr" name="params[groups-fr]"><?php echo elgg_get_plugin_setting('groups-fr', 'didyouknow'); ?></textarea>
		</td>
	</tr>
	<tr class="dykdark">
		<td colspan = "2" id="dykurl">
			
		</td>
	</tr>
</table>