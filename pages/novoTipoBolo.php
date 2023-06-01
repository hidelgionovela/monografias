<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Novo Tipo de Bolo</title>
</head>

<body>
    <h2>Novo Tipo de Bolo</h2>
    <?php include __DIR__ . '/../conf/DB.php'; ?>

    <?php
    $nome = ''; // varchar
    $descricao = ''; //varchar


    ?>

    <form method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
        <p>
            <label>Nome</label><br>
            <input type="text" name="nome" class="field" value="<?php echo $nome; ?>">
        </p>

        <p>
            <label>Descrição</label><br>
            <!-- <input type="text" name="descricao" class="field" value="<?php echo $descricao; ?>"> -->
            <textarea class="field" name="descricao" rows="3">
                <?php echo $descricao; ?>
		    </textarea>
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
        $descricao = $_POST['descricao'];


        // var_dump($_POST);


        $sql = "INSERT INTO tipo_bolo (nome, descricao ) VALUES (:nome, :descricao)";
        $dados = [
            'nome' => $nome,
            'descricao' => $descricao

        ];

        create($sql, $dados);
        
    }
    ?>
</body>

</html>