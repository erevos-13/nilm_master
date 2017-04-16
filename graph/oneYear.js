$(document).ready(function(){
	$.ajax({
		url: "oneYear.php",
		method: "GET",
		success: function(data) {
			console.log(data);
			var watt = [];
			var date_time = [];

			for(var i in data) {
				date_time.push("time:" + data[i].date_time);
				watt.push(data[i].watt);
			}

			var chartdata = {
				labels: date_time,
				"datasets" : [
					{
						label: 'watt',
						backgroundColor: 'rgba(43, 140, 236, 0.3)',
						borderColor: 'rgba(43, 140, 236, 1)',
						hoverBackgroundColor: 'rgba(200, 200, 200, 1)',
						hoverBorderColor: 'rgba(200, 200, 200, 1)',
						data: watt
					}
				]
			};

			var ctx = $("#mycanvasOneYear");

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