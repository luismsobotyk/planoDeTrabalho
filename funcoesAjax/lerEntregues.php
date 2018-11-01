<?php

require_once('../includes/db.php');

$db= new Db();
foreach($db->query('select id, nome, dataEntrega from usuario where entregue=1 and isProfessor=1 order by 2') as $result[]);

echo json_encode($result);

?>