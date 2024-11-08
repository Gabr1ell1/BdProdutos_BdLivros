<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesquisar</title>
    <link rel="stylesheet" href="CSS/form.css">
    <link rel="icon" href="img/produtoIcon.jpg" type="jpg">

</head>
<body>
<a href="menu.html" class="alink"><img src="img/voltar.png" alt="Voltar" link="menu.html"></a>

<br><br><br>

<form  name="clientes" action="" method="post">
<div id="a" >
    <h3>Consulta de Produtos</h3>

        <p>Informe o nome do produto desejado:</p> 
        <input type="text" name="txtnome" required>

        <br><br>
    <div>
    <input type="submit" name="btnenviar" value="Consultar">
    <input type="reset" name="btnlimpar" value="Limpar" >
    </div>
    </form>


    <div id="result" style="padding: 20px; border: 1px solid #ddd; background-color: #f9f9f9; border-radius: 5px;  width: 100%; margin-top: 30px">
    <legend style="font-size: 18px;  padding: 10px;">Resultado de sua pesquisa:</legend>
    <?php 
        extract($_POST, EXTR_OVERWRITE);
        if(isset($_POST['btnenviar']))
        {
            include_once 'produto.php';
            $p = new produtos();
            $p-> setNome($txtnome . '%'); 
            $pro_bd = $p->consultar();
            
            foreach($pro_bd as $pro_mostrar)
            {
                ?> 
                
                <br>
                <b>ID:</b>
                <?php echo $pro_mostrar[0] ?> <br>
                <b>Nome:</b> 
                <?php echo $pro_mostrar[1] ?> <br>
                <b>Estoque:</b>
                <?php echo $pro_mostrar[2]   ?> <br>
                <?php
                
                
            } 
            if (empty($pro_bd)) {
            echo '<div style = "font-size: 14px;  padding: 10px; color: gray;">';
            echo "Não há registros";
            echo '</div>';
            }?>
            </div>    
            <?php            
        }
    ?>
</div>



</body>
</html>