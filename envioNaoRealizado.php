<div class="container" id="cont">
	<form onsubmit="enviaDados();" method="post" id="form">
		<ul class="collapsible" data-collapsible="expandable">
			<li>
				<div class="collapsible-header">
					<i class="material-icons">info</i>Identificação
					<!--span class="new badge red" data-badge-caption="Alterações">4</span-->
				</div>
				<div class="collapsible-body"><?php include "abas/identificacao.php"; ?></div>
			</li>
			<li>
				<div class="collapsible-header"><i class="material-icons">filter_frames</i>Aulas</div>
				<div class="collapsible-body"><?php include "abas/aulas.php"; ?></div>
			</li>
			<li>
				<div class="collapsible-header"><i class="material-icons">book</i>Atividades de Ensino</div>
				<div class="collapsible-body"><?php include "abas/ativEnsino.php"; ?></div>
			</li>
			<li>
				<div class="collapsible-header"><i class="material-icons">find_in_page</i>Atividades de Pesquisa</div>
				<div class="collapsible-body"><?php include "abas/ativPesq.php"; ?></div>
			</li>
			<li>
				<div class="collapsible-header"><i class="material-icons">linear_scale</i>Atividades de Extensão</div>
				<div class="collapsible-body"><?php include "abas/ativExtensao.php"; ?></div>
			</li>
			<li>
				<div class="collapsible-header"><i class="material-icons">library_books</i>Atividades Administrativas <label>&nbsp;(Conselho, Colegiado, Comitê, Comissão, Direção, Coordenação e outros)</label></div>
				<div class="collapsible-body"><?php include "abas/ativAdmin.php" ?></div>
			</li>
		</ul>
		<button class="right btn waves-effect waves-light green darken-3" type="submit" name="action" id="botao">Enviar
			<i class="material-icons right">send</i>
		</button>
	</form>


</div>
		<!--
		
		ARRUMAR O FOOTER
		<footer class="page-footer footer-copyright" id="footer">
			<div class="footer-copyright">
				<div class="container">
					© 2014 Copyright Text
					<a class="grey-text text-lighten-4 right" href="#!">More Links</a>
				</div>
			</div>
		</footer>
	-->

	<script type="text/javascript">
		var aulas = [];
		var countAulas= 0;
		var ativAdmin = [];
		var countAtivAdmin= 0;
		var ativEnsino = [];
		var countEnsino= 0;
		var ativPesquisa = [];
		var countPesquisa= 0;
		var ativExtensao = [];
		var countExtensao= 0;
		$(document).ready(function() {
			Materialize.updateTextFields();
		});
		$(document).ready(function() {
			$('select').material_select();
		});
		$(document).ready(function(){
			$('.collapsible').collapsible('open', 0);
		});
		$(document).ready(function(){
			$(".button-collapse").sideNav();
		});
		function enviaDados(form){
			var formulario= {};
			$.each($('#form').serializeArray(), function(){
				formulario[this.name] = this.value;
			});
			$.ajax({
				type: "POST",
				data: {
					"formulario" : formulario,
					"aulas" : aulas,
					"ativAdmin" : ativAdmin,
					"ativEnsino" : ativEnsino,
					"ativPesquisa" : ativPesquisa,
					"ativExtensao" : ativExtensao,
					"email" : '<?=$_SESSION["user_email"]?>'
				},
				dataType: 'JSON',
				url: "includes/post.php",
				success: function(msg){
					console.log(dados.categoria.value);
				}
			});
			alert("Seu Plano de Trabalho foi enviado.");
		}
	</script>
</body>