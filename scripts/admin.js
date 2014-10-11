(function($){
	
	var curPage = 1;
	
	$('#userManager').css('display', 'block');
	
	$('#userManagerBtn').on('click', function(){
		$('#userManager').css('display', 'block');
		$('#schoolManager').css('display', 'none');
		$('#caseManager').css('display', 'none');
		$('#teamManager').css('display', 'none');
	});
	
	$('#schoolManagerBtn').on('click', function(){
		$('#userManager').css('display', 'none');
		$('#schoolManager').css('display', 'block');
		$('#caseManager').css('display', 'none');
		$('#teamManager').css('display', 'none');
	});
	
	$('#caseManagerBtn').on('click', function(){
		$('#userManager').css('display', 'none');
		$('#schoolManager').css('display', 'none');
		$('#caseManager').css('display', 'block');
		$('#teamManager').css('display', 'none');
	});
	
	$('#teamManagerBtn').on('click', function(){
		$('#userManager').css('display', 'none');
		$('#schoolManager').css('display', 'none');
		$('#caseManager').css('display', 'none');
		$('#teamManager').css('display', 'block');
	});
	
	toPage = function(page) {

		curPage = page;
		
		$.ajax({
			url : 'inter/getOrdersByPage.php',
			method : 'post',
			data : 'toPage=' + page,
			dataType : 'json',
			success : function(data) {
				
				Handlebars.registerHelper("compare", function(v1, v2, options) {
					if (v1 == v2) {
						return options.fn(this);
					} else {
						return options.inverse(this);
					}
				});
				
				Handlebars.registerHelper("footer", function(total, option) {
					var ret = "";
					for(var i=1; i<=total; i++) {
						ret = ret + "<a href='#' data-dir='" + i + "'>" + i + "</a>" + " ";
					}
					return ret;
				});
				
				var source = $('#orders-template').html();
				var template = Handlebars.compile(source);
				var html = template(data);
				$('#userManager').html('').append(html);
			}
		});
		
	};
	
	$(document).on('click', '#pages > a', function(e) {
		e.preventDefault();
		toPage($(this).data().dir);
	});
	
	$(document).on('click', '#success', function(e) {
		e.preventDefault();
		var id = $(this).data().dir;
		$.ajax({
			url : 'inter/sucOrGiveup.php',
			method : 'post',
			data : 'id=' + id + "&value=2",
			success : function(data) {
				toPage(curPage);
			}
		});
	});
	
	$(document).on('click', '#giveup', function(e) {
		e.preventDefault();
		var id = $(this).data().dir;
		$.ajax({
			url : 'inter/sucOrGiveup.php',
			method : 'post',
			data : 'id=' + id + "&value=3",
			success : function(data) {
				toPage(curPage);
			}
		});
	});
	
	toPage(1);
	
})(jQuery);
