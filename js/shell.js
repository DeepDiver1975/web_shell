$(document).ready(function() {
	//$('#shell').onsubmit(function() {
	//	return false;
	//});
	$('#cli').keypress(function (e) {
		if (e.which == 13) {
			$.ajax({
				url: OC.generateUrl('/apps/web_shell/execute'),
				contentType: 'application/json',
				data: JSON.stringify({
					command: $('#cli').val()
				}),
				dataType: 'json',
				type: 'POST'
			}).fail(function(response) {
				var message = '';
				// show message if it is available
				if(response.responseJSON && response.responseJSON.message) {
					message = ': ' + response.responseJSON.message;
				}
				OC.Notification.showTemporary(t('web_shell', 'An error occurred while trying to execute the command: ') + message);
			}).success(function(response) {
				$('#output').html(response.output);
			});

			return false;
		}
	});
});
