function goReg() {
	var connect, form, response, result, login, lastName, firstName, jobNumber, site, pass, pass_reg, terms;
	login = __('login_reg').value;
	lastName = __('lastName_reg').value;
	firstName = __('firstName_reg').value;
	jobNumber = __('jobNumber_reg').value;
	site = __('site_reg').value;
	pass = __('pass_reg').value;
	passVer = __('passVer_reg').value;
	terms = __('terms_reg').checked ? true : false;

	form = 'user=' + user + '&pass=' + pass + '&session=' + session;
	connect = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
	connect.onreadystatechange = function() {
		if (connect.readyState == 4 && connect.status == 200) {
			if (connect.responseText == 1) {
				result = '<div class="alert alert-dismissible alert-success">';
	            result += '<h4 class="alert-heading">Connected!</h4>';
	          	result += '<p><strong>Redirecting....</strong></p>';
	        	result += '</div>';
	        	__('_AJAX_LOGIN_').innerHTML = result;
	        	location.reload();
			} else {
				__('_AJAX_LOGIN_').innerHTML = connect.responseText;
			}
		} else if (connect.readyState != 4) {
			result = '<div class="alert alert-dismissible alert-warning">';
          	result += '<button type="button" class="close" data-dismiss="alert">&times;</button>';
            result += '<h4 class="alert-heading">Processing!</h4>';
          	result += '<p><strong>We are trying to log you in....</strong></p>';
        	result += '</div>';
        	__('_AJAX_LOGIN_').innerHTML = result;
		}
	}
	connect.open('POST', 'ajax.php?mode=login', true);
	connect.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
	connect.send(form);
}

function runScriptReg(e) {
	
	if (e.keyCode == 13) {
		goReg();
	}
}