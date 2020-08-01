<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\RelPlanosPermisso $relPlanosPermisso
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Rel Planos Permisso'), ['action' => 'edit', $relPlanosPermisso->tipo_plano_id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Rel Planos Permisso'), ['action' => 'delete', $relPlanosPermisso->tipo_plano_id], ['confirm' => __('Are you sure you want to delete # {0}?', $relPlanosPermisso->tipo_plano_id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Rel Planos Permissoes'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Rel Planos Permisso'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="relPlanosPermissoes view content">
            <h3><?= h($relPlanosPermisso->tipo_plano_id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Tipo Plano') ?></th>
                    <td><?= $relPlanosPermisso->has('tipo_plano') ? $this->Html->link($relPlanosPermisso->tipo_plano->nome, ['controller' => 'TipoPlanos', 'action' => 'view', $relPlanosPermisso->tipo_plano->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Permissao Id') ?></th>
                    <td><?= $this->Number->format($relPlanosPermisso->permissao_id) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
