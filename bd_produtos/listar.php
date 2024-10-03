<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relação de produtos Cadastrados</title>

    <style>
        body{font-family: 'Times New Roman', Times, serif; text-align: center; align-items: center; padding-top: 50px; background-color: white;}
        .btn {background-color: #BA55D3;border: solid 1px gray ;border-radius: 5px; width: 80px; height: 40px; font-size: larger; }
        .btn:hover{ border: solid 1px black;}
        a{text-decoration: none;color: white;}
        table { margin: 0 auto; border-collapse: collapse; width: 80%; }
        th, td { padding: 10px 20px; border: 1px solid #000; }
        th { background-color: #DDA0DD; }
        .alink {
    position: absolute; /* Posiciona a imagem absolutamente em relação ao contêiner do body */
    top: 20px; /* Ajuste a distância do topo conforme necessário */
    left: 20px; /* Ajuste a distância da esquerda conforme necessário */
}

.img {
    display: block;
    max-width: 100px; /* Ajuste o tamanho máximo da imagem conforme necessário */
}

    </style>
</head>
<body>
<a href="menu.html" class="alink"><img src="img/voltar.png" alt="Voltar" link="menu.html"></a>

<h1>Relação de produtos Cadastrados</h1>
<br><br>
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Estoque</th>
        </tr>
    </thead>    
<?php   
// Inclui o arquivo 'produto.php', que contém a definição da classe 'produtos'
include_once 'produto.php';

// Cria uma nova instância da classe 'produtos' e armazena na variável $p
$p = new produtos();

// Chama o método 'listar()' para obter uma lista de produtos e o resultado é armazenado na variável $pro_bd.
$pro_bd=$p->listar();

?>

<?php
//Um loop foreach pra exibir cada elemento do array em produto
foreach($pro_bd as $pro_mostrar)
{
    echo '<tr>';
    echo '<td>'. ($pro_mostrar[0]) . '</td>';
    echo '<td>'. ($pro_mostrar[1]) . '</td>';
    echo '<td>'. ($pro_mostrar[2]) . '</td>';
    echo "</tr>";
}
?>
</table>


</body>
</html>