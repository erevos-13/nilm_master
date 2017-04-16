$(document).ready(function(){
	$.ajax({
		url: "see_hour.php",
		method: "GET",
		success: function(data) {
			console.log(data);
			var watt = [];
			var date_time = [];

			for(var i in data) {
				date_time.push("time: " + data[i].date_time);
				watt.push(data[i].watt);
			}

			var chartdata = {
				labels: date_time,
				"datasets" : [
					{
						label: 'watt',
						backgroundColor: 'rgba(53, 102, 150, 0.3)', 
						borderColor: 'rgba(53, 102, 150, 1)',
						hoverBackgroundColor: 'rgba(53, 102, 150, 1)',
						hoverBorderColor: 'rgba(53, 102, 150, 1)',
						data: watt
					}
				]
			};

			var ctx = $("#mycanvasSee_hour");

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