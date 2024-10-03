<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Autoria</title>
    <link rel="stylesheet" href="../../../assets/css/estilo.css">
</head>
<body>
    

<a href="../cadastrar.html" class="alink"><img src="../../../assets/images/voltar.png" alt="Voltar" link="cadastrar.html"></a>


<form action="" method="post">
<div class="a">
<legend><b>Cadastre Sua Autoria</b></legend>
<p>Cod_Autor: <input name="codAutor" type="text" size="10"></p>
<p>Cod_Livro: <input name="codLivro" type="text" size="10"></p>
<p>Data de Lançamento: <input name="dt" type="date" ></p>
<p>Editora: <input name="Editora" type="text" size="40" ></p>

<br>
<div class="btn"><input name="btnenviar" type="submit" value="Cadastrar"> <input name="limpar" type="reset" value="Limpar"> 
</div>
</form>


<?php
//extrai as variáveis
extract($_POST, EXTR_OVERWRITE);
//confirmando se o formulário foi enviado
if(isset($_POST['btnenviar']))
{
    //inclui o arquivo 'autoria.php'
    include_once '../../../models/autoria.php';

    //instanciação da classe 'autoria'
    $p = new autoria();

    $p -> setCod_autor($_POST['codAutor']);
    $p -> setCod_livro($_POST['codLivro']);
    $p -> setdataLancamento($_POST['dt']);
    $p -> setEditora($_POST['Editora']);

echo "<h3><br><br>" .$p->salvar() . "</h3>";
}
?>
</div>






</body>
</html>