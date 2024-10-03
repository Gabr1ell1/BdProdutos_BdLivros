<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar Autor</title>

    <style>
        body{font-family: 'Times New Roman', Times, serif; text-align: center; align-items: center; padding-top: 50px;}
        .btn {background-color: #fff;border: solid 1px;border-radius: 5px; width: 80px; height: 40px; font-size: larger; }
        a{text-decoration: none;}
        table { margin: 0 auto; border-collapse: collapse; width: 80%; }
        th, td { padding: 10px 20px; border: 1px solid #000; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>

<h1>Tabela Autor</h1>
<br><br>
<table>
    <thead>
        <tr>
            <th>Cod_Autor</th>
            <th>Nome</th>
            <th>Sobrenome</th>
            <th>Email</th>
            <th>Nascimento</th>
        </tr>
    </thead>   
    
<?php
// Inclui o arquivo 'produto.php', que contém a definição da classe 'produtos'
include_once '../../../models/autor.php';

// Cria uma nova instância da classe 'produtos' e armazena na variável $p
$p = new autor();

// Chama o método 'listar()' para obter uma lista de produtos e o resultado é armazenado na variável $pro_bd.
$autor_bd=$p->listar();

?>


<?php
//Um loop foreach pra exibir cada elemento do array em produto
foreach($autor_bd as $pro_mostrar)
{ echo '<tr>';
    echo '<td>'. ($pro_mostrar[0]) . '</td>';
    echo '<td>'. ($pro_mostrar[1]) . '</td>';
    echo '<td>'. ($pro_mostrar[2]) . '</td>';
    echo '<td>'.($pro_mostrar[3]) . '</td>';
    echo '<td>'.($pro_mostrar[4]) . '</td>'; 
    echo "</tr>";
}
?>
</table>

<br><br>
<button class="btn">
    <a href="../listar.html">Voltar</a>
</button>


</body>
</html>