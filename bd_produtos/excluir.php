<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Excluir</title>
    <link rel="stylesheet" href="CSS/form.css">
    <link rel="icon" href="img/produtoIcon.jpg" type="jpg">

    <script>
    function blockletras(event) {
        //CAMPO ID - BLOQUEIA lETRAS
        let keypress = event.keyCode || event.which;
        if(keypress>=48 && keypress<=57)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
</script>
</head>
<body>
<a href="menu.html" class="alink"><img src="img/voltar.png" alt="Voltar" link="menu.html"></a>

<br><br><br>

<form action="" method="post">
    <div id="a">
        <h3>Exclusão de Produtos Cadastrados</h3>

        <p>Informe o ID do produto:</p>
        <input type="text" name="txtid" required onkeypress="return blockletras(event)">
    
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