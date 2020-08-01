<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CarteirasInvestimento[]|\Cake\Collection\CollectionInterface $carteirasInvestimentos
 */
?>
<div class="carteirasInvestimentos index content">
    <?= $this->Html->link(__('Nova Carteira de Investimento'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <?=$this->element('titleInfo', ['title'=>__('Minhas Carteiras de Investimentos'),'tam'=>'6','info'=>'Uma carteira de investimentos é uma coleção de investimentos feitos ao longo do tempo, e é composta ṕor operações financeiras de aplicação e resgate em investimentos específicos. Com uma carteira de investimentos é possível...']) ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                   <!-- <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('usuario_id') ?></th> -->
                    <th><?= $this->Paginator->sort('nome','Nome da carteira') ?></th>
                    <th><?= $this->Paginator->sort('descricao','Descrição da carteira') ?></th>
                    <th class="actions"><?= __('Ações') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($carteirasInvestimentos as $carteirasInvestimento): ?>
                <tr>
                 <!--   <td><?= $this->Number->format($carteirasInvestimento->id) ?></td>
                    <td><?= $carteirasInvestimento->has('usuario') ? $this->Html->link($carteirasInvestimento->usuario->nome, ['controller' => 'Usuarios', 'action' => 'view', $carteirasInvestimento->usuario->id]) : '' ?></td> -->
                    <td><?= h($carteirasInvestimento->nome) ?></td>
                    <td><?= h($carteirasInvestimento->descricao) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('Ver'), ['action' => 'view', $carteirasInvestimento->id]) ?>
                        <?= $this->Html->link(__('Editar'), ['action' => 'edit', $carteirasInvestimento->id]) ?>
                        <?= $this->Form->postLink(__('Deletar'), ['action' => 'delete', $carteirasInvestimento->id], ['confirm' => __('Are you sure you want to delete # {0}?', $carteirasInvestimento->id)]) ?>
                    </td>
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
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
