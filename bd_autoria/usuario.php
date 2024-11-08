<?php
include_once 'conectar.php';

class Usuario{
    private $usu;
    private $senha;
    private $conn;

    public function getUsu()
    {
        return $this->usu;
    }

    public function setUsu($usuario)
    {
        $this->usu = $usuario;
    }


    public function getSenha()
    {
        return $this->senha;
    }

    public function setSenha($senha)
    {
        $this->senha = $senha;
    }


//MÉTODO DE LOGAR

function Logar()
{
    try
    {
        $this->conn= new Conectar();
        $sql = $this->conn->prepare("SELECT * FROM usuario Where login LIKE ? and senha = ?");
        @$sql->bindParam(1, $this->getUsu(), PDO :: PARAM_STR);
        @$sql->bindParam(2, $this->getSenha(), PDO :: PARAM_STR);

        $sql->execute();

        return $sql->fetchAll();
        $this->conn = null;
    }
    catch(PDOException $exc)
    {
        echo "ERRO AO CONSULTAR" .$exc->getMessage();
    }
}
}//CLASSE USUÁRIO


?>