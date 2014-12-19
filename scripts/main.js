(function($) {
	
	// 加载地图
	map = new VEMap('myMap');
	map.LoadMap(new VELatLong(0, 0), // center
		1, // zoom level
		VEMapStyle.Road, // map style
		false, // fixed map
		VEMapMode.Mode2D, // map mode
		false, // show map mode switch
		0, // tile buffer
		null // options
	);
	map.HideDashboard();
	
	// 加载地图图钉
	$.ajax({
		url : 'inter/getPins.php',
		success : function(data){
			
			if(data.indexOf('<') != -1) {
				data = JSON.parse(data.substring(0, data.indexOf('<')));
			} else {
				data = JSON.parse(data);
			}
			
			for(i in data) {
			
				var myPolygon = new VEShape(VEShapeType.Pushpin, new VELatLong(data[i].longitude, data[i].latitude));
				map.AddShape(myPolygon);
				myPolygon.SetPhotoURL(window.location.href + "/../images/" + data[i].image_url);
				myPolygon.SetTitle(data[i].title);
				myPolygon.SetDescription(data[i].content);
				myPolygon.SetCustomIcon("images/pin.png");
				
			}
		}
	
	});
	
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
	
		$.ajax({
			url : 'inter/getSchools.php',
			method : 'post',
			data : 'info=' + $(this).val(),
			success : function(data) {
				
				if(data.indexOf('<') != -1) {
					data = JSON.parse(data.substring(0, data.indexOf('<')));
				} else {
					data = JSON.parse(data);
				}
				
				var source = $('#schools-template').html();
				var template = Handlebars.compile(source);
				var html = template(data);
				$('#schools').html('').append(html);
				$('#schools').css('display', 'block');
			}
		});
	
	});
	
	var timer = null;
	var fire = function(){
		$.ajax({
			url : 'inter/getSchools.php',
			method : 'post',
			data : 'info=' + $('#searchInput').val(),
			success : function(data) {
				
				if(data.indexOf('<') != -1) {
					data = JSON.parse(data.substring(0, data.indexOf('<')));
				} else {
					data = JSON.parse(data);
				}
				
				var source = $('#schools-template').html();
				var template = Handlebars.compile(source);
				var html = template(data);
				$('#schools').html('').append(html);
				$('#schools').css('display', 'block');
			}
		});
	};
	$('#searchInput').on('keydown', function(){
		if(timer) {
			clearTimeout(timer);
		}
		timer = setTimeout(fire, 500);
	});
	
	// 输入框失去焦点，隐藏下拉选项
	$('#searchInput').on('blur', function(){
	
		$('#schools').css('display', 'none');
	
	});
	
	// 选择一所学校
	$(document).on('mousedown', 'li', function(){
		
		$span = $(this).find('span');
		$('#searchInput').val($span.html());
	
		$.ajax({
			url : 'inter/getPinBySchoolId.php',
			method : 'post',
			data : 'id=' + $span.data().dir,
			success : function(data) {
				
				if(data.indexOf('<') != -1) {
					data = JSON.parse(data.substring(0, data.indexOf('<')));
				} else {
					data = JSON.parse(data);
				}
				
				map.SetCenterAndZoom(new VELatLong(data[0].longitude, data[0].latitude), 15);
			}
		});
		
	});

	// 免费提交
	$("#freeSubmit").on('click', function(e){
		
		e.preventDefault();
		$('#ajaxFile').ajaxfileupload({
			action : 'inter/submitOrder.php',
			params : $("#freeSubmit").closest('form').serializeJson(),
			onStart : function(){
			},
			onComplete : function(data) {
				if(data.indexOf("ok") != -1) {
					$('#freeDialog').css('display', 'none');
					$('#back').css('display', 'none');
					alert('提交成功！');
				} else {
					alert('提交失败，请重试！\n' + (data.message?data.message:''));
				}
			},
			onCancel:function(){
				alert('提交失败，请重试！');
			},
			valid_extensions:['doc','docx']
		});
		
	});

	// 付费提交
	$('.chargeSubmit').on('click', function(e){
	
		e.preventDefault();
		$.ajax({
			url : 'inter/submitOrder.php',
			method : 'post',
			data : $(this).closest('form').serialize(),
			success : function(data) {
				if(data == "ok") {
					$('#VIPDialog').css('display', 'none');
					$('#AllDialog').css('display', 'none');
					$('#back').css('display', 'none');
					alert('提交成功！');
				} else {
					alert('提交失败，请重试！');
				}
			},
			error : function() {
				alert('提交失败，请重试！');
			}
		});
	
	});
	
})(jQuery);
