<?php
require_once './models/Usuario.php';

class UsuarioDao{
    private $pdo;

    public function __construct($conexao){
        $this->pdo = $conexao;
    }

    public function listarTodos(){
        $array = [];
        $sql = $this->pdo->query('select * from usuarios');
        
        if($sql->rowCount() > 0){
            $data = $sql->fetchAll();
            foreach($data as $item){
                $u = new Usuario();
                $u->setId($item['id']);
                $u->setNome($item['nome']);
                $u->setEmail($item['email']);

                $array[] = $u;
            }
        }

        return $array;
    }

    public function inserir(Usuario $usu){
        $sql = $this->pdo->prepare('insert into usuarios (nome, email) values (:nome, :email)');
        $sql->bindValue(':nome', $usu->getNome());
        $sql->bindValue(':email', $usu->getEmail());
        $sql->execute();
    }

    public function atualizar(Usuario $usu){
        $sql = $this->pdo->prepare('update usuarios set nome = :nome, email = :email where id = :id');
        $sql->bindValue(':nome', $usu->getNome());
        $sql->bindValue(':email', $usu->getEmail());
        $sql->bindValue(':id', $usu->getId());
        $sql->execute();

        return true;
    }

    public function deletar($id){
        $sql = $this->pdo->prepare('delete from usuarios where id = :id');
        $sql->bindValue(':id', $id);
        $sql->execute();

        return true;
    }

    public function encontrarEmail($email){
        $sql = $this->pdo->prepare('select * from usuarios where email = :email');
        $sql->bindValue(':email', $email);
        $sql->execute();

        if($sql->rowCount() > 0){
            $data = $sql->fetch();
            
            $u = new Usuario();
            $u->setId($data['id']);
            $u->setNome($data['nome']);
            $u->setEmail($data['email']);

            return $u;
        }

        return false;
    }

    public function encontrarId($id){
        $sql = $this->pdo->prepare('select * from usuarios where id = :id');
        $sql->bindValue(':id', $id);
        $sql->execute();

        if($sql->rowCount() > 0){
            $data = $sql->fetch();

            $u = new Usuario();
            $u->setId($data['id']);
            $u->setNome($data['nome']);
            $u->setEmail($data['email']);
            
            return $u;
        }

        return false;
    }
    
}