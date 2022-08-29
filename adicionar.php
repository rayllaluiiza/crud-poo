<?php 
require_once 'header.php';
?>

<form method="post" action="adicionar_action.php">
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Nome</label>
        <input type="text" class="form-control" name="nome" placeholder="Informe o nome do usuário">
    </div>

    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">E-mail</label>
        <input type="email" class="form-control" name="email" placeholder="Informe o e-mail do usuário">
    </div>

    <div class="col-lg-12 button p-10" style="text-align: center;">
        <a href="adicionar.php"><button type="submit" class="btn btn-primary">Cadastrar</button></a>
    </div>
</form>

<?php 
require_once 'footer.php';
?>