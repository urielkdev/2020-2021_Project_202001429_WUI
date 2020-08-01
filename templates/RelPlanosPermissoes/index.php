<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\RelPlanosPermisso[]|\Cake\Collection\CollectionInterface $relPlanosPermissoes
 */
?>
<div class="relPlanosPermissoes index content">
    <?= $this->Html->link(__('New Rel Planos Permisso'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Rel Planos Permissoes') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('tipo_plano_id') ?></th>
                    <th><?= $this->Paginator->sort('permissao_id') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($relPlanosPermissoes as $relPlanosPermisso): ?>
                <tr>
                    <td><?= $relPlanosPermisso->has('tipo_plano') ? $this->Html->link($relPlanosPermisso->tipo_plano->nome, ['controller' => 'TipoPlanos', 'action' => 'view', $relPlanosPermisso->tipo_plano->id]) : '' ?></td>
                    <td><?= $this->Number->format($relPlanosPermisso->permissao_id) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $relPlanosPermisso->tipo_plano_id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $relPlanosPermisso->tipo_plano_id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $relPlanosPermisso->tipo_plano_id], ['confirm' => __('Are you sure you want to delete # {0}?', $relPlanosPermisso->tipo_plano_id)]) ?>
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
