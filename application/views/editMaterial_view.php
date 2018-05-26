<?php
		$this->load->view('Menu_view');
?>
<br>
<?php
	echo form_open_multipart('Material/Update_Material/'.$Material->idMaterial); // porque irá fazer upload de arquivos
	echo '<br><center>';
	echo form_label('Nome:   ');
	$options = array(
        'Orgânico'    => 'Orgânico',
        'Metal'       => 'Metal',
        'Papel'       => 'Papel',
		'Plástico'    => 'Plástico',
		'Vidro'       => 'Vidro',
	);
echo form_dropdown('nome', $options, $Material->nome);


	$data = array(
		'placeholder'	=> 'Digite a pergunta para o usuário',
		'maxlength'     => '300',
		'size'          => '300',
		'style'         => 'width:50%',
		'type'			=> 'text'
	);

	echo '<br><br>';
	echo form_label('Pergunta: ');
	echo form_input('pergunta',$Material->pergunta,$data);
	echo '<br><br>';

	echo form_label('Imagem do Material:', set_value('imagem'), array('class' => 'rotuloCentro'));
    echo '<br><br>';
	echo form_upload('imagem');
	echo '<br>';
	echo '<p class ="rotuloCentro"><br><br> <br> Imagem Antiga <br> <br><img src="'.base_url('assets/material/'.$Material->imagem).'" height=200 width =200 class="thumb-edicao"/></p>';
    echo form_submit('enviar','Editar Material', array('class' => 'btn btn-info'));
	echo '<br><br><br></center>';

	echo form_close();
	if($msg = get_msg()):
		echo '<br><div class="msg-box"><center>'.$msg.'</center></div>';
	endif;
?>
<?php
	$this->load->view('Rodape_view');
?>
