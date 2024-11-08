<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listagem de Autoria</title>
    <link rel="icon" href="img/bibliotecaIcon.png" type="jpg">

    
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Noto+Sans:ital,wght@0,100..900;1,100..900&display=swap');

       h1 {
        text-align: center;
        font-family: 'Arial', sans-serif;
        font-size: 24px;
        color: #333;
        margin-bottom: 20px;
            }

        table {
            width: 100%;
            border-collapse: collapse;
            font-family: 'Arial', sans-serif;
            margin-top: 20px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        th {
            border: 1px solid #ddd;
            padding: 12px;
            background-color: blue;
            color: #fff;
            text-align: left;
            font-weight: bold;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2; 
        }

        tr:hover {
            background-color: #e9e9e9; 
        }

        td {
            border: 1px solid #ddd;
            padding: 12px;
            color: #333;
        }

        .tabela {
            padding: 20px;
            border: 1px solid #ddd;
            background-color: #f9f9f9;
            border-radius: 5px;
            max-width: 100%;
            margin-top: 30px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05); 
        }
    </style>
</head>
<body>

<a href="listar.html" class="alink"><img src="img/voltar.png" alt="Voltar"></a>

<h1>Tabela Autoria</h1>
<div class="tabela">
<table>
    <thead>
        <tr>
            <th>Cod_Autor</th>
            <th>Cod_Livro</th>
            <th>Data Lançamento</th>
            <th>Editora</th>            
        </tr>
    </thead>    
<?php
// Inclui o arquivo 'produto.php', que contém a definição da classe 'produtos'
include_once 'autoria.php';

// Cria uma nova instância da classe 'produtos' e armazena na variável $p
$p = new autoria();

// Chama o método 'listar()' para obter uma lista de produtos e o resultado é armazenado na variável $pro_bd.
$autoria_bd=$p->listar();

?>


<?php
//Um loop foreach pra exibir cada elemento do array em produto
foreach($autoria_bd as $pro_mostrar)
{
    echo '<tr>';
    echo '<td>'. ($pro_mostrar[0]) . '</td>';
    echo '<td>'. ($pro_mostrar[1]) . '</td>';
    echo '<td>'. ($pro_mostrar[2]) . '</td>';
    echo '<td>'.($pro_mostrar[3]) . '</td>';
    echo "</tr>";
}
?>
</table>
</div>

</body>
</html>













