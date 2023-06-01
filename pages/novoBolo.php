<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Novo Bolo</title>
</head>

<body>
    <h2>Novo Bolo</h2>
    <?php include __DIR__ . '/../conf/DB.php'; ?>

    <?php
    $nome = ''; // varchar
    $tipo = ''; //int
    $tamanho = ''; //mini,pequeno,medio,grande,extra
    $preco = ''; //float
    $decoracao = ''; //varchar

    ?>

    <form method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
        <p>
            <label>Nome</label><br>
            <input type="text" name="nome" class="field" value="<?php echo $nome; ?>">
        </p>

        <p>
            <label>Tipo</label><br>
            <input type="number" name="tipo" class="field" value="<?php echo $tipo; ?>">

        </p>

        <p>
            <label>Preço </label><br>
            <input type="number" name="preco" class="field" value="<?php echo $preco; ?>">

        </p>

        <p>
            <label>Decoração </label><br>
            <input type="text" name="decoracao" class="field" value="<?php echo $decoracao; ?>">

        </p>

        <p>
            <label>Tamanho</label><br>
            <select class="form-select" name="tamanho" aria-label="Default select example" style="margin-bottom: 2%;" method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
                <option selected>pequeno</option>
                <option value="mini">mini</option>
                <option value="medio">medio</option>
                <option value="grande">grande</option>
                <option value="extra">extra</option>
            </select>

        </p>

        <hr>

        <p style="text-align: right">
            <input type="submit" value="Gravar">
        </p>
        <a href="../index.php" style="text-align: right">Voltar</a>
    </form>



    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $nome = $_POST['nome'];
        $tipo = $_POST['tipo'];
        $tamanho = $_POST['tamanho'];
        $preco = $_POST['preco'];
        $decoracao = $_POST['decoracao']; 

        //var_dump($_POST);


        $sql = "INSERT INTO bolo (nome, tipo, tamanho, preco, decoracao ) VALUES (:nome, :tipo, :tamanho, :preco, :decoracao)";
        $dados = [
            'nome' => $nome,
            'tipo' => $tipo,
            'tamanho' => $tamanho,
            'preco' => $preco,
            'decoracao' => $decoracao,
        ];

        create($sql, $dados);
        header('location: verBolo.php');
    }
    ?>
</body>

</html>