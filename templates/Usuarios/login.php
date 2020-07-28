<div class="column-responsive column-80">
	<h2><?= __('Login') ?></h2>
    <div class="usuarios form content">
        <?= $this->Form->create() ?> <!-- ... create($usuario) -->
        <fieldset>
            <!--<legend><?= __('Login') ?></legend> -->
            <?php
            echo $this->Form->control('cpf');
            echo $this->Form->control('senha');
            ?>
        </fieldset>
        <?= $this->Form->button(__('Entrar')) ?>
        <?= $this->Form->end() ?>
    </div>
    <hr>
    <div class="row">
        <a href="">Esqueci/Recuperar minha senha</a>
    </div>
</div>