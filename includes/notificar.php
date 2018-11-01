<?php
/*require_once('db.php');
$pendentes= $_POST['selectPendentes'];
//print_r($pendentes);

for($i=0; $i<count($pendentes); $i++){
	enviaEmail($pendentes[$i]);
}

function enviaEmail($id){
	$identificacao= getEmail($id);
	echo $identificacao[0]["email"]."<br />";

	$from= "teste@rolante.ifrs.edu.br";
	$to= $identificacao[0]["email"];
	$subject= "***Não Responda*** Notificação Plano de Trabalho ***Não Responda***";
	$message= "teste";
	$headers= "De: ".$from;

	try {
		mail($to, $subject, $message, $headers);
		echo "Sucesso <br />";
	} catch (Exception $e) {
		echo 'Exceção capturada: ',  $e->getMessage(), "<br />";
	}
}*/
?>
