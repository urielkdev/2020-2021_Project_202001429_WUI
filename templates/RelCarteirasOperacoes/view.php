<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\RelCarteirasOperaco $relCarteirasOperaco
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Rel Carteiras Operaco'), ['action' => 'edit', $relCarteirasOperaco->carteiras_investimento_id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Rel Carteiras Operaco'), ['action' => 'delete', $relCarteirasOperaco->carteiras_investimento_id], ['confirm' => __('Are you sure you want to delete # {0}?', $relCarteirasOperaco->carteiras_investimento_id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Rel Carteiras Operacoes'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Rel Carteiras Operaco'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="relCarteirasOperacoes view content">
            <h3><?= h($relCarteirasOperaco->carteiras_investimento_id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Carteiras Investimento') ?></th>
                    <td><?= $relCarteirasOperaco->has('carteiras_investimento') ? $this->Html->link($relCarteirasOperaco->carteiras_investimento->id, ['controller' => 'CarteirasInvestimentos', 'action' => 'view', $relCarteirasOperaco->carteiras_investimento->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Operacoes Financeira') ?></th>
                    <td><?= $relCarteirasOperaco->has('operacoes_financeira') ? $this->Html->link($relCarteirasOperaco->operacoes_financeira->id, ['controller' => 'OperacoesFinanceiras', 'action' => 'view', $relCarteirasOperaco->operacoes_financeira->id]) : '' ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
