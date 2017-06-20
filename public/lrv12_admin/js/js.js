$(document).ready(function() {
	$('.result_msg,.error_msg').delay(3000).slideUp(1000);
	$('.dropdown_user').click(function(e) {
		if($('.dropdown_menu').css('display')=='none'){
			$('.dropdown_menu').slideDown().delay(2000).slideUp();
		}
	});
	$('.chi_tiet').click(function(e) {
		$('.show_chi_tiet').toggle(1000);
	});
	$('#btnSubmit').click(function(e) {
		var pass  = $('#txtPass').val();
		var cpass = $('#txtConfirmPass').val();
		var c     = 0;
		if(pass == ""){
			$('#txtPass').after('<p class="errorPass">Vui Lòng Nhập Mật Khẩu !</p>');
			c++;
		}
		else if(cpass == ""){
			$('#txtConfirmPass').after('<p class="errorConfirmPass">Vui Lòng Xác Nhận Mật Khẩu !</p>');
			c++;
		}
		else if(pass != cpass){
			$('#txtConfirmPass').after('<p class="errorConfirmPass">Mật Khẩu Không Trùng Khớp !</p>');
			c++;
		}
		if(c == 0){
			return true;
		}else{
			$('.errorPass').css('color','red');
			$('.errorConfirmPass').css('color','red');
			$('.errorPass').delay(2000).slideUp(1000);
			$('.errorConfirmPass').delay(2000).slideUp(1000);
			return false;
		}
	});
	$('#sourceImg').click(function() {
       $('.requiredImg').show(500).delay(3000).slideUp(1000);
       });
	$('#source').click(function() {
       $('.requiredSou').show(500).delay(3000).slideUp(1000);
       });
	$('#sourceAdd').click(function() {
		$('.requiredAddSou').show(500).delay(3000).slideUp(1000);
	});
	// $('#editFile').click(function(e) {
	// 	$('#editFile').addClass('active');
	// 	$('#addFile').removeClass('active');
	// 	$('#suafile').css('display','block');
	// 	$('#suathemfile').css('display','none');
	// });
	// $('#addFile').click(function(e) {
	// 	$('#addFile').addClass('active');
	// 	$('#editFile').removeClass('active');
	// 	$('#suafile').css('display','none');
	// 	$('#suathemfile').css('display','block');
	// });
	$('#choose-cate').click(function(){
		$('#show-choose-cate').toggle();
	});
	$('#anhmh').hover(function() {
		$(this).css('cursor','pointer');
		$(this).animate({
			width: '500',
			height: '500',
		});
	},function() {
		$(this).animate({
			width : '100',
			height : '100',
		});
	});
	$('#createAdd').click(function(argument) {
		var x=$('#source');
		var y=$('#sourceImg');
		var z=$('#errorSource');
		var t=$('#errorLink');
		var k=$('#errorImg');
		if($('#link').val() == ""){
			if($('#source').val()==""){
				z.text('Bạn Phải Nhập').delay(1000).slideUp(500);
				return false;
			}else if($('#sourceImg').val() == ""){
				k.text('Bạn Phải nhập').delay(1000).slideUp(500);
				return false;
			}else{
				return true;
			}
		}else{
			return true;
		}
	});

});
function myfun() {
	var x = document.getElementById("sotap");
	var y = document.getElementById("errorTap");
	if(isNaN(x.value))
	{
		x.style.color="red";
		y.style.display="block";
	}
	else
	{
		x.style.color="green";
		y.style.display="none";
	}
};