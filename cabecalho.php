<?php
date_default_timezone_set('America/Sao_Paulo');
require_once("includes/session.php");
require_once("includes/globais.php");
require_once("includes/db.php")

?>


<!--
	Módulo para emissão de Plano de Trabalho do IFRS - Campus Rolante
	Desenvolvimento: Luis Sobotyk
	Contato: luis.sobotyk@rolante.ifrs.edu.br

	2018 - IFRS campus Rolante
	Setor de Tecnologia da Informação
-->



<!doctype html>
<html lang="pt-br">
<head>
	<title>Plano de Trabalho</title>

	<!--Import Google Icon Font-->
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<!--Import materialize.css-->
	<link type="text/css" rel="stylesheet" href='/css/materialize.min.css' media="screen,projection"/>

	<link type="text/css" rel="stylesheet" href=<?php echo "'".$SISTEMA['url']."css/style.css'"?>  media="screen,projection"/>

	<!--Let browser know website is optimized for mobile-->
	<meta name="viewport" content="width=device-width, initial-scale=1.0" charset="utf-8" />

	
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="js/materialize.min.js"></script>

</head>

<body class="blue-grey lighten-5">

	<nav class="px">
		<?php
		$entrega = situacaoEntrega($_SESSION["user_email"]);
		$permissao = getPermissaoUser($_SESSION["user_email"]);
		if($permissao==1){
			echo "<div class='nav-wrapper grey darken-3'>
			<span class='brand-logo center'>Plano de Trabalho</span>
			<a href='#' data-activates='mobile-demo' class='button-collapse'><i class='material-icons'>menu</i></a>
			<ul class='right hide-on-med-and-down'>
			<li>".$_SESSION['user_email']."</li>
			<li><a href='login/logout.php'>Sair</a></li>
			</ul>
			<ul class='side-nav' id='mobile-demo'>
			<li><a href='login/logout.php'>Sair</a></li>
			</ul>
			</div>";
		}else if($permissao==2){
			echo "<div class='nav-wrapper grey darken-3'>
			<span class='brand-logo center'>Plano de Trabalho</span>
			<a href='#' data-activates='mobile-demo' class='button-collapse'><i class='material-icons'>menu</i></a>
			<ul class='right hide-on-med-and-down'>
			<li>".$_SESSION['user_email']."</li>
			<li><a href='revisao.php'>Revisão</a></li>
			<li><a href='index.php'>Preencher</a></li>
			<li><a href='login/logout.php'>Sair</a></li>
			</ul>
			<ul class='side-nav' id='mobile-demo'>
			<li><a href='revisao.php'>Revisão</a></li>
			<li><a href='index.php'>Preencher</a></li>
			<li><a href='login/logout.php'>Sair</a></li>
			</ul>
			</div>";
		}else if($permissao==3){
			echo "<div class='nav-wrapper grey darken-3'>
			<span class='brand-logo center'>Plano de Trabalho</span>
			<a href='#' data-activates='mobile-demo' class='button-collapse'><i class='material-icons'>menu</i></a>
			<ul class='right hide-on-med-and-down'>
			<li>".$_SESSION['user_email']."</li>
			<li><a href='#!'>01</a></li>
			<li><a href='login/logout.php'>Sair</a></li>
			</ul>
			<ul class='side-nav' id='mobile-demo'>
			<li><a href='#!'>01</a></li>
			<li><a href='login/logout.php'>Sair</a></li>
			</ul>
			</div>";
		}else{
			echo "<div class='nav-wrapper grey darken-3'>
			<span class='brand-logo center'>Plano de Trabalho</span>
			</div>";
		}

		?>
	</nav>
