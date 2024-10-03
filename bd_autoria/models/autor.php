<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Autor</title>
</head>
<body>

<?php
include_once 'conectar.php';

//parte 1. atributos
class autor
{
    private $cod_autor;
    private $NomeAutor;
    private $Sobrenome;
    private $Email;
    private $Nasc;
    private $conn;

//parte 2. getters settes

// Métodos getters e setters para $id
public function getCod_autor(){
    return $this ->cod_autor;
}
public function setCod_autor($ccod_autor){
    $this->cod_autor = $ccod_autor;
}

// Métodos getters e setters para $nome
public function getnomeAutor(){
    return $this ->NomeAutor;
}
public function setnomeAutor($NomeAutor){
    $this->NomeAutor = $NomeAutor;
}

// Métodos getters e setters para $estoque
public function getSobrenome(){
    return $this ->Sobrenome;
}
public function setSobrenome($sobrenome){
    $this->Sobrenome = $sobrenome;
}

// Métodos getters e setters para $estoque
public function getEmail(){
    return $this ->Email;
}
public function setEmail($email){
    $this->Email = $email;
}
// Métodos getters e setters para $estoque
public function getNasc(){
    return $this ->Nasc;
}
public function setNasc($nasc){
    $this->Nasc = $nasc;
}


//parte 3. métodos

function salvar()
{
    try
    {
        // Conecta ao banco de dados usando a classe Conectar
        $this-> conn = new Conectar();

        // Prepara a instrução SQL para inserir um novo registro na tabela 'produto'
        $sql = $this->conn->prepare("INSERT into autor values (null,?,?,?,?)");

        // Substitui os placeholders na consulta preparada pelos valores correspondentes
        /* Vincula o valor retornado por $this->getNome() ao primeiro parâmetro da consulta SQL
        @$sql->bindParam(1, $this->getCod_autor(), PDO::PARAM_STR);
*/

       
        @$sql-> bindParam(1, $this->getNomeAutor(), PDO::PARAM_STR);
        @$sql-> bindParam(2, $this->getSobrenome(), PDO::PARAM_STR);
        @$sql-> bindParam(3, $this->getEmail(), PDO::PARAM_STR);
        @$sql-> bindParam(4, $this->getNasc(), PDO::PARAM_STR);

         // Executa a consulta SQL
        if($sql->execute()==1)
        {
            return "Registro salvo com sucesso";
        }
        $this->conn = null;
    }
    catch(PDOException $exc)
    {
        echo "Erro ao salvar o registro. ".$exc->getMessage();
    }

}
function alterar()
{
    try{
        // Conecta ao banco de dados usando a classe Conectar
        $this-> conn = new Conectar();

         // Prepara uma declaração SQL para selecionar todos os campos da tabela produto onde o id é igual a um valor específico
        $sql = $this->conn->prepare("SELECT * from autor WHERE cod_autor = ?");

         // Liga o valor do parâmetro id, obtido pelo método getId() da classe, à declaração SQL
        @$sql->bindParam(1, $this->getCod_autor(), PDO::PARAM_STR);

        // Executa a declaração SQL
        $sql->execute();

         // Retorna o array de resultados da consulta
        return $sql->fetchAll();
        $this->conn = null;
    }
    catch(PDOException $exc)
    {
        echo "Erro ao alterar " .$exc->getMessage();
    }
}

function alterar2(){
    try{
        $this-> conn = new Conectar();
        $sql = $this->conn->prepare("update autor set NomeAutor = ?, Sobrenome = ?, Email = ?, Nasc = ? where cod_autor = ?"); 
        @$sql-> bindParam(1, $this->getNomeAutor(), PDO::PARAM_STR);
        @$sql-> bindParam(2, $this->getSobrenome(), PDO::PARAM_STR);
        @$sql-> bindParam(3, $this->getEmail(), PDO::PARAM_STR);
        @$sql-> bindParam(4, $this->getNasc(), PDO::PARAM_STR);
        @$sql-> bindParam(5, $this->getCod_autor(), PDO::PARAM_STR);
        if($sql->execute() == 1){
            return "Registro alterado com sucesso!";
        }
        $this->conn = null;
    }catch(PDOException $exc){
        echo "Erro ao salvar registro. " . $exc->getMessage();
    }
}

function consultar()
{
    try{
        // Conecta ao banco de dados usando a classe Conectar
        $this-> conn = new Conectar();

        // Prepara uma declaração SQL para selecionar todos os campos da tabela 'autor' onde o 'nomeAutor' corresponde a um valor específico usando LIKE
        $sql = $this->conn->prepare("SELECT * from autor WHERE NomeAutor LIKE ?");


        @$sql->bindParam(1, $this->getnomeAutor(), PDO::PARAM_STR);

        // Executa a consulta
        $sql->execute();

        // Obtém e retorna todos os resultados
        return $sql -> fetchAll();
        $this->conn = null;
    }
    catch(PDOException $exc)
    {
        echo "Erro ao executar a consulta " .$exc->getMessage();
    }
}


function consultar1()
{
    try{
        // Conecta ao banco de dados usando a classe Conectar
        $this-> conn = new Conectar();

        // Prepara uma declaração SQL para selecionar todos os campos da tabela 'autor' onde o 'nomeAutor' corresponde a um valor específico usando LIKE
        $sql = $this->conn->prepare("SELECT * from autor WHERE Cod_autor LIKE ?");


        @$sql->bindParam(1, $this->getCod_autor(), PDO::PARAM_STR);

        // Executa a consulta
        $sql->execute();

        // Obtém e retorna todos os resultados
        return $sql -> fetchAll();
        $this->conn = null;
    }
    catch(PDOException $exc)
    {
        echo "Erro ao executar a consulta " .$exc->getMessage();
    }
}



function exclusao()
{
    try{
        // Conecta ao banco de dados usando a classe Conectar
        $this-> conn = new Conectar();

        // Prepara uma declaração SQL para excluir um produto onde o 'Cod_autor' corresponde ao nome fornecido
        $sql = $this->conn->prepare("DELETE from autor WHERE Cod_autor = ?");

        // Liga o valor do parâmetro 'id' à declaração SQL
        @$sql->bindParam(1, $this->getCod_autor(), PDO::PARAM_STR);

        if($sql->execute()==1){
            return "Excluido com sucesso!";
        }
        else{
            return "Erro na exclusão";
        }  
        $this->conn = null;
    }
    catch(PDOException $exc)
    {
        echo "Erro ao excluir " .$exc->getMessage();
    }
}
function listar()
{
    try{
        // Conecta ao banco de dados usando a classe Conectar
        $this-> conn = new Conectar();

        // Executa uma consulta SQL para selecionar todos os produtos ordenados por nome
        $sql = $this->conn->query("SELECT * from autor order by Nasc");

        // Executa a consulta SQL e retorna todos os resultados
        $sql-> execute();
        return $sql->fetchAll();
        
        $this->conn= null;
    
    }
catch(PDOException $exc)
    {
    echo "Erro ao executar consulta . " . $exc->getMessage();
    }
}
}
?>
    
   





</body>
</html>