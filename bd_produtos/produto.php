<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php
include_once 'conectar.php';
//parte 1. atributos
class produtos
{
    private $id;
    private $nome;
    private $estoque;
    private $conn;

//parte 2. getters settes

// Métodos getters e setters para $id
public function getId(){
    return $this ->id;
}
public function setId($iid){
    $this->id = $iid;
}

// Métodos getters e setters para $nome
public function getNome(){
    return $this ->nome;
}
public function setNome($name){
    $this->nome = $name;
}

// Métodos getters e setters para $estoque
public function getEstoque(){
    return $this ->estoque;
}
public function setEstoque($estoqui){
    $this->estoque = $estoqui;
}


//parte 3. métodos

function salvar()
{
    try
    {
        // Conecta ao banco de dados usando a classe Conectar
        $this-> conn = new Conectar();

        // Prepara a instrução SQL para inserir um novo registro na tabela 'produto'
        $sql = $this->conn->prepare("Insert into produtos values (null,?,?)");



        // Substitui os placeholders na consulta preparada pelos valores correspondentes
        // Vincula o valor retornado por $this->getNome() ao primeiro parâmetro da consulta SQL
        @$sql->bindParam(1, $this->getNome(), PDO::PARAM_STR);

         // Vincula o valor retornado por $this->getEstoque() ao segundo parâmetro da consulta SQL
        @$sql-> bindParam(2, $this->getEstoque(), PDO::PARAM_STR);


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
        $sql = $this->conn->prepare("SELECT * from produtos where id = ?");

         // Liga o valor do parâmetro id, obtido pelo método getId() da classe, à declaração SQL
        @$sql->bindParam(1, $this->getId(), PDO::PARAM_STR);

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
        $sql = $this->conn->prepare("UPDATE produtos set nome = ?, estoque = ? where id = ?");
        
        // Liga o valor do parâmetro 'nome', obtido pelo método getNome() da classe, à declaração SQL
        $sql->bindParam(1, $this->getNome(), PDO::PARAM_STR);

        // Liga o valor do parâmetro 'estoque', obtido pelo método getEstoque() da classe, à declaração SQL
        $sql->bindParam(2, $this->getEstoque(), PDO::PARAM_STR);

         // Liga o valor do parâmetro 'id', obtido pelo método getId() da classe, à declaração SQL
        $sql->bindParam(3, $this->getId(), PDO::PARAM_STR);

        $this->conn = null;
        // Executa a declaração SQL. Se a execução for bem-sucedida e retornar 1, significa que o registro foi atualizado com sucesso
        if ($sql->execute()==1) {
            return "Registro alterado com sucesso!";
        }
    }
    catch(PDOException $exc)
    {
        echo "Erro ao salvar o registro " .$exc->getMessage();
    }
}

/*O método consultar irá buscar na tabela os dados referente ao parâmetro pesquisado, neste
caso o campo nome*/
function consultar()
{
    try{
        // Conecta ao banco de dados usando a classe Conectar
        $this-> conn = new Conectar();

        // Prepara uma declaração SQL para selecionar todos os campos da tabela 'produtos'
        // onde o 'nome' corresponde a um valor específico usando LIKE
        $sql = $this->conn->prepare("SELECT * from produtos where nome LIKE ?");

        @$sql->bindParam(1, $this->getNome(), PDO::PARAM_STR);//inclui esta linha para definir o parametro
        //@$sql-> bindParam(1, $this->getNome(). "%", PDO::PARAM_STR);
        
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

/*Parecido com o anterior, o método exclusão irá excluir (deletar) da tabela o registro referente
ao parâmetro pesquisado, neste caso o campo id*/
function exclusao()
{
    try{
        // Conecta ao banco de dados usando a classe Conectar
        $this-> conn = new Conectar();

        // Prepara uma declaração SQL para excluir um produto onde o 'id' corresponde ao nome fornecido
        $sql = $this->conn->prepare("delete from produtos where id = ?");
        // Liga o valor do parâmetro 'id' à declaração SQL
        @$sql->bindParam(1, $this->getId(), PDO::PARAM_STR);

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
        $sql = $this->conn->query("SELECT * from produtos order by nome");

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