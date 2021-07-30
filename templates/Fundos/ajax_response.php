<script>
	function sendXHR(fundo) {
		var data = fundo;

		$.ajax({
			method: 'get',
			url: "<?php echo $this->Url->build(['controller' => 'Fundos', 'action' => 'Ajaxsearch']); ?>",
			data: {
				id: data['id']
			},

			success: function(response) {
				$('#cnpj-fundo-id').val(data['id']);
				$('.resultado_busca').html('<div class="content">Fundo selecionado:</br><strong>' + data['DENOM_SOCIAL'] + ' (' + data['CNPJ'] + ')</strong></div><br>');
			}
		});
	}
</script>

<div class="column-responsive column-80">
	<?php
	$qtd = count($fundos_encontrados);
	if ($qtd == 0) {
		echo 'Nenhum fundo encontrado';
		// } else if ($qtd == 1) {
		// 	foreach ($fundos_encontrados as $fundo) {
		// 		echo '<div class="content">Fundo selecionado:</br><strong>' . $fundo['DENOM_SOCIAL'] . ' (' . $fundo['CNPJ'] . ')</strong></div>';
		// 	}
	} else {
		echo 'Fundo(s) encontrado(s) (selecione o correto):';
	}
	?>

	<?php if ($qtd > 0) { ?>
		<table>
			<!-- TODO: Fix color styles -->
			<?php foreach ($fundos_encontrados as $fundo) { ?>
				<tr>
					<td id="<?= $fundo['id'] ?>" onMouseOut="this.style.color = '#c0c0c0'" onMouseOver="this.style.cursor = 'pointer'; this.style.color = '#2a6496'" onclick='sendXHR(<?php echo $fundo; ?>)'>
						<?= $fundo['DENOM_SOCIAL'] . ' (' . $fundo['CNPJ'] . ')' ?>
					</td>
				</tr>
			<?php } ?>
		</table>
	<?php } ?>
</div>