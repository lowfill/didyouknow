// dyk_translate produces a google translate link
function dyk_translate(mod_context){
	$('#dyk_' + mod_context + ' #dykurl').html(function(){
		return '<h6><a href="http://translate.google.com/#en/fr/' + encodeURI( $('#dyk_' + mod_context + ' #dyken').val() ) + '" target="_blank">&#8594 Google Translate &#8594</a></h6>';
	});
}

// dyk_toggle_setting disabled editing of textareas when the setting is disabled and enabled editing when the setting is enabled
function dyk_toggle_setting(mod_context){
	if($('#' + mod_context + '_toggle').val() == 'no'){
		$('#dyk_' + mod_context + ' textarea').attr("disabled", "disabled");
	}else{
		$('#dyk_' + mod_context + ' textarea').removeAttr("disabled");
	}
}

$(document).ready(function(){
	// generate translate links when page loads
	dyk_translate('event_calendar');
	dyk_translate('groups');
	// regenerate translate links when textareas edited
	$('#dyk_event_calendar #dyken').keyup(function(){
		dyk_translate('event_calendar');
	});
	$('#dyk_groups #dyken').keyup(function(){
		dyk_translate('groups');
	});

	// toggle editing of textareas when page loads
	dyk_toggle_setting('event_calendar');
	dyk_toggle_setting('groups');
	// toggle editing of textareas when settings are enabled/disabled
	$('#event_calendar_toggle').change(function(){
		dyk_toggle_setting('event_calendar');
	});
	$('#groups_toggle').change(function(){
		dyk_toggle_setting('groups');
	});

	// fill in the defaults when the link is clicked
	$('#dykLoadDefaults').click(function(){
		$('#dyk_event_calendar #dyken').val("You can view events by month, week and day!;; You can add events by clicking the add button!;; You can have an event calendar widget on your profile or dashboard!;; You can add group or site-wide events to your personal calendar to showcase you plan to attend or are interested in the event!;; The number of users who have added an event to their personal calendar is listed on the event page!;;");
		$('#dyk_event_calendar #dykfr').val("Vous pouvez afficher les événements par mois, semaine et jour!;; Vous pouvez ajouter des événements en choisissant le bouton d'ajout!;; Vous pouvez utiliser le widget calendrier des événements sur votre profil ou tableau de bord!;; Vous pouvez ajouter un groupe ou d'événements globales à votre calendrier personnel pour montrer que vous comptez fréquenter ou si vous êtes intéressé par l'événement!;; Le nombre d'utilisateurs qui ont ajouté un événement à leur agenda personnel est cotée à la page de l'événement!;;");
		$('#dyk_groups #dyken').val("You can create and moderate as many groups as you like!;; You can keep all group activity private to the group or you can share the activity with the wider public!;; Each group produces RSS feeds, so it is easy to follow group developments!;; Each group has its own URL!;; Each group comes with a file repository, forum, pages and messageboard!;;");
		$('#dyk_groups #dykfr').val("Vous pouvez créer et modérer autant de groupes que vous voulez!;; Vous pouvez conserver toutes les activités de groupe privé au groupe ou vous pouvez partager l'activité avec le public!;; Chaque groupe produit des flux RSS, donc il est facile de suivre l'évolution du groupe!;; Chaque groupe possède sa propre URL!;; Chaque groupe est livré avec un référentiel de fichiers, forum et pages!;;");
	});

	// slideup or slidedown the did you know tip when the toggle button is clicked
	$('#dyktoggle').click(function(){
		$('#dyktip').slideToggle();
	});
	// refresh the did you know tip when the refresh button is clicked
	$('#dykrefresh').click(function(){
		if( $('#dyktip').is(':visible') ){
			$('#dyktip').fadeTo(400, 0, function(){
				$(this).slideUp();
			});
		}
		$('#dyktip').load(location.href+" #dyktip", function(){
			$(this).slideDown();
			$(this).fadeTo(400, 1);
		});
	});
});