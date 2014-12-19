(function($) {
	
	$.ajax({
		url : 'inter/getTeamMembers.php',
		dataType : 'json',
		success : function(data) {
			var source = $('#teamMembers-template').html();
			var template = Handlebars.compile(source);
			var html = template(data);
			$('#team_ul').html('').append(html);
		}
	});
	
})(jQuery);
