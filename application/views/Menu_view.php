<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>COLEMAX</title>
	<link href="<?= base_url(); ?>assets/css/bootstrap.css" rel="stylesheet">
	<link href="<?= base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?= base_url(); ?>assets/css/estilo.css" rel="stylesheet" >
	<script src="<?= base_url(); ?>assets/js/jquery.min.js"></script>
	<script src="<?= base_url(); ?>assets/js/bootstrap.min.js"></script>
	<script src="<?= base_url(); ?>assets/js/complements.js"></script>
	<script type="text/javascript" src="<?= base_url(); ?>assets/js/jquery-table.js"></script>
  <script type="text/javascript" src="<?= base_url(); ?>assets/js/jquery.quick.search.js"></script>
	<script type="text/javascript" src="<?= base_url(); ?>assets/js/jquery-ui.js"></script>
	<link href="css/jquery-ui.structure.css" rel="stylesheet" type="text/css">
	<link href="css/jquery-ui.theme.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link href="<?= base_url(); ?>assets/css/troca.css" >
</head>
<body>
  <nav class="navbar navbar-inverse">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="<?php echo base_url('Fases') ?>">COLEMAX</a>
      </div>
      <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav">
          <li class="active"><a href="<?php echo base_url('Fases') ?>">Home</a></li>
      		<li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Fases <span class="caret"></span></a>
            <ul class="dropdown-menu">
							<li><a href="<?php echo base_url('Fases/index') ?>">Fases cadastradas</a></li>
              <li><a href="<?php echo base_url('Fases/Cadastrar_Fases') ?>">Nova Fase</a></li>
            </ul>
          </li>
          <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Material <span class="caret"></span></a>
            <ul class="dropdown-menu">
							<li><a href="<?php echo base_url('Material/index') ?>">Materiais Cadastrado</a></li>
              <li><a href="<?php echo base_url('Material/Cadastrar_Material') ?>">Novo Material</a></li>
            </ul>
          </li>
          <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Usuário <span class="caret"></span></a>
            <ul class="dropdown-menu">
							<li><a href="<?php echo base_url('Usuario/index') ?>">Usuário Cadastrado</a></li>
              <li><a href="<?php echo base_url('Usuario/Cadastrar_Usuario') ?>">Novo  Usuário</a></li>
            </ul>
          </li>
					<li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Ajuda <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="<?php echo base_url('Home/Info') ?>">Info</a></li>
						</ul>
          </li>
          <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Olá <?php echo $u_nome ?> ! <span class="caret"></span></a>
            <ul class="dropdown-menu">
							<li><a href="<?php echo base_url('Usuario/Edit_Usuario') ?>">Editar Perfil </a></li>
              <li><a href="<?php echo base_url('Autenticacao/logout') ?>">Sair</a></li>
            </ul>
          </li>
					</ul>
      </div>
    </div>
  </nav>
