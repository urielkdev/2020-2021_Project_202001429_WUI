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
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $operacoesFinanceira->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $operacoesFinanceira->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Operacoes Financeiras'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="operacoesFinanceiras form content">
            <?= $this->Form->create($operacoesFinanceira) ?>
            <fieldset>
                <legend><?= __('Edit Operacoes Financeira') ?></legend>
                <?php
                    echo $this->Form->control('usuario_id', ['options' => $usuarios]);
                    echo $this->Form->control('cnpj_fundo_id', ['options' => $cnpjFundos]);
                    echo $this->Form->control('distribuidor_fundo_id');
                    echo $this->Form->control('tipo_operacoes_financeira_id');
                    echo $this->Form->control('por_valor');
                    echo $this->Form->control('valor_total');
                    echo $this->Form->control('valor_cota');
                    echo $this->Form->control('quantidade_cotas');
                    echo $this->Form->control('data');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
