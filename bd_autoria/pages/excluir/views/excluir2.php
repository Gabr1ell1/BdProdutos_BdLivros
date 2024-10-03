<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Excluir Autores</title>
    <link rel="stylesheet" href="../../../assets/css/estilo.css">
</head>
<body>
<a href="../excluir.html" class="alink"><img src="../../../assets/images/voltar.png" alt="Voltar" link="excluir.html"></a>

<br><br><br>

<form action="" method="post">
    <div id="a">
        <h1>Exclusão de autores</h1>
<p>Clique no ícone de lista para ir a listagem</p>

<a href="../../listar/views/listar2.php"><img src="../../../assets/images/lista.png" alt="Listar" link="listar2.php" width="24px" height="24px"></a>

        <p>Informe o código do autor:</p>
        <input type="text" name="txtcodAutor">
<br>
        <div id="btns">
            <input type="submit" name="btnexcluir" value="Excluir">
            <input type="submit" name="btnconsult" value="Consultar">
            <input type="reset" name="btnlimpar" value="Limpar">
        </div>
    </form>
<br>

<div id="b">
<?php
extract ($_POST, EXTR_OVERWRITE);
include_once '../../../models/autor.php';
$p = new autor();

if(isset($_POST['btnconsult']))
{

    $p-> setCod_autor($txtcodAutor);
     //CONSULTA
     $pro_bd = $p->consultar1();

     foreach($pro_bd as $pro_mostrar)
     {
         ?> 
         <br>
         <b>Código do autor:</b>
         <?php echo $pro_mostrar[0] ?> <br>
         <b>Nome:</b>
         <?php echo $pro_mostrar[1] ?> <br>
         <b>Sobrenome:</b> 
         <?php echo $pro_mostrar[2] ?> <br>
         <b>Email:</b>
         <?php echo $pro_mostrar[3] ?> <br>
         <b>Data de Nascimento:</b>
         <?php echo $pro_mostrar[4] ?> <br>
         <?php
     } 
     if (empty($pro_bd)) {
        echo "<script>alert('Nenhum Autor Foi Encontrado.');</script>";
    }
}


        if(isset($_POST['btnexcluir']))
        {
            //EXCLUINDO UM REGISTRO POR MEIO DO ID
            $p->setcod_Autor($txtcodAutor);
            echo "<h3>" . $p->exclusao() . "</h3>";

        }
?>
</div>    
</div>

</body>
</html>