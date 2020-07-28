<?php
/**
 */
?>
<div class="Fundos comparacao content">
	<h2><?= __('Comparação de Fundos') ?></h2>
	<div class="row">
		<h4><?= __('	Adicione os fundos que deseja comparar aqui no campo abaixo:') ?></h4>
	</div>
	<div class="row">
		<h3><?= __('Retorno x Risco') ?></h3>
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
<?php
$retMax = 0.0;
$devMax = 0.0;
foreach ($retornoRiscoFundos as $retornoRiscoFundo):
	?>
	<?php echo("['F" . $retornoRiscoFundo->cnpj_fundo_id . ": " . $retornoRiscoFundo->cnpj_fundo->DENOM_SOCIAL . "'," . $retornoRiscoFundo->desvio_padrao . "," . $retornoRiscoFundo->rentab_media . ",'" . $retornoRiscoFundo->cnpj_fundo->cadastro_fundos[0]->tipo_classe_fundo->classe . "', 15],"); ?>
	<?php if ($retornoRiscoFundo->rentab_media > $retMax) $retMax = $retornoRiscoFundo->rentab_media; ?>
	<?php if ($retornoRiscoFundo->desvio_padrao > $devMax) $devMax = $retornoRiscoFundo->desvio_padrao; ?>
<?php endforeach; ?>
					]);

					var options = {
						title: 'Risco X Retorno',
						hAxis: {title: 'Risco', viewWindowMode: 'pretty', viewWindow: {max:<?php echo ($devMax * 1.1); ?>}}, //, format: 'percent'},
						vAxis: {title: 'Retorno', viewWindowMode: 'pretty', viewWindow: {max:<?php echo ($retMax * 1.1); ?>}}, //, format: 'percent'},
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
		<h3><?= __('Índices Sharpe e Beta') ?></h3>
	</div>
	<div class="row">
		
	</div>

	<div class="row">
		<h3><?= __('Correlação') ?></h3>
	</div>
	<div class="row">
		<table>
			<thead>
				<tr>
					<th>Fundos</th>
					<?php foreach ($alocacoes['fundos_id'] as $peso): ?>
						<th>F<?= $peso ?></th>
					<?php endforeach; ?>
				</tr>
				<?php $i = 1;
				foreach ($alocacoes['fundos_id'] as $peso): ?>
					<tr>
						<td>
							F<?= $peso ?>
						</td>
					<?php for ($j = 1; $j <= $i; $j++)
						echo('<td></td>'); $i++; ?>
					</tr>
<?php endforeach; ?>
			</thead>
		</table>
	</div>

</div>
