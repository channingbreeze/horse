(function($) {
	
	$.ajax({
		url : 'inter/getTeamMembers.php',
		success : function(data) {
			
			if(data.indexOf('<') != -1) {
				data = JSON.parse(data.substring(0, data.indexOf('<')));
			} else {
				data = JSON.parse(data);
			}
			
			var source = $('#teamMembers-template').html();
			var template = Handlebars.compile(source);
			var html = template(data);
			$('#team_ul').html('').append(html);
		}
	});
	
})(jQuery);
