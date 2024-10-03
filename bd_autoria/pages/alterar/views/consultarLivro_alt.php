<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterar Livro</title>
    <link rel="stylesheet" href="../../../assets/css/estilo.css">

<a href="../alterar.html" class="alink"><img src="../../../assets/images/voltar.png" alt="Voltar" link="alterar.html"></a>

<br><br><br>

<form action="./consultarLivro_alt2.php" method="POST">
<div id="a" >
    <h3>Alteração de Livros Cadastrados</h3>

        <p>Informe o código do livro desejado:</p> 
        <input type="text" name="txtcod_livro">

        <br><br>
    <div>
    <input type="submit" name="btnenviar" value="Consultar">
    <input type="reset" name="btnlimpar" value="Limpar">
    </div>
</div>
</form>



</body>
</html>