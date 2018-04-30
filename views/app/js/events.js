function goEvents() {
	connect = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
	connect.responseType = 'json';
	connect.onreadystatechange = function() {
		if (connect.readyState == 4 && connect.status == 200) {
			if (connect.responseText) {
				result = '<div class="alert alert-dismissible alert-info">';
	            result += '<h4 class="alert-heading">Connected!</h4>';
	          	result += '<p><strong>Events have been charged succesfully!</strong></p>';
	        	result += '</div>';
	        	__('_AJAX_CALENDAR_').innerHTML = result;
	        	return connect.responseText;
			} else {
				__('_AJAX_CALENDAR_').innerHTML = connect.responseText;
			}
		} else if (connect.readyState != 4) {
			result = '<div class="alert alert-dismissible alert-warning">';
          	result += '<button type="button" class="close" data-dismiss="alert">&times;</button>';
            result += '<h4 class="alert-heading">Processing!</h4>';
          	result += '<p><strong>We are charging the calendar....</strong></p>';
        	result += '</div>';
        	__('_AJAX_CALENDAR_').innerHTML = result;
		}
	}
	connect.open('GET', 'ajax.php?mode=events', true);
	connect.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
	connect.send();
}