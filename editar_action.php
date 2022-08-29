<?php
require_once 'config.php';
require_once 'dao/UsuarioDao.php';
require_once './models/Usuario.php';

$usuarioDao = new UsuarioDao($pdo);

$id = $_POST['id'];
$nome = $_POST['nome'];
$email = $_POST['email'];

if(!empty($id) && !empty($nome) && !empty($email)){
    $usuario = new Usuario();
    $usuario->setId($id);
    $usuario->setNome($nome);
    $usuario->setEmail($email);

    $usuarioDao->atualizar($usuario);

    header('Location: index.php');
    exit;
} else {
    header("Location: editar.php?id=$id");
    exit;
}