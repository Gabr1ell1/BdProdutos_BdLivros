<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesquisar</title>
    <link rel="stylesheet" href="../../../assets/css/estilo.css">
</head>
<body>
<a href="../pesquisar.html" class="alink"><img src="../../../assets/images/voltar.png" alt="Voltar" link="menu.html"></a>

<br><br><br>

<form  name="clientes" action="" method="post">
    <div id="a" >
        <h1>Consulta de Autoria</h1>

        <p>Informe a Editora desejada:</p> 
        <input type="text" name="txteditora">
        <br>
        <div id="btns">
            <input type="submit" name="btnenviar" value="Consultar">
            <input type="reset" name="btnlimpar" value="Limpar">
        </div>

        </form>

        <br><br>

        <fieldset id="b">
            <legend><h3>Resultado: </h3></legend>

            
        <?php 
        extract($_POST, EXTR_OVERWRITE);
        if(isset($_POST['btnenviar']))
        {
            include_once '../../../models/autoria.php';
            $p = new autoria();
            $p-> setEditora($txteditora . '%'); //O '.%' SERVE PARA BUSCA APROXIMADA, OU SEJA COMEÇA COM UMA DETERMINADA LETRA
            $pro_bd = $p->consultar();
            
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
            echo "<script>alert('Nenhuma autoria foi encontrada.');</script>";
          }
    }
        ?>
        </fieldset>
    </div>   
 


</body>
</html>