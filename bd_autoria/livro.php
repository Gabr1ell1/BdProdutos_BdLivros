<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Livro</title>
</head>
<body>

<?php
include_once 'conectar.php';

//parte 1. atributos
class livro
{
    private $cod_livro;
    private $titulo;
    private $Categoria;
    private $ISBN;
    private $Idioma;
    private $QtdePag;
    private $conn;

//parte 2. getters settes

// Métodos getters e setters para 
public function getcod_livro(){
    return $this ->cod_livro;
}
public function setcod_livro($ccod_livro){
    $this->cod_livro = $ccod_livro;
}

// Métodos getters e setters para
public function getTitulo(){
    return $this ->titulo;
}
public function settitulo($titulo){
    $this->titulo = $titulo;
}

// Métodos getters e setters para $estoque
public function getCategoria(){
    return $this ->Categoria;
}
public function setCategoria($categoria){
    $this->Categoria = $categoria;
}

// Métodos getters e setters para $estoque
public function getISBN(){
    return $this ->ISBN;
}
public function setISBN($isbn){
    $this->ISBN = $isbn;
}

// Métodos getters e setters para $estoque
public function getIdioma(){
    return $this ->Idioma;
}
public function setIdioma($idioma){
    $this->Idioma = $idioma;
}

// Métodos getters e setters para $estoque
public function getQtdePag(){
    return $this ->QtdePag;
}
public function setQtdePag($qtdePag){
    $this->QtdePag = $qtdePag;
}



//parte 3. métodos

function salvar()
{
    try
    {
        // Conecta ao banco de dados usando a classe Conectar
        $this-> conn = new Conectar();

        // Prepara a instrução SQL para inserir um novo registro na tabela 'produto'
        $sql = $this->conn->prepare("INSERT into livro values (null,?,?,?,?,?)");

        // Substitui os placeholders na consulta preparada pelos valores correspondentes
        /* Vincula o valor retornado por $this->getNome() ao primeiro parâmetro da consulta SQL
        @$sql->bindParam(1, $this->getCod_livro(), PDO::PARAM_STR);
        */

         // Vincula o valor retornado por $this->getEstoque() ao segundo parâmetro da consulta SQL
        @$sql-> bindParam(1, $this->gettitulo(), PDO::PARAM_STR);

        // Vincula o valor retornado por $this->getEstoque() ao segundo parâmetro da consulta SQL
        @$sql-> bindParam(2, $this->getCategoria(), PDO::PARAM_STR);

         // Vincula o valor retornado por $this->getEstoque() ao segundo parâmetro da consulta SQL
        @$sql-> bindParam(3, $this->getISBN(), PDO::PARAM_STR);

          // Vincula o valor retornado por $this->getEstoque() ao segundo parâmetro da consulta SQL
        @$sql-> bindParam(4, $this->getIdioma(), PDO::PARAM_STR);

           // Vincula o valor retornado por $this->getEstoque() ao segundo parâmetro da consulta SQL
        @$sql-> bindParam(5, $this->getQtdePag(), PDO::PARAM_STR);

         // Executa a consulta SQL
        if($sql->execute()==1)
        {
             // Se a consulta for bem-sucedida (um registro afetado), retorna uma mensagem de sucesso
            return "Registro salvo com sucesso";
        }
         // Fecha a conexão com o banco de dados
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
        $sql = $this->conn->prepare("SELECT * from livro where cod_livro = ?");

         // Liga o valor do parâmetro id, obtido pelo método getId() da classe, à declaração SQL
        @$sql->bindParam(1, $this->getCod_livro(), PDO::PARAM_STR);

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

function alterar2()
{
    try{
        // Conecta ao banco de dados usando a classe Conectar
        $this-> conn = new Conectar();

        // Prepara uma declaração SQL para atualizar os campos 'nome' e 'estoque' na tabela 'produto' onde o 'id' corresponde a um valor específico
        $sql = $this->conn->prepare("UPDATE livro set Titulo = ?, Categoria = ?, ISBN = ?, Idioma = ?, QtdePag = ? where cod_livro = ?");

        // Liga o valor do parâmetro 'estoque', obtido pelo método getEstoque() da classe, à declaração SQL
        @$sql->bindParam(1, $this->getTitulo(), PDO::PARAM_STR);

         // Liga o valor do parâmetro 'id', obtido pelo método getId() da classe, à declaração SQL
        @$sql->bindParam(2, $this->getCategoria(), PDO::PARAM_STR);

         // Liga o valor do parâmetro 'id', obtido pelo método getId() da classe, à declaração SQL
        @$sql->bindParam(3, $this->getISBN(), PDO::PARAM_STR);

         // Liga o valor do parâmetro 'id', obtido pelo método getId() da classe, à declaração SQL
        @$sql->bindParam(4, $this->getIdioma(), PDO::PARAM_STR);

         // Liga o valor do parâmetro 'id', obtido pelo método getId() da classe, à declaração SQL
        @$sql->bindParam(5, $this->getQtdePag(), PDO::PARAM_STR);

        // Liga o valor do parâmetro 'nome', obtido pelo método getNome() da classe, à declaração SQL
        @$sql->bindParam(6, $this->getCod_livro(), PDO::PARAM_STR);
        // Executa a declaração SQL. Se a execução for bem-sucedida e retornar 1, significa que o registro foi atualizado com sucesso
        if ($sql->execute()==1) {
            return "Registro alterado com sucesso!";
        }
        $this->conn = null;
    }
    catch(PDOException $exc)
    {
        echo "Erro ao salvar o registro " .$exc->getMessage();
    }
}

function consultar()
{
    try{
        // Conecta ao banco de dados usando a classe Conectar
        $this-> conn = new Conectar();

        // Prepara uma declaração SQL para selecionar todos os campos da tabela 'livro' onde o 'titulo' corresponde a um valor específico usando LIKE
        $sql = $this->conn->prepare("SELECT * from livro where titulo LIKE ?");


        @$sql->bindParam(1, $this->getTitulo(), PDO::PARAM_STR);

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

//CONSULTA REGISTROS COM O COD_LIVRO INFORMADO
function consultar1()
{
    try{
        // Conecta ao banco de dados usando a classe Conectar
        $this-> conn = new Conectar();

        
        $sql = $this->conn->prepare("SELECT * from livro where Cod_livro LIKE ?");


        @$sql->bindParam(1, $this->getCod_livro(), PDO::PARAM_STR);

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

        // Prepara uma declaração SQL para excluir um livro onde o 'Cod_livro' corresponde ao que fornecido
        $sql = $this->conn->prepare("DELETE from livro where Cod_livro = ?");

        // Liga o valor do parâmetro 'id' à declaração SQL
        @$sql->bindParam(1, $this->getCod_livro(), PDO::PARAM_STR);

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
        $sql = $this->conn->query("SELECT * from livro order by QtdePag");

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