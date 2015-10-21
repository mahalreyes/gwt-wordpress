/*
 * scripts for mega menu and accessibility features.
 * 
 */

// Cookie handler, non-$ style
function createCookie(name, value, days) {
    if (days) {
        var date = new Date();
        date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
        var expires = "; expires=" + date.toGMTString();
    } else
        var expires = "";
    document.cookie = name + "=" + value + expires + "; path=/";
}

function readCookie(name) {
    var nameEQ = name + "=";
    var ca = document.cookie.split(';');
    for (var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') c = c.substring(1, c.length);
        if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);
    }
    return null;
}

function eraseCookie(name) {
    createCookie(name, "");
}

jQuery(document).ready(function($){
	// Mega Menu
	var hasMegaMenu = $('.has-megamenu');
	$('.megamenu').hide();
	hasMegaMenu.click(
	  function(e) {
	    e.preventDefault();
	    var $this = $(this);
		var currentMegaMenu = $('#' + $this.attr('id').substr(0, $this.attr('id').indexOf('-')) + '-megamenu');
	    hasMegaMenu.removeClass('active');
	    $this.toggleClass('active');
	    $('.megamenu:visible').slideUp('slow')
	    if (currentMegaMenu.is(':visible')) {
			currentMegaMenu.slideUp('slow')
			hasMegaMenu.removeClass('active');
	    } else {
	    	currentMegaMenu.slideDown('slow')
	  	}
	});
	
	// hide all non-default active mega-sub-content
    $('.nav-sub-content .content:not(".active")').hide();
    $('[data-tab-link]').click(function(e){
        e.preventDefault();
        var parentNav = $(this).parent().parent();
        var parentContainer = $(this).parent().parent().parent().parent().parent();
        parentNav.children('li.active').removeClass('active');
        $(this).parent().addClass('active');
        var menuId = $(this).attr('href');
		console.log(menuId);

        parentContainer.find('.content').removeClass('active').hide();
        parentContainer.find(menuId).addClass('active').show();
    });

	// Accessibility Panel
    $('#accessibility-mode').click(function (e) {
		e.preventDefault();
		$(this).toggleClass('active');
		if ($(this).hasClass('active')) {
			$('#accessibility-widget').animate({
				right: '0px'
			});
			$(this).animate({
				right: '0px',
				opacity: 1,
				paddingLeft: '9px',
				paddingRight: '9px'
			});
		} else {
			$('#accessibility-widget').animate({
				right: '-42px'
			});
			$(this).animate({
				right: '-10px',
				opacity: 0.8,
				paddingLeft: '5px',
				paddingRight: '5px'
			});
		}
	});
	
	// Pop-up Accessibility Statement
	var statementActive = false;
	var oldFocus = document;
	var statementFunction = function (e) {
		$('.toggle-statement').toggleClass('statement-active');
		$('#accessibility-statement-content').toggleClass('statement-active');
		if ($('.toggle-statement').hasClass('statement-active')) {
			statementActive = true;
			$('#darklight').fadeIn();
			oldFocus = $(":focus");
			console.log(oldFocus);
			$('#accessibility-statement-content .statement-textarea').focus();
		} else {
			statementActive = false;
			$('#darklight').fadeOut();
			$(oldFocus).focus();
		}
	}
	$('.toggle-statement').click(statementFunction);
	$('#darklight').click(statementFunction);
	$(document).keydown(function (e) {
		if (statementActive && e.which == 27) {
			statementFunction(e);
		}
	});
	
	// High contrast handler
	if (readCookie('a11y-high-contrast')) {
        $('body').addClass('contrast');
        $('head').append($("<link href='" + template_directory + "/accessibility/a11y-contrast.css' id='highContrastStylesheet' rel='stylesheet' type='text/css' />"));
        $('#accessibility-contrast').attr('aria-checked', true).addClass('active');
    }
    $('.toggle-contrast').on('click', function () {
        if (!$(this).hasClass('active')) {
            $('head').append($("<link href='" + template_directory + "/accessibility/a11y-contrast.css' id='highContrastStylesheet' rel='stylesheet' type='text/css' />"));
            $('body').addClass('contrast');
            createCookie('a11y-high-contrast', '1');
            $(this).attr('aria-checked', true).addClass('active');
            return false;
        } else {
            $('#highContrastStylesheet').remove();
            $('body').removeClass('contrast');
            $(this).removeAttr('aria-checked').removeClass('active');
            eraseCookie('a11y-high-contrast');
            return false;
        }
    });

    // Saturation handler
    if (readCookie('a11y-desaturated')) {
        $('body').addClass('desaturated');
        $('head').append($("<link href='" + template_directory + "/accessibility/a11y-desaturate.css' id='desaturateStylesheet' rel='stylesheet' type='text/css' />"));
        $('#accessibility-grayscale').attr('aria-checked', true).addClass('active');
    };

    $('.toggle-grayscale').on('click', function () {
        if (!$(this).hasClass('active')) {
            $('head').append($("<link href='" + template_directory + "/accessibility/a11y-desaturate.css' id='desaturateStylesheet' rel='stylesheet' type='text/css' />"));
            $('body').addClass('desaturated');
            $(this).attr('aria-checked', true).addClass('active');
            createCookie('a11y-desaturated', '1');
            return false;
        } else {
            $('#desaturateStylesheet').remove();
            $('body').removeClass('desaturated');
            $(this).removeAttr('aria-checked').removeClass('active');
            eraseCookie('a11y-desaturated');
            return false;
        }
    });

    // Fontsize handler
    if (readCookie('a11y-larger-fontsize')) {
        $('body').addClass('fontsize');
        $('head').append($("<link href='" + template_directory + "/accessibility/a11y-fontsize.css' id='fontsizeStylesheet' rel='stylesheet' type='text/css' />"));
        $('#accessibility-fontsize').attr('aria-checked', true).addClass('active');
    }

    $('.toggle-fontsize').on('click', function () {
        if (!$(this).hasClass('active')) {
            $('head').append($("<link href='" + template_directory + "/accessibility/a11y-fontsize.css' id='fontsizeStylesheet' rel='stylesheet' type='text/css' />"));
            $('body').addClass('fontsize');
            $(this).attr('aria-checked', true).addClass('active');
            createCookie('a11y-larger-fontsize', '1');
            return false;
        } else {
            $('#fontsizeStylesheet').remove();
            $('body').removeClass('fontsize');
            $(this).removeAttr('aria-checked').removeClass('active');
            eraseCookie('a11y-larger-fontsize');
            return false;
        }
    });
	
})
