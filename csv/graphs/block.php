<?php

session_start();
 
$points = $_SESSION['blockgraph'];
 ?>



<!DOCTYPE HTML>
<html>
    
<head>

<script>
window.onload = function() {
 
var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	theme: "light2",
	title:{
		text: "0-20"
	},
	axisY: {
		title: "DEPTH (in meters)"
	},
	data: [{
		type: "column",
		yValueFormatString: "#,##0.## meters",
		dataPoints: <?php echo json_encode($points[0], JSON_NUMERIC_CHECK); ?>
	}]
});

chart.render();

var chart1 = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	theme: "light2",
	title:{
		text: "20-40"
	},
	axisY: {
		title: "DEPTH (in meters)"
	},
	data: [{
		type: "column",
		yValueFormatString: "#,##0.## meters",
		dataPoints: <?php echo json_encode($points[1], JSON_NUMERIC_CHECK); ?>
	}]
});
chart1.render();

var chart2 = new CanvasJS.Chart("chartContainer2", {
	animationEnabled: true,
	theme: "light2",
	title:{
		text: "40-60"
	},
	axisY: {
		title: "DEPTH (in meters)"
	},
	data: [{
		type: "column",
		yValueFormatString: "#,##0.## meters",
		dataPoints: <?php echo json_encode($points[2], JSON_NUMERIC_CHECK); ?>
	}]
});
chart2.render();
var chart3 = new CanvasJS.Chart("chartContainer3", {
	animationEnabled: true,
	theme: "light2",
	title:{
		text: "60-70"
	},
	axisY: {
		title: "DEPTH (in meters)"
	},
	data: [{
		type: "column",
		yValueFormatString: "#,##0.## meters",
		dataPoints: <?php echo json_encode($points[3], JSON_NUMERIC_CHECK); ?>
	}]
});
chart3.render();

var chart4 = new CanvasJS.Chart("chartContainer4", {
	animationEnabled: true,
	theme: "light2",
	title:{
		text: "70-90"
	},
	axisY: {
		title: "DEPTH (in meters)"
	},
	data: [{
		type: "column",
		yValueFormatString: "#,##0.## meters",
		dataPoints: <?php echo json_encode($points[4], JSON_NUMERIC_CHECK); ?>
	}]
});
chart4.render();

var chart5 = new CanvasJS.Chart("chartContainer5", {
	animationEnabled: true,
	theme: "light2",
	title:{
		text: "90-110"
	},
	axisY: {
		title: "DEPTH (in meters)"
	},
	data: [{
		type: "column",
		yValueFormatString: "#,##0.## meters",
		dataPoints: <?php echo json_encode($points[5], JSON_NUMERIC_CHECK); ?>
	}]
});
chart5.render();

var chart6 = new CanvasJS.Chart("chartContainer6", {
	animationEnabled: true,
	theme: "light2",
	title:{
		text: "110-130"
	},
	axisY: {
		title: "DEPTH (in meters)"
	},
	data: [{
		type: "column",
		yValueFormatString: "#,##0.## meters",
		dataPoints: <?php echo json_encode($points[6], JSON_NUMERIC_CHECK); ?>
	}]
});
chart6.render();

var chart7 = new CanvasJS.Chart("chartContainer7", {
	animationEnabled: true,
	theme: "light2",
	title:{
		text: "130-150"
	},
	axisY: {
		title: "DEPTH (in meters)"
	},
	data: [{
		type: "column",
		yValueFormatString: "#,##0.## meters",
		dataPoints: <?php echo json_encode($points[7], JSON_NUMERIC_CHECK); ?>
	}]
});
chart7.render();

var chart8 = new CanvasJS.Chart("chartContainer8", {
	animationEnabled: true,
	theme: "light2",
	title:{
		text: ">150"
	},
	axisY: {
		title: "DEPTH (in meters)"
	},
	data: [{
		type: "column",
		yValueFormatString: "#,##0.## meters",
		dataPoints: <?php echo json_encode($points[8], JSON_NUMERIC_CHECK); ?>
	}]
});
chart8.render();
 
}
</script>
</head>
<body>
<div id="chartContainer" style="height: 370px; width: 100%;"></div>
<div id="chartContainer1" style="height: 370px; width: 100%;"></div>
<div id="chartContainer2" style="height: 370px; width: 100%;"></div>
<div id="chartContainer3" style="height: 370px; width: 100%;"></div>
<div id="chartContainer4" style="height: 370px; width: 100%;"></div>
<div id="chartContainer5" style="height: 370px; width: 100%;"></div>
<div id="chartContainer6" style="height: 370px; width: 100%;"></div>
<div id="chartContainer7" style="height: 370px; width: 100%;"></div>
<div id="chartContainer8" style="height: 370px; width: 100%;"></div>

<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</body>
</html>             