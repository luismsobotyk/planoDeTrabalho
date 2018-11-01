<?php

require_once("cabecalho.php");
if($_SESSION["permissao"]==1){
	header("Location: " . "/planoDeTrabalho");
}
?>
<div class="container white z-depth-3" id="cont">
	<div class="col s12" style="padding:1%;">
		<div class="section">
			<h5>Enviados</h5>
			<form id="formPDF" name="formPDF" method="POST">
				<table class="striped">
					<thead>
						<tr>
							<th></th>
							<th>Nome</th>
							<th>Data Entrega</th>
							<th><input type="checkbox" id="checkAllEntregues" name="checkAllEntregues"><label for="checkAllEntregues"></th>
							</tr>
						</thead>

						<tbody id="listaEntregues">

						</tbody>

					</table>
					<br />
					<div class="row">
						<div class="col s3 right">
							<button class="right btn waves-effect waves-light red" type="button" onClick="enviarForm(0);">Modelo Reitoria
								<i class="material-icons right">picture_as_pdf</i>
							</button>
						</div>
						<div class="col s3 right">
							<button class="right btn waves-effect waves-light red" type="button" onClick="enviarForm(1);">Modelo Rolante
								<i class="material-icons right">picture_as_pdf</i>
							</button>
						</div>
						</div>
				</form>
			</div>
			<div calss="divider"></div>
			<div class="section">

				<h5>Pendentes</h5>
				<form action="includes/notificar.php" method="POST">
					<table class="striped">
						<thead>
							<tr>
								<th></th>
								<th>Nome</th>
								<th>Último Login</th>
								<th><input type="checkbox" id="checkAllPendentes" name="checkAllPendentes"><label for="checkAllPendentes"></th>
								</tr>
							</thead>

							<tbody id="listaPendentes">

							</tbody>
						</table>
						<br />
						<button class="right btn waves-effect waves-light yellow darken-2" type="submit" name="action">Notificar
							<i class="material-icons right">notifications_none</i>
						</button>
						<br />
					</form>
				</div>
			</div>
		</div>

		<script type="text/javascript">
			$(document).ready(function(){
				$(".button-collapse").sideNav();
			});
			$("#checkAllEntregues").click(function(){
				$('.allEntregues').not(this).prop('checked', this.checked);
			});
			$("#checkAllPendentes").click(function(){
				$('.allPendentes').not(this).prop('checked', this.checked);
			});
	//Gera HTML dos Entregues
	$(document).ready(function(){
		$('#listaEntregues').empty();
		$.ajax({
			type:'post',
			dataType: 'json',
			url: 'funcoesAjax/lerEntregues.php',
			success: function(dados){
				for(var i=0;dados.length>i;i++){
					$('#listaEntregues').append('<tr><td></td><td>'+dados[i].nome+'</td><td>'+dados[i].dataEntrega+'</td><td><input type="checkbox" id="'+dados[i].id+'" name="selectEntregues[]" class="allEntregues" value="'+dados[i].id+'"><label for="'+dados[i].id+'"></label></td></tr>');
				}
			}
		});
	});

	// Gera HTML dos pendentes
	$(document).ready(function(){
		$('#listaPendentes').empty();
		$.ajax({
			type:'post',
			dataType: 'json',
			url: 'funcoesAjax/lerPendentes.php',
			success: function(dados){
				for(var i=0;dados.length>i;i++){
					$('#listaPendentes').append('<tr><td></td><td>'+dados[i].nome+'</td><td>'+dados[i].ultimoLogin+'</td><td><input type="checkbox" id="'+dados[i].id+'" name="selectPendentes[]" class="allPendentes" value="'+dados[i].id+'"><label for="'+dados[i].id+'"></label></td></tr>');
				}
			}
		});
	});



	function enviarForm(e){
		if(e==0){
			document.getElementById('formPDF').action= 'includes/gerarPdfReitoria.php';
			document.getElementById('formPDF').submit();
		}else if(e==1){
			document.getElementById('formPDF').action= 'includes/gerarPdfCampus.php';
			document.getElementById('formPDF').submit();
		}
	}

</script>
