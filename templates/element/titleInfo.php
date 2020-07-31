<?php
if (!isset($tam)) {
	$tam = '4';
}
if (!isset($info)) {
	$info = '';
}
if (!isset($align)) {
	$align = 'left';
}
?>
<div style="text-align: <?=$align?>;">
	<!--<h<?= $tam ?>><?= $title ?></h<?= $tam ?>> -->
	<font size='<?= $tam ?>'><?= $title ?> </font>
	<?php if($info!='') {?>
	<div class="dropdown">
		<img src="/img/cake.icon.png">
		<div class="dropdown-content">
			<p><?= $info ?></p>
		</div>
	</div> 
	<?php } ?>
</div>


