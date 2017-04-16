$(document).ready(function(){
	$.ajax({
		url: "devices.php",
		method: "GET",
		success: function(data) {
			console.log(data);
			var watt1 = [];
			var date_time = [];

			for(var i in data) {
				date_time.push("time: " + data[i].date_time);
				watt1.push(data[i].watt1);
			}

			var chartdata = {
				labels: date_time,
				"datasets" : [
					{
						label: 'watt1',
						backgroundColor: 'rgba(53, 102, 150, 0.3)', 
						borderColor: 'rgba(53, 102, 150, 1)',
						hoverBackgroundColor: 'rgba(53, 102, 150, 1)',
						hoverBorderColor: 'rgba(53, 102, 150, 1)',
						data: watt1
					}
				]
			};

			var ctx = $("#mycanvas_see_devices");

			var barGraph = new Chart(ctx, {
				type: 'line',
				data: chartdata
			});
		},
		error: function(data) {
			console.log(data);
		}
	});
});