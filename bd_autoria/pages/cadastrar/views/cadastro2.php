<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Autor</title>
    <link rel="stylesheet" href="../../../assets/css/estilo.css">
</head>
<body>
<a href="../cadastrar.html" class="alink"><img src="../../../assets/images/voltar.png" alt="Voltar" link="cadastrar.html"></a>


<form action="" method="post">
<div class="a">
<legend><b>Cadastre o Autor</b></legend>
<p>Nome: <input name="nome" type="text" size="50" ></p>
<p>Sobrenome: <input name="sobrenome" type="text" size="40" ></p>
<p>Email: <input name="email" type="text" size="30" ></p>
<p>Data de Nascimento: <input name="dt" type="date" ></p>

<br>
<div class="btn"><input name="btnenviar" type="submit" value="Cadastrar"> <input name="limpar" type="reset" value="Limpar"></div>


</form>
<?php
extract($_POST, EXTR_OVERWRITE);
if(isset($_POST['btnenviar']))
{
    include_once '../../../models/autor.php';

    $p = new autor();

    $p-> setNomeAutor($_POST['nome']);
    $p-> setSobrenome($_POST['sobrenome']);
    $p-> setEmail($_POST['email']);
    $p -> setNasc($_POST['dt']);

    echo "<h3><br><br>" . $p->salvar() . "</h3>";
}

?>

</div>
</body>
</html>