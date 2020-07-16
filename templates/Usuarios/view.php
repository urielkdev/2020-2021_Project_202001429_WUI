<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Usuario $usuario
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Usuario'), ['action' => 'edit', $usuario->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Usuario'), ['action' => 'delete', $usuario->id], ['confirm' => __('Are you sure you want to delete # {0}?', $usuario->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Usuarios'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Usuario'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="usuarios view content">
            <h3><?= h($usuario->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Cpf') ?></th>
                    <td><?= h($usuario->cpf) ?></td>
                </tr>
                <tr>
                    <th><?= __('Nome') ?></th>
                    <td><?= h($usuario->nome) ?></td>
                </tr>
                <tr>
                    <th><?= __('Email') ?></th>
                    <td><?= h($usuario->email) ?></td>
                </tr>
                <tr>
                    <th><?= __('Senha') ?></th>
                    <td><?= h($usuario->senha) ?></td>
                </tr>
                <tr>
                    <th><?= __('Tipo Plano') ?></th>
                    <td><?= $usuario->has('tipo_plano') ? $this->Html->link($usuario->tipo_plano->id, ['controller' => 'TipoPlanos', 'action' => 'view', $usuario->tipo_plano->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Tipo Etapas Registro') ?></th>
                    <td><?= $usuario->has('tipo_etapas_registro') ? $this->Html->link($usuario->tipo_etapas_registro->id, ['controller' => 'TipoEtapasRegistros', 'action' => 'view', $usuario->tipo_etapas_registro->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Coment') ?></th>
                    <td><?= h($usuario->coment) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($usuario->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Dt Nasc') ?></th>
                    <td><?= h($usuario->dt_nasc) ?></td>
                </tr>
                <tr>
                    <th><?= __('Dt Reg') ?></th>
                    <td><?= h($usuario->dt_reg) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($usuario->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($usuario->modified) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
