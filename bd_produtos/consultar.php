<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesquisar</title>
    <link rel="stylesheet" href="CSS/form.css">

</head>
<body>
<a href="menu.html" class="alink"><img src="img/voltar.png" alt="Voltar" link="menu.html"></a>

<br><br><br>

<form  name="clientes" action="" method="post">
<div id="a" >
    <h3>Consulta de Produtos Cadastrados</h3>

        <p>Informe o nome do produto desejado:</p> 
        <input type="text" name="txtnome">

        <br><br>
    <div>
    <input type="submit" name="btnenviar" value="Consultar">
    <input type="reset" name="btnlimpar" value="Limpar">
    </div>
    </form>

    <legend><h3>Resultado: </h3></legend>
    <div id="b">
    <?php 
        extract($_POST, EXTR_OVERWRITE);
        if(isset($_POST['btnenviar']))
        {
            include_once 'produto.php';
            $p = new produtos();
            $p-> setNome($txtnome . '%'); //O '.%' SERVE PARA BUSCA APROXIMADA, OU SEJA COMEÇA COM UMA DETERMINADA LETRA
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
                <?php echo $pro_mostrar[2] ?> <br>
                <?php
            
            } 
            if (empty($pro_bd)) {
                echo "<script>alert('Nenhum Produto foi encontrado.');</script>";
            }
        }
    ?>
</div>


</body>
</html>