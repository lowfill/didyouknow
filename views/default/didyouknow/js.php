
$(document).ready(function(){
	$('#dyktoggle').click(function(){
		$('#dyktip').slideToggle();
	});
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
