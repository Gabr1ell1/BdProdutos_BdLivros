<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Excluir</title>
    <link rel="stylesheet" href="../../../assets/css/estilo.css">
</head>
<body>
<a href="../excluir.html" class="alink"><img src="../../../assets/images/voltar.png" alt="Voltar" link="excluir.html"></a>

<br><br><br>

<form action="" method="post">
    <div id="a">
        <h1>Exclusão de Livros</h1>
        <p>Clique no ícone de lista para ir a listagem</p>

        <a href="../../listar/views/listar3.php"><img src="../../../assets/images/lista.png" alt="Listar" link="listar3.php" width="24px" height="24px"></a>

                <p>Informe o código do livro:</p>
                <input type="text" name="txtcodLivro">
<br>
                <div id="btns">
                    <input type="submit" name="btnenviar" value="Excluir">
                    <input type="submit" name="btnconsult" value="Consultar">
                    <input type="reset" name="btnlimpar" value="Limpar">
                </div>
            </form>
            
<div id="b">           
<?php
extract ($_POST, EXTR_OVERWRITE);
include_once '../../../models/livro.php';
$p = new livro();

if(isset($_POST['btnconsult']))
{
    $p-> setcod_livro($txtcodLivro);
    //CONSULTA
    $pro_bd = $p->consultar1();
    foreach($pro_bd as $pro_mostrar)
    {
        ?> 
        <br>
        <b>Código do livro:</b>
        <?php echo $pro_mostrar[0] ?> <br>
        <b>Título:</b> 
        <?php echo $pro_mostrar[1] ?> <br>
        <b>Categoria:</b>
        <?php echo $pro_mostrar[2] ?> <br>
        <b>ISBN:</b>
        <?php echo $pro_mostrar[3] ?> <br>
        <b>Idioma:</b>
        <?php echo $pro_mostrar[4] ?> <br>
        <b>Quantidade de Páginas:</b>
        <?php echo $pro_mostrar[5] ?> <br>
        <?php
    
    } 
    if (empty($pro_bd)) {
        echo "<script>alert('Nenhum Livro Foi Encontrado.');</script>";
    }
        }
        if(isset($_POST['btnenviar']))
        {

            //EXCLUINDO UM REGISTRO POR MEIO DO ID
            $p->setCod_livro($txtcodLivro);
            echo "<h3>" . $p->exclusao() . "</h3>";


        }
?>
</div>    
</div>

</body>
</html>