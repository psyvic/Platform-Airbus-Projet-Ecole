$(document).ready(function() {
	$.ajax({
		url: 'ajax.php?mode=adminEvents',
		type: 'POST',
		data: 'event',
		dataType: 'JSON',
		success: function(data){
			console.log(data);
			var result;
			for (i = 0; i < data.length; i++) {

				result += '<tr style="background-color: #82ccdd">';
				result += '<td>' + data[i].user_login + '</td>';
	            result += '<td>' + data[i].start + '</td>';
	          	result += '<td>' + data[i].end + '</td>';
          		result += '<td><button type="button" onclick="valEvent(' + data[i].shift_id + ')" id="valEventBtn" class="btn btn-default btn-success"> Validate</button></td>';
	        	result += '</tr>';
        	}
        	$('#events tr:last').after(result);
		}
	});
});

$(document).ready(function() {
	$.ajax({
		url: 'ajax.php?mode=adminUsers',
		type: 'POST',
		data: 'event',
		dataType: 'JSON',
		success: function(data){
			console.log(data);
			var result;
			for (i = 0; i < data.length; i++) {

				result += '<tr style="background-color: #82ccdd">';
				result += '<td>' + data[i].login + '</td>';
          		result += '<td><button type="button" onclick="valUser(' + data[i].id + ')" id="valEventBtn" class="btn btn-default btn-success"> Validate</button></td>';
	        	result += '</tr>';
        	}
        	$('#users_off tr:last').after(result);
		}
	});
});

function valEvent(shift_id) {

	$.ajax({
		url: 'ajax.php?mode=valEvent',
		type: 'POST',
		data: 'shift_id=' + shift_id,
		success: function(){
			result = '<div class="alert alert-dismissible alert-success">';
			result += '<button type="button" class="close" data-dismiss="alert">&times;</button>';
            result += '<h4 class="alert-heading">Succes!</h4>';
          	result += '<p><strong>Event validated!</strong></p>';
        	result += '</div>';
        	__('_AJAX_ADMINEVENTS_').innerHTML = result;
			location.reload();
		},
		error: function () {
			result = '<div class="alert alert-dismissible alert-danger">';
			result += '<button type="button" class="close" data-dismiss="alert">&times;</button>';
            result += '<h4 class="alert-heading">Error!</h4>';
          	result += '<p><strong>The event couldnt be validated!</strong></p>';
        	result += '</div>';
        	__('_AJAX_ADMINEVENTS_').innerHTML = result;  	
		}
	});
}

function valUser(id) {

	$.ajax({
		url: 'ajax.php?mode=valUser',
		type: 'POST',
		data: 'id=' + id,
		success: function(){
			result = '<div class="alert alert-dismissible alert-success">';
			result += '<button type="button" class="close" data-dismiss="alert">&times;</button>';
            result += '<h4 class="alert-heading">Succes!</h4>';
          	result += '<p><strong>User validated!</strong></p>';
        	result += '</div>';
        	__('_AJAX_ADMINUSERS_').innerHTML = result;
			location.reload();
		},
		error: function () {
			result = '<div class="alert alert-dismissible alert-danger">';
			result += '<button type="button" class="close" data-dismiss="alert">&times;</button>';
            result += '<h4 class="alert-heading">Error!</h4>';
          	result += '<p><strong>The user couldnt be validated!</strong></p>';
        	result += '</div>';
        	__('_AJAX_ADMINUSERS_').innerHTML = result;  	
		}
	});
}

            
            
          
