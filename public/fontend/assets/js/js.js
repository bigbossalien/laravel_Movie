$(document).ready(function() {
	
	$('.navbar-nav a').hover(function() {
		$(this).css({
			'box-shadow': '2px 2px 2px #737373',
			'color': '#fff',
			'background-color':'#737373',
			'transition':'0.25s',
			'border-bottom-left-radius': '5px',
			'border-top-right-radius': '5px',
		});
	}, function() {
		$(this).css({
			'box-shadow': 'none',
			'color': '#fff',
			'background-color':'#333'
		});
	});
	$('.news1').hover(function() {
		$(this).css('background-color', '#5d5d5d');
	},function(){
		$(this).css('background-color','#333');
	});
	$('ul.nav li').hover(function() {
		$(this).find('ul').fadeIn(100);
	}, function() {
		$(this).find('ul').fadeOut(100);
	});
	function startSlide(){
		interval=setInterval(function(){
			$('.slides > .img-slides').animate({'margin-bottom':'-=500px '},1000,function(){
				$('.slides > .img-slides a:first').appendTo('.slides > .img-slides');
				$('.slides > .img-slides').css('margin-bottom','0');	
			});	
			$('.img-slides-content ul').animate({'margin-bottom': '-=500px'},
				1000, function() {
				$('.img-slides-content > ul  li:first').appendTo('.img-slides-content ul');
				$('.img-slides-content > ul').css('margin-bottom','0');
			});
		},5000)
	}
	function pauseSlide(){
		clearInterval(interval);
	}
	startSlide();
	$('.slides > .img-slides > a').on('mouseenter',pauseSlide).on('mouseleave',startSlide);
	$('.next-slide img').click(function(){
		pauseSlide();
		$('.slides > .img-slides').animate({'margin-bottom':'-=500px '},300,function(){
				$('.slides > .img-slides a:first').appendTo('.slides > .img-slides');
				$('.slides > .img-slides').css('margin-bottom','0');	
			});
		$('.img-slides-content ul').animate({'margin-bottom': '-=500px'},
				300, function() {
				$('.img-slides-content > ul  li:first').appendTo('.img-slides-content ul');
				$('.img-slides-content > ul').css('margin-bottom','0');
			});
	});
	$('.slides > .img-slides').hover(function(){
		$('.img-slides-content').css({
			'margin-left': '0',
			'transition-duration': '1s',
		});
	},function(){
		$('.img-slides-content').css({
			'margin-left': '-289px',
			'transition-duration': '0.5s',
		});
	});

	$('.tap > li > a:lt(1)').css('border-left','1px solid #ccc');
	$('#avata_c > textarea').click(function() {
		$('#avata_c > input').slideDown(500);
	});
	$('#light').click(function(event) {
		if($('#light_off').css('display') == 'none'){
			$('#light_off').css('display','block');
			$(this).css({'background-color':'yellow','border-color':'yellow'})
			$('.source-v').css('border', '2px solid #ccc');
		}else{
			$('#light_off').css('display','none');
			$(this).css({'background-color':'#ccc','border-color':'#ccc'})
			$('.source-v').css('border', '2px solid #ccc');
		}
		
	});
	$('.item-img').hover(function(){
		$(this).find('.animation').fadeIn(200);
		$(this).find('.item-title').hide();
		$(this).find('.icon-detail').show();
		$(this).find('.box-info').fadeIn(200);
	},function(){
		$(this).find('.animation').css('display', 'none');
		$(this).find('.item-title').show();
		$(this).find('.icon-detail').hide();
		$(this).find('.box-info').hide();
	});
	$('#click-full').click(function(){
		$('.noidung p').css('height','auto');
		$(this).hide();
		$('#click-hidden').css('display','block');
	});
	$('#click-hidden').click(function(){
		$('.noidung p').css('height','170px');
		$(this).hide();
		$('#click-full').css('display','block');
	});
	$('.info-user').click(function(){
		$('#show-more-user').toggle(200);
	});
	$('.info-mini-user').click(function(){
		$('#show-more-mini-user').toggle(200);
	});
	$('.icon-s').click(function(){
		if($('.frm-search').css('display')=='none'){
			$(this).css('color','#333')
			$('.frm-search').css('display', 'block').animate({width:"100%"});
		}else{
			$(this).css('color','#fff')
			$('.frm-search').animate({width:'15%'}).hide(10);

		}
	});
	$('.icon-search').click(function(){
		if($('.mini-frm-search').css('display')=='none'){
			$(this).css('color','#333');
			$('.mini-frm-search').css('display', 'block').animate({width:"67%"});
		}else{
			$(this).css('color','#fff');
			$('.mini-frm-search').animate({width:'15%'}).hide(10);

		}
	})

});
var x=document.getElementById('videos');
function pause() {
	if(x.paused)
		x.play();
	else
		x.pause();
}
// var y=document.getElementById('light_off');
// function light_off() {
// 	y.style.display="block";
// }
// var z=document.getElementById('light');
// var t=document.getElementById('light_off');
// function light_o() {
// 	if(t.style.display == "none"){
// 		t.style.display = "block";
// 		z.style.backgroundColor = "yellow";
// 		z.style.borderColor = "yellow";
// 	}else{
// 		t.style.display = "none";
// 		z.style.backgroundColor = "#ccc";
// 		z.style.borderColor = "#ccc";
// 	}
// }
