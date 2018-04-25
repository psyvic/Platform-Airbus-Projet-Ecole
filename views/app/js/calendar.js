$(document).ready(function() {

	$('#calendar').fullCalendar({
		theme: true,
		themeSystem: 'bootstrap3',
		header: {
	    left: 'prev,next today',
	    center: 'title',
	    right: 'month,agendaWeek,agendaDay'
	},
		// events: _this.state.events,
		defaultView:'month',
		displayEventTime: false,
		editable: false,
		droppable: false,
		durationEditable: false
	});
});