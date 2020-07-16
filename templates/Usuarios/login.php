<div class="column-responsive column-80">
    <div class="usuarios form content">
        <?= $this->Form->create($usuario) ?>
        <fieldset>
            <legend><?= __('Entrar / Login de Usuário') ?></legend>          
            <hr>
            <?php
            echo $this->Form->control('cpf');
            echo $this->Form->control('senha');
            ?>
        </fieldset>
        <?= $this->Form->button(__('Submit')) ?>
        <?= $this->Form->end() ?>
    </div>
    <hr>
    <div class="row">
        <a href="">Esqueci/Recuperar minha senha</a>
    </div>
</div>