<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Entrar</title>
    <link rel="stylesheet" href="css/login.css">
    <link rel="icon" href="img/bibliotecaIcon.png" type="jpg">

    <script>
    function blockletras(event) {
        //CAMPO SENHA - BLOQUEIA lETRAS
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
<img src="img/biblioteca.png" alt="Biblioteca" class="background-image">

<div class="main-container">
        <form action="" method="POST">
                            <h1>Acessar Biblioteca</h1>
        <p>Login <input name="usuario" type="text" size="10" required></p>
        <p>Senha <input name="senha" type="password" maxlength="3" required onkeypress="return blockletras(event)"></p>
        <br>
        <div class="btn">
             <input name="btnenviar" type="submit" value="Acessar" style="background-color: blue;">
        </div>
        </form>

<?php 
if (isset($_POST['btnenviar'])) {
    include_once 'usuario.php';
    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];

    $u = new Usuario();
    $u->setUsu($usuario);
    $u->setSenha($senha);
    $pro_bd = $u->logar();

    $existe = false;
    foreach ($pro_bd as $pro_mostrar) 
    {
        $existe = true;
        ?>
        <br><b> 
            <?php  
            echo '<div style = "font-size: 14px;  padding: 10px; color: #278cdf;">';
            echo "Bem-Vindo de volta " .$pro_mostrar[0]. "!";
            echo '</div>';?></b><br>
        <br>
        <div class="btn2">
        <a href="menu.html"><input type="button" value="Entrar" style="background-color: blue;"></a></div>
        <?php
    }
    
    if ($existe == false) {
        echo '<div style = "font-size: 17px;  padding: 10px; color: red;">';
        echo "Login Inválido";
        echo '</div>';
    }
}
?>

</div>



</body>
</html>