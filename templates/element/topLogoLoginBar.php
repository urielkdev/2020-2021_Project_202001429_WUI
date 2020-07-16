<nav class="top-logo">
    <div class="top-nav-title">
        <a href="/"><?php echo$this->element('nomeApp'); ?></a>
    </div>
	<?php $conectado = true; ?>
    <div class="top-nav-links">
		<?php if ($conectado) { ?>
			<a href="/Usuarios/register">Olá, Rafael</a>
			<a href="/Usuarios/register">Sair</a>
		<?php } else { ?>
			<a href="/Usuarios/register">Registrar</a>
			<a href="/Usuarios/login">Entrar</a>
		<?php } ?>
    </div>
</nav>