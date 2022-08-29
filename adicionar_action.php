<?php
require_once 'config.php';
require_once 'dao/UsuarioDao.php';

$usuarioDao = new UsuarioDao($pdo);

$nome = $_POST['nome'];
$email = $_POST['email'];

if(!empty($nome) && !empty($email)){
    
    if($usuarioDao->encontrarEmail($email) === false){
        $usu = new Usuario();
        $usu->setNome($nome);
        $usu->setEmail($email);

        $usuarioDao->inserir($usu);

        header('Location: adicionar.php');
    }else{
        header('Location: index.php');
    }

} else{
    header('Location: adicionar.php');
}