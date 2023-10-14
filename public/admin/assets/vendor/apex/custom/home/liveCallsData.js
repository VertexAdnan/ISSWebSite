var options = {
	series: [15, 18],
	chart: {
		height: 220,
		type: "polarArea",
	},
	labels: ["Incoming", "Outgoing"],
	fill: {
		opacity: 1,
	},
	stroke: {
		width: 1,
		colors: ["#ffffff", "#ffffff", "#ffffff"],
	},
	colors: ["#0a50d8", "#57637B", "#D6DAE3"],
	yaxis: {
		show: false,
	},
	legend: {
		show: false,
	},
	tooltip: {
		y: {
			formatter: function (val) {
				return val;
			},
		},
	},
	plotOptions: {
		polarArea: {
			rings: {
				strokeWidth: 0,
			},
			spokes: {
				strokeWidth: 0,
			},
		},
	},
};

var chart = new ApexCharts(document.querySelector("#liveCallsData"), options);
chart.render();
