<?php

require_once('./config.php');

function listaUsuarios(){
    global $pdo;

    $query = $pdo->query("SELECT * FROM `usuario`");

    $result = $query->fetchAll();

    return $result;
}

function buscaUsuario($id){
    global $pdo;

    $query = $pdo->prepare("SELECT * FROM `usuario` WHERE id LIKE ?");
    $query->execute(array($id));

    $result = $query->fetch();
    return $result;
}

function editaUsuario($id, $data){
    global $pdo;

    $userid = $data['id'];
    $nome = $data['nome'];
    $login = $data['login'];
    $senha = $data['senha'];
    $tipo = $data['tipo'];

    $query = $pdo->prepare("UPDATE `usuario` SET nome = ?, login = ?, senha = ?, tipo = ? WHERE id LIKE ?");
    $query->execute(array($nome, $login, $senha, $tipo, $id));

}

function criaUsuario($data){
    global $pdo;

    $nome = $data['nome'];
    $login = $data['login'];
    $senha = $data['senha'];
    $tipo = $data['tipo'];

    $query = $pdo->prepare("INSERT INTO `usuario`(nome, login, senha, tipo) VALUES (? ,? ,? ,?)");
    $query->execute(array($nome, $login, md5($senha), $tipo));

}

function listaTransacao($userid){
    global $pdo;

    $query = $pdo->prepare("SELECT * FROM `transacoes` WHERE userid LIKE ?");
    $query->execute(array($userid));

    $result = $query->fetchAll();
    return $result;
}

function criaTransacao($data){
    global $pdo;
    
    $userid = $data['userid'];
    $titulo = $data['titulo'];
    $tipo = $data['tipo'];
    $descricao = $data['descricao'];
    $valor = $data['valor'];

    $query = $pdo->prepare("INSERT INTO `transacoes` (userid, titulo, tipo, descricao, valor) VALUES (? ,? ,? ,?, ?)");
    $query->execute(array($userid, $titulo, $tipo, $descricao, $valor));

}