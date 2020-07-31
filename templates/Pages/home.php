<?php

use Cake\Core\Configure;
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
		<?= $this->Html->css('menus.css') ?>
		<?= $this->fetch('meta') ?>
		<?= $this->fetch('css') ?>
		<?= $this->fetch('script') ?>
    </head>

    <body>
		<?php echo$this->element('topNavBar'); ?>
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
					<?php echo$this->element('home_texto_intro'); ?>
                    <hr>
					<?php echo$this->element('servicos_disponiveis'); ?>
                    <hr>
					<?php echo$this->element('links_uteis'); ?>
                </div>
                <!--
				<hr>
                <?ph echo$this->element('disponibilidade_servicos'); !> -->
            </div>
        </div>
    </main>
	<?php echo$this->element('footer'); ?>    
	<ul id=menu>
		<li><a href="">Precisa de Ajuda?</a>
	</ul>

</body>
</html>
