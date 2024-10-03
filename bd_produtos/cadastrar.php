<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário</title>
    <link rel="stylesheet" href="css/form.css">
</head>
<body>
<a href="menu.html" class="alink"><img src="img/voltar.png" alt="Voltar" link="menu.html"></a>


    <form  name="clientes" action="" method="post">
<div id="a" >
    <img src="img/caixa.png" alt="Produto">
    <legend><b>Dados do Produto </b></legend>
    <p>Nome: <input name="nome" type="text" size="40" placeholder="Produto" ></p>
    <p>Estoque: <input name="estoque" type="text" size="10" placeholder="0"></p>

    <br>
        <div class="btn">
                <input name="btnenviar" type="submit" value="Cadastrar"> <input name="limpar" type="reset" value="Limpar">
        </form>
        <?php 
        // Extrai variáveis de $_POST 
        extract($_POST, EXTR_OVERWRITE);
        // O formulário foi enviado? verificação
        if(isset($_POST['btnenviar']))
        {
            // Inclui o arquivo 'produto.php'
            include_once 'produto.php';

            // Instânciação da classe 'produtos'
            $pro=new produtos();

        // Define o nome do produto com o valor extraído de $_POST['nome']
            $pro->setNome($_POST['nome']);
            $pro->setEstoque($_POST['estoque']);

            echo "<h3><br><br>" . $pro->salvar() . "</h3>";// Exibe o resultado do método salvar
        }
        ?>
</div>

</body>
</html>
