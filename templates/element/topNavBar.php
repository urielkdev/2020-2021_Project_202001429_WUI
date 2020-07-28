<nav class="top-nav">
	<div class="top-nav-title">
		<a href="/"><?php echo$this->element('nomeApp'); ?></a>
	</div>
	<?php
	$session = $this->request->getSession();
	$conectado = $session->read('User.id') != null;
	$firstname = $session->read('User.firstname');
	$administrador = $session->read('User.administrador') != null;
	?>

	<div class="top-nav-links">
		<div class="dropdown">
			<button class="dropbtn">Fundos de investimento</button>
			<div class="dropdown-content">
				<a href="/Fundos/busca">Busca geral</a>
				<a href="/Fundos/indicadores">Indicadores financeiros</a>
				<a href="/Fundos/comparacao">Comparação de fundos</a>
			</div>
		</div> 
		<div class="dropdown">
			<button class="dropbtn">Empresas abertas</button>
			<div class="dropdown-content">
				<a href="/Acoes/busca">Busca geral</a>
				<a href="/Acoes/indicfund">Indicadores fundamentalistas</a>
				<a href="/Acoes/indicgraf">Indicadores gráficos</a>
				<a href="/Acoes/comparacao">Comparação de ações</a>
			</div>
		</div> 
		<div class="dropdown">
			<button class="dropbtn">Carteira de investimento</button>
			<div class="dropdown-content">
				<a href="/Portfolio/operacoes">Carteiras e operações</a>
				<!--<a href="Portfolio/registro">Registro de transações</a> -->
				<a href="/Portfolio/analise">Análise da carteira</a>
				<a href="/Portfolio/comparacao">Comparação de carteiras</a>
				<a href="/Portfolio/fronteira">Fronteira eficiente</a>
			</div>
		</div> 

		<?php if ($administrador) { ?>
			<div class="dropdown">
				<button class="dropbtn">Administração</button>
				<div class="dropdown-content">
					<a href="/Administracao/logs_atualizacao">Logs de atualização</a>
					<a href="/Administracao/usuarios">Usuários</a>
					<a href="/Administracao/permissoes">Permissões</a>
					<a href="/Administracao/fronteira">Registros</a>
				</div>
			</div> 
		<?php } ?>
		<?php if ($conectado) { ?>
		<?php } else { ?>
		<?php } ?>
		<!--<a href="/Usuarios/register">Informações</a>
		<a href="/Usuarios/register">Fundos de investimento</a>
		<a href="/Usuarios/login">Empresas abertas</a>
		<a href="/Usuarios/login">Carteira de investimento</a>-->
	</div>

	<div class="top-nav-links">
		<?php if ($conectado) { ?>
			<div class="dropdown">
				<button class="dropbtn">Olá, <?= $firstname ?></button>
				<div class="dropdown-content">
					<a href="/Usuarios/conta">Conta e dados pessoais</a>
					<a href="/Usuarios/perfil_investidor">Perfil do investidor</a>
					<a href="/Usuarios/logout">Sair</a>
				</div>
			</div> 
		<?php } else { ?>
			<div class="dropdown">
				<button class="dropbtn">Entrar</button>
				<div class="dropdown-content">
					<a href="/Usuarios/login">Login</a>
					<a href="/Usuarios/register">Registrar</a>
				</div>
			</div> 
		<?php } ?>
	</div>
</nav>
