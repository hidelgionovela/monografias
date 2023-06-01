<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Novo Confeiteiro</title>
</head>

<body>
    <h2>Novo Confeiteiro</h2>
    <?php include __DIR__ . '/../conf/DB.php'; ?>

    <?php
    $nome = ''; // varchar
    $genero = ''; // varchar Masculino/Femenino
    $telefone = ''; //varchar
    $telefone_alternativo = ''; //varchar
    $email = ''; //varchar
    $website = ''; //varchar
    $endereco = ''; //varchar

    ?>

    <form method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
        <p>
            <label>Nome</label><br>
            <input type="text" name="nome" class="field" value="<?php echo $nome; ?>">
        </p>

        <p>
            <label>Telefone</label><br>
            <input type="text" name="telefone" class="field" value="<?php echo $telefone; ?>">
        </p>

        <p>
            <label>Telefone Alternativo</label><br>
            <input type="text" name="telefone_alternativo" class="field" value="<?php echo $telefone_alternativo; ?>">
        </p>

        <p>
            <label>Email</label><br>
            <input type="email" name="email" class="field" value="<?php echo $email; ?>">
        </p>

        <p>
            <label>WebSite</label><br>
            <input type="text" name="website" class="field" value="<?php echo $website; ?>">
        </p>

        <p>
            <label>Endereço</label><br>
            <input type="text" name="endereco" class="field" value="<?php echo $endereco; ?>">
        </p>

        <p>
            <label>Genero</label><br>
            <select class="form-select" name="genero" aria-label="Default select example" style="margin-bottom: 2%;" method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
                <option selected>Masculino</option>
                <option value="Femenino">Femenino</option>
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
        $genero = $_POST['genero'];
        $telefone =  $_POST['telefone'];
        $telefone_alternativo = $_POST['telefone_alternativo'];
        $email = $_POST['email'];
        $website = $_POST['website'];
        $endereco =  $_POST['endereco'];

        // var_dump($_POST);


        $sql = "INSERT INTO confeiteira (nome, genero, telefone, telefone_alternativo, email, website, endereco ) VALUES (:nome, :genero, :telefone, :telefone_alternativo, :email, :website, :endereco)";
        $dados = [
            'nome' => $nome,
            'genero' => $genero,
            'telefone' => $telefone,
            'telefone_alternativo' => $telefone_alternativo,
            'email' => $email,
            'website' => $website,
            'endereco' => $endereco,
        ];

        create($sql, $dados);
        header('location: verConfeiteiro.php');
    }
    ?>
</body>

</html>