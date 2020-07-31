<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CnpjFundo $cnpjFundo
 */
?>
<div class="row">
	<!--
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
	<?= $this->Html->link(__('Edit Cnpj Fundo'), ['action' => 'edit', $cnpjFundo->id], ['class' => 'side-nav-item']) ?>
	<?= $this->Form->postLink(__('Delete Cnpj Fundo'), ['action' => 'delete', $cnpjFundo->id], ['confirm' => __('Are you sure you want to delete # {0}?', $cnpjFundo->id), 'class' => 'side-nav-item']) ?>
	<?= $this->Html->link(__('List Cnpj Fundos'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
	<?= $this->Html->link(__('New Cnpj Fundo'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
	-->
    <div class="column-responsive"> <!-- <div class="column-responsive column-80">  -->
		<div class="cnpjFundos view content">
			<h2><?= h($cnpjFundo->DENOM_SOCIAL) ?></h2>
			<table>
				<tr>
					<th><?= __('CNPJ') ?></th>
					<td><?= h($cnpjFundo->CNPJ) ?></td>
				</tr>
				<tr>
					<th><?= __('Denominação Social') ?></th>
					<td><?= h($cnpjFundo->DENOM_SOCIAL) ?></td>
				</tr>
				<!-- <tr>
					<th><?= __('Id') ?></th>
					<td><?= $this->Number->format($cnpjFundo->id) ?></td>
				</tr> -->
				<tr>
					<th><?= __('Data de Registro CVM') ?></th>
					<td><?= h($cnpjFundo->DT_REG_CVM) ?></td>
				</tr>
			</table>
			<div class="related">
				<h4><?= __('Informações de Cadastro') ?></h4>
				<?php if (!empty($cnpjFundo->cadastro_fundos)) : ?>
					<div class="table-responsive">
						<table>
							<tr>
								<!-- <th><?= __('Cnpj Fundo Id') ?></th> -->
								<th><?= __('Data Registro CVM') ?></th>
								<th><?= __('Classe Fundo') ?></th>
								<th><?= __('Data Início Classe') ?></th>
								<th><?= __('Tipo Rentabilidade') ?></th>
								<th><?= __('Tipo de Condomínio') ?></th>
								<th><?= __('Fundo de Cotas') ?></th>
								<th><?= __('Fundo Exclusivo') ?></th>
								<th><?= __('Investidor Qualificado') ?></th>
								<th><?= __('Gestor do Fundo') ?></th>
								<th><?= __('Administrador do Fundo') ?></th>
								<!-- <th class="actions"><?= __('Actions') ?></th> -->
							</tr>
							<?php foreach ($cnpjFundo->cadastro_fundos as $cadastroFundos) : ?>
								<tr>
									<!-- <td><?= h($cadastroFundos->cnpj_fundo_id) ?></td> -->
									<td><?= h($cadastroFundos->DT_REG_CVM) ?></td>
									<td><?= h($cadastroFundos->tipo_classe_fundo->classe) ?></td>
									<td><?= h($cadastroFundos->DT_INI_CLASSE) ?></td>
									<td><?= h($cadastroFundos->tipo_rentabilidade_fundo->rentabilidade) ?></td>
									<td><?= h($cadastroFundos->CONDOM_ABERTO) ?></td>
									<td><?= h($cadastroFundos->FUNDO_COTAS) ?></td>
									<td><?= h($cadastroFundos->FUNDO_EXCLUSIVO) ?></td>
									<td><?= h($cadastroFundos->INVEST_QUALIF) ?></td>
									<td><?= h($cadastroFundos->gestor_fundo->nome) ?></td>
									<td><?= h($cadastroFundos->administrador_fundo->nome) ?></td>
								</tr>
							<?php endforeach; ?>
						</table>
					</div>
				<?php endif; ?>
			</div>
			<div class="related">
				<h4><?= __('Situação') ?></h4>
				<?php if (!empty($cnpjFundo->situacao_fundos)) : ?>
					<div class="table-responsive">
						<table>
							<tr>
								<th><?= __('Situacao do Fundo') ?></th>
								<th><?= __('Data de Início da Situação') ?></th>
								<th><?= __('Data de Registro CVM') ?></th>
							</tr>
							<?php foreach ($cnpjFundo->situacao_fundos as $situacaoFundos) : ?>
								<tr>
									<td><?= h($situacaoFundos->tipo_situacao_fundo->situacao) ?></td>
									<td><?= h($situacaoFundos->DT_INI_SIT) ?></td>
									<td><?= h($situacaoFundos->DT_REG_CVM) ?></td>
								</tr>
							<?php endforeach; ?>
						</table>
					</div>
				<?php endif; ?>
			</div>
			<?php if (!empty($cnpjFundo->cancelamento_fundos)) : ?>
				<div class="related">
					<h4><?= __('Cancelamento do Fundo') ?></h4>
					<div class="table-responsive">
						<table>
							<tr>
								<th><?= __('Data de Cancelamento do Fundo') ?></th>
								<th><?= __('Data de Registro CVM') ?></th>
							</tr>
							<?php foreach ($cnpjFundo->cancelamento_fundos as $cancelamentoFundos) : ?>
								<tr>
									<!-- <td><?= h($cancelamentoFundos->cnpj_fundo_id) ?></td> -->
									<td><?= h($cancelamentoFundos->DT_CANCEL) ?></td>
									<td><?= h($cancelamentoFundos->DT_REG_CVM) ?></td>
								</tr>
							<?php endforeach; ?>
						</table>
					</div>
				</div>
			<?php endif; ?>
			<div class="related">
				<h4><?= __('Informações dos Extratos') ?></h4>
				<?php if (!empty($cnpjFundo->doc_extratos_fundos)) : ?>
					<div class="table-responsive">
						<table>
							<tr>
								<th><?= __('Data de Competência') ?></th>
								<th><?= __('Classe Anbima') ?></th>
								<th><?= __('Aplicação Mínima') ?></th>
								<th><?= __('Pagamento da Cota') ?></th>
								<th><?= __('Pagamento do Resgate') ?></th>
								<th><?= __('PR COTA ETF MAX') ?></th>
							</tr>
							<?php foreach ($cnpjFundo->doc_extratos_fundos as $docExtratosFundos) : ?>
								<tr>
									<td><?= h($docExtratosFundos->DT_COMPTC) ?></td>
									<td><?= h($docExtratosFundos->tipo_anbima_class->classe_anbima) ?></td>
									<td><?= h($docExtratosFundos->APLIC_MIN) ?></td>
									<td><?= "D+" . h($docExtratosFundos->QT_DIA_PAGTO_COTA) ?></td>
									<td><?= "D+" . h($docExtratosFundos->QT_DIA_PAGTO_RESGATE) ?></td>
									<td><?= h($docExtratosFundos->PR_COTA_ETF_MAX) ?></td>
								</tr>
							<?php endforeach; ?>
						</table>
					</div>
				<?php endif; ?>
			</div>
			<div class="related">
				<h4><?= __('Informes de Rendimentos') ?></h4>

				<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

				<div class="row">
					<div class="column">
						<?php
						$data = array();
						$data[] = "['Data', 'Valor Total'],";
						foreach ($cnpjFundo->doc_inf_diario_fundos as $docInfDiarioFundos) {
							$data[] = "['" . $docInfDiarioFundos->DT_COMPTC . "'," . $docInfDiarioFundos->VL_TOTAL . "],";
						}
						echo$this->element('googleChartFundo', array('data' => $data, 'title' => 'Valor Total', 'vAxisTitle' => '', 'vAxisFormat' => 'currency', 'chart' => 'chart1_div'));
						?>
						<div id="chart1_div" style="width: 100%; height: 400px;"></div>
					</div>

					<div class="column">
						<?php
						$data = array();
						$data[] = "['Data', 'Patrimônio Líquido'],";
						foreach ($cnpjFundo->doc_inf_diario_fundos as $docInfDiarioFundos) {
							$data[] = "['" . $docInfDiarioFundos->DT_COMPTC . "'," . $docInfDiarioFundos->VL_PATRIM_LIQ . "],";
						}
						echo$this->element('googleChartFundo', array('data' => $data, 'title' => 'Patrimônio Líquido', 'vAxisTitle' => '', 'vAxisFormat' => 'currency', 'chart' => 'chart2_div'));
						?>
						<div id="chart2_div" style="width: 100%; height: 400px;"></div>
					</div>
				</div>

				<div class="row">
					<div class="column">
						<?php
						$data = array();
						$data[] = "['Data', 'Valor Cota'],";
						foreach ($cnpjFundo->doc_inf_diario_fundos as $docInfDiarioFundos) {
							$data[] = "['" . $docInfDiarioFundos->DT_COMPTC . "'," . $docInfDiarioFundos->VL_QUOTA . "],";
						}
						echo$this->element('googleChartFundo', array('data' => $data, 'title' => 'Valor da Cota', 'vAxisTitle' => '', 'vAxisFormat' => 'currency', 'chart' => 'chart3_div'));
						?>
						<div id="chart3_div" style="width: 100%; height: 400px;"></div>
					</div>

					<div class="column">
						<?php
						$data = array();
						$data[] = "['Data', 'Cotistas'],";
						foreach ($cnpjFundo->doc_inf_diario_fundos as $docInfDiarioFundos) {
							$data[] = "['" . $docInfDiarioFundos->DT_COMPTC . "'," . $docInfDiarioFundos->NR_COTST . "],";
						}
						echo$this->element('googleChartFundo', array('data' => $data, 'title' => 'Quantidade de Cotistas', 'vAxisTitle' => '', 'vAxisFormat' => ' ', 'chart' => 'chart4_div'));
						?>
						<div id="chart4_div" style="width: 100%; height: 400px;"></div>
					</div>
				</div>


				<div class="row">
					<div class="column">
						<?php
						$data = array();
						$data[] = "['Data', 'Acumulada', 'Rentabilidade'],";
						foreach ($rentabVolat as $rent) {
							$data[] = "['" . $rent['mes'] . "'," . $rent['rentabilidadeAcumulada'] . "," . $rent['rentabilidade'] . "],";
						}
						echo$this->element('googleChartFundo', array('data' => $data, 'title' => 'Rentabilidade Acumulada', 'vAxisTitle' => '', 'vAxisFormat' => 'percent', 'chart' => 'chart5_div'));
						?>
						<div id="chart5_div" style="width: 100%; height: 400px;"></div>
					</div>

					<div class="column">
						<?php
						$data = array();
						$data[] = "['Data', 'Risco'],";
						foreach ($rentabVolat as $rent) {
							$data[] = "['" . $rent['mes'] . "'," . $rent['desvio'] . "],";
						}
						echo$this->element('googleChartFundo', array('data' => $data, 'title' => 'Risco', 'vAxisTitle' => '', 'vAxisFormat' => 'percent', 'chart' => 'chart6_div'));
						?>
						<div id="chart6_div" style="width: 100%; height: 400px;"></div>
					</div>
				</div>				

			</div>
		</div>
	</div>
</div>
