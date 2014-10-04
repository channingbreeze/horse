(function($) {
	
	// 免费修改文书对话框打开
	$('#freeModify').on('click', function(){

		$('#freeDialog').css('display', 'block');
		$('#back').css('display', 'block');
		
	});
	
	// 免费修改文书对话框关闭
	$('#closeFreeModifyButton').on('click', function(e){
		
		e.preventDefault();
		$('#freeDialog').css('display', 'none');
		$('#back').css('display', 'none');
		
	});
	
	// VIP对话框打开
	$('#VIPModify').on('click', function(){

		$('#VIPDialog').css('display', 'block');
		$('#back').css('display', 'block');
		
	});
	
	// VIP对话框关闭
	$('#closeVIPModifyButton').on('click', function(e){
		
		e.preventDefault();
		$('#VIPDialog').css('display', 'none');
		$('#back').css('display', 'none');
		
	});
	
	// 全套对话框打开
	$('#allService').on('click', function(){

		$('#AllDialog').css('display', 'block');
		$('#back').css('display', 'block');
		
	});
	
	// 全套对话框关闭
	$('#closeAllServiceButton').on('click', function(e){
		
		e.preventDefault();
		$('#AllDialog').css('display', 'none');
		$('#back').css('display', 'none');
		
	});
	
	// 输入框获得焦点，弹出下拉选项
	$('#searchInput').on('focus', function(){
	
		$('#schools').css('display', 'block');
	
	});
	
	// 输入框失去焦点，隐藏下拉选项
	$('#searchInput').on('blur', function(){
	
		$('#schools').css('display', 'none');
	
	});
	
	// 选择一所学校
	$('#schools').find('li').on('mousedown', function(){
	
		$span = $(this).find('span');
		$('#searchInput').val($span.html());
	
	});
	
	// 点击提交
	$('input[type="submit"]').on('click', function(e){
	
		e.preventDefault();
		console.log($(this).closest('form').serialize());
	
	});
	
})(jQuery);
