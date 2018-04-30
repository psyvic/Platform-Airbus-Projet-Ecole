var event;

$(document).ready(function() {

	$('#calendar').fullCalendar({
		events: 'http://localhost:8888/RTP-TWEB/index4.php',
		theme: true,
		themeSystem: 'bootstrap3',
		header: {
	    left: 'prev,next,today,mybutton',
	    center: 'title',
	    right: 'month,agendaWeek,agendaDay'
		},
		customButtons: {
			mybutton: {
				text: 'mega button',
				click: function(){
					alert("my ultra button");
				}
			}
		},
		dayClick: function(date, jsEvent, view){
			cleanEvent();
	 		console.log('clicked on ' + date.format());
	 		$("#start").val(date.format());
	 		$("#end").val(date.format());
			$("#eraseEventBtn").css("display","none");
	 		$("#updateEventBtn").css("display","none");
	 		$("#addEventBtn").css("display","");	 		
			$("#deployment").modal();
		},
		eventClick: function(calEvent, jsEvent, view){
			cleanEvent();
			console.log(calEvent.start);
			console.log(calEvent.end);
	 		$("#start").val(calEvent.start.format());
	 		if (!(calEvent.end)) {
				$("#end").val(calEvent.start.format());
			} else {
				$("#end").val(calEvent.end.format());
			}
			$('#icao').val(calEvent.title);
			$('#shift_id').val(calEvent.shift_id);
			$("#eraseEventBtn").css("display","");
	 		$("#updateEventBtn").css("display","");
	 		$("#addEventBtn").css("display","none");	 				
			$("#deployment").modal();
		},
		defaultView:'month',
		displayEventTime: false,
		editable: true,
		eventDrop: function (calEvent) {
	 		$("#start").val(calEvent.start.format());
	 		if (!(calEvent.end)) {
				$("#end").val(calEvent.start.format());
			} else {
				$("#end").val(calEvent.end.format());
			}
			$('#icao').val(calEvent.title);
			$('#shift_id').val(calEvent.shift_id);
			updateEvent();
		},
		droppable: false,
		durationEditable: false
	})

});

function goEvents() {
	connect = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
	connect.responseType = 'json';
	connect.onreadystatechange = function() {
		if (connect.readyState == 4 && connect.status == 200) {
			if (connect.response) {
				result = '<div class="alert alert-dismissible alert-info">';
	            result += '<h4 class="alert-heading">Connected!</h4>';
	          	result += '<p><strong>Events have been charged succesfully!</strong></p>';
	        	result += '</div>';
	        	__('_AJAX_CALENDAR_').innerHTML = result;
	        	return connect.response;
			} else {
				__('_AJAX_CALENDAR_').innerHTML = connect.response;
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
	connect.setRequestHeader('Content-Type', 'application/json; charset=utf-8');
	connect.send();
}

function addEvent() {
	
	recoverEvent();
	$.ajax({
		url: 'ajax.php?mode=addEvent',
		type: 'POST',
		data: event,
		dataType: 'JSON',
		success: function(){
			result = '<div class="alert alert-dismissible alert-success">';
			result += '<button type="button" class="close" data-dismiss="alert">&times;</button>';
            result += '<h4 class="alert-heading">Succes!</h4>';
          	result += '<p><strong>Event added!</strong></p>';
        	result += '</div>';
        	__('_AJAX_ADD_EVENT_').innerHTML = result;
        	$('#calendar').fullCalendar('refetchEvents');
        	setTimeout(function(){
			        $("#deployment").modal('toggle');
        			 __('_AJAX_ADD_EVENT_').innerHTML = "";
			  	}, 2000);
		},
		error: function () {
			result = '<div class="alert alert-dismissible alert-danger">';
			result += '<button type="button" class="close" data-dismiss="alert">&times;</button>';
            result += '<h4 class="alert-heading">Error!</h4>';
          	result += '<p><strong>The event couldnt be added!</strong></p>';
        	result += '</div>';
        	__('_AJAX_ADD_EVENT_').innerHTML = result;
        	setTimeout(function(){
        			 __('_AJAX_ADD_EVENT_').innerHTML = "";
			  	}, 3000);
		}
	});
}

function eraseEvent() {
	
	recoverEvent();
	console.log(event);
	$.ajax({
		url: 'ajax.php?mode=eraseEvent',
		type: 'POST',
		data: event,
		dataType: 'JSON',
		success: function(){
			result = '<div class="alert alert-dismissible alert-success">';
			result += '<button type="button" class="close" data-dismiss="alert">&times;</button>';
            result += '<h4 class="alert-heading">Succes!</h4>';
          	result += '<p><strong>Event erased!</strong></p>';
        	result += '</div>';
        	__('_AJAX_ADD_EVENT_').innerHTML = result;
        	$('#calendar').fullCalendar('refetchEvents');
        	setTimeout(function(){
			        $("#deployment").modal('toggle');
        			 __('_AJAX_ADD_EVENT_').innerHTML = "";
			  	}, 2000);
		},
		error: function () {
			result = '<div class="alert alert-dismissible alert-danger">';
			result += '<button type="button" class="close" data-dismiss="alert">&times;</button>';
            result += '<h4 class="alert-heading">Error!</h4>';
          	result += '<p><strong>The event couldnt be erased!</strong></p>';
        	result += '</div>';
        	__('_AJAX_ADD_EVENT_').innerHTML = result;
        	setTimeout(function(){
        			 __('_AJAX_ADD_EVENT_').innerHTML = "";
			  	}, 3000);        	
		}
	});
}

function updateEvent() {
	
	recoverEvent();
	console.log(event);
	$.ajax({
		url: 'ajax.php?mode=updateEvent',
		type: 'POST',
		data: event,
		dataType: 'JSON',
		success: function(){
			result = '<div class="alert alert-dismissible alert-success">';
			result += '<button type="button" class="close" data-dismiss="alert">&times;</button>';
            result += '<h4 class="alert-heading">Succes!</h4>';
          	result += '<p><strong>Event updated!</strong></p>';
        	result += '</div>';
        	__('_AJAX_ADD_EVENT_').innerHTML = result;
        	$('#calendar').fullCalendar('refetchEvents');
        	setTimeout(function(){
			        $("#deployment").modal('toggle');
        			 __('_AJAX_ADD_EVENT_').innerHTML = "";
			  	}, 2000);
		},
		error: function () {
			result = '<div class="alert alert-dismissible alert-danger">';
			result += '<button type="button" class="close" data-dismiss="alert">&times;</button>';
            result += '<h4 class="alert-heading">Error!</h4>';
          	result += '<p><strong>The event couldnt be updated!</strong></p>';
        	result += '</div>';
        	__('_AJAX_ADD_EVENT_').innerHTML = result;
        	setTimeout(function(){
        			 __('_AJAX_ADD_EVENT_').innerHTML = "";
			  	}, 3000);        	
		}
	});
}

function runScriptEvent(e) {
	
	if (e.keyCode == 13) {
		addEvent();
	}
}

function recoverEvent() {
	event = {
		start : __('start').value,
		end : __('end').value,
		icao : __('icao').value,
		shift_id : __('shift_id').value
	};
}

function cleanEvent() {
	$('#shift_id').val("");
}
