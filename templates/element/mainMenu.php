<?php
$session = $this->request->getSession();
$conectado = $session->read('User.id') != null;
$firstname = $session->read('User.firstname');
$administrador = $session->read('User.administrador') != null;
?>

<div class="top-nav-links">
	<div class="dropdown">
		<button class="dropbtn">Educação financeira</button>
		<div class="dropdown-content">
			<a href="">Comece por aqui</a>
			<a href="">Informações gerais</a>
			<a href="">Tipos de investimentos</a>
			<a href="">Como começar a investir</a>
			<a href="">Perfis de investidores</a>
'		</div>
	</div> 
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
			<?php if ($conectado) { ?>
				<a href="/Acoes/busca">Busca geral</a>
				<a href="/Acoes/indicfund">Indicadores fundamentalistas</a>
				<a href="/Acoes/indicgraf">Indicadores gráficos</a>
				<a href="/Acoes/comparacao">Comparação de ações</a>
			<?php } else { ?>
				<span>Busca geral</span>
				<span>Indicadores fundamentalistas</span>
				<span>Indicadores gráficos</span>
				<span>Comparação de ações</span>
			<?php } ?>
		</div>
	</div> 
	<div class="dropdown">
		<button class="dropbtn">Carteira de investimento</button>
		<div class="dropdown-content">
			<?php if ($conectado) { ?>
				<a href="/CarteirasInvestimentos/index">Carteiras e operações</a>
				<a href="/Portfolio/analise">Análise da carteira</a>
				<a href="/Portfolio/comparacao">Comparação de carteiras</a>
				<a href="/Portfolio/fronteira">Fronteira eficiente</a>
			<?php } else { ?>
				<span>Carteiras e operações</span>
				<!--<a href="Portfolio/registro">Registro de transações</a> -->
				<span>Análise da carteira</span>
				<span>Comparação de carteiras</span>
				<span>Fronteira eficiente</span>
			<?php } ?>
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