<script type="text/javascript">
	google.charts.load('current', {'packages': ['corechart']});
	google.charts.setOnLoadCallback(drawChart);

<?php
if (!isset($title)) {
	$title = '';
}
if (!isset($vAxisTitle)) {
	$vAxisTitle = '';
}
if (!isset($hAxisTitle)) {
	$hAxisTitle = 'data';
}
if (!isset($vAxisFormat)) {
	$vAxisFormat = '';
}
if (!isset($hAxisFormat)) {
	$hAxisFormat = 'd/m/y';
}
if (!isset($chartType)) {
	$chartType = 'Area';
}
if (!isset($dataType)) {
	$dataType = 'arrayToDataTable';
}
?>

	function drawChart() {
		var data = google.visualization.arrayToDataTable([
<?php
foreach ($data as $datum) {
	echo $datum;
}
?>
		]);

		var options = {
			//title: '<= $title ?>',
			//chartArea: {width: '75%', height: '75%'},
			chartArea: {top: 30, left: 100, bottom: 80, width: "100%", height: "100%"},
			is3D: 'true',
			crosshair: {trigger: 'both'},
			legend: {position: 'top'},
			hAxis: {title: '<?= $hAxisTitle ?>', titleTextStyle: {color: '#333'},
				format: '<?= $hAxisFormat ?>', gridlines: {color: '#333', minSpacing: 60}, viewWindowMode: 'pretty'},
			vAxis: {title: '<?= $vAxisTitle ?>', minValue: 0, format: '<?= $vAxisFormat ?>', viewWindowMode: 'pretty'}, //, gridlines: {color: '#333', minSpacing: 20}},
			//series: {2: {targetAxisIndex:1}},
			//vAxes: {1: {title:'Patrimônio', textStyle: {color: 'red'}}},
			areaOpacity: 0.2,
			enableInteractivity: 'true',
			focusTarget: <?php
if ($chartType == 'Bubble')
	echo("'datum'");
else
	echo("'category'");
?>,
			lineWidth: 2,
			//selectionMode: 'multiple',
			aggregationTarget: 'category',
			animation: {easing: 'in', duration: '200', startup: 'true'},
			sizeAxis: {minValue: 6, maxSize: 10},
			bubble: {textStyle: {auraColor: 'yellow', fontSize: 10}},
		};

		var chart = new google.visualization.<?= $chartType ?>Chart(document.getElementById('<?= $chart ?>'));
		//google.visualization.events.addListener(chart, 'select', selectHandler);
		chart.draw(data, options);
	}

	function selectHandler() {
		var selectedItem = chart.getSelection()[0];
		if (selectedItem) {
			var value = data.getValue(selectedItem.row, selectedItem.column);
			alert('The user selected ' + value);
		}
	}


</script>