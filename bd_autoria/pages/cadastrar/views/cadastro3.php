<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Livro</title>
    <link rel="stylesheet" href="../../../assets/css/estilo.css">
</head>
<body>
<a href="../cadastrar.html" class="alink"><img src="../../../assets/images/voltar.png" alt="Voltar" link="cadastrar.html"></a>


<form action="" method="post">
<div class="a">
<legend><b>Cadastre o Livro</b></legend>
<!--<p>Cod_Livro: <input name="codLivro" type="text" size="10" placeholder=""></p>-->
<p>Título: <input name="titulo" type="text" size="50" ></p>
<p>Categoria: <input name="catego" type="text" size="50" ></p>
<p>ISBN: <input name="isbn" type="text" size="12" ></p>
<p>Idioma: <input name="idioma" type="text" size="10" ></p>
<p>Quantidade de páginas: <input name="qtdpag" type="text"></p>

<br>
<div class="btn"><input name="btnenviar" type="submit" value="Cadastrar"> <input name="limpar" type="reset" value="Limpar"></div>
</form>    

    <?php 
    extract($_POST, EXTR_OVERWRITE);
    if(isset($_POST['btnenviar']))
    {
        include_once '../../../models/livro.php';

        $p = new livro();

        $p -> settitulo($_POST['titulo']);
        $p -> setCategoria($_POST['catego']);
        $p -> setISBN($_POST['isbn']);
        $p -> setIdioma($_POST['idioma']);
        $p -> setQtdePag($_POST['qtdpag']);

    echo "<h3><br><br>" . $p->salvar() . "</h3>";
    }
    ?>
</div>







</body>
</html>