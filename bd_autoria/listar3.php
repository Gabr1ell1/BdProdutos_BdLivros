<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listagem de Autor</title>

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
<h1>Tabela Livro</h1>
<br><br>

<table>
    <thead>
        <tr>
            <th>Cod_Livro</th>
            <th>Título</th>
            <th>Categoria</th>
            <th>ISBN</th>
            <th>Idioma</th>
            <th>Quantidade de Páginas</th>
        </tr>
    </thead>    
<?php
// Inclui o arquivo 'produto.php', que contém a definição da classe 'produtos'
include_once 'livro.php';

// Cria uma nova instância da classe 'produtos' e armazena na variável $p
$p = new livro();

// Chama o método 'listar()' para obter uma lista de produtos e o resultado é armazenado na variável $pro_bd.
$livro_bd=$p->listar();

?>


<?php
//Um loop foreach pra exibir cada elemento do array em produto
foreach($livro_bd as $pro_mostrar)
{   echo '<tr>';
    echo '<td>'. ($pro_mostrar[0]) . '</td>';
    echo '<td>'. ($pro_mostrar[1]) . '</td>';
    echo '<td>'. ($pro_mostrar[2]) . '</td>';
    echo '<td>'.($pro_mostrar[3]) . '</td>';
    echo '<td>'.($pro_mostrar[4]) . '</td>'; 
    echo '<td>'.($pro_mostrar[5]) . '</td>';
    echo "</tr>";
}
?>
</table>

<br><br>
<button class="btn">
    <a href="listar.html">Voltar</a>
</button>


</body>
</html>