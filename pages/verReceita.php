<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Receitass Cadastrados</title>
</head>

<body>
    <center><h2>Receitas Cadastrados</h2></center>

    <?php
    include __DIR__ . '/../conf/DB.php';
    $dados = read("Select * from receita");
    ?>

    <?php foreach ($dados as $a) {  ?>

        <div style="margin-bottom:20px; padding: 20px; border-bottom: 1px solid lightgray; display: block; text-align: justify;">

            <h3 style="color: pink"><?php echo "Nome do Receita: #"; ?> <?php echo $a['nome']; ?></h3>
            
            <p>
                <label>
                    Ingredientes: <span style="color: green"><?php echo $a['ingredientes']; ?></span>
                </label>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label>
                    Modo de Preparo: <span style="color: blue"><?php echo $a['modo_preparo']; ?></span>
                </label>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label>
                    Informacacao Adicional: <span style="color: blue"><?php echo $a['info_adicional']; ?></span>
                </label>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label>
                    Data da criacao: <span style="color: blue"><?php echo $a['data_criacao']; ?></span>
                </label>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label>
                    Data da Actualizacao: <span style="color: blue"><?php echo $a['data_actualizacao']; ?></span>
                </label>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

               
                
            </p>

            <p style="text-align: right;">

                <!-- <label style="color: blue"><a href="./edit.php?id=<?php echo $a['id']; ?>">Actualizar</a></label>
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