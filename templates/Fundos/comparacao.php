<?php
/**
 */
?>
<div class="Fundos comparacao content">
	<h2><?= __('Comparação de Fundos') ?></h2>
	<div class="row">
		<h4><?= __('Adicione os fundos que deseja comparar aqui no campo abaixo:') ?></h4>
	</div>
	<div class="row">
		<h3><?= __('Retorno x Risco') ?></h3>
	</div>
	<div class="row">
		<div class="column-graph">
			<?php
			echo$this->element('titleInfo', array('title' => __('Retorno x Risco'), 'align' => 'center', 'tam' => 4, 'info' => __('A relação entre o retorno esperado e o risco de um investimento fé um indicador que permite avaliar se um fundo "vale a pena" ou não. Riscos mais altos devem ser recompensados com um retorno maior. Se o aumento do risco não estiver associado a um retorno maior, o investimento pode não ser interessante...')));
			$data = array();
			$data[] = "['ID', 'Risco', 'Retorno'],";
			foreach ($indicadores as $indicador) {
				$data[] = "['" . $indicador['periodo_meses'] . "'," . $indicador['desvio_padrao'] . "," . $indicador['rentabilidade'] . "],";
			}
			echo$this->element('googleChartFundo', array('data' => $data, 'title' => '', 'vAxisTitle' => 'Retorno', 'vAxisFormat' => 'percent', 'hAxisTitle' => 'Risco', 'hAxisFormat' => 'percent', 'chartType' => 'Bubble', 'chart' => 'chart6_div'));
			?>
			<div id="chart6_div" style="width: 100%; height: 400px;"></div>
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
				foreach ($alocacoes['fundos_id'] as $peso):
					?>
					<tr>
						<td>
							F<?= $peso ?>
						</td>
						<?php for ($j = 1; $j <= $i; $j++)
							echo('<td></td>'); $i++;
						?>
					</tr>
<?php endforeach; ?>
			</thead>
		</table>
	</div>

</div>
