<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Permisso $permisso
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Permisso'), ['action' => 'edit', $permisso->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Permisso'), ['action' => 'delete', $permisso->id], ['confirm' => __('Are you sure you want to delete # {0}?', $permisso->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Permissoes'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Permisso'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="permissoes view content">
            <h3><?= h($permisso->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($permisso->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Supor Fck Root') ?></th>
                    <td><?= $permisso->supor_fck_root ? __('Yes') : __('No'); ?></td>
                </tr>
                <tr>
                    <th><?= __('Administrador Mng') ?></th>
                    <td><?= $permisso->administrador_mng ? __('Yes') : __('No'); ?></td>
                </tr>
                <tr>
                    <th><?= __('Carteiras Mng') ?></th>
                    <td><?= $permisso->carteiras_mng ? __('Yes') : __('No'); ?></td>
                </tr>
                <tr>
                    <th><?= __('Logs Mng') ?></th>
                    <td><?= $permisso->logs_mng ? __('Yes') : __('No'); ?></td>
                </tr>
                <tr>
                    <th><?= __('Operacoes Mng') ?></th>
                    <td><?= $permisso->operacoes_mng ? __('Yes') : __('No'); ?></td>
                </tr>
                <tr>
                    <th><?= __('Usuarios Mng') ?></th>
                    <td><?= $permisso->usuarios_mng ? __('Yes') : __('No'); ?></td>
                </tr>
                <tr>
                    <th><?= __('Tipos Mng') ?></th>
                    <td><?= $permisso->tipos_mng ? __('Yes') : __('No'); ?></td>
                </tr>
                <tr>
                    <th><?= __('Rel Mng') ?></th>
                    <td><?= $permisso->rel_mng ? __('Yes') : __('No'); ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
