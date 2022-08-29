<?php 
require_once 'header.php';
require_once 'config.php';
require_once 'dao/UsuarioDao.php';

$UsuarioDao = new UsuarioDao($pdo);

$id = $_GET['id'];
if(!empty($id)){
    $usuario = $UsuarioDao->encontrarId($id);
}

if($usuario === false){
    header('Location: index.php');
    exit;
}
?>

<form method="post" action="editar_action.php">
    <input type="hidden" name="id" value="<?= $usuario->getId(); ?>">
    <div class="mb-3">
        <label for="nome" class="form-label">Nome</label>
        <input type="text" class="form-control" name="nome" value="<?= $usuario->getNome(); ?>">
    </div>

    <div class="mb-3">
        <label for="email" class="form-label">E-mail</label>
        <input type="email" class="form-control" name="email" value="<?= $usuario->getEmail(); ?>">
    </div>

    <div class="col-lg-12 button" style="text-align: center;">
        <a href="adicionar.php"><button type="submit" class="btn btn-primary">Salvar</button></a>
    </div>
</form>

<?php 
require_once 'footer.php';
?>