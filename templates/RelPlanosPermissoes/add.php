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
            <?= $this->Html->link(__('List Rel Planos Permissoes'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="relPlanosPermissoes form content">
            <?= $this->Form->create($relPlanosPermisso) ?>
            <fieldset>
                <legend><?= __('Add Rel Planos Permisso') ?></legend>
                <?php
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
