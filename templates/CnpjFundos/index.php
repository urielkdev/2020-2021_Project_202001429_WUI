<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CnpjFundo[]|\Cake\Collection\CollectionInterface $cnpjFundos
 */
?>
<div class="cnpjFundos index content">
    <!-- <?= $this->Html->link(__('New Cnpj Fundo'), ['action' => 'add'], ['class' => 'button float-right']) ?> -->
    <h3><?= __('Busca Geral de Fundos de Investimento') ?></h3>

	<div class="row">
		<h4><?= __('Filtros') ?></h4>
	</div>
    <div class="table-responsive">
		<h4><?= __('Fundos de Investimento Encontrados') ?></h4>
        <table>
            <thead>
                <tr>
                    <!-- <th><?= $this->Paginator->sort('id') ?></th> -->
                    <th><?= $this->Paginator->sort('CNPJ') ?></th>
                    <th><?= $this->Paginator->sort('DENOM_SOCIAL', __('Nome do fundo')) ?></th>
                    <th><?= $this->Paginator->sort('DT_REG_CVM', __('Data de registro')) ?></th>
		
                    <th><?= $this->Paginator->sort('CadastroFundos.tipo_classe_fundo_id', __('Classe')) ?></th>
                    <th><?= $this->Paginator->sort('CadastroFundos.tipo_rentabilidade_fundo_id', __('Rentabilidade')) ?></th>
                    <th><?= $this->Paginator->sort('SituacaoFundos.tipo_situacao_fundo_id', __('Situação')) ?></th>
                    <!-- <th class="actions"><?= __('Actions') ?></th> -->
                </tr>
            </thead>
            <tbody>
				<?php foreach ($cnpjFundos as $cnpjFundo): ?>
	                <tr>
	                    <!-- <td><?= $this->Number->format($cnpjFundo->id) ?></td> -->
	                    <td><?= h($cnpjFundo->CNPJ) ?></td>
	                    <td><a href=''><?= h($cnpjFundo->DENOM_SOCIAL) ?></a></td>
	                    <td><?= h($cnpjFundo->DT_REG_CVM) ?></td>
						
	                    <td><?= h($cnpjFundo->_matchingData['CadastroFundos']->tipo_classe_fundo_id) ?></td>
	                    <td><?= h($cnpjFundo->_matchingData['CadastroFundos']->tipo_rentabilidade_fundo_id) ?></td>
	                    <td><?= h($cnpjFundo->_matchingData['SituacaoFundos']->tipo_situacao_fundo_id) ?></td>
	                    <!--
						<td class="actions">
						<?= $this->Html->link(__('View'), ['action' => 'view', $cnpjFundo->id]) ?>
						<?= $this->Html->link(__('Edit'), ['action' => 'edit', $cnpjFundo->id]) ?>
						<?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $cnpjFundo->id], ['confirm' => __('Are you sure you want to delete # {0}?', $cnpjFundo->id)]) ?>
	                    </td>
						-->
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
