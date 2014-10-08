(function($) {
	
	var index = 0;
	var total = 0;
	
	$.ajax({
		url : 'inter/getCases.php',
		dataType : 'json',
		success : function(data) {
			total = data.length;
			$('.ul_wrap').css('width', (Math.ceil(total/2)*320) + 'px');
			var source = $('#cases-template').html();
			var template = Handlebars.compile(source);
			var html = template(data);
			$('#case_ul').html('').append(html);
			if(total > 6) {
				$('#right').css('display', 'block');
			}
		}
	});
	
	$('#left').on('click', function(){
		index--;
		if(index <= 0) {
			$(this).css('display','none');
		}
		$('#right').css('display','block');
		$('.ul_wrap').animate({marginLeft : (-index*960) + 'px'});
	});
	
	$('#right').on('click', function(){
		index++;
		if(index >= Math.floor(total/6)) {
			$(this).css('display','none');
		}
		$('#left').css('display','block');
		$('.ul_wrap').animate({marginLeft : (-index*960) + 'px'});
	});
	
})(jQuery);
