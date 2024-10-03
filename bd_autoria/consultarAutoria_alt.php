<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterar Autoria</title>
    <link rel="stylesheet" href="CSS/estilo.css">

</head>
<body>
<a href="alterar.html" class="alink"><img src="img/voltar.png" alt="Voltar" ></a>
<br><br><br>

<form name = "clientes" action="consultarAutoria_alt2.php" method="POST">
<div id="a" >
    <h3>Alteração de Autorias Cadastradas</h3>

        <p>Informe o código do Autor desejado:</p> 
        <input type="text" name="txtcodAutor">
        <br><br>
        <p>Informe o código do Livro desejado:</p> 
        <input type="text" name="txtcodLivro">
        <br><br>
        <div>
            <input type="submit" name="btnenviar" value="Consultar">
            <input type="reset" name="btnlimpar" value="Limpar">
        </div>
    </div>
</form>



</body>
</html>
