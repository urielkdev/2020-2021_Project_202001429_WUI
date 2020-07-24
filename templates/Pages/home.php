<?php

use Cake\Cache\Cache;
use Cake\Core\Configure;
use Cake\Core\Plugin;
use Cake\Datasource\ConnectionManager;
use Cake\Error\Debugger;
use Cake\Http\Exception\NotFoundException;

$this->disableAutoLayout();

if (!Configure::read('debug')) :
	throw new NotFoundException(
			'Please replace templates/Pages/home.php with your own version or re-enable debug mode.'
	);
endif;

$cakeDescription = 'InvestFunds';
?>
<!DOCTYPE html>
<html>
    <head>
		<?= $this->Html->charset() ?>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>
			<?= $cakeDescription ?>:
			<?= $this->fetch('title') ?>
        </title>
		<?= $this->Html->meta('icon') ?>

        <link href="https://fonts.googleapis.com/css?family=Raleway:400,700" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.1/normalize.css">

		<?= $this->Html->css('milligram.min.css') ?>
		<?= $this->Html->css('cake.css') ?>
		<?= $this->Html->css('home.css') ?>

		<?= $this->fetch('meta') ?>
		<?= $this->fetch('css') ?>
		<?= $this->fetch('script') ?>
    </head>
    <body>
		<?php echo$this->element('topLogoLoginBar'); ?>
		<?php echo$this->element('topNavBar'); ?>

		<ul id=menu>
			<li><a href="">Precisa de Ajuda?</a>
		</ul>

        <header>
			<div class="container text-center">
				<h1 class="top-nav-title">Bem-vindo ao <?php echo$this->element('nomeApp'); ?></h1>
				<h3>Serviço web para auxílio à escolha de fundos de investimento para investidores inexperientes</h3>
				<!--<h2>OUSE</h2>-->
			</div>
		</header>
        <main class="main">
            <div class="container">
                <div class="content">
                    <div class="row">
                        <div class="column">
                            <h3>O <?php echo$this->element('nomeApp'); ?></h3>
                            <small>
                                A taxa de juros no Brasil vem caindo sistematicamente e a já alcançou 2,25%, que é o menor patamar desde seu início histórico em 1996. Com isso, os rendimentos de investimentos usuais da população brasileira, como poupança e renda fixa foram muito prejudicados e podem ter rendimentos reais negativos, perdendo para a inflação. Nesse cenário já está ocorrendo grande migração de recursos para investimentos de mais alto risco, como fundos diversos (multimercados, imobiliários, ações). Contudo, de maneira geral, o "poupador" médio brasileiro não tem conhecimento para definir quais serão os melhores investimentos e muitas vezes faz escolhas inapropriadas.
                                <br/>
                                Bancos, corretoras e influenciadores já apresentam carteiras recomendadas e também recomendam diferentes formas de investimento. Cabe ao investidor leigo "apenas" compor sua carteira com alguns daqueles inveatimentos recomendados. Contudo, isso não é tarefa fácil se for feita adequadamente, pois muitas informações precisam ser analisadas, e elas não estão disponíveis ao investido final, que costuma olhar exclusivamente para a rentabilidade dos investimentos recomendados.
                                <br/>
                                O <?php echo$this->element('nomeApp'); ?> é o resultado de um projeto de extensão realizado pela Universidade Federal de Santa Catarina, cujo objetivo principal é ajudar pessoas que têm investido em opções tradicionais de baixo risco e que não tem muito conhecimento financeiro a escolherem de modo facilitado e instruído outros investimentos, especificamente fundos de investimento.
                            </small>
                        </div>
                    </div>
                    <div class="row">
                        <div class="column">
                            <div class="message default text-center">
                                <small>O <?php echo$this->element('nomeApp'); ?> é um sistema experimental e em desenvolvimento. Sempre verifique os dados fornecidos em outras plataformas antes de tomar qualquer decisão sobre investimentos.</small>
                            </div>
							<?php Debugger::checkSecurityKeys(); ?>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="column">
                            <h3>Serviços disponíveis sobre fundos de investimentos</h3>
                            <ul>
                                <li class="bullet success"><a href="/BuscaFundos">Busca Geral de Fundos de Investimento</a></li>
                                <li class="bullet success">Rentabilidade e volatilidade em diferentes períodos de tempo</li>
                                <li class="bullet success">Índices financeiros de Sharpe e Beta</li>
                                <li class="bullet success">Comparação e correlação de fundos</li>
                                <li class="bullet success">Sugestões de fundos (após preenchimento do perfil do investidor)</li>
                            </ul>
                        </div>
                        <div class="column">
                            <h3>Serviços disponíveis sobre carteira de investimentos</h3>
                            <ul>
                                <li class="bullet success">Registro de operações financeiras</li>
                                <li class="bullet success">Análise da evolução</li>
                                <li class="bullet success">Análise do retorno, risco e correlação</li>
                                <li class="bullet success">Construção da fronteira eficiente e otimização  (após preenchimento do perfil do investidor)</li>
                            </ul>
                        </div>
                        <!--
                        <div class="column">
                            <h3>Cadastre-se ou Entre para acessar o sistema</h3>
                            <a href="Usuarios">Cadastre-se</a>
                            <a href="Usuarios">Entre com sua conta</a>
                        </div>
                        -->
                    </div>
                    <hr>
                    <div class="row">
                        <h3>Links Úteis</h3>
                    </div>
                    <div class="row">
                        Informações gerais sobre investimentos: &emsp;
                        <a target="_blank" href="https://">link</a> &emsp;
                        <a target="_blank" href="https://">link</a> &emsp;
                        <a target="_blank" href="https://">link</a> &emsp;
                    </div>
                    <div class="row">
                        Corretoras de Investimento: &emsp;
                        <a target="_blank" href="https://">link</a> &emsp;
                        <a target="_blank" href="https://">link</a> &emsp;
                        <a target="_blank" href="https://">link</a> &emsp;
                    </div>
                    <div class="row">
                        Informações sobre fundos de investimento: &emsp;
                        <a target="_blank" href="https://">link</a> &emsp;
                        <a target="_blank" href="https://">link</a> &emsp;
                        <a target="_blank" href="https://">link</a> &emsp;
                    </div>
                    <div class="row">
                        Outros comparadores de fundos de investimento: &emsp;
                        <a target="_blank" href="https://">link</a> &emsp;
                        <a target="_blank" href="https://">link</a> &emsp;
                        <a target="_blank" href="https://">link</a> &emsp;
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="column">
                        <h4>Disponibilidade dos serviços</h4>
						<?php
						try {
							$connection = ConnectionManager::get('default');
							$connected = $connection->connect();
						} catch (Exception $connectionError) {
							$connected = false;
							$errorMsg = $connectionError->getMessage();
							if (method_exists($connectionError, 'getAttributes')) :
								$attributes = $connectionError->getAttributes();
								if (isset($errorMsg['message'])) :
									$errorMsg .= '<br />' . $attributes['message'];
								endif;
							endif;
						}
						?>
                        <ul>
							<?php if ($connected) : ?>
								<li class="bullet success">Acesso à base de dados ok.</li>
							<?php else : ?>
								<li class="bullet problem">Sem acesso à base de dados.<br /><?php echo $errorMsg ?></li>
							<?php endif; ?>
							<?php if (Plugin::isLoaded('DebugKit')) : ?>
								<li class="bullet success">DebugKit ok.</li>
							<?php else : ?>
								<li class="bullet problem">Sem acesso ao debugKite.</li>
							<?php endif; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

		

    </main>
	<?php echo$this->element('footer'); ?>    
</body>
</html>
