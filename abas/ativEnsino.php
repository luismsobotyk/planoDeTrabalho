<!--div class="row">
	<div class="row">
		<div class="input-field col s12">
			<textarea id="ativEnsino" class="materialize-textarea" name="ativEnsino"></textarea>
			<label for="ativEnsino">Atividades Complementares de Ensino</label>
		</div>
	</div>
</div-->





<table class="bordered">
	<thead>
		<tr>
			<th></th>
			<th>Atividade</th>
			<th>C.H.</th>
			<th></th>
		</tr>
	</thead>
	<tbody id="listaEnsino">

	</tbody>

	<tbody>
		<tr>
			<td></td>
			<td><input id="ativEnsino" type="text" name="ativEnsino" class="validate" placeholder="Nome do Projeto"></td>
			<td><input id="chEnsino" type="number" class="validate" name="chEnsino" placeholder="Carga Horária"></td>
			<td><a href="#!" onclick="inserirLinhaEnsino()" class="green-link"><i class="material-icons">add_circle_outline</i></a></td>
		</tr>
	</tbody>
</table>

<script language="javascript">
	function inserirLinhaEnsino(){
    if(document.getElementById('ativEnsino').value=="" || document.getElementById('chEnsino').value==""){
      alert('Você está inserindo registros vazios, revise novamente.');
    }else{
		var table = document.getElementById("listaEnsino");
		var numOfRows = table.rows.length; // pega numero de linhas da tabela
      	var numOfCols = 4; // numero de colunas
      	var newRow = table.insertRow(numOfRows); // insere uma nova linha
      	newRow.id="listaEnsino"+countEnsino;

      	var modeloEnsino= {
      		atividade:'',
      		chEnsino:''
      	};

      	for (var j = 0; j < numOfCols; j++) {
        newCell = newRow.insertCell(j);// insere uma coluna na linha nova
        if(j==0){
          newCell.innerHTML = "";
        }else if(j==1){
          newCell.innerHTML = document.getElementById('ativEnsino').value;
          modeloEnsino.atividade= document.getElementById('ativEnsino').value;
          document.getElementById('ativEnsino').value="";
        }else if(j==2){
          newCell.innerHTML = document.getElementById('chEnsino').value;
          modeloEnsino.chEnsino= document.getElementById('chEnsino').value;
          document.getElementById('chEnsino').value="";
        }else if(j==3){
          newCell.innerHTML = "<a href='#!' class='red-link deleteRow' id='"+countEnsino+"' onclick='removeLinhaTabelaEnsino("+countEnsino+")'><i class='material-icons'>remove_circle_outline</i></a><a href='#' class='green-link'></a>";
        }else{
          newCell.innerHTML = "ERRO";
        }
      }


      	ativEnsino.push(modeloEnsino);
      	countEnsino= countEnsino+1;

      	//alert(ativEnsino[numOfRows].atividade);
      }
	}
function removeLinhaTabelaEnsino(id){
     var row = document.getElementById("listaEnsino"+id);
     row.parentNode.removeChild(row);
     delete ativEnsino[id]; // transforma o elemento em undefined
     
     /*if(aulas[id]==undefined){
      alert("teste");
    }*/
  }

</script>









  <!-- Tabela de inserção>

<script language="javascript">

    function removeLinhaTabela(id){
     var row = document.getElementById("listaAulas"+id);
     row.parentNode.removeChild(row);
     delete aulas[id]; // transforma o elemento em undefined
     
     /*if(aulas[id]==undefined){
      alert("teste");
     }*/
   }

 </script-->
