<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterar Autoria</title>
    <link rel="stylesheet" href="CSS/estilo.css">
    <link rel="icon" href="img/bibliotecaIcon.png" type="jpg">

</head>
<body>
<a href="consultarAutoria_alt.php" class="alink"><img src="img/voltar.png" alt="Voltar" ></a>

<div class="a">
    <?php 
         $Cod_Autor = $_POST["txtcodAutor"];
         $Cod_Livro = $_POST["txtcodLivro"];
         include_once 'autoria.php';
         $p = new autoria();
         $p->setCod_Autor($Cod_Autor);
         $p->setCod_Livro($Cod_Livro);
         $pro_bd = $p->alterar();
    ?>
    
    <!-- Formulário para edição -->
    <form method="POST" action="consultarAutoria_alt2.php">
        <?php foreach ($pro_bd as $pro_mostrar): ?>
        <input type="hidden" name="txtcodAutor" value='<?php echo $pro_mostrar[0]; ?>'>
        <b>Código do Autor:<?php echo $pro_mostrar[0]; ?></b>
        
        <b>Código do Livro: <?php echo $pro_mostrar[1]; ?></b>
        <input type="hidden" name="txtcodLivro" value='<?php echo $pro_mostrar[1]; ?>'>
        
        <b>Data de Lançamento:</b>
        <input type="date" name="txtdatalancamento" value='<?php echo $pro_mostrar[2]; ?>'>
        
        <b>Editora:</b>
        <input type="text" name="txteditora" value='<?php echo $pro_mostrar[3]; ?>'>
        
        <input type="submit" name="btnalterar" value="Alterar">
    <?php endforeach; ?>

    <?php 
    // Verifique se o botão de alteração foi clicado
    if (isset($_POST['btnalterar'])) {
        include_once 'autoria.php';
        $pro = new autoria();
        
        // Atribuir os valores do formulário às variáveis
        $pro->setCod_autor($_POST['txtcodAutor']);
        $pro->setCod_livro($_POST['txtcodLivro']);
        $pro->setDataLancamento($_POST['txtdatalancamento']); 
        $pro->setEditora($_POST['txteditora']);
        
        header("location:consultarAutoria_alt.php");
        echo "<br><br><h3>" . $pro->alterar2() . "</h3>";
    }
    if (empty($pro_bd)) {
        echo '<div style = "font-size: 14px;  padding: 10px; color: gray; text-align: center;">';
        echo "Não há registros";
        echo '</div>';
    }
    ?>
    </form>

</div>


</body>
</html>