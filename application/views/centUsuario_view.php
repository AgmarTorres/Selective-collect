<?php
	$this->load->view('Menu_view');
?>
<script type="text/javascript">
	function confirma_excluir(idUsuario){
		var apagar = confirm('Você deseja excluir este Usuario?');
		if (apagar){
			location.href = '<?php echo base_url('Usuario/DeletaUsuario') ?>/'+ idUsuario;
		}
	}
</script>
<form action="<?php echo base_url('Usuario/Cadastrar_Usuario') ?>">
  <button type="submit"  style="margin-Left:80%; text-decoration:none;" class="btn btn-success" > Novo Usuario</button>
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
			<th><center>Idade </center></th>
			<th><center>Profissão </center></th>
			<th><center>Email</center></th>
			<th><center>Editar </center></th>
			<th><center>Excluir </center></th>
		</tr>
	</thead>
	<tbody>
		<tr>
		<?php if( $u_idUsuario == -99){ ?>
			<td><center> <?php echo $Usuario->idUsuario?></center> </td>
			<td><center> <?php echo $Usuario->nome ?></center> </td>
			<td><center> <?php echo $Usuario->idade ?></center> </td>
			<td><center> <?php echo $Usuario->profissao ?></center> </td>
			<td><center> <?php echo $Usuario->email ?> </center></td>		
			<td>
				<center>
					<?php echo anchor('Usuario/Edit_Usuario/'.$Usuario->idUsuario,'	<span class="glyphicon glyphicon-pencil"></span>'   ); ?>
				</center>
			</td>
			<?php
				echo '<td class="center" width="20px"> <a class="btn btn-danger btn-xs" onclick="confirma_excluir('.$Usuario->idUsuario.');"
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
