<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CnpjFundo[]|\Cake\Collection\CollectionInterface $cnpjFundos
 */
?>
<div class="cnpjFundos index content">
    <!-- <?= $this->Html->link(__('New Cnpj Fundo'), ['action' => 'add'], ['class' => 'button float-right']) ?> -->
    <h2><?= __('Busca Geral de Fundos de Investimento') ?></h2>

	<div class="column-responsive">
	<div class="retornoRiscoFundos form content">
		<h3><?= __('Filtros') ?></h3>
		<?php echo $this->Form->create($filtroForm); ?>
		<table>
			<tr>
				<td><?php echo $this->Form->control('nome'); ?></td>
				<td><?php echo $this->Form->control('emOperacao'); ?></td>
				<td><?php echo $this->Form->control('tipo'); ?></td>
				<td><?php echo $this->Form->control('classe'); ?></td>
				<td><?php echo $this->Form->control('aplicMin'); ?></td>
			</tr>
		</table>
		<?php echo $this->Form->button('Aplicar filtros'); ?>
		<?php echo $this->Form->end(); ?>	
	</div>
	</div>
	<div class="row">
		<h3><?= __('Fundos de Investimento Encontrados') ?></h3>
	</div>
	<div class="table-responsive">
		<div class="paginator">
			<ul class="pagination">
				<?= $this->Paginator->first('<< ' . __('first')) ?>
				<?= $this->Paginator->prev('< ' . __('previous')) ?>
				<?= $this->Paginator->numbers() ?>
				<?= $this->Paginator->next(__('next') . ' >') ?>
				<?= $this->Paginator->last(__('last') . ' >>') ?>
				&numsp;<?= $this->Paginator->counter(__('Página {{page}} de {{pages}}, mostrando {{current}} registro(s) do total de {{count}}')) ?>
			</ul>
		</div>
		<table>
			<thead>
				<tr>
					<!-- <th>Num</th> -->
					<th><?= $this->Paginator->sort('CNPJ') ?></th>
					<th><?= $this->Paginator->sort('DENOM_SOCIAL', __('Nome do fundo')) ?></th>
					<!-- <th><?= $this->Paginator->sort('DT_REG_CVM', __('Data de registro')) ?></th> -->
					<th><?= $this->Paginator->sort('xxx', __('Administrador')) ?></th>

					<th><?= $this->Paginator->sort('xxx', __('Classe')) ?></th>
					<th><?= $this->Paginator->sort('xxx', __('Rentabilidade')) ?></th>
					<th><?= $this->Paginator->sort('xxx', __('Situação')) ?></th>
				</tr>
			</thead>
			<tbody>
				<!-- <?php $rowCount = ($this->Paginator->counter('{{page}}') - 1) * $this->Paginator->counter('{{current}}'); ?> -->
				<?php foreach ($cnpjFundos as $cnpjFundo): ?>
					<tr>
						<!-- <td><?= $this->Number->format(++$rowCount) ?></td> -->
						<td><?= h($cnpjFundo->CNPJ) ?></td>
						<td>
							<?= $this->Html->link(h($cnpjFundo->DENOM_SOCIAL), ['action' => 'view', $cnpjFundo->id]) ?>
							<!-- <a href=''><?= h($cnpjFundo->DENOM_SOCIAL) ?></a> -->
						</td>
						<!-- <td><?= h($cnpjFundo->DT_REG_CVM) ?></td> -->
						<td><?= h($cnpjFundo->cadastro_fundos[0]->administrador_fundo->nome) ?></td>

						<td><?= h($cnpjFundo->cadastro_fundos[0]->tipo_classe_fundo->classe) ?></td>
						<td><?= h($cnpjFundo->cadastro_fundos[0]->tipo_rentabilidade_fundo->rentabilidade) ?></td>
						<td><?= h($cnpjFundo->situacao_fundos[0]->tipo_situacao_fundo->situacao) ?></td>

					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
	<div class="paginator">
		<ul class="pagination">
			<?= $this->Paginator->first('<< ' . __('first')) ?>
			<?= $this->Paginator->prev('< ' . __('previous')) ?>
			<?= $this->Paginator->numbers() ?>
			<?= $this->Paginator->next(__('next') . ' >') ?>
			<?= $this->Paginator->last(__('last') . ' >>') ?>
		</ul>
		<p><?= $this->Paginator->counter(__('Página {{page}} de {{pages}}, mostrando {{current}} registro(s) do total de {{count}}')) ?></p>
	</div>
</div>
