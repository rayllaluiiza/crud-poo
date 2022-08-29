<?php 
require_once 'header.php';
require_once 'config.php';
require_once 'dao/UsuarioDao.php';

$usuario = new UsuarioDao($pdo);
$lista = $usuario->listarTodos();
?>

<div class="col-lg-12 button p-20" style="text-align: right;">
    <a href="adicionar.php"><button type="button" class="btn btn-success btn-sm">Novo Usuário</button></a>
</div>
<div class="conteudo">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">E-mail</th>
                <th scope="col">Ações</th>
            </tr>
        </thead>
        <tbody class="table-group-divider">
            <?php 
                $cont = 1;
                foreach($lista as $usuario){
            ?>
            <tr>
                <th scope="row"><?= $cont ?></th>
                <td><?= $usuario->getNome(); ?></td>
                <td><?= $usuario->getEmail(); ?></td>
                <td>
                    <a href="editar.php?id=<?= $usuario->getId() ?>"><button type="button" class="btn btn-primary btn-sm">Editar</button></a>
                    <a href="excluir.php?id=<?= $usuario->getId() ?>"><button type="button" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja excluir?');">Excluir</button></a>
                </td>
            </tr>
            <?php 
                $cont++;
               }
            ?>
        </tbody>
    </table>
</div>

<?php 
require_once 'footer.php';
?>
