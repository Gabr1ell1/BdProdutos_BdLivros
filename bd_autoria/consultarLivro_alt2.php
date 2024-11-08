<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterar Livro</title>
    <link rel="stylesheet" href="CSS/estilo.css">
    <link rel="icon" href="img/bibliotecaIcon.png" type="jpg">
    <script>
        function MascaraISBN(input) {
            // Remove tudo que não for número
            const valor = input.value.replace(/\D/g, '');
            const partes = [];
            
            // Adiciona partes da máscara
            if (valor.length > 0) partes.push(valor.substring(0, 3)); // Primeiros 3 dígitos
            if (valor.length > 3) partes.push(valor.substring(3, 4)); // 4º dígito
            if (valor.length > 4) partes.push(valor.substring(4, 7)); // 5-7 dígitos
            if (valor.length > 7) partes.push(valor.substring(7, 12)); // 8-12 dígitos
            if (valor.length > 12) partes.push(valor.substring(12, 13)); // 13º dígito

            input.value = partes.join('-'); // Junta as partes com hífen
        }
        </script>
</head>
<body>
<a href="consultarLivro_alt.php" class="alink"><img src="img/voltar.png" alt="Voltar"></a>

<div class="a">
<?php 
    $txtcod_livro = $_POST["txtcod_livro"];
    include_once 'livro.php';
    $p = new livro();
    $p->setCod_livro($txtcod_livro);
    $pro_bd=$p->alterar(); //CHAMA O MÉTODO ALTERAR NA CLASSE LIVRO
    ?>


    <form name="cliente2" method="POST" action="">
    <?php foreach($pro_bd as $pro_mostrar): ?>
        <input type="hidden" name="txtcod_livro" size="5" value= '<?php echo $pro_mostrar[0]?>'>
        <b> <?php echo "Código do Livro: " .$pro_mostrar[0]; ?></b>
        

        <b><?php echo "Título: "; ?></b>
        <input type="text" name="txttitulo" size="25" value='<?php echo $pro_mostrar [1]?>'>
        

        <b><?php echo "Categoria: " ; ?></b>
        <input type="text" name="txtcategoria" size="25" value='<?php echo $pro_mostrar [2]?>'> 


        <b><?php echo "ISBN: " ; ?></b>
        <input type="text" name="txtISBN" size="25" oninput="MascaraISBN(this)"  maxlength="17"  value='<?php echo $pro_mostrar [3]?>'> 

        <b><?php echo "Idioma: " ; ?></b>
        <input type="text" name="txtidioma" size="25" value='<?php echo $pro_mostrar [4]?>'> 

        <b><?php echo "Quantidade de páginas: " ; ?></b>
        <input type="text" name="txtqtdepag" size="25" value='<?php echo $pro_mostrar [5]?>'> 

        <input name="btnalterar" type="submit" value="Alterar" >

    <?php endforeach?>
    <?php 
    extract($_POST, EXTR_OVERWRITE);
    if(isset($btnalterar)){
        include_once 'livro.php';
        $pro = new livro();
        $pro->setcod_livro($txtcod_livro);
        $pro->settitulo(($txttitulo));
        $pro->setCategoria($txtcategoria);
        $pro->setISBN(($txtISBN));
        $pro->setIdioma($txtidioma);
        $pro->setQtdePag(($txtqtdepag));
    
        header("location:consultarLivro_alt.php");
        echo "<br><br><h3>" .$pro->alterar2() . "</h3>";
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