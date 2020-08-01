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
<?php
echo('var data = google.visualization.');
echo ($dataType . '(');
if ($dataType == 'arrayToDataTable') {
	echo('[');
} else { // $dataType == 'DataTable'
	echo(');');
}
foreach ($data as $datum) {
	echo $datum;
}
if ($dataType == 'arrayToDataTable') {
	echo(']);');
}
?>

		var options = {
			//title: '<= $title ?>',
			//chartArea: {width: '75%', height: '75%'},
			chartArea: {top: 30, left: 100, bottom: 80, width: "100%", height: "100%"},
			is3D: 'true',
			crosshair: {trigger: 'both'},
			legend: {position: 'top'},
			hAxis: {title: '<?= $hAxisTitle ?>', titleTextStyle: {color: '#333'},
				format: '<?= $hAxisFormat ?>', gridlines: {color: '#333', minSpacing: 60}, viewWindowMode: 'pretty'},
			vAxis: {title: '<?= $vAxisTitle ?>', format: '<?= $vAxisFormat ?>', viewWindowMode: 'pretty'}, //, gridlines: {color: '#333', minSpacing: 20}},
			//series: {2: {targetAxisIndex:1}},
			//vAxes: {1: {title:'Patrimônio', textStyle: {color: 'red'}}},
			areaOpacity: 0.2,
			enableInteractivity: 'true',
			lineWidth: 2,
			//selectionMode: 'multiple',
			aggregationTarget: 'category',
			animation: {easing: 'inAndOut', duration: '2000', startup: 'true'},
			sizeAxis: {minValue: 6, maxSize: 10},
			bubble: {textStyle: {auraColor: 'yellow', fontSize: 10}},
			focusTarget: <?php
if ($chartType == 'Bubble')
	echo("'datum'");
else
	echo("'category'");
?>,
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