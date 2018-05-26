<?php
	$this->load->view('Menu_view');
?>

<br>

<?php
	echo form_open('Usuario/UpdateUsuario'); // porque irá fazer upload de arquivos
	?>
	<input  type="hidden" id="codigo" name="idUsuario" value="<?php echo isset($u_idUsuario) ? $u_idUsuario : -1; ?>">
	<?php
	echo '<br><center>';
	echo form_label('Escolha uma Turma:');
?>
<?php
echo '<br>';
$data = array(
	'placeholder'		=> 'Digite o nome ',
	'maxlength'     => '100',
	'size'          => '50',
	'style'         => 'width:50%',
	'type'			=> 'text'
);
echo '<br><br>';
echo form_label('Nome: ');
echo form_input('nome',isset($u_nome) ? $u_nome : '',$data);


echo '<br>';
$data = array(
	'placeholder'		=> 'Digite a nova Idade',
	'maxlength'     => '100',
	'size'          => '50',
	'style'         => 'width:50%',
	'type'			=> 'text'
);

echo '<br><br>';
echo form_label('Idade: ');
echo form_input('idade', isset($u_idade) ? $u_idade : '' , $data);
echo '<br>';

echo '<br>';
$data = array(
	'placeholder'	=> 'Digite a sua Profissão',
	'maxlength'     => '100',
	'size'          => '50',
	'style'         => 'width:50%',
	'type'			=> 'text'
);

echo '<br><br>';
echo form_label('Profissão: ');
echo form_input('profissao', isset($u_profissao) ? $u_profissao : '' , $data);
echo '<br>';

echo '<br>';
$data = array(
		'placeholder'	=> 'Digite o nome do Usuario',
		'maxlength'     => '100',
		'size'          => '50',
		'style'         => 'width:50%',
		'type'			=> 'text'
);

echo '<br><br>';
echo form_label('Login: ');
echo form_input('login', isset($u_login) ? $u_login : '' , $data);
echo '<br>';
	
echo '<br>';
$data = array(
	'placeholder'	=> 'Digite o novo email',
	'maxlength'     => '100',
	'size'          => '50',
	'style'         => 'width:50%',
	'type'			=> 'text'
);

echo '<br><br>';
echo form_label('Email: ');
echo form_input('email', isset($u_email) ? $u_email : '' , $data);
echo '<br>';

echo '<br>';
	$data = array(
		'placeholder'	=> 'Digite uma nova Senha',
		'maxlength'     => '100',
		'size'          => '50',
		'style'         => 'width:50%',
	
	);
echo '<br><br>';
echo form_label('Senha: ');
echo form_password('senha','',$data);

echo '<br>';
	$data = array(
		'placeholder'		=> 'Digite confirme a nova senha',
		'maxlength'     => '100',
		'size'          => '50',
		'style'         => 'width:50%',	
	);
echo '<br><br>';
echo form_label('Confirme a senha: ');
echo form_password('csenha','',$data);

echo '<br><br><br>';

echo form_submit('enviar','Editar Usuario', array('class' => 'btn btn-primary'));//classe de botão

echo '</center>';

echo form_close();

if($msg = get_msg()):
	echo '<br><div class="msg-box"><center>'.$msg.'</center></div>';
endif;
?>

<?php
	$this->load->view('Rodape_view');
?>
