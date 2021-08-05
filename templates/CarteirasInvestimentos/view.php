<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CarteirasInvestimento $carteirasInvestimento
 */
?>
<div class="row">
	<div class="column-responsive column-100">
		<div class="carteirasInvestimentos view content">
			<table>
				<tr>
					<th><?= __('Nome') ?></th>
					<td><?= h($carteirasInvestimento->nome) ?></td>
				</tr>
				<tr>
					<th><?= __('Descricao') ?></th>
					<td><?= h($carteirasInvestimento->descricao) ?></td>
				</tr>
			</table>

			<div class="related">
				<h4><?= __('Operações Financeiras (Transações)') ?></h4>
				<?= $this->Html->link(__('Nova Operação Financeira'), ['controller' => 'OperacoesFinanceiras', 'action' => 'add', $carteirasInvestimento->id], ['class' => 'button float-right']) ?>

				<?php if (!empty($carteirasInvestimento->operacoes_financeiras)) : ?>
					<div class="table-responsive">
						<table>
							<tr>
								<th><?= __('Id') ?></th>
								<th><?= __('Cnpj Fundo Id') ?></th>
								<th><?= __('Distribuidor Fundo Id') ?></th>
								<th><?= __('Tipo Operacoes Financeira Id') ?></th>
								<th><?= __('Por Valor') ?></th>
								<th><?= __('Valor Total') ?></th>
								<th><?= __('Valor Cota') ?></th>
								<th><?= __('Quantidade Cotas') ?></th>
								<th><?= __('Data') ?></th>
								<th class="actions"><?= __('Actions') ?></th>
							</tr>
							<?php foreach ($carteirasInvestimento->operacoes_financeiras as $operacoesFinanceiras) : ?>
								<tr>
									<td><?= h($operacoesFinanceiras->id) ?></td>
									<td><?= h($operacoesFinanceiras->cnpj_fundo_id) ?></td>
									<td><?= h($operacoesFinanceiras->distribuidor_fundo_id) ?></td>
									<td><?= h($operacoesFinanceiras->tipo_operacoes_financeira_id) ?></td>
									<td><?= h($operacoesFinanceiras->por_valor) ?></td>
									<td><?= h($operacoesFinanceiras->valor_total) ?></td>
									<td><?= h($operacoesFinanceiras->valor_cota) ?></td>
									<td><?= h($operacoesFinanceiras->quantidade_cotas) ?></td>
									<td><?= h($operacoesFinanceiras->data) ?></td>
									<td class="actions">
										<?= $this->Html->link(__('View'), ['controller' => 'OperacoesFinanceiras', 'action' => 'view', $operacoesFinanceiras->id]) ?>
										<?= $this->Html->link(__('Edit'), ['controller' => 'OperacoesFinanceiras', 'action' => 'edit', $operacoesFinanceiras->id]) ?>
										<?= $this->Form->postLink(__('Delete'), ['controller' => 'OperacoesFinanceiras', 'action' => 'delete', $operacoesFinanceiras->id], ['confirm' => __('Are you sure you want to delete # {0}?', $operacoesFinanceiras->id)]) ?>
									</td>
								</tr>
							<?php endforeach; ?>
						</table>
					</div>
				<?php endif; ?>
			</div>
			<br>
			<br>
			<?php if (!empty($carteirasInvestimento->operacoes_financeiras)) : ?>
				<div class="related">
					<h4><?= __('Indicadores Financeiros da Carteira') ?></h4>
					<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
					<script type='text/javascript'>
						google.charts.load('current', {
							'packages': ['annotationchart']
						});
						google.charts.setOnLoadCallback(drawChart);

						function drawChart() {
							var data = new google.visualization.DataTable();
							data.addColumn('date', 'Date');
							data.addColumn('number', 'Total');
							<?php
							foreach ($todosFundos as $fundo) {
								echo "data.addColumn('number', 'Fundo " . $fundo . "');";
							}
							?>
							<?php
							echo "data.addRows([";
							foreach ($tabelaFormatada as $linha) {
								echo "[new Date(" . $linha[0] . ", " . $linha[1] . ", " . $linha[2] . ")";
								for ($i = 3; $i < sizeof($linha); $i++) {
									echo ", " . $linha[$i];
								}
								echo "],";
							}
							echo "]);";
							?>

							var chart = new google.visualization.AnnotationChart(document.getElementById('chart-div'));

							var options = {
								fill: 10,
								height: 700,
								hAxis: {
									title: 'Mês'
								},
								vAxis: {
									title: 'Patrimônio'
								}
							};

							chart.draw(data, options);
						}
					</script>

					<div id="chart-div" style="width: 100%; margin-left: -20px;"></div>

					<br>


					<?php
					// todos os fundos e o 'Total'
					$todosFundosTotal = $todosFundos;
					$todosFundosTotal[] = 'Total';
					$qtdMesesPassados[] = 'Total';
					?>
					<br>
					<h5><?= __('Simulação por fundo') ?></h5>
					<div class="table-responsive">
						<table>
							<tr>
								<th>Fundo</th>
								<?php
								foreach ($qtdMesesPassados as $qtdMesPassado) : ?>
									<th>Retorno <?= $qtdMesPassado == 'Total' ? $qtdMesPassado : $qtdMesPassado . 'M'; ?></th>
								<?php endforeach; ?>
							</tr>
							<?php foreach ($todosFundosTotal as $fundoId) : ?>
								<tr>
									<th><?= $fundoId ?></th>
									<?php foreach ($qtdMesesPassados as $qtdMesPassado) : ?>
										<td>R$ <?= bcdiv($retornoFundoData[$qtdMesPassado][$fundoId], 1, 2) ?></td>
									<?php endforeach; ?>
								</tr>
							<?php endforeach; ?>
						</table>
						<br><br>
					</div>
					<br>

					<h5><?= __('Proporção de ativos') ?></h5>

					<script type="text/javascript">
						google.charts.load('current', {
							'packages': ['corechart']
						});
						google.charts.setOnLoadCallback(drawPieChart);

						function drawPieChart() {
							var data = google.visualization.arrayToDataTable(
								<?php
								$tamanho = sizeof($tabelaFormatada);
								echo "[['Fundo', 'Valor Total'],";
								foreach ($todosFundos as $index => $fundoId) {
									echo "['Fundo " . $fundoId . "', " . $tabelaFormatada[$tamanho - 1][$index + 4];
									echo "],";
								}
								echo "]";
								?>
							);

							var options = {
								height: 600,
								legend: {
									alignment: 'center',
									position: 'top'
								}
							};

							var pieChart = new google.visualization.PieChart(document.getElementById('pie-chart'));

							pieChart.draw(data, options);
						}
					</script>

					<div id="pie-chart" style="width: 100%;"></div>

					<h5><?= __('Proporção de classe de ativos') ?></h5>

					<script type="text/javascript">
						google.charts.load('current', {
							'packages': ['corechart']
						});
						google.charts.setOnLoadCallback(drawPieChart2);

						function drawPieChart2() {
							var data = google.visualization.arrayToDataTable(
								<?php
								echo "[['Classe de ativo', 'Valor Total'],";
								foreach ($balancoClasseTabela as $elemento) {
									echo "['" . $elemento['classe'] . "', " . $elemento['balanco'];
									echo "],";
								}
								echo "]";
								?>
							);

							var options = {
								height: 600,
								legend: {
									alignment: 'center',
									position: 'top'
								}
							};

							var pieChart = new google.visualization.PieChart(document.getElementById('pie-chart2'));

							pieChart.draw(data, options);
						}
					</script>

					<div id="pie-chart2" style="width: 100%;"></div>

					<?php

					// echo "dados que vao para o addRow() do grafico<br>";
					// foreach ($tabelaFormatada as $linha) {
					// 	echo "[new Date(" . $linha[0] . ", " . $linha[1] . ", " . $linha[2] . ")";
					// 	for ($i = 3; $i < sizeof($linha); $i++) {
					// 		echo ", " . $linha[$i];
					// 	}
					// 	echo "]," . "<br>";
					// }

					// echo "<br>=================<br>";

					// echo $dataOpMaisAntiga . "<br>";
					// echo $dataOpMaisRecente . "<br>";

					// echo "<br>=================<br>";

					// echo "meses:<br>";
					// foreach ($todasAsDatas as $mes) :
					// 	echo $mes . "<br>";
					// endforeach;

					// echo "<br>=================<br>";

					// echo "fundos:<br>";
					// foreach ($todosFundos as $fundo) :
					// 	echo $fundo . "<br>";
					// endforeach;

					// echo "<br>=================<br>";

					// echo "patrimonio para fundos nos meses:<br>";
					// foreach ($balancoFundoData as $op) :
					// 	foreach ($todosFundos as $fundo) :
					// 		echo $op[$fundo] . "<br>";
					// 	endforeach;
					// 	echo "--------------<br>";
					// endforeach;

					// echo "<br><br>";

					// echo "<br>=================<br>";
					// echo "<br><br>";

					// echo "var_dump(balancoFundoData)";
					// echo var_dump($balancoFundoData);

					// echo "<br><br>";
					// echo "<br>=================<br>";
					// echo "<br><br>";

					// echo "var_dump(rentabilidadeFundoData)";
					// foreach ($rentabilidadeFundoData as $rentabilidade) :
					// 	echo var_dump($rentabilidade) . "<br>";
					// endforeach;

					// echo "<br><br>";
					// echo "<br>=================<br>";
					// echo "<br><br>";

					// echo "var_dump(tabelaFormatada)";
					// echo var_dump($tabelaFormatada);
					?>
				</div>

			<?php endif; ?>
		</div>
	</div>
</div>