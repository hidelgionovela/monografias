<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clientes Cadastrados</title>
</head>

<body>
    <center><h2>Clientes Cadastrados</h2></center>

    <?php
    include __DIR__ . '/../conf/DB.php';
    $dados = read("Select * from cliente");
    ?>

    <?php foreach ($dados as $a) {  ?>

        <div style="margin-bottom:20px; padding: 20px; border-bottom: 1px solid lightgray; display: block; text-align: justify;">

            <h3 style="color: pink"><?php echo "Nome do Cliente: #"; ?> <?php echo $a['nome']; ?></h3>
            
            <p>
                <label>
                    Telefone: <span style="color: green"><?php echo $a['telefone']; ?></span>
                </label>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label>
                    Telefone alternativo: <span style="color: blue"><?php echo $a['telefone_alternativo']; ?></span>
                </label>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label>
                    Email: <span style="color: blue"><?php echo $a['email']; ?></span>
                </label>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label>
                    Endereço: <span style="color: blue"><?php echo $a['endereco']; ?></span>
                </label>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
               
                
            </p>

            <p style="text-align: right;">

                <!-- <label style="color: blue"><a href="./edit.php?id=<?php echo $a['id']; ?>">Editar/Pagar</a></label>
                &nbsp;&nbsp;&nbsp;&nbsp;

                <label style="color: red">
                    <a class="btn-delete" onclick="confirmarApagar('<?php echo $a['id']; ?>')">Apagar</a></label>
                &nbsp;&nbsp;&nbsp;&nbsp; -->


            </p>
        </div>
    <?php } ?>

    <a href="../index.php" style="text-align: right">Voltar</a>
</body>

</html>