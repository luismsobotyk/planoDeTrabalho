<!--div class="row">
      <div class="row">
        <div class="input-field col s12">
          <textarea id="ativExtensao" class="materialize-textarea" name="ativExtensao"></textarea>
          <label for="ativExtensao">Atividades de Extensão</label>
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
	<tbody id="listaExtensao">

	</tbody>

	<tbody>
		<tr>
			<td></td>
			<td><input id="ativExtensao" type="text" name="ativExtensao" class="validate" placeholder="Nome do Projeto"></td>
			<td><input id="chExtensao" type="number" class="validate" name="chExtensao" placeholder="Carga Horária"></td>
			<td><a href="#!" onclick="inserirLinhaExtensao()" class="green-link"><i class="material-icons">add_circle_outline</i></a></td>
		</tr>
	</tbody>
</table>

<script language="javascript">
	function inserirLinhaExtensao(){
    if(document.getElementById('ativExtensao').value=="" || document.getElementById('chExtensao').value==""){
      alert('Você está inserindo registros vazios, revise novamente.');
    }else{
		var table = document.getElementById("listaExtensao");
		var numOfRows = table.rows.length; // pega numero de linhas da tabela
      	var numOfCols = 4; // numero de colunas
      	var newRow = table.insertRow(numOfRows); // insere uma nova linha
      	newRow.id="listaExtensao"+countExtensao;

      	var modeloExtensao= {
      		atividade:'',
      		chExtensao:''
      	};

      	for (var j = 0; j < numOfCols; j++) {
        newCell = newRow.insertCell(j);// insere uma coluna na linha nova
        if(j==0){
          newCell.innerHTML = "";
        }else if(j==1){
          newCell.innerHTML = document.getElementById('ativExtensao').value;
          modeloExtensao.atividade= document.getElementById('ativExtensao').value;
          document.getElementById('ativExtensao').value="";
        }else if(j==2){
          newCell.innerHTML = document.getElementById('chExtensao').value;
          modeloExtensao.chExtensao= document.getElementById('chExtensao').value;
          document.getElementById('chExtensao').value="";
        }else if(j==3){
          newCell.innerHTML = "<a href='#!' class='red-link deleteRow' id='"+countExtensao+"' onclick='removeLinhaTabelaExtensao("+countExtensao+")'><i class='material-icons'>remove_circle_outline</i></a><a href='#' class='green-link'></a>";
        }else{
          newCell.innerHTML = "ERRO";
        }
      }


      	ativExtensao.push(modeloExtensao);
      	countExtensao= countExtensao+1;

      	//alert(ativEnsino[numOfRows].atividade);
      }
	}
function removeLinhaTabelaExtensao(id){
     var row = document.getElementById("listaExtensao"+id);
     row.parentNode.removeChild(row);
     delete ativExtensao[id]; // transforma o elemento em undefined
     
     /*if(aulas[id]==undefined){
      alert("teste");
    }*/
  }

</script>