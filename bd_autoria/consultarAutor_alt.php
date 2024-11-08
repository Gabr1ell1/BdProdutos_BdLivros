<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterar Autor</title>
    <link rel="stylesheet" href="CSS/estilo.css">
    <link rel="icon" href="img/bibliotecaIcon.png" type="jpg">

    <script>
        function blockletras(event) {
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

<a href="alterar.html" class="alink"><img src="img/voltar.png" alt="Voltar" link="alterar.html"></a>
<br><br><br>
<form method="POST" action="consultarAutor_alt2.php">
    <div id="a" >
    <h3>Alteração de Autores Cadastrados</h3>

        <p>Informe o código do autor desejado:</p> 
        <input type="text" name="txtcod_autor" required onkeypress="return blockletras(event)">

        <br><br>
    <div>
    <input type="submit" name="btnenviar" value="Consultar">
    <input type="reset" name="btnlimpar" value="Limpar">  
    </div>
</div>
</form>



</body>
</html>