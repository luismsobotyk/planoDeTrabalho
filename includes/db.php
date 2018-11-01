<?php
include_once("database.php");
class Db
{
    protected  $mysqli;
    public function __construct()
    {
        $this->open();
    }
    public function query($sql, $query_params = []){
        $stmt = $this->mysqli->prepare($sql);
        //bind all params
        if($query_params){
            $param_types = '';
            $new_params = [&$param_types];
            foreach ($query_params as $k => $query_param) {
                $param_types.=$this->mysqlType($query_param);
                array_splice($new_params, count($new_params), 0, array(&$query_params[$k]));
            }
            call_user_func_array(array($stmt, "bind_param"), $new_params);
        }
        $stmt->execute();
        $res = $stmt->get_result();
        $results = [];
        if($res){
            while($row = $res->fetch_assoc()){
                array_push($results, $row);
            }
        }
        $this->close();
        return $results;
    }
    protected function open(){
        $this->mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    }
    protected function close(){
        $this->mysqli->close();
    }
    protected function mysqlType($var){
        switch (gettype($var)){
            case "boolean":
            case "integer":
            return 'i';
            break;
            case "double":
            return 'd';
            break;
            case "string":
            return 's';
            break;
        }
    }
}

function insereUsuario($mail){
    $nome= mb_convert_case(str_replace(".", " ", substr($mail, 0, strpos($mail, "@"))), MB_CASE_TITLE, "UTF-8");
    $db = new Db();
    if(!$db->query("SELECT id from usuario where email=?", [$mail])){
        $db2 = new Db();
        $db2->query("INSERT INTO usuario (email, permissao, nome) VALUES (?, ?, ?)", [$mail, 1, $nome]);
    }
    $db= new Db();
    $db->query("update usuario set ultimoLogin=? where email=?", [date("Y-m-d"), $mail]);
    return true;
}

function getIdUser($mail){
    $db = new Db();
    $idUser= "null";
    foreach($db->query("SELECT id from usuario where email=?", [$mail]) as $result){
        $idUser= $result['id'];
    }
    return $idUser;
}

function getPermissaoUser($mail){
    $db = new Db();
    $permissao= "null";
    foreach($db->query("SELECT permissao from usuario where email=?", [$mail]) as $result){
        $permissao= $result['permissao'];
    }
    return $permissao;
}

function situacaoEntrega($mail){
    $db = new Db();
    $entrega= "null";
    foreach($db->query("SELECT entregue from usuario where email=?", [$mail]) as $result){
        $entrega= $result['entregue'];
    }
    return $entrega;
}

function getIdentificacao($idu){
    $db= new Db();
    foreach($db->query('select u.nome, i.area, i.categoria, i.regime from usuario u, identificacao i where u.id=? and u.id=i.idUser', [$idu]) as $result[]);
    return $result;
}

function getAulas($idu){
    $db= new Db();
    foreach($db->query('select disciplina, curso, CH from aulas where professorId=?;', [$idu]) as $result[]);
    return $result;
}

function getAtivEnsino($idu){
    $db= new Db();
    foreach($db->query('select atividade, CH from ativensino where professorId=?;', [$idu]) as $result[]);
    return $result;
}

function getAtivPesq($idu){
    $db= new Db();
    foreach($db->query('select atividade, CH from ativpesq where professorId=?;', [$idu]) as $result[]);
    return $result;
}

function getAtivExt($idu){
    $db= new Db();
    foreach($db->query('select atividade, CH from ativext where professorId=?;', [$idu]) as $result[]);
    return $result;
}

function getAtivAdmin($idu){
    $db= new Db();
    foreach($db->query('select atividade, portaria, CH from ativadmin where professorId=?;', [$idu]) as $result[]);
    return $result;
}

function isEntregue($mail){
    $db = new Db();
    $isEntregue= "null";
    foreach($db->query("SELECT entregue from usuario where email=?", [$mail]) as $result){
        $isEntregue= $result['entregue'];
    }
    return $isEntregue;
}

function getEmail($idu){
    $db= new Db();
    foreach($db->query('select email from usuario where id=?;', [$idu]) as $result[]);
    return $result;
}