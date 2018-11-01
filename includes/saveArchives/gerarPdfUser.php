<?php
require_once('db.php');
require_once('dompdf/autoload.inc.php');
// referencía o namespace do Dompdf
use Dompdf\Dompdf;
$entregues= $_POST['selectEntregues'];

for($i=0; $i<count($entregues); $i++){
	geraPdf($entregues[$i]);
}

if(count($entregues)==1){
	for($i=0; $i<count($entregues); $i++){
		downloadPdf($entregues[$i]);
	}
}else{
	geraZip();
	downloadZip();
}

// funcoes


function geraPdf($id){
	$identificacao= getIdentificacao($id);

	if ($identificacao[0]["categoria"]=="ES"){
		$identificacao[0]["categoria"]='(&nbsp;&nbsp;&nbsp;) Magistério do EBTT <br />
		(X) Magistério do ES';
	}else{
		$identificacao[0]["categoria"]='(X) Magistério do EBTT <br />
		(&nbsp;&nbsp;&nbsp;) Magistério do ES';
	}

	//echo $identificacao[0]["categoria"]."<br />";

	if($identificacao[0]["regime"]=="20"){
		$identificacao[0]["regime"]='(X)20h (&nbsp;&nbsp;)40h (&nbsp;&nbsp;)DE<br />
		(&nbsp;&nbsp;)Visitante';
	}else if($identificacao[0]["regime"]=="40"){
		$identificacao[0]["regime"]='(&nbsp;&nbsp;)20h (X)40h (&nbsp;&nbsp;)DE<br />
		(&nbsp;&nbsp;)Visitante';
	}else if($identificacao[0]["regime"]=="DE"){
		$identificacao[0]["regime"]='(&nbsp;&nbsp;)20h (&nbsp;&nbsp;)40h (X)DE<br />
		(&nbsp;&nbsp;)Visitante';
	}else{
		$identificacao[0]["regime"]='(&nbsp;&nbsp;)20h (&nbsp;&nbsp;)40h (&nbsp;&nbsp;)DE<br />
		(X)Visitante';
	}

	//echo $identificacao[0]["regime"]."<br />";

	$dompdf = new Dompdf();

	$aulaArray= getAulas($id);
	$aulas= "";
	for ($i= 1; $i<=15; $i++){
		$aulas= $aulas.'<tr>
		<td style="border: 1px solid black;"><b>'.$i.'</b></td>
		<td style="border: 1px solid black;">'.$aulaArray[$i-1]["disciplina"].'</td>
		<td style="border: 1px solid black;">'.$aulaArray[$i-1]["curso"].'</td>
		<td style="border: 1px solid black;">'.$aulaArray[$i-1]["CH"].'</td></tr>';
	}

	$txtEnsino= "";
	$ensinoArray= getAtivEnsino($id);
	for ($i= 0; $i<count(getAtivEnsino($id)); $i++){
		$txtEnsino= $txtEnsino.'<tr>
		<td style="border: 1px solid black;">'.$ensinoArray[$i]["atividade"].'</td>
		<td style="border: 1px solid black;">'.$ensinoArray[$i]["CH"].'</td>
		</tr>';
	}

	$ativEnsino='<table style="width:100%; border-collapse: collapse; margin-top:-10px;">
	<tr><td style="border: 1px solid black;" bgcolor="C0C0C0"><b>Atividades Complementares de Ensino</b></td></tr>
	</table>
	<table style="width:100%; border-collapse: collapse;">
	<tr>
	<td style="border: 1px solid black; font-size:10;"><b>Projeto</b></td>
	<td style="border: 1px solid black; font-size:10;"><b>C.H.</b></td>
	</tr>'.$txtEnsino.'
	</table>';

	$txtPesquisa= "";
	$pesquisaArray= getAtivPesq($id);
	for ($i= 0; $i<count($pesquisaArray); $i++){
		$txtPesquisa= $txtPesquisa.'<tr>
		<td style="border: 1px solid black;">'.$pesquisaArray[$i]["atividade"].'</td>
		<td style="border: 1px solid black;">'.$pesquisaArray[$i]["CH"].'</td>
		</tr>';
	}

	$ativPesquisa='<table style="width:100%; border-collapse: collapse; margin-top:-10px;">
	<tr><td style="border: 1px solid black;" bgcolor="C0C0C0"><b>Atividades de Pesquisa</b></td></tr>
	</table>
	<table style="width:100%; border-collapse: collapse;">
	<tr>
	<td style="border: 1px solid black; font-size:10;"><b>Projeto</b></td>
	<td style="border: 1px solid black; font-size:10;"><b>C.H.</b></td>
	</tr>'.$txtPesquisa.'
	</table>';


	$txtExtensao= "";
	$extensaoArray= getAtivExt($id);
	for ($i= 0; $i<count($extensaoArray); $i++){
		$txtExtensao= $txtExtensao.'<tr>
		<td style="border: 1px solid black;">'.$extensaoArray[$i]["atividade"].'</td>
		<td style="border: 1px solid black;">'.$extensaoArray[$i]["CH"].'</td>
		</tr>';
	}

	$ativExt='<table style="width:100%; border-collapse: collapse; margin-top:-10px;">
	<tr><td style="border: 1px solid black;" bgcolor="C0C0C0"><b>Atividades de Extensão</b></td></tr>
	</table>
	<table style="width:100%; border-collapse: collapse;">
	<tr>
	<td style="border: 1px solid black; font-size:10;"><b>Projeto</b></td>
	<td style="border: 1px solid black; font-size:10;"><b>C.H.</b></td>
	</tr>'.$txtExtensao.'
	</table>';


	$txtAdmin= "";
	for ($i= 0; $i<count(getAtivAdmin($id))-1; $i++){
		$txtAdmin= $txtAdmin.'<tr>
		<td style="border: 1px solid black;">'.getAtivAdmin($id)[$i]["atividade"].'</td>
		<td style="border: 1px solid black;">'.getAtivAdmin($id)[$i]["portaria"].'</td>
		</tr>';
	}

	$ativAdmin='<table style="width:100%; border-collapse: collapse; margin-top:-10px;">
	<tr><td style="border: 1px solid black;" bgcolor="C0C0C0"><b>Atividades Administrativas</b></td></tr>
	</table>
	<table style="width:100%; border-collapse: collapse;">
	<tr>
	<td style="border: 1px solid black; font-size:10;"><b>Conselho, Colegiado, Comitê, Comissão, Direção, Coordenação e outros</b></td>
	<td style="border: 1px solid black; font-size:10;"><b>Portaria</b></td>
	</tr>'.$txtAdmin.'
	</table>';

	$dompdf->load_html('
		<style>
		body {
			font-family: "Times New Roman", Times, serif;
			padding-right: 60px;
			padding-left: 60px;
			margin-top: -10px;
		}
		td, tr, th{
			padding-left: 5px;
		}
		</style>
		<body><div style="text-align:center;">
		<div style="font-size:12;"><p><b>Anexo I<br />Plano de Trabalho Docente</b></p>
		</div>
		<table style="width:100%; border-collapse: collapse; margin-top:-15px;">
		<tr>
		<td style="border: 1px solid black;">PROFESSOR(A): '.$identificacao[0]["nome"].'</td>
		</tr>
		<tr>
		<td style="border: 1px solid black;">ÁREA DE CONHECIMENTO: '.$identificacao[0]["area"].'</td>
		</tr>
		</table>
		<table style="width:100%; border-collapse: collapse;">
		<tr>
		<td style="border: 1px solid black;">CATEGORIA:<br />'.$identificacao[0]["categoria"].'
		</td>
		<td style="border: 1px solid black;">
		REGIME DE TRABALHO:<br />
		'.$identificacao[0]["regime"].'
		</td>
		</tr>
		</table></div><br />
		<div style="font-size:11;"><table style="width:100%; border-collapse: collapse; margin-top:-10px;">
		<tr><td style="border: 1px solid black;" bgcolor="C0C0C0"><b>Aulas</b></td></tr>
		</table>
		<table style="width:100%; border-collapse: collapse;">
		<tr>
		<td style="border: 1px solid black;  width: 5%;"></td>
		<td style="border: 1px solid black;"><b>Disciplina</b></td>
		<td style="border: 1px solid black;"><b>Curso</b></td>
		<td style="border: 1px solid black;"><b>C.H.</b></td>
		</tr>'.$aulas.'
		</table><br />'.$ativEnsino.'<br />'.$ativPesquisa.'<br />'.$ativExt.'<br />'.$ativAdmin."</div><br /><div style='font-size: 10px;'>
		<table style='text-align: center; margin: auto;'>
		<tr>
		<td><b>______________________________</b></td>
		<td><b>______________________________</b></td>
		<td><b>______________________________</b></td>
		</tr>
		<tr>
		<td>Docente</td>
		<td>Coordenador</td>
		<td>Diretor</td>
		</tr>
		</table>
		</div></body>");

	// configura o papel
	$dompdf->setPaper('A4', 'portrait');

	// renderiza o html como pdf
	$dompdf->render();

	// envia o pdf gerado
	$output = $dompdf->output();

	// salva no servidor
	file_put_contents('saveArchives/Plano de Trabalho - '.$identificacao[0]["nome"].".pdf", $output);
}


function geraZip(){
	// diretorio dos arquivos
	$rootPath = realpath('saveArchives/');
	// cria o objeto
	$zip = new ZipArchive();
	// nomeia o arquivo e abre o zip
	$zip->open('Planos de Trabalho.zip', ZipArchive::CREATE | ZipArchive::OVERWRITE);
	// inicializa uma lista vazia, que sera preenchida depois, dos arquivos que vão ser deletados do servidor
	$filesToDelete = array();
	// cria uma iterador de diretório recursivo
	/** @var SplFileInfo[] $files */
	$files = new RecursiveIteratorIterator(
		new RecursiveDirectoryIterator($rootPath),
		RecursiveIteratorIterator::LEAVES_ONLY
	);

	//iniciar foreach para adicionar os arquivos no zip aberto anteriormente
	foreach ($files as $name => $file){
    	// inicia um if para ignorar diretorios e adicionar apenas arquivos
		if (!$file->isDir()){
        	// pega o caminho relativo e absoluto do arquivo
			$filePath = $file->getRealPath();
			$relativePath = substr($filePath, strlen($rootPath) + 1);
        	// adiciona o arquivo ao zip
			$zip->addFile($filePath, $relativePath);

       		// adiciona o arquivo na lista de arquivos a serem deletados
			$filesToDelete[] = $filePath;
		}
	}

	// fecha o objeto e cria o zip
	$zip->close();

	// foreach para deletar os arquivos que foram inseridos no zip
	foreach ($filesToDelete as $file){
		unlink($file);
	}
}

function downloadZip(){
	$arquivoNome = 'Planos de Trabalho.zip';
	$arquivoLocal = ''.$arquivoNome; // caminho absoluto do arquivo
	if (!file_exists($arquivoLocal)) {
		echo "<script>alert('Arquivo não encontrado, solicite ajuda do Administrador.');</script>";
		exit;
	}
	$novoNome = 'Planos de Trabalho.zip';
	// headers
	header('Content-Description: File Transfer');
	header('Content-Disposition: attachment; filename="'.$novoNome.'"');
	header('Content-Type: application/octet-stream');
	header('Content-Transfer-Encoding: binary');
	header('Content-Length: ' . filesize($arquivoNome));
	header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
	header('Pragma: public');
	header('Expires: 0');
	//envia o arquivo
	readfile($arquivoNome);
	//deleta o arquivo
	unlink($arquivoLocal);
}

function downloadPdf($id){
	$identificacao= getIdentificacao($id);
	$arquivoNome= "Plano de Trabalho - ".$identificacao[0]["nome"].".pdf";
	$arquivoLocal = 'saveArchives/'.$arquivoNome; // caminho absoluto do arquivo

	if (!file_exists($arquivoLocal)) {
		echo "<script>alert('Arquivo ".$arquivoNome." não encontrado, solicite ajuda do Administrador.');</script>";
		exit;
	}

	$novoNome = "Plano de Trabalho - ".$identificacao[0]["nome"].".pdf";

	// headers
	header('Content-Description: File Transfer');
	header('Content-Disposition: attachment; filename="'.$novoNome.'"');
	header('Content-Type: application/octet-stream');
	header('Content-Transfer-Encoding: binary');
	header('Content-Length: ' . filesize($arquivoLocal));
	header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
	header('Pragma: public');
	header('Expires: 0');

	//envia o arquivo
	readfile($arquivoLocal);

	//deleta o arquivo
	unlink($arquivoLocal);


}
?>