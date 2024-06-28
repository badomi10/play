$(function(){
	$(window).scroll(function() {
		var pos = $(window).scrollTop();
		if (500 < pos) {
			$('.btn').slideDown('fast');
		}
		else {
			$('.btn').slideUp('fast');
		}
	});
 
	$('.btn').click(function(){
		$('html,body').animate({scrollTop:0}, 'fast');
	});

	var $header = $("header nav");
	$(window).on('scroll',function(){
  		if( $(window).scrollTop() > 0 ){
    		$header.addClass("active");
  		}else{
    		$header.removeClass("active");
  		}
	});

	$("#jump, hamburger_list a").click(function(){
		var position = $(".box-wrapper").offset().top;
		$("html,body").animate({
			scrollTop : position
		}, {
			queue : false
		});
	});

	$("#jump2, hamburger_list2 a").click(function(){
		var position = $(".second").offset().top;
		$("html,body").animate({
			scrollTop : position
		}, {
			queue : false
		});
	});


	var $header2 = $(".hamburger-menu");
	$(window).on('scroll',function(){
  		if( $(window).scrollTop() > 0 ){
    		$header2.addClass("motion");
  		}else{
    		$header2.removeClass("motion");
  		}
	});
	
	$("#menu").on("click",function(){
        $(".hamburger-menu").toggle();
    });
		
	$(".click_sign a, .hamburger_sign a,.item-sign a").on("click",function(){
		$(".modal").addClass('is-fadein');
		$(".modal-box").addClass('is-fadeup');
	});

	$(".modal").on('click',function(e) {
		if(!$(e.target).closest('.modal-box').length) {
			$(".modal").removeClass('is-fadein');
			$(".modal-box").removeClass('is-fadeup');
		}
	});

	$(function() {
		$('#btn').click(function() {
	
			var error;
			var error_result = [];
			if( $('#name').val() === '' || $('#name').val().length >= 10) {
				var error = 1;
				error_result.push('氏名は必須入力です。10文字以内でご入力ください。');
			}

			if( $('#kana').val() === '' || $('#kana').val().length >= 10) {
				var error = 1;
				error_result.push('フリガナは必須入力です。10文字以内でご入力ください。');
			}

			if(($('#tel').val().length >= 1 ) && ( !$('#tel').val().match (/^[0-9]+$/))) {
				var error = 1;
				error_result.push('電話番号は0-9の数字のみでご入力ください。')
			} 

			if( $('#email').val() === '' || !$('#email').val().match (/^[a-z\d][\w.-]*@[\w.-]+\.[a-z\d]+$/i)) {
				var error = 1;
				error_result.push('メールアドレスは正しくご入力ください。');
			}

			if( $('#body').val() === '') {
				var error = 1;
				error_result.push('お問い合わせ内容は必須入力です。');
			}

			if( error ) {
				var error_result = error_result.join('\n');
				alert(error_result);
			}	
		});
	});
	
});

function delete_alert(e){
	if(!window.confirm('本当に削除しますか？')){
	   window.alert('キャンセルされました'); 
	   return false;
	}
	document.deleteform.submit();
 };