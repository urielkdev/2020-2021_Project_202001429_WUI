<div class="column-responsive column-80">
    <div class="usuarios form content">
        <?= $this->Form->create($usuario) ?>
        <fieldset>
            <legend><?= __('Registrar novo usuário') ?></legend>
            <div>
                Para registrar-se no InvestFunds preencha todos os campos abaixo, leia os Termos e Condições de Uso, e então pressione o botão "Registrar". 
            </div>
            <hr>
            <?php
            echo $this->Form->control('cpf');
            echo $this->Form->control('nome');
            echo $this->Form->control('email');
            echo $this->Form->control('dt_nasc');
            echo $this->Form->control('senha');
            ?>
        </fieldset>
        <hr>       
        <?php echo$this->element('termosUso'); ?>
        <hr>
        <?= $this->Form->button(__('Submit')) ?>
        <?= $this->Form->end() ?>
    </div>

</div>