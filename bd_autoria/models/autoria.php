<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Autoria</title>
</head>
<body>

<?php
include_once 'conectar.php';

//parte 1. atributos
class autoria
{
    private $cod_autor;
    private $cod_livro;
    private $dataLancamento;
    private $Editora;
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
public function getCod_livro(){
    return $this ->cod_livro;
}
public function setCod_livro($ccod_livro){
    $this->cod_livro = $ccod_livro;
}

// Métodos getters e setters para $estoque
public function getdataLancamento(){
    return $this ->dataLancamento;
}
public function setdataLancamento($ddataLancamento){
    $this->dataLancamento = $ddataLancamento;
}

// Métodos getters e setters para $estoque
public function getEditora(){
    return $this ->Editora;
}
public function setEditora($eeditora){
    $this->Editora = $eeditora;
}


//parte 3. métodos

function salvar()
{
    try
    {
        // Conecta ao banco de dados usando a classe Conectar
        $this-> conn = new Conectar();

        // Prepara a instrução SQL para inserir um novo registro na tabela 'produto'
        $sql = $this->conn->prepare("INSERT into autoria values (?,?,?,?)");

        // Substitui os placeholders na consulta preparada pelos valores correspondentes
        // Vincula o valor retornado por $this->getCod_Autor() ao primeiro parâmetro da consulta SQL
        @$sql->bindParam(1, $this->getCod_autor(), PDO::PARAM_STR);

         // Vincula o valor retornado por $this->getCod_Livro() ao segundo parâmetro da consulta SQL
        @$sql-> bindParam(2, $this->getCod_livro(), PDO::PARAM_STR);

        // Vincula o valor retornado por $this->getdataLancamento() ao terceiro parâmetro da consulta SQL
        @$sql-> bindParam(3, $this->getdataLancamento(), PDO::PARAM_STR);

         // Vincula o valor retornado por $this->getEditora() ao quarto parâmetro da consulta SQL
        @$sql-> bindParam(4, $this->getEditora(), PDO::PARAM_STR);

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
        $sql = $this->conn->prepare("SELECT * from autoria where cod_autor = ? AND cod_livro = ?");
        
        @$sql->bindParam(1, $this->getCod_autor(), PDO::PARAM_STR);
        @$sql->bindParam(2, $this->getCod_livro(), PDO::PARAM_STR);
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
        $sql = $this->conn->prepare("UPDATE autoria set datalancamento = ?, Editora = ? WHERE cod_autor = ? AND cod_livro = ?");

        @$sql->bindParam(1, $this->getdataLancamento(), PDO::PARAM_STR);
        @$sql->bindParam(2, $this->getEditora(), PDO::PARAM_STR);
        @$sql->bindParam(3, $this->getCod_autor(), PDO::PARAM_STR);
        @$sql->bindParam(4, $this->getCod_livro(), PDO::PARAM_STR);
 

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

        // Prepara uma declaração SQL para selecionar todos os campos da tabela 'autoria' onde o 'nome' corresponde a um valor específico usando LIKE
        $sql = $this->conn->prepare("SELECT * from autoria where Editora like ?");


        @$sql->bindParam(1, $this->getEditora(), PDO::PARAM_STR);

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

//CONSULTA COM DOIS VALORES INFORMADOS
function consultar1()
{
    try{
        // Conecta ao banco de dados usando a classe Conectar
        $this-> conn = new Conectar();

        //PREPARA UMA DECLARAÇÃO PARA VERIFICAÇÃO DE A AUTORIA COM ESSE COD_AUTOR E COD_LIVRO EXISTEM
        //para verificar se há registros que correspondem aos parâmetros fornecidos
        $sqlVerifica = $this->conn->prepare("SELECT * from autoria where cod_autor = ? and cod_livro = ?");

        
        // Liga o valor do parâmetro 'cod' à declaração SQL
        @$sqlVerifica->bindParam(1, $this->getcod_autor(), PDO::PARAM_STR);
        @$sqlVerifica->bindParam(2, $this->getcod_livro(), PDO::PARAM_STR);
        
        //EXECUTA A CONSULTA
        $sqlVerifica->execute();

        $resultado = $sqlVerifica->fetchAll();

        return $resultado;

        $this->conn = null;
    }catch(PDOException $exc)
    {
        echo "Erro ao executar a consulta " .$exc->getMessage();
    }
}




function exclusao()
{
    try{
        // Conecta ao banco de dados usando a classe Conectar
        $this-> conn = new Conectar();

        //PREPARA UMA DECLARAÇÃO PARA VERIFICAÇÃO DE EXISTENCIA DE UMA AUTORIA COM ESSE COD_AUTOR E COD_LIVRO
        //COUNT(*) verificar se há registros que correspondem aos parâmetros fornecidos, útil para verificar a existencia desses registros, sem precisar dos dados reais 
        $sqlVerifica = $this->conn->prepare("SELECT COUNT(*) from autoria where cod_autor = ? and cod_livro = ?");

        
        // Liga o valor do parâmetro 'cod' à declaração SQL
        @$sqlVerifica->bindParam(1, $this->getcod_autor(), PDO::PARAM_STR);
        @$sqlVerifica->bindParam(2, $this->getcod_livro(), PDO::PARAM_STR);
        
        //EXECUTA A CONSULTA
        $sqlVerifica->execute();
        //é usado para obter uma única coluna de um único registro
        $resultado = $sqlVerifica->fetchColumn();

        //VERIFICA SE ESSES REGISTROS EXISTEM
        if($resultado > 0){
        // Prepara uma declaração SQL para excluir uma autoria onde o 'cod's' corresponde ao que foi fornecido
        $sql = $this->conn->prepare("DELETE from autoria where cod_autor = ? and cod_livro = ?");
          
        //Liga os parametros da exclusão
        @$sql->bindParam(1, $this->getcod_autor(), PDO::PARAM_STR);
        @$sql->bindParam(2, $this->getcod_livro(), PDO::PARAM_STR);

        if($sql->execute()==1){
            return "Excluido com sucesso!";
        } else {
            return "Erro na exclusão";
         }  
        } else {
            return "Autoria não econtrada";
        }

         //FECHA A CONEXÃO
        $this->conn = null;
    }catch(PDOException $exc){
        echo "Erro ao excluir" . $exc->getMessage();
    }

   
}


function listar()
{
    try{
        // Conecta ao banco de dados usando a classe Conectar
        $this-> conn = new Conectar();

        // Executa uma consulta SQL para selecionar todos os produtos ordenados por nome
        $sql = $this->conn->query("SELECT * from autoria order by dataLancamento");

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