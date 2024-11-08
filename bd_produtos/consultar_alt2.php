<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterar</title>
    <link rel="stylesheet" href="CSS/form.css">
    <link rel="icon" href="img/produtoIcon.jpg" type="jpg">

</head>
<body>
<a href="consultar_alt.php" class="alink"><img src="img/voltar.png" alt="Voltar"></a>

<br><br><br>

<div id="a" >
    <?php 
      $txtid = $_POST["txtid"];
      include_once 'produto.php';
      $p = new produtos();
      $p-> setId($txtid);
      $pro_bd = $p-> alterar(); //CHAMADA DO MÉTODO COM RETORNO, O $P É O PARAMETRO ENVIADO
    ?>
    <form name="cliente2" method="POST" action="">
<?php
    foreach($pro_bd as $pro_mostrar)
    {
        ?>
        <input type="hidden" name="txtid" size="5" value= '<?php echo $pro_mostrar[0]?>'>
        <b> <?php echo "ID: " .$pro_mostrar[0]; ?></b>
        

        <b><?php echo "Nome: "; ?></b>
        <input type="text" name="txtnome" size="25" value='<?php echo $pro_mostrar [1]?>'>
         

        <?php echo "Estoque: " ; ?></b>
        <input type="text" name="txtestoq" size="10" value='<?php echo $pro_mostrar [2]?>'> 

        <input name="btnalterar" type="submit" value="Alterar" >
    <?php
    }
    ?>

<?php 
    extract($_POST, EXTR_OVERWRITE);
if(isset($btnalterar))
{
    include_once 'produto.php';
    $pro = new produtos();
    $pro->setNome($txtnome);
    $pro->setEstoque(($txtestoq));
    $pro->setId($txtid);
    
    header("location:consultar_alt.php"); 
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