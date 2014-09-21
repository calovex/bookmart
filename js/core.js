$(document).ready(function() {
	
	//admin menu feature
	$('.admin-link').on('click mouseenter', function(event) {
		event.stopPropagation();
		var admin_links = $(this).parent('li').find('ul.admin-links');

		if( $(admin_links).hasClass('visible') ) {
			$(admin_links).removeClass('visible');
		} else {
			$(admin_links).addClass('visible');
		}

		$(document.body).on('click', function(){
        	$('ul.admin-links').removeClass('visible');
    	});

    	return false;
	});

	$('.confirm').on('click', function() {
		var confirm_status = confirm('Are you sure you want to perform this action?');
		if(confirm_status) {
			return true;
		} else {
			return false;
		}
	});

});