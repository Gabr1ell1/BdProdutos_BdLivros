<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastre Aqui</title>
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

    function blockletras(event) {
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
<a href="cadastrar.html" class="alink"><img src="img/voltar.png" alt="Voltar" link="cadastrar.html"></a>


<form action="" method="post">
<div class="a">
<legend><b>Cadastre o Livro</b></legend>
<!--<p>Cod_Livro: <input name="codLivro" type="text" size="10" placeholder=""></p>-->
<p>Título: <input name="titulo" type="text" size="50" required></p>
<p>Categoria: <input name="catego" type="text" size="50"  required></p>
<p>ISBN: <input name="isbn" type="text" size="20" required  oninput="MascaraISBN(this)"  maxlength="17"  pattern="\d{1,13}"></p>
<p>Idioma: <input name="idioma" type="text" size="10" required></p>
<p>Quantidade de páginas: <input name="qtdpag" type="text" required onkeypress="return blockletras(event)"></p>

<br>
<div class="btn"><input name="btnenviar" type="submit" value="Cadastrar"> <input name="limpar" type="reset" value="Limpar"></div>
</form>    

    <?php 
    extract($_POST, EXTR_OVERWRITE);
    if(isset($_POST['btnenviar']))
    {
        include_once 'livro.php';

        $p = new livro();

        $p -> settitulo($_POST['titulo']);
        $p -> setCategoria($_POST['catego']);
        $p -> setISBN($_POST['isbn']);
        $p -> setIdioma($_POST['idioma']);
        $p -> setQtdePag($_POST['qtdpag']);

    echo "<h3><br><br>" . $p->salvar() . "</h3>";
    }
    ?>
</div>







</body>
</html>