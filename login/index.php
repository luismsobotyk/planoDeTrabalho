<?php 
require_once("../cabecalho.php");
require_once("../includes/db.php");

$visible= "none";

if (isset($_POST["formulario_email"])){
	$formulario_email         = $_POST["formulario_email"] . $SISTEMA["dominio"];
	$formulario_senha         = $_POST["formulario_password"];
		if(imap_open('{imap.gmail.com:993/imap/ssl/novalidate-cert}INBOX', $formulario_email, $formulario_senha)) {
			$_SESSION["user_email"] = $formulario_email;
			$_SESSION["permissao"] = getPermissaoUser($formulario_email);
    		insereUsuario($formulario_email);
    		$permissao = getPermissaoUser($_SESSION["user_email"]);
    		if($permissao==2){
    			header("Location: " . "/revisao.php");
    		}else{
				header("Location: " . "/");
			}
			}else{
			$visible="block";
		}

}
?>

<style type="text/css" media="screen">
#box{
	width: 500px;
	position: absolute;
	top: 50%;
	left: 50%;
	transform: translate(-50%, -50%);
}
</style>

<div class="row">
	<div class="" id="box">
		<form action='' method='POST'>
		<div class="card-panel white">
			
			<span class="new badge red rigth" data-badge-caption="Credenciais Inv&aacute;lidas" id="alertaCredencial" style="display:<?= $visible ?>"></span>

			<h5 class="center">Login</h5>
			<span class="black-text">Para prosseguir, faça login utilizando suas credenciais de acesso do e-mail institucional do IFRS.
			</span>


			<div class="row">
				<br />
				<div class="col s8">
					<input placeholder="nome.sobrenome" id="formulario_email" name="formulario_email" type="text" class="validate" required>
				</div>
				<div class="col s2">
					@rolante.ifrs.edu.br
				</div>

			</div>


			<div class="row">

				<div class="col s12">
					<input placeholder="Senha" id="formulario_password" name="formulario_password" type="password" class="validate" required>
					<small>Você Sabia? Sua senha não é guardada em lugar algum. <!--Veja nosso código a href="https://github.com/luismsobotyk/planoDeTrabalho" target="_blank">aqui</a--></small>
				</div>

			</div>

			<div class="row">
				<button class="waves-effect waves-light btn right green" type="submit"><i class="material-icons right">send</i>Entrar</button>
			</button>
		</div>
		</form>
	</div>
</div>
</div>


</body>

</html>
