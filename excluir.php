<?php 
require_once 'config.php';
require_once 'dao/UsuarioDao.php';

$usuarioDao = new UsuarioDao($pdo);

$id = $_GET['id'];

if($usuarioDao->encontrarId($id) !== false){
    $usuarioDao->deletar($id);
}

header('Location: index.php');
exit;