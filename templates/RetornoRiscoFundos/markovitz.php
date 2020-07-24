<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\RetornoRiscoFundo[]|\Cake\Collection\CollectionInterface $retornoRiscoFundos
 */
?>
<div class="retornoRiscoFundos index content">
	<h2><?= __('Análise e Otimização') ?></h2>
	<div class="row">
		<h3><?= __('Análise do retorno e risco e correlação') ?></h3>
	</div>
	<div class="row">
		<div class="column">
			<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
			<script type="text/javascript">
				google.charts.load('current', {'packages': ['corechart']});
				google.charts.setOnLoadCallback(drawSeriesChart);

				function drawSeriesChart() {

					var data = google.visualization.arrayToDataTable([
						['ID', 'Risco', 'Retorno', 'Categoria', ''],
<?php foreach ($retornoRiscoFundos as $retornoRiscoFundo): ?>
	<?php echo("['F" . $retornoRiscoFundo->cnpj_fundo_id . "'," . $retornoRiscoFundo->desvio_padrao . "," . $retornoRiscoFundo->rentab_media . ",'" . $retornoRiscoFundo->cnpj_fundo->cadastro_fundos[0]->tipo_classe_fundo->classe . "', 15],"); ?>
<?php endforeach; ?>
					]);

					var options = {
						title: 'Risco X Retorno',
						hAxis: {title: 'Risco', viewWindowMode: 'pretty'}, //, format: 'percent'},
						vAxis: {title: 'Retorno'}, //, format: 'percent'},
						sizeAxis: {minValue: 15, maxSize: 20},
						bubble: {
							textStyle: {auraColor: 'none'}
						}
					}

					var chart = new google.visualization.BubbleChart(document.getElementById('chart1_div'));
					chart.draw(data, options);
				}
			</script>
			<div id="chart1_div" style="width: 100%; height: 500px;"></div>
		</div>
	</div>

	<div class="row">
		<h3><?= __('Análise de correlação') ?></h3>
	</div>
	<div class="row">
		
	</div>

	<div class="row">
		<h3><?= __('Fronteira eficiente e otimização') ?></h3>
	</div>
	<div class="row">
		<div class="table-responsive">
			<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
			<script type="text/javascript">
				google.charts.load('current', {'packages': ['corechart']});
				google.charts.setOnLoadCallback(drawSeriesChart);

				function drawSeriesChart() {

					var data = google.visualization.arrayToDataTable([
						['Carteira', 'Risco', 'Retorno', 'Categoria'], //, 'Population'],
<?php foreach ($alocacoes['alocacoes'] as $aloc): ?>
	<?php echo("['" . $aloc['id'] . "'," . $aloc['risco'] . "," . $aloc['rentabilidade'] . ",'" . $aloc['id'] . "'],"); ?>
<?php endforeach; ?>
					]);

					var options = {
						title: 'Fronteira Eficiente de Carteiras de Investimento',
						hAxis: {title: 'Risco'}, //, format: 'percent'},
						vAxis: {title: 'Retorno'}, //, format: 'percent'},
						colorAxis: {minValue: 0, colors: ['#000000', '#00FF00']},
						legend: 'none',//{position: 'right', textStyle: {color: 'blue', fontSize: 11}},
						sizeAxis: {minValue: 5, maxSize: 9},
						bubble: {
							textStyle: {auraColor: 'none', fontSize: 10}
						}
					}

					var chart = new google.visualization.BubbleChart(document.getElementById('chart2_div'));
					chart.draw(data, options);
				}
			</script>
			<div id="chart2_div" style="width: 100%; height: 500px;"></div>
		</div>
	</div>

	<div class="row">
		<table>
			<tr>
				<th>Carteira</th>
				<?php foreach ($alocacoes['fundos_id'] as $peso): ?>
					<th>Peso F<?= $peso ?></th>
				<?php endforeach; ?>
				<th>Rentabilidade</th>
				<th>Risco</th>
			</tr>
			<?php foreach ($alocacoes['alocacoes'] as $aloc): ?>
				<tr>
					<td>
						<?php echo($aloc['id']); ?>
					</td>
					<?php foreach ($aloc['pesos'] as $peso): ?>
						<td>
							<?php echo($this->Number->toPercentage($peso * 100, 2)); ?>
						</td>
					<?php endforeach; ?>
					<td>
						<?php echo($this->Number->toPercentage($aloc['rentabilidade'], 2)); ?>
					</td>
					<td>
						<?php echo($this->Number->toPercentage($aloc['risco'], 2)); ?>
					</td>
				</tr>
			<?php endforeach; ?>
		</table>
	</div>

</div>
