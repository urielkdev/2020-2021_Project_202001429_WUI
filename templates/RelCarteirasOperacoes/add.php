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
            <?= $this->Html->link(__('List Rel Carteiras Operacoes'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="relCarteirasOperacoes form content">
            <?= $this->Form->create($relCarteirasOperaco) ?>
            <fieldset>
                <legend><?= __('Add Rel Carteiras Operaco') ?></legend>
                <?php
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
