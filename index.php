<?php 
require_once ("cabecalho.php");
require_once ("includes/db.php");

if(isEntregue($_SESSION['user_email'])==0){
	include 'envioNaoRealizado.php';
}
else if(isEntregue($_SESSION['user_email'])==1){
	include 'envioRealizado.php';
}
else{
	echo "Erro! Contate o Administrador";
}

?>


</html>