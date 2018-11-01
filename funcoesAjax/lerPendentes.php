<?php

require_once('../includes/db.php');

$db= new Db();
foreach($db->query('select id, nome, ultimoLogin from usuario where entregue=0 and isProfessor=1 order by 2') as $result[]);

echo json_encode($result);

//print_r($result);

?>