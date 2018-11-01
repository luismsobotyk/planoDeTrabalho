 <table class="bordered">
  <thead>
    <tr>
      <th></th>
      <th>Atividade</th>
      <th>Portaria</th>
      <th>CH</th>
      <th></th>
    </tr>
  </thead>

  <tbody id="listAdmin">

  </tbody>


  <tbody>
    <!--tr>
      <td>1</td>
      <td>Coordenadoria Tal e tal</td>
      <td>86/2014</td>
      <td><a href="#" class="red-link"><i class="material-icons">remove_circle_outline</i></a><a href="#" class="green-link"><i class="material-icons">edit</i></a></td>
    </tr-->
    <tr>
      <td></td>
      <td><input id="atividadeAdm" type="text" class="validate" placeholder="Atividade"></td>
      <td><input id="portaria" type="text" class="validate" placeholder="Portaria"></td>
      <td><input id="chAdmin" type="number" class="validate" placeholder="Carga Horária"></td>
      <td><a href="#!" onclick="inserirLinhaTabelaAdm()" class="green-link"><i class="material-icons">add_circle_outline</i></a></td>
    </tr>
  </tbody>
</table>

<script language="javascript">

  function inserirLinhaTabelaAdm() {
    if(document.getElementById('atividadeAdm').value=="" || document.getElementById('portaria').value==""){
      alert('Você está inserindo registros vazios, revise novamente.');
    }else{
    var table = document.getElementById("listAdmin");
      var numOfRows = table.rows.length; // pega numero de linhas da tabela
      var numOfCols = 4; // numero de colunas
      var newRow = table.insertRow(numOfRows); // insere uma nova linha
      newRow.id= "listAdmin"+countAtivAdmin;

      var modeloAtivAdmin= {
        atividade:'',
        portaria:'',
        chAdmin:''
      }; 

      //alert("teste");

      for (var j = 0; j < numOfCols; j++) {
        newCell = newRow.insertCell(j);// insere uma coluna na linha nova
        if(j==0){
          newCell.innerHTML = "";
        }else if(j==1){
          newCell.innerHTML = document.getElementById('atividadeAdm').value;
          modeloAtivAdmin.atividade= document.getElementById('atividadeAdm').value;
          document.getElementById('atividadeAdm').value="";
        }else if(j==2){
          newCell.innerHTML = document.getElementById('portaria').value;
          modeloAtivAdmin.portaria= document.getElementById('portaria').value;
          document.getElementById('portaria').value="";
        }else if(j==3){
          newCell.innerHTML = document.getElementById('chAdmin').value;
          modeloAtivAdmin.chAdmin= document.getElementById('chAdmin').value;
          document.getElementById('chAdmin').value="";
        }else if(j==4){
          newCell.innerHTML = "<a href='#!' class='red-link deleteRow' id='"+countAtivAdmin+"' onclick='removeLinhaTabelaAdm("+countAtivAdmin+")'><i class='material-icons'>remove_circle_outline</i></a><a href='#' class='green-link'></a>";
        }else{
          newCell.innerHTML = "ERRO";
        }
      }

      ativAdmin.push(modeloAtivAdmin);
      countAtivAdmin= countAtivAdmin+1;
      
      //alert(aulas[numOfRows].disciplina);
    }
    } 

    function removeLinhaTabelaAdm(id){
     var row = document.getElementById("listAdmin"+id);
     row.parentNode.removeChild(row);
     delete ativAdmin[id]; // transforma o elemento em undefined
     
     /*if(aulas[id]==undefined){
      alert("teste");
    }*/
  }

</script>


<!-- passar array php -->
