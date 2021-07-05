<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\OperacoesFinanceira $operacoesFinanceira
 */
?>
<div class="row">
    <div class="column-responsive column-100">
        <div class="operacoesFinanceiras form content">
            <?= $this->Form->create($operacoesFinanceira) ?>
            <fieldset>
                <legend><?= __('Add Operacoes Financeira') ?></legend>
                <?php
                echo $this->Form->control('carteiras_investimento_id', ['options' => $carteirasInvestimentos]);
                echo $this->Form->control('cnpj_fundo_id', ['options' => $cnpjFundos]);
                echo $this->Form->control('distribuidor_fundo_id', ['options' => $distribuidorFundos, 'empty' => true]);
                echo $this->Form->control('tipo_operacoes_financeira_id', ['options' => $tipoOperacoesFinanceiras]);
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