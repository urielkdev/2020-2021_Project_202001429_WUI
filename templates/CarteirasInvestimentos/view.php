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

						var chart = new google.visualization.AnnotationChart(document.getElementById('chart_div'));

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

				<div id="chart_div" style="width: 100%; margin-left: -20px;"></div>
				<br>

				<?php
				echo "dados que vao para o addRow() do grafico<br>";
				foreach ($tabelaFormatada as $linha) {
					echo "[new Date(" . $linha[0] . ", " . $linha[1] . ", " . $linha[2] . ")";
					for ($i = 3; $i < sizeof($linha); $i++) {
						echo ", " . $linha[$i];
					}
					echo "]," . "<br>";
				}

				echo "<br>=================<br>";

				echo $dataOpMaisAntiga . "<br>";
				echo $dataOpMaisRecente . "<br>";

				echo "<br>=================<br>";

				echo "meses:<br>";
				foreach ($todosAsDatas as $mes) :
					echo $mes . "<br>";
				endforeach;

				echo "<br>=================<br>";

				echo "fundos:<br>";
				foreach ($todosFundos as $fundo) :
					echo $fundo . "<br>";
				endforeach;

				echo "<br>=================<br>";

				echo "patrimonio para fundos nos meses:<br>";
				foreach ($balancoFundoMes as $op) :
					foreach ($todosFundos as $fundo) :
						echo $op[$fundo] . "<br>";
					endforeach;
					echo "--------------<br>";
				endforeach;
				echo "<br>=================<br>";

				echo "patrimonio para fundos nos meses:<br>";
				foreach ($tabelaFormatada as $op) :
					foreach ($todosFundos as $fundo) :
						echo $op[$fundo] . "<br>";
					endforeach;
					echo "--------------<br>";
				endforeach;

				echo "<br><br>";

				echo "<br>=================<br>";
				echo "<br><br>";

				echo var_dump($balancoFundoMes);

				echo "<br><br>";
				echo "<br>=================<br>";
				echo "<br><br>";

				echo var_dump($tabelaFormatada);
				?>



				<?php if (!empty($carteirasInvestimento->indicadores_carteiras)) : ?>
					<div class="table-responsive">
						<table>
							<tr>
								<th><?= __('Periodo Meses') ?></th>
								<th><?= __('Data Final') ?></th>
								<th><?= __('Rentabilidade') ?></th>
								<th><?= __('Desvio Padrao') ?></th>
								<th><?= __('Num Valores') ?></th>
								<th><?= __('Rentab Min') ?></th>
								<th><?= __('Rentab Max') ?></th>
								<th><?= __('Max Drawdown') ?></th>
								<th><?= __('Tipo Benchmark Id') ?></th>
								<th><?= __('Meses Acima Bench') ?></th>
								<th><?= __('Sharpe') ?></th>
								<th><?= __('Beta') ?></th>
								<th class="actions"><?= __('Actions') ?></th>
							</tr>
							<?php foreach ($carteirasInvestimento->indicadores_carteiras as $indicadoresCarteiras) : ?>
								<tr>
									<td><?= h($indicadoresCarteiras->periodo_meses) ?></td>
									<td><?= h($indicadoresCarteiras->data_final) ?></td>
									<td><?= h($indicadoresCarteiras->rentabilidade) ?></td>
									<td><?= h($indicadoresCarteiras->desvio_padrao) ?></td>
									<td><?= h($indicadoresCarteiras->num_valores) ?></td>
									<td><?= h($indicadoresCarteiras->rentab_min) ?></td>
									<td><?= h($indicadoresCarteiras->rentab_max) ?></td>
									<td><?= h($indicadoresCarteiras->max_drawdown) ?></td>
									<td><?= h($indicadoresCarteiras->tipo_benchmark_id) ?></td>
									<td><?= h($indicadoresCarteiras->meses_acima_bench) ?></td>
									<td><?= h($indicadoresCarteiras->sharpe) ?></td>
									<td><?= h($indicadoresCarteiras->beta) ?></td>
									<td class="actions">
										<?= $this->Html->link(__('View'), ['controller' => 'IndicadoresCarteiras', 'action' => 'view', $indicadoresCarteiras->carteiras_investimento_id]) ?>
										<?= $this->Html->link(__('Edit'), ['controller' => 'IndicadoresCarteiras', 'action' => 'edit', $indicadoresCarteiras->carteiras_investimento_id]) ?>
										<?= $this->Form->postLink(__('Delete'), ['controller' => 'IndicadoresCarteiras', 'action' => 'delete', $indicadoresCarteiras->carteiras_investimento_id], ['confirm' => __('Are you sure you want to delete # {0}?', $indicadoresCarteiras->carteiras_investimento_id)]) ?>
									</td>
								</tr>
							<?php endforeach; ?>
						</table>
					</div>
				<?php endif; ?>
			</div>
		</div>
	</div>
</div>