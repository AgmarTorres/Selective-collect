<?php
	$this->load->view('Menu_view');
?>
<script type="text/javascript">
	function confirma_excluir(idMaterial){
		var apagar = confirm('Você deseja excluir este Material?');
		if (apagar){
			location.href = '<?php echo base_url('Material/Deletar_Material') ?>/'+ idMaterial;
		}
	}
</script>
<form action="<?php echo base_url('Material/Cadastrar_Material') ?>">
  <button type="submit"  style="margin-Left:80%; text-decoration:none;" class="btn btn-success" > Novo Material</button>
</form>

<br>

<label style="margin-Left:80%;" for="">Pesquisar</label>
<input type="text" class="input-search" alt="table" placeholder="Pesquisar" />
<?php
	if($msg = get_msg()):
		echo '<div class="msg-box"><center>'.$msg.'</center></div>';
	endif;
?>

<table class="table table-inverse">
	<thead>
		<tr>	
			<th><center> ID </center></th>
			<th><center>Nome </center></th>
			<th><center>Pergunta </center></th>
			<th><center>Imagem </center></th>
			<th><center>Editar </center></th>
			<th><center>Excluir </center></th>
		</tr>
	</thead>
	<tbody>
		<tr>
		<?php foreach ($Materiais as $Material) { ?>
			<td><center> <?php echo $Material->idMaterial?></center> </td>
			<td><center> <?php echo $Material->nome ?></center> </td>
			<td><center> <?php echo $Material->pergunta ?></center> </td>
					
			<td> <?php echo '<p class ="rotuloCentro"><center><img src="'.base_url('/assets/material/'.$Material->imagem).'" height=50 width =50 class="thumb-edicao"/></center></p>' ?></td>
			<td>
				<center>
					<?php echo anchor('Material/Editar_Material/'.$Material->idMaterial,'	<span class="glyphicon glyphicon-pencil"></span>'   ); ?>
				</center>
			</td>
			<?php
				echo '<td class="center" width="20px"> <a class="btn btn-danger btn-xs" onclick="confirma_excluir('.$Material->idMaterial.');"
								><i class="glyphicon glyphicon-remove"></i> Excluir </a></td>';
			?>
		</tr>	
		<?php
			}
		?>
	</tbody>
</table>
<?php
	$this->load->view('Rodape_view');
?>
