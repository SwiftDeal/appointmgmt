var now = new Date();
now = now.toISOString();
var today = now.split("T")[0];	// today: '2015-09-14'

$(document).ready(function () {
	$("#calendar").fullCalendar({
		header: {
			left: 'prev,next today',
			center: 'title',
			right: 'month,agendaWeek,agendaDay'
		},
		dayClick: function (date) {
			$('#sendDate').attr("value", date.format());
			$('#addEvent').modal('show');
			$('#addAppointment').on('submit', function () {
				reloadCalCal();
			});
		},
		defaultDate: today,
		timezone: 'Asia/Kolkata',
		editable: true,
		eventClick: function (event) {
			x = confirm('Delete the appointment?');
			if (x) {
				deleteEvent(event.id);
			}
		},
		eventLimit: true, // allow "more" link when too many events
		eventSources: ["/appointments/all"],
		eventResize: function (event, delta, revertFunc) {
			alert('event is changed');
			console.log(event);
		}
	});

});

function deleteEvent(eventId) {
	$.ajax({
		url: "/appointments/delete/" + eventId,
		type: 'GET'
	})
	.done(function(data) {
		if (data == 1) {
			alert('Appointment has been deleted');
		} else {
			alert('Failed to delete appointment');
		}
		reloadCal();
	})
	.fail(function() {
		alert('Failed to delete appointment');
	});
}

function reloadCal() {
	window.location.href = "/appointments";
}