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
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $relPlanosPermisso->tipo_plano_id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $relPlanosPermisso->tipo_plano_id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Rel Planos Permissoes'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="relPlanosPermissoes form content">
            <?= $this->Form->create($relPlanosPermisso) ?>
            <fieldset>
                <legend><?= __('Edit Rel Planos Permisso') ?></legend>
                <?php
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
