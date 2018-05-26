<?php
	$this->load->view('Menu_view');
?>
<script type="text/javascript">
		function GerarMapa(){
		    var gerar = confirm('Você gerar novo mapa de sala?');
		    if (gerar){
	        location.href = '<?php echo base_url('Home/Gerar_Mapa') ?>';
		    }
		}

		function Download(){
		    var download = confirm('Deseja fazer o download deste Mapa?');
		    if (download){
		        location.href = '<?php echo base_url('Home/imprimirMapa') ?>';
		    }
		}

		function Alterar(){
		    var download = confirm('Deseja fazer o download deste Mapa?');
		    if (download){
		        location.href = '<?php echo base_url('Home/imprimirMapa') ?>';
		    }
		}
</script>

<script type="text/javascript">
$(iniciar);

<?php
	if($msg = get_msg()):
		echo '<div class="msg-box"><b><center>'.$msg.'</center></b></div>';
	endif;
 ?>
 
 <br><br>
<div align="center" class="form-group row-center">
	<button type="submit"  style=" text-decoration:none;" class="btn btn-warning" onclick="GerarMapa();"> Gerar Mapa</button>
	<button type="submit"  style=" text-decoration:none;" class="btn btn-info"  onclick="Download();"> Download</button>
	<input type="text" name="" value="" placeholder="Pesquisar">
</div>

<?php
	
	$this->load->view('Rodape_view');
?>
