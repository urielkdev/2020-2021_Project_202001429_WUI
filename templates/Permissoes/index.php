<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Permisso[]|\Cake\Collection\CollectionInterface $permissoes
 */
?>
<div class="permissoes index content">
    <?= $this->Html->link(__('New Permisso'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Permissoes') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('supor_fck_root') ?></th>
                    <th><?= $this->Paginator->sort('administrador_mng') ?></th>
                    <th><?= $this->Paginator->sort('carteiras_mng') ?></th>
                    <th><?= $this->Paginator->sort('logs_mng') ?></th>
                    <th><?= $this->Paginator->sort('operacoes_mng') ?></th>
                    <th><?= $this->Paginator->sort('usuarios_mng') ?></th>
                    <th><?= $this->Paginator->sort('tipos_mng') ?></th>
                    <th><?= $this->Paginator->sort('rel_mng') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($permissoes as $permisso): ?>
                <tr>
                    <td><?= $this->Number->format($permisso->id) ?></td>
                    <td><?= h($permisso->supor_fck_root) ?></td>
                    <td><?= h($permisso->administrador_mng) ?></td>
                    <td><?= h($permisso->carteiras_mng) ?></td>
                    <td><?= h($permisso->logs_mng) ?></td>
                    <td><?= h($permisso->operacoes_mng) ?></td>
                    <td><?= h($permisso->usuarios_mng) ?></td>
                    <td><?= h($permisso->tipos_mng) ?></td>
                    <td><?= h($permisso->rel_mng) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $permisso->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $permisso->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $permisso->id], ['confirm' => __('Are you sure you want to delete # {0}?', $permisso->id)]) ?>
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
