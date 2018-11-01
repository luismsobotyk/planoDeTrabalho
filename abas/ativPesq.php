<!--div class="row">
      <div class="row">
        <div class="input-field col s12">
          <textarea id="ativPesquisa" class="materialize-textarea" name="ativPesquisa"></textarea>
          <label for="ativPesquisa">Atividades de Pesquisa</label>
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
   <tbody id="listaPesquisa">

   </tbody>

   <tbody>
    <tr>
     <td></td>
     <td><input id="ativPesquisa" type="text" name="ativPesquisa" class="validate" placeholder="Nome do Projeto"></td>
     <td><input id="chPesquisa" type="number" class="validate" name="chPesquisa" placeholder="Carga Horária"></td>
     <td><a href="#!" onclick="inserirLinhaPesquisa()" class="green-link"><i class="material-icons">add_circle_outline</i></a></td>
   </tr>
 </tbody>
</table>

<script language="javascript">
	function inserirLinhaPesquisa(){
   if(document.getElementById('ativPesquisa').value=="" || document.getElementById('chPesquisa').value==""){
    alert('Você está inserindo registros vazios, revise novamente.');
  }else{
    var table = document.getElementById("listaPesquisa");
		var numOfRows = table.rows.length; // pega numero de linhas da tabela
      	var numOfCols = 4; // numero de colunas
      	var newRow = table.insertRow(numOfRows); // insere uma nova linha
      	newRow.id="listaPesquisa"+countPesquisa;

      	var modeloPesquisa= {
      		atividade:'',
      		chPesquisa:''
      	};

      	for (var j = 0; j < numOfCols; j++) {
        newCell = newRow.insertCell(j);// insere uma coluna na linha nova
        if(j==0){
          newCell.innerHTML = "";
        }else if(j==1){
          newCell.innerHTML = document.getElementById('ativPesquisa').value;
          modeloPesquisa.atividade= document.getElementById('ativPesquisa').value;
          document.getElementById('ativPesquisa').value="";
        }else if(j==2){
          newCell.innerHTML = document.getElementById('chPesquisa').value;
          modeloPesquisa.chPesquisa= document.getElementById('chPesquisa').value;
          document.getElementById('chPesquisa').value="";
        }else if(j==3){
          newCell.innerHTML = "<a href='#!' class='red-link deleteRow' id='"+countPesquisa+"' onclick='removeLinhaTabelaPesquisa("+countPesquisa+")'><i class='material-icons'>remove_circle_outline</i></a><a href='#' class='green-link'></a>";
        }else{
          newCell.innerHTML = "ERRO";
        }
      }


      ativPesquisa.push(modeloPesquisa);
      countPesquisa= countPesquisa+1;

      	//alert(ativEnsino[numOfRows].atividade);
      }
    }
    function removeLinhaTabelaPesquisa(id){
     var row = document.getElementById("listaPesquisa"+id);
     row.parentNode.removeChild(row);
     delete ativPesquisa[id]; // transforma o elemento em undefined
     
     /*if(aulas[id]==undefined){
      alert("teste");
    }*/
  }

</script>
