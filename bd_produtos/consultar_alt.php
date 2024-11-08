<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterar</title>
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

<form  name="clientes" action="consultar_alt2.php" method="post">
<div id="a" >
    <h3>Alteração de Produtos Cadastrados</h3>

        <p>Informe o ID do produto desejado:</p> 
        <input type="text" name="txtid" required onkeypress="return blockletras(event)">

        <br><br>
    <div>
    <input type="submit" name="btnenviar" value="Consultar">
    <input type="reset" name="btnlimpar" value="Limpar">
    </div>
    </form>
</div>



</body>
</html>