$(function () {
    $('.thumbnail').hide();
});

$(window).load(function() {
    // Fade in Thumbnails
    $(".thumbnail").each(function(i) {
      $(this).delay(i*200).fadeIn(400);
    });
});

$(window).load(function() {
	// Flexslider settings
	$('#carousel').flexslider({ 
		animationDuration: 400,	
      	controlNav: false,
		directionNav: true,
		smoothHeight: true,	
		randomize: false
	});
});

$(document).ready(function() {
	$('p > img').removeAttr('height').removeAttr('width').unwrap();
	$('p > a > img').removeAttr('height').removeAttr('width').parent().unwrap();

	// Mobile Menu
    $('#mobile-open').on('click', function() {
        $('#mobile-open').css('display','none');
        $('#mobile-close').css('display','block');
        $('#mobile-overlay').css('display','block');
    });
    $('#mobile-close').on('click', function() {
        $('#mobile-close').css('display','none');
        $('#mobile-open').css('display','block');
        $('#mobile-overlay').css('display','none');
    })

	// Back to top button
	$('a[href=#top]').click(function(){
	$('html, body').animate({scrollTop:0}, 'slow');
	return false;
	});

	// Form hide on submit
    if ($('.thanks').length){
        $('form').css('display','none');
    };
});