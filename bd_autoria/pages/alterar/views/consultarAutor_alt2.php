<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterar Autor</title>
    <link rel="stylesheet" href="../../../assets/css/estilo.css">

</head>
<body>
<a href="./consultarAutor_alt.php" class="alink"><img src="../../../assets/images/voltar.png" alt="Voltar"></a>

<div class="a">
    <?php 
        $txtcod_autor = $_POST["txtcod_autor"];
        include_once '../../../models/autor.php';
        $p = new autor();
        $p->setCod_autor($txtcod_autor);
        $pro_bd = $p->alterar(); //CHAMA O MÉTODO ALTERAR NA CLASSE AUTOR
    ?>

    <form name="cliente2" method="POST" action="">
    <?php foreach($pro_bd as $pro_mostrar): ?>
        <input type="hidden" name="txtcod_autor" size="5" value ='<?php echo $pro_mostrar[0]?>'>
        <b> <?php echo "Código do autor: " .$pro_mostrar[0]; ?></b>


        <b><?php echo "Nome do Autor "; ?></b>
        <input type="text" name="NomeAutor" size="25" value='<?php echo $pro_mostrar [1]?>'>
        
        <b><?php echo "Sobrenome " ; ?></b>
        <input type="text" name="txtsobrenome" size="25" value='<?php echo $pro_mostrar [2]?>'> 


        <b><?php echo "Email " ; ?></b>
        <input type="text" name="txtemail" size="25" value='<?php echo $pro_mostrar [3]?>'> 

        <b><?php echo "Data de Nascimento " ; ?></b>
        <input type="text" name="txtnasc" size="25" value='<?php echo $pro_mostrar [4]?>'> 

        <input name="btnalterar" type="submit" value="Alterar" >

    <?php endforeach; ?>
</form>
    
    <?php
    extract($_POST, EXTR_OVERWRITE);
    if (isset($_POST['btnalterar'])) {
        include_once 'autor.php';
        $pro = new autor();
        $pro->setCod_autor($txtcod_autor);
        $pro->setNomeAutor($NomeAutor);
        $pro->setSobrenome($txtsobrenome);
        $pro->setEmail($txtemail);
        $pro->setNasc($txtnasc);

        header("location:consultarAutor_alt.php");
        echo "<br><br>" .$pro->alterar2();
    }
    ?>
</div>
</body>
</html>