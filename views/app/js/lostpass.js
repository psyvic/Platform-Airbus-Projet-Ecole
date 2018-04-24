function goLostPass() {
	var connect, form, response, result, login, pass;
	login = __('login_lostpass').value;
	pass = __('pass_lostpass').value;
	form = 'login=' + login + '&pass=' + pass;
	console.log(form);
	connect = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
	connect.onreadystatechange = function() {
		if (login != '' && pass != '') {
			if (connect.readyState == 4 && connect.status == 200) {
				if (connect.responseText == 1) {
					result = '<div class="alert alert-dismissible alert-success">';
		            result += '<h4 class="alert-heading">Password changed! You now need to wait for an administrator to validate your request</h4>';
		          	result += '<p><strong>Redirecting....</strong></p>';
		        	result += '</div>';
		        	__('_AJAX_LOSTPASS_').innerHTML = result;
		        	setTimeout(
							  function() 
							  {
							        location.reload();
							  }, 3000);
				} else {
					__('_AJAX_LOSTPASS_').innerHTML = connect.responseText;
				}
			} else if (connect.readyState != 4) {
				result = '<div class="alert alert-dismissible alert-warning">';
	          	result += '<button type="button" class="close" data-dismiss="alert">&times;</button>';
	            result += '<h4 class="alert-heading">Processing!</h4>';
	          	result += '<p><strong>We are trying to apply changes....</strong></p>';
	        	result += '</div>';
	        	__('_AJAX_LOSTPASS_').innerHTML = result;
			}
		} else {
			result = '<div class="alert alert-dismissible alert-danger">';
	      	result += '<button type="button" class="close" data-dismiss="alert">&times;</button>';
	        result += '<h4 class="alert-heading">ERROR!</h4>';
	      	result += '<p><strong>You must fill all the fields to proceed.</strong></p>';
	    	result += '</div>';
	    	__('_AJAX_LOSTPASS_').innerHTML = result;
		}
	}
	connect.open('POST', 'ajax.php?mode=lostPass', true);
	connect.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
	connect.send(form);
}

function runScriptLostPass(e) {
	
	if (e.keyCode == 13) {
		goLostPass();
	}
}