<?php 

require_once('./config.php');
require_once('./helper.php');

$data = [
    'nome' => $_POST['name'],
    'login' => $_POST['login'],
    'senha' => $_POST['password'],
    'tipo' => $_POST['type'],
];

criaUsuario($data);

header('Location: /index.php');