<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CnpjFundo[]|\Cake\Collection\CollectionInterface $cnpjFundos
 */
?>
<div class="cnpjFundos index content">
    <!-- $this->Html->link(__('New Cnpj Fundo'), ['action' => 'add'], ['class' => 'button float-right']) ?> -->
	<?php echo$this->element('titleInfo', array('title' => __('Busca Geral de Fundos de Investimento'), 'tam' => 6)); ?>

	<div class="column-responsive">
		<div class="retornoRiscoFundos form content">
			<?php echo$this->element('titleInfo', array('title' => __('Filtros'), 'tam' => 5, 'info' => 'Os filtros são usados para restringir a busca por fundos com características de seu interesse. Preencha um ou mais campos abaixo com as características desejadas e pressione o botão "Aplicar filtros" para refinar sua busca.')); ?>
			<?php echo $this->Form->create($filtroForm); ?>
			<div class="table-responsive">
				<table>
					<thead>
						<tr>
							<td width='200'><?php echo $this->Form->control('nome'); ?></td>
							<td width='200'><?php echo $this->Form->input('apenasEmFuncionamentoNormal', ['type' => 'checkbox', 'label' => 'Em operação normal', 'default' => true]); ?></td>
							<td width='200'><?php echo $this->Form->input('classe', ['label' => 'Tipo do fundo', 'multiple' => true, 'class' => 'form-control', 'type' => 'select', 'options' => $classeFundos/* , 'default' => array_keys((array) $classeFundos) */]); ?></td>
							<td width='200'><?php echo $this->Form->input('anbima', ['label' => 'Classe anbima', 'multiple' => true, 'class' => 'form-control', 'type' => 'select', 'options' => $classeAnbima/* , 'default' => array_keys((array) $classeFundos) */]); ?></td>
							<td width='200'><?php echo $this->Form->control('aplicMin'); ?></td>
							<td width='200'><?php echo $this->Form->control('gestor'); ?></td>
						</tr>
					</thead>
				</table>
			</div>
			<?php echo $this->Form->button('Aplicar filtros'); ?>
			<?php echo $this->Form->end(); ?>	
		</div>
	</div>
	<hr>
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
						<!-- <td><?= $this->Number->format( ++$rowCount) ?></td> -->
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
