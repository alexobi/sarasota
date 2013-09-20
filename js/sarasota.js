/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

// JavaScript Document

var ww = document.body.clientWidth;

$(document).ready(function() {
    $(".nav li a").each(function() {
        if ($(this).next().length > 0) {
				$(this).addClass("parent");	
			}
    });
	
	$(".showMenu").click(function(e) {
        e.preventDefault();
		$(this).toggleClass("active");
		$(".nav").slideToggle();
    });
	
	respondMenu();
    $('#navlist').lavalamp({
    	easing: 'easeOutBack'
	});
});

$(window).bind('resize orientationchange', function(){
	ww = document.body.clientWidth;
	respondMenu();
	});
	
var respondMenu = function (){
	if (ww < 768) {

			$(".showMenu").css("display","inline-block");
			if (!$(".showMenu").hasClass("active")) {
					$(".nav").hide();
				}
			else {
					$(".nav").show();
				}
			$(".nav li").unbind('mouseenter mouseleave');
			$(".nav li a.parent").unbind('click').bind('click', function(e){
				e.preventDefault();
				$(this).parent("li").toggleClass("hover");
				});
				
	}
	else if (ww >= 768) {
			
			$(".showMenu").css("display","none");
			$(".nav").show();
			$(".nav li").removeClass("hover");
			$(".nav li a").unbind('click');
			$(".nav li").unbind('mouseenter mouseleave').bind('mouseenter mouseleave',	function() {
				$(this).toggleClass('hover');
			});
			}
	
};

