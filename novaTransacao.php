<?php 

require_once('./config.php');
require_once('./helper.php');

$data = [
    'userid' => $_POST['userid'],
    'titulo' => $_POST['title'],
    'tipo' => $_POST['type'],
    'descricao' => $_POST['description'],
    'valor' => $_POST['value'],
];

criaTransacao($data);

header('Location: /index.php');