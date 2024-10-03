<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<?php 
class Conectar extends PDO
{

    private static $instancia;
    private $query;
    private $host = "127.0.0.1"; //endereço do servidor usado
    private $usuario = "root";//usuario do servidor
    private $senha = "";//senha do servidor
    private $db = "bd_autoria";//banco do mysql

//método construtos
public function __construct()
{
         // Inicializa a conexão com o banco de dados MySQL usando os parâmetros fornecidos
    parent:: __construct("mysql:host=$this->host;dbname=$this->db","$this->usuario","$this->senha");
}

 // Método Estático para obter uma instância da classe (implementa o padrão Singleton)
public static function getInstance()
{
if(!isset(self::$instancia))
    {
    try
        {
            // Cria uma nova instância da classe Conectar e exibe uma mensagem de sucesso
        self::$instancia = new Conectar;
        echo "Conectado com sucesso";
        }
    catch(Exception $e)
        {
            // Exibe uma mensagem de erro e finaliza o script em caso de exceção
        echo "Erro ao conectar";
        exit();
        }

    }
     // Retorna a instância existente ou recém-criada
return self::$instancia;
}
 // Método para executar consultas SQL
 public function slq($query)
 {
       // Obtém uma instância da classe Conectar
     $this-> getInstance();
 
      // Define a consulta SQL a ser executada
     $this->query = $query;
 
        // Prepara e executa a consulta SQL
     $stmt = $pdo->prepare($this->query);
     $stmt->execute();
 
      // Fecha a conexão com o banco de dados
     $pdo = null;
     
 }
}
?>

</body>
</html>