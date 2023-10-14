var options = {
	chart: {
		height: 150,
		toolbar: {
			show: false,
		},
	},
	dataLabels: {
		enabled: false,
	},
	stroke: {
		curve: "smooth",
		width: 3,
	},
	series: [
		{
			name: "Avg. Time",
			type: "line",
			data: [0.5, 1.5, 0.5, 2, 0.5, 1.5, 0.5],
		},
	],
	grid: {
		borderColor: "rgba(255, 255, 255, .30)",
		strokeDashArray: 3,
		xaxis: {
			lines: {
				show: true,
			},
		},
		yaxis: {
			lines: {
				show: false,
			},
		},
	},
	xaxis: {
		categories: ["S", "M", "T", "W", "T", "F", "S"],
		labels: {
			datetimeFormatter: {
				year: "yyyy",
				month: "MMM 'yy",
				day: "dd MMM",
				hour: "HH:mm",
			},
		},
	},
	yaxis: {
		labels: {
			show: true,
		},
	},
	tooltip: {
		y: {
			formatter: function (val) {
				return val + " Hours";
			},
		},
	},
	colors: ["#fabb05", "#f23c7b"],
};

var chart = new ApexCharts(document.querySelector("#avgTimeData"), options);

chart.render();
