$(document).ready(function() {
	if ($(window).height() == $('#tupper-content').height()) {
		$('#tupper-content').css('height', ($(window).height() -40));
	}

});

var dialog = $('<div></div>')

function deleteObject(objectTitle, url, data, extraBody) {
	if (!extraBody) { extraBody = ''; }
	var deleteText = 'Delete '+objectTitle;
	var buttons = {}
	buttons['Delete '+objectTitle] = function() {
		$(this).html('Please wait... Deleting<br><br><div class="loading"></div>');
		$(this).dialog('option', 'buttons', []);
		$(this).dialog('option', 'closeOnEscape', false);
		$.ajax({
			url: url,
			type: 'POST',
			data: data+'&confirmDelete=1',
			dataType: 'script',
		});
	}
	buttons['Cancel'] = function() { $(this).dialog('close'); }

	dialog.html('This '+objectTitle+' will be permanently deleted and cannot be recovered. Are you sure?'+extraBody)
		.dialog({
			title: 'Delete this '+objectTitle,
			resizeable: false,
			minHeight: 30,
			modal: true,
			closeText: '',
			buttons: buttons,
		});
}

function load_bg_image(which) {
	$('#gallery-shade').css({
		zIndex: 2000,
		top: '-37px',
		height: $(window).height(),
	});
	$('#gallery-shade').fadeTo(0, 0.5);
	$('#gallery-loader').show();

	var width = $(window).width();

	if (width > 1280) { width = 1680; }
	else if (width > 1024 && width <= 1280) { width = 1280; }
	else { width = 1024; }

	objImage = new Image();
	objImage.src = '/assets/img/galleries/' + which + '-' + width + '.jpg';
	objImage.onload = function() {
		factor = objImage.width / objImage.height;

		if (factor > 1) {
			// orientation : landsacpe

			newWidth = $(window).width();
			newHeight = $(window).width() / factor;
			if (newHeight > $(window).height()) {
				newTop = '-' + ((newHeight - $(window).height()) / 2) + 'px';
			}
			else { newTop = '0px'; }

			$('#bg-site').css({
				width: newWidth,
				height: newHeight,
				top: newTop,
				left: '0px',
				borderLeft: 'none',
				borderRight: 'none',
				boxShadow: 'none',
			});
		}
		else {
			// orientation : portrait

			newWidth = $(window).height() * factor;
			newHeight = $(window).height();

			$('#bg-site').css({
				width: newWidth,
				height: newHeight,
				top: '0px',
				left: '200px',
				borderLeft: 'solid 1px #404041',
				borderRight: 'solid 1px #404041',
				boxShadow: '0 0 7px #000',
			});

		}

		$('#bg-site').attr('src', objImage.src);
		$('#gallery-loader').hide();
		$('#gallery-shade').fadeTo(0, 0, function() {
			$('#gallery-shade').hide();
		});
		$('#gallery-shade').css({zIndex: '-100'});
		delete objImage;
	}
}

function toggle_interface() {
	var timeout = 240;

	if (parseInt($('#gallery-control').css('top'), 10) == 0) {
		$('#tupper-header').animate({ top: '-=36' }, timeout);
		$('#gallery-name').animate({ top: '-=36' }, timeout);
		$('#gallery-control').animate({ top: '-=36', left: '-=172' }, timeout, function() {
			$('#gallery-control').addClass('on');
		});
		$('#inner-user-info').animate({ top: '-=40' }, timeout);
		$('#gallery-thumbnails').animate({ left: '-=200' }, timeout);
	}
	else {
		$('#tupper-header').animate({ top: '+=36' }, timeout);
		$('#gallery-name').animate({ top: '+=36' }, timeout);
		$('#gallery-control').animate({ top: '+=36', left: '+=172' }, timeout);
		$('#inner-user-info').animate({ top: '+=40' }, timeout);
		$('#gallery-thumbnails').animate({ left: '+=200' }, timeout);
		$('#gallery-control').removeClass('on');
	}
}

function help_setup() {
	$(document).find('div.help-link').each(function() {
		$(this).next('.help-content').hide();
		$(this).bind('click', function() {
//			if ($(this).next('.help-content').is(':visible')) { $(this).next('.help-content').hide(); }
//			else { $(this).next('.help-content').show(); }
			$(this).next('.help-content').animate({
				height: 'toggle'
			}, 120);
		});
	});
	
}
