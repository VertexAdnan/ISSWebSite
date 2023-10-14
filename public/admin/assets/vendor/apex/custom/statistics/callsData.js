var options = {
	chart: {
		height: 203,
		type: "line",
		toolbar: {
			show: false,
		},
	},
	plotOptions: {
		bar: {
			horizontal: false,
			columnWidth: "40px",
			borderRadius: 7,
		},
	},
	dataLabels: {
		enabled: false,
	},
	stroke: {
		show: true,
		width: 2,
		colors: ["#4285f4", "#fabb05", "#4285f4"],
	},
	series: [
		{
			name: "Incoming",
			data: [20, 55, 49, 60, 20, 60, 20],
		},
		{
			name: "OutGoing",
			data: [25, 35, 65, 35, 45, 30, 85],
		},
	],
	legend: {
		show: false,
	},
	xaxis: {
		categories: ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"],
	},
	yaxis: {
		show: false,
	},
	fill: {
		opacity: 1,
	},
	tooltip: {
		y: {
			formatter: function (val) {
				return val;
			},
		},
	},
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
		padding: {
			top: 0,
			right: 0,
			bottom: 0,
			left: 0,
		},
	},
	colors: ["transparent", "transparent", "transparent"],
};
var chart = new ApexCharts(document.querySelector("#callsData"), options);
chart.render();
