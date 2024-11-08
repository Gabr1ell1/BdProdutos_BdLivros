<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Excluir</title>
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
</head>
<body>
<a href="excluir.html" class="alink"><img src="img/voltar.png" alt="Voltar" link="excluir.html"></a>

<br><br><br>

<form action="" method="post">
    <div id="a">
        <h1>Exclusão de autorias</h1>
        <p>Clique no ícone de lista para ir a listagem. </p>
        <a href="listar1.php"><img src="img/lista.png" alt="Listar" link="listar1.php" width="24px" height="24px"></a>

        <p>Informe Código do autor:</p>
        <input type="text" name="txtcodAutor" required onkeypress="return blockletras(event)">
        <p>Informe o Código do livro :</p>
        <input type="text" name="txtcodLivro" required onkeypress="return blockletras(event)">
        <a href="listar.php"></a>

        <br>
        <div id="btns">
            <input type="submit" name="btnenviar" value="Excluir">
            <input type="submit" name="btnconsult" value="Consultar">
            <input type="reset" name="btnlimpar" value="Limpar">
         </div>
    </form>
<div id="b" style="padding: 20px; border: 1px solid #ddd; background-color: #f9f9f9; border-radius: 5px;  width: 100%; margin-top: 30px; ">
<legend style="font-size: 18px;  padding: 10px;">Resultado de sua pesquisa:</legend>
<?php
extract ($_POST, EXTR_OVERWRITE);
include_once 'autoria.php';
$p = new autoria();


if(isset($_POST['btnconsult']))
{
    $p->setcod_autor($txtcodAutor);
    $p->setCod_livro($txtcodLivro);

    //CONSULTA
    $pro_bd = $p->consultar1();
    
    foreach($pro_bd as $pro_mostrar)
    {
        ?> 
        <br>
        <b>Código do autor:</b>
        <?php echo $pro_mostrar[0] ?> <br>
        <b>Código do livro:</b> 
        <?php echo $pro_mostrar[1] ?> <br>
        <b>Data de lançamento:</b>
        <?php echo $pro_mostrar[2] ?> <br>
        <b>Editora:</b>
        <?php echo $pro_mostrar[3] ?> <br>
        <?php
       
        } 
        if (empty($pro_bd)) {
            echo '<div style = "font-size: 14px;  padding: 10px; color: gray;">';
            echo "Não há registros";
            echo '</div>';
        }
    }

    if(isset($_POST['btnenviar']))
    {
        $p->setcod_Autor($txtcodAutor);
        $p->setCod_livro($txtcodLivro);
        
        //EXCLUIR
        echo "<h3>" . $p->exclusao() . "</h3>";
        
    }
?>
</div>
</div>


</body>
</html>