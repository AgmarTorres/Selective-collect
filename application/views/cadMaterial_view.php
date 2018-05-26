<?php
		$this->load->view('Menu_view');
?>
<br>
<?php
	echo form_open_multipart('Material/Adicionar_Material'); // porque irá fazer upload de arquivos
	echo '<br><center>';
	echo form_label('Nome:   ');
	$options = array(
        'orgânico'         => 'Orgânico',
        'metal'           => 'Metal',
        'papel'         => 'Papel',
		'plástico'        => 'Plástico',
		'vidro'        => 'Vidro',
);

echo form_dropdown('nome', $options, 'large');


	$data = array(
		'placeholder'	=> 'Digite a pergunta para o usuário',
		'maxlength'     => '300',
		'size'          => '300',
		'style'         => 'width:50%',
		'type'			=> 'text'
	);
	echo '<br><br>';
	echo form_label('Pergunta: ');
	echo form_input('pergunta','',$data);
	echo '<br><br>';

	echo form_label('Imagem do hospedagem:', set_value('imagem'), array('class' => 'rotuloCentro'));
    echo '<br><br>';
	echo form_upload('imagem','imagem',array('class' => 'upload'));
    echo '<br>';
    echo '<br>';echo '<br>';
    echo form_submit('enviar','Salvar Material', array('class' => 'btn btn-info'));
	echo '<br><br><br></center>';

	echo form_close();

	if($msg = get_msg()):
		echo '<br><div class="msg-box"><center>'.$msg.'</center></div>';
	endif;
?>
<?php
	$this->load->view('Rodape_view');
?>
