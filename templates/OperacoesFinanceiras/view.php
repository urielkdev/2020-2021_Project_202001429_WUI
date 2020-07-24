<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\OperacoesFinanceira $operacoesFinanceira
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Operacoes Financeira'), ['action' => 'edit', $operacoesFinanceira->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Operacoes Financeira'), ['action' => 'delete', $operacoesFinanceira->id], ['confirm' => __('Are you sure you want to delete # {0}?', $operacoesFinanceira->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Operacoes Financeiras'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Operacoes Financeira'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="operacoesFinanceiras view content">
            <h3><?= h($operacoesFinanceira->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Usuario') ?></th>
                    <td><?= $operacoesFinanceira->has('usuario') ? $this->Html->link($operacoesFinanceira->usuario->nome, ['controller' => 'Usuarios', 'action' => 'view', $operacoesFinanceira->usuario->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Cnpj Fundo') ?></th>
                    <td><?= $operacoesFinanceira->has('cnpj_fundo') ? $this->Html->link($operacoesFinanceira->cnpj_fundo->id, ['controller' => 'CnpjFundos', 'action' => 'view', $operacoesFinanceira->cnpj_fundo->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($operacoesFinanceira->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Distribuidora Id') ?></th>
                    <td><?= $this->Number->format($operacoesFinanceira->distribuidora_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Valor Total') ?></th>
                    <td><?= $this->Number->format($operacoesFinanceira->valor_total) ?></td>
                </tr>
                <tr>
                    <th><?= __('Valor Cota') ?></th>
                    <td><?= $this->Number->format($operacoesFinanceira->valor_cota) ?></td>
                </tr>
                <tr>
                    <th><?= __('Quantidade Cotas') ?></th>
                    <td><?= $this->Number->format($operacoesFinanceira->quantidade_cotas) ?></td>
                </tr>
                <tr>
                    <th><?= __('Data') ?></th>
                    <td><?= h($operacoesFinanceira->data) ?></td>
                </tr>
                <tr>
                    <th><?= __('Op Aplicacao') ?></th>
                    <td><?= $operacoesFinanceira->op_aplicacao ? __('Yes') : __('No'); ?></td>
                </tr>
                <tr>
                    <th><?= __('Por Valor') ?></th>
                    <td><?= $operacoesFinanceira->por_valor ? __('Yes') : __('No'); ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
