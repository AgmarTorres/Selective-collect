<?php
		$this->load->view('Menu_view');
?>
<br>
<?php
	echo form_open('Usuario/Adicionar_Usuario'); // porque irá fazer upload de arquivos
	echo '<br><center>';
	echo form_label('Escolha uma Instituição:');
?>
<select class="form-control" style="width:200px;height:40px;font-size: 13px;" type="select" id="idInstituicao" name="idInstituicao" required>
	<option value="0" > --Instituições--</option>
	<?php foreach ($Instituicaos as $Instituicao ) {
		if($idInstituicao ==  $Instituicao->codigo ){ ?>
			<option value="<?= $Instituicao->codigo; ?>" selected> <?=  $Instituicao->nome; ?> </option>
		<?php }	?>
		<option value="<?=  $Instituicao->codigo;  ?>"> <?=  $Instituicao->nome; ?>  </option>
	<?php } ?>
</select>
<?php
	echo '<br>';
	$data = array(
		'placeholder'		=> 'Digite o nome do Usuario',
		'maxlength'     => '100',
		'size'          => '50',
		'style'         => 'width:50%',
		'type'			=> 'text'
	);
	echo '<br><br>';
	echo form_label('Nome: ');
	echo form_input('nome','',$data);

	echo '<br>';
	$data = array(
		'placeholder'		=> 'Digite o nome do Usuario',
		'maxlength'     => '100',
		'size'          => '50',
		'style'         => 'width:50%',
		'type'			=> 'text'
	);
	echo '<br><br>';
	echo form_label('Login: ');
	echo form_input('login','',$data);

	echo '<br>';
	$data = array(
		'placeholder'		=> 'Digite o nome do Usuario',
		'maxlength'     => '100',
		'size'          => '50',
		'style'         => 'width:50%',
		'type'			=> 'password'
	);
	echo '<br><br>';
	echo form_label('Email: ');
	echo form_input('email','',$data);

	echo '<br>';
	$data = array(
		'placeholder'		=> 'Digite o nome do Usuario',
		'maxlength'     => '100',
		'size'          => '50',
		'style'         => 'width:50%',
	);
	echo '<br><br>';
	echo form_label('Senha: ');
	echo form_password('senha','',$data);

	echo '<br>';
	$data = array(
		'placeholder'	=> 'Digite o nome do Usuario',
		'maxlength'     => '100',
		'size'          => '50',
		'style'         => 'width:50%',
	);
	echo '<br><br>';
	echo form_label('Confirme a senha: ');
	echo form_password('csenha','',$data);

	echo '<br><br><br>';

	echo form_submit('enviar','Cadastrar Usuario', array('class' => 'btn btn-primary'));//classe de botão

	echo '</center>';

	echo form_close();

	if($msg = get_msg()):
		echo '<br><div class="msg-box"><center>'.$msg.'</center></div>';
	endif;
?>
<?php
	$this->load->view('Rodape_view');
?>
