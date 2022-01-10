<?php 

require_once('config.php');
require_once('helper.php');

$data = [
    'id' => $_POST['id'],
    'nome' => $_POST['name'],
    'login' => $_POST['login'],
    'senha' => md5($_POST['password']),
    'tipo' => $_POST['type'],
];

editaUsuario($data['id'], $data);

header('Location: /index.php');