<?php
	require_once('includes/db.php');
	$db= new Db();
    foreach($db->query('select id from usuario where email=?;', [$_SESSION['user_email']]) as $id_user[]);
?>
<div class="container white z-depth-4" id="cont">
	<br />
	<p class="flow-text center" style="background-image: url('images/paint.png');background-repeat: no-repeat, repeat;background-position: center; ">Você já entregou seu Plano de Trabalho</p>
	<br />
	<div class="row">
		<div class="col s6 offset-s3">
			 <p class="flow-text">Suas ações:</p>
		</div>
	</div>
	<div class="row">
		<div class="col s3 m3 l3 xl2 offset-xl5 offset-s2 offset-m3 offset-l3">
				<a href="includes/gerarPdfUser.php?email=<?=$_SESSION['user_email']?>" class="btn waves-effect waves-light red"><i class="material-icons right">picture_as_pdf</i>VER PLANO</a>
		</div>
		<!--div class="col s4 m4 l4 xl3 offset-s1 offset-m1 offset-l1">
				<a class="btn waves-effect waves-light yellow darken-2"><i class="material-icons right">edit</i>EDITAR PLANO</a>
		</div-->
	</div>
	<div class="row">
		
	</div>
</div>

</body>
