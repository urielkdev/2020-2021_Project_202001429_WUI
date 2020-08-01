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
            <?= $this->Html->link(__('List Permissoes'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="permissoes form content">
            <?= $this->Form->create($permisso) ?>
            <fieldset>
                <legend><?= __('Add Permisso') ?></legend>
                <?php
                    echo $this->Form->control('supor_fck_root');
                    echo $this->Form->control('administrador_mng');
                    echo $this->Form->control('carteiras_mng');
                    echo $this->Form->control('logs_mng');
                    echo $this->Form->control('operacoes_mng');
                    echo $this->Form->control('usuarios_mng');
                    echo $this->Form->control('tipos_mng');
                    echo $this->Form->control('rel_mng');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
