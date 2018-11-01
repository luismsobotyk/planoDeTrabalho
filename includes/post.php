<?php
require_once("db.php");

$formulario= $_POST['formulario'];

$areaConhecimento= $formulario['areaConhecimento'];
$categoria = $formulario['categoria'];
$regime= $formulario['regime'];
//$ativEnsino = $formulario['ativEnsino'];
//$ativPesquisa = $formulario['ativPesquisa'];
//$ativExt = $formulario['ativExtensao'];

$aulas = $_POST['aulas'];
$ativEnsino= $_POST['ativEnsino'];
$ativPesquisa= $_POST['ativPesquisa'];
$ativExtensao= $_POST['ativExtensao'];
$ativAdmin= $_POST['ativAdmin'];
$mail = $_POST['email'];

$db = new Db();
$db->query("insert into identificacao (area, categoria, regime, idUser) values (?, ?, ?, (select id from usuario where email= ?))", [$areaConhecimento, $categoria, $regime, $mail]);

/*$db = new Db();
$db->query("insert into ativensino (atividade, professorId) values (?, (select id from usuario where email= ?))", [$ativEnsino, $mail]);*/

$count = 0;
do{
	$ativ= $ativEnsino[$count]['atividade'];
	$chEns= $ativEnsino[$count]['chEnsino'];
	if(!$ativ==""){
		$db = new Db();
		$db->query("insert into ativensino (atividade, CH, professorId) values (?, ?, (select id from usuario where email= ?))", [$ativ, $chEns, $mail]);;
	}
	$count++;
}while($count<count($ativEnsino));


/*$db= new Db();
$db->query("insert into ativpesq (atividade, professorId) values (?, (select id from usuario where email= ?))", [$ativPesquisa, $mail]);*/

$count = 0;
do{
	$ativ= $ativPesquisa[$count]['atividade'];
	$chPesq= $ativPesquisa[$count]['chPesquisa'];
	if(!$ativ==""){
		$db = new Db();
		$db->query("insert into ativpesq (atividade, CH, professorId) values (?, ?, (select id from usuario where email= ?))", [$ativ, $chPesq, $mail]);;
	}
	$count++;
}while($count<count($ativPesquisa));



/*$db= new Db();
$db->query("insert into ativext (atividade, professorId) values (?, (select id from usuario where email= ?))", [$ativExt, $mail]);*/

$count = 0;
do{
	$ativ= $ativExtensao[$count]['atividade'];
	$chExt= $ativExtensao[$count]['chExtensao'];
	if(!$ativ==""){
		$db = new Db();
		$db->query("insert into ativext (atividade, CH, professorId) values (?, ?, (select id from usuario where email= ?))", [$ativ, $chExt, $mail]);;
	}
	$count++;
}while($count<count($ativExtensao));


$count = 0;
do{
	$disciplina= $aulas[$count]['disciplina'];
	$curso= $aulas[$count]['curso'];
	$ch= $aulas[$count]['ch'];
	if(!$disciplina==""){
		$db= new Db();
		$db->query("insert into aulas (disciplina, curso, CH, professorId) values (?, ?, ?, (select id from usuario where email=?))", [$disciplina, $curso, $ch, $mail]);
	}
	$count++;
}while($count<count($aulas));

$count = 0;
do{
	$atividade= $ativAdmin[$count]['atividade'];
	$portaria= $ativAdmin[$count]['portaria'];
	$chAdmin= $ativAdmin[$count]['chAdmin'];
	if(!$atividade==""){
		$db= new Db();
		$db->query("insert into ativadmin (atividade, portaria, CH, professorId) values (?, ?, ?, (select id from usuario where email=?))", [$atividade, $portaria, $chAdmin, $mail]);
	}
	$count++;
}while($count<count($ativAdmin));

$db= new Db();
$db->query("update usuario set entregue=1, dataEntrega= ? where email=?", [date("Y-m-d"), $mail]);


?>
