<table class="bordered">
  <thead>
    <tr>
      <th></th>
      <th>Componente Curricular</th>
      <th>Curso</th>
      <th>C.H.</th>
      <th></th>
    </tr>
  </thead>

  <tbody id="listaAulas">

  </tbody>

  <!-- Tabela de inserção -->

  <tbody>
    <tr>
      <td></td>
      <td><input id="disciplina" type="text" class="validate" placeholder="Disciplina"></td>
      <td><input id="curso" type="text" class="validate" placeholder="Curso"></td>
      <td><input id="ch" type="number" class="validate" placeholder="Carga Horária"></td>
      <td><a href="#!" onclick="inserirLinhaTabela()" class="green-link"><i class="material-icons">add_circle_outline</i></a></td>
    </tr>
  </tbody>
</table>
<script language="javascript">



  function inserirLinhaTabela() {
    if(document.getElementById('disciplina').value=="" || document.getElementById('curso').value=="" || document.getElementById('ch').value==""){
      alert('Você está inserindo registros vazios, revise novamente.');
    }else{
      var table = document.getElementById("listaAulas");
      var numOfRows = table.rows.length; // pega numero de linhas da tabela
      var numOfCols = 5; // numero de colunas
      var newRow = table.insertRow(numOfRows); // insere uma nova linha
      newRow.id= "listaAulas"+countAulas;

      var modeloAula= {
        disciplina:'',
        curso:'',
        ch:''
      };
      
      for (var j = 0; j < numOfCols; j++) {
        newCell = newRow.insertCell(j);// insere uma coluna na linha nova
        if(j==0){
          newCell.innerHTML = "";
        }else if(j==1){
          newCell.innerHTML = document.getElementById('disciplina').value;
          modeloAula.disciplina= document.getElementById('disciplina').value;
          document.getElementById('disciplina').value="";
        }else if(j==2){
          newCell.innerHTML = document.getElementById('curso').value;
          modeloAula.curso= document.getElementById('curso').value;
          document.getElementById('curso').value="";
        }else if(j==3){
          newCell.innerHTML = document.getElementById('ch').value;
          modeloAula.ch= document.getElementById('ch').value;
          document.getElementById('ch').value="";
        }else if(j==4){
          newCell.innerHTML = "<a href='#!' class='red-link deleteRow' id='"+countAulas+"' onclick='removeLinhaTabela("+countAulas+")'><i class='material-icons'>remove_circle_outline</i></a><a href='#' class='green-link'></a>";
        }else{
          newCell.innerHTML = "ERRO";
        }
      }

      aulas.push(modeloAula);
      countAulas= countAulas+1;
      
      //alert(aulas[numOfRows].disciplina);
    }
  } 

  function removeLinhaTabela(id){
   var row = document.getElementById("listaAulas"+id);
   row.parentNode.removeChild(row);
     delete aulas[id]; // transforma o elemento em undefined
     
     /*if(aulas[id]==undefined){
      alert("teste");
    }*/
  }

</script>


<!-- passar array php -->