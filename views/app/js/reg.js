function goReg() {
	var connect, form, response, result, login, lastName, firstName, jobNumber, site, pass, pass_reg, terms;
	login = __('login_reg').value;
	// login = validateEmail(login);
	lastName = __('lastName_reg').value;
	firstName = __('firstName_reg').value;
	jobNumber = __('jobNumber_reg').value;
	jobNumber = validateJobNumber(jobNumber);
	site = __('site_reg').value;
	pass = __('pass_reg').value;
	pass = validatepassword(pass);
	passVer = __('passVer_reg').value;
	terms = __('terms_reg').checked ? true : false;

	if (terms) {
		if (login != '' && lastName != '' && firstName != '' && jobNumber != '' && site != '' && pass != '' && passVer != '') {
			if (pass == passVer) {
				form = 'login=' + login + '&lastName=' + lastName + '&firstName=' + firstName + '&jobNumber=' + jobNumber + '&site=' + site + '&pass=' + pass;
				console.log(form);
				connect = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
				connect.onreadystatechange = function() {
					if (connect.readyState == 4 && connect.status == 200) {
						if (connect.responseText == 1) {
							result = '<div class="alert alert-dismissible alert-success">';
				            result += '<h4 class="alert-heading">Registration Completed!</h4>';
				          	result += '<p><strong>An activation email has been sent to your account. <br>Redirecting....</strong></p>';
				        	result += '</div>';
				        	__('_AJAX_REG_').innerHTML = result;
				        	setTimeout(
							  function() 
							  {
							        location.reload();
							  }, 3000);
				        	
						} else {
							__('_AJAX_REG_').innerHTML = connect.responseText;
						}
					} else if (connect.readyState != 4) {
						result = '<div class="alert alert-dismissible alert-warning">';
			          	result += '<button type="button" class="close" data-dismiss="alert">&times;</button>';
			            result += '<h4 class="alert-heading">Processing!</h4>';
			          	result += '<p><strong>We are trying to process your registration....</strong></p>';
			        	result += '</div>';
			        	__('_AJAX_REG_').innerHTML = result;
					}
				}
				connect.open('POST', 'ajax.php?mode=reg', true);
				connect.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
				connect.send(form);
			} else {
				result = '<div class="alert alert-dismissible alert-danger">';
		      	result += '<button type="button" class="close" data-dismiss="alert">&times;</button>';
		        result += '<h4 class="alert-heading">ERROR!</h4>';
		      	result += '<p><strong>The password does not match.</strong></p>';
		    	result += '</div>';
		    	__('_AJAX_REG_').innerHTML = result;
			}
		} else {
			result = '<div class="alert alert-dismissible alert-danger">';
	      	result += '<button type="button" class="close" data-dismiss="alert">&times;</button>';
	        result += '<h4 class="alert-heading">ERROR!</h4>';
	      	result += '<p><strong>You must fill all the fields correctly to proceed.</strong></p>';
	    	result += '</div>';
	    	__('_AJAX_REG_').innerHTML = result;
		}

	} else {
		result = '<div class="alert alert-dismissible alert-danger">';
      	result += '<button type="button" class="close" data-dismiss="alert">&times;</button>';
        result += '<h4 class="alert-heading">ERROR!</h4>';
      	result += '<p><strong>You must agree to the Terms and Conditions.</strong></p>';
    	result += '</div>';
    	__('_AJAX_REG_').innerHTML = result;

	}
}

function runScriptReg(e) {
	
	if (e.keyCode == 13) {
		goReg();
	}
}

function validateEmail(email){
	var regex = /[a-zA-Z]+\.[a-zA-Z]+@airbus\.com/;
	var regex2 = /[a-zA-Z]+\.[a-zA-Z]+@external\.airbus\.com/;
	if (regex.test(email)) {
		email = email;
	} else if (regex2.test(email)) {
		email = email;
	} else {
		email = "";
	}
	return email;
}

function validateJobNumber(jobNumber){
	var regex = /[0-9]{5}/;
	if (regex.test(jobNumber)) {
		jobNumber = jobNumber;
	} else {
		jobNumber = "";
	}
	return jobNumber;
}

function validatepassword(password){
	var regex = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/;
	if (regex.test(password)) {
		password = password;
	} else {
		password = "";
	}
	return password;
}