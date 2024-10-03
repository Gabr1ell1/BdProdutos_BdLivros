<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Excluir</title>
    <link rel="stylesheet" href="CSS/form.css">
</head>
<body>
<a href="menu.html" class="alink"><img src="img/voltar.png" alt="Voltar" link="menu.html"></a>

<br><br><br>

<form action="" method="post">
    <div id="a">
        <h3>Exclusão de Produtos Cadastrados</h3>
        <p>Clique no ícone de lista ao lado do ID para ir para a listagem</p>

        <p>Informe o ID do produto:</p>
        <input type="text" name="txtid">
    
        <br><br>
    <div>
    <input type="submit" name="btnenviar" value="Excluir">
    <input type="reset" name="btnlimpar" value="Limpar">
    </div>
    </form>

        <div>
        <?php
        extract ($_POST, EXTR_OVERWRITE);
        if(isset($_POST['btnenviar']))
        {
            include_once 'produto.php';
            $p = new produtos();

            //EXCLUINDO UM REGISTRO POR MEIO DO ID
            $p->setId($txtid);
            echo "<h3>" . $p->exclusao() . "</h3>";


        }
        ?>
</div>
    
    
</body>
</html>