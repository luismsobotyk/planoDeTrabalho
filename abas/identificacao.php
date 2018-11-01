<div class="row">
	<!--div class="row">
		<div class="col s6 offset-s6 center-align">
			<span>Alterações:</span>
		</div>
	</div-->
	<div class="row"> 

		<div class="input-field col s6">
			<input id="areaConhecimento" type="text" class="validate" name="areaConhecimento" required>
			<label for="areaConhecimento">Área de Conhecimento</label>
		</div>

		<div class="col s6">
			<label>Categoria</label>
			<p>
				<input class="with-gap" name="categoria" type="radio" id="magistEBTT" value="EBTT" checked />
				<label for="magistEBTT">Magistério EBTT</label>

				<input class="with-gap" name="categoria" type="radio" id="magistES" value="ES" />
				<label for="magistES">Magistério ES</label>
			</p>
		</div>
		
		<!--div class="col s6">
			<!-- Reservada para Notificações --/>
			<div class="card blue-grey darken-1">
				<div class="card-content white-text">
					<p>Letícia Martins: Alterar Área de Conhecimento para teste</p>
				</div>
				<div class="card-action">
					<a href="#">Aceitar</a>
					<a href="#">Rejeitar</a>
				</div>
			</div>

		</div-->
	</div>

	<div class="row"> 

		

		<div class="col s6">
			<!-- Reservada para Notificações --> 
		</div>
	</div>

	<div class="row"> 

		<div class="input-field col s6">
			<select name="regime" required>
				<option value="" disabled selected>Regime</option>
				<option value="20">20 horas (20h)</option>
				<option value="40">40 horas (40h)</option>
				<option value="DE">Dedicação Excluiva (DE)</option>
				<option value="visitante">Visitante</option>
			</select>

		</div> 

		<!--div class="input-field col s3">
			<input id="anoPlano" type="number" class="validate" name="anoPlano" min="2018" max="2018" required>
			<label for="anoPlano">Ano Plano</label>
		</div>

		<div class="input-field col s3">
			<input id="semestrePlano" type="number" class="validate" name="semestrePlano" min="1" max="2" required>
			<label for="semestrePlano">Semestre Plano</label>
		</div-->

		<div class="col s6">
			<input id="place" type="text" class="validate" name="place" value="Você está preenchendo o Plano referente a 2018/2" readonly="true" style="margin-top: 15px; text-align:center;">
		</div>

	</div>
</div>


<div class="row">
	
</div>
