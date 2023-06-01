<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Novo Cliente</title>
</head>

<body>
    <h2>Novo Cliente</h2>
    <?php include __DIR__ . '/../conf/DB.php'; ?>

    <?php
    $nome = ''; // varchar
    $telefone = ''; //varchar
    $telefone_alternativo = '';//varchar
    $email = '';//varchar
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
            <label>Endereço</label><br>
            <input type="text" name="endereco" class="field" value="<?php echo $endereco; ?>">
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
        $telefone =  $_POST['telefone'];
    $telefone_alternativo = $_POST['telefone_alternativo'];
    $email = $_POST['email'];
    $endereco =  $_POST['endereco']; 

        var_dump($_POST);


        $sql = "INSERT INTO cliente (nome, telefone, telefone_alternativo, email, endereco ) VALUES (:nome, :telefone, :telefone_alternativo, :email, :endereco)";
        $dados = [
            'nome' => $nome,
            'telefone' => $telefone,
            'telefone_alternativo' => $telefone_alternativo,
            'email' => $email,
            'endereco' => $endereco,
        ];

       create($sql, $dados);
       header('location: verClientes.php');
    }
    ?>
</body>

</html>