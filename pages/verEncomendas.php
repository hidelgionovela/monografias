<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Encomendas feitas</title>
</head>

<body>
    <center><h2>Encomendas Feitas</h2></center>

    <?php
    include __DIR__ . '/../conf/DB.php';
    $dados = read("Select * from encomenda");
    ?>

    <?php foreach ($dados as $a) {  ?>

        <div style="margin-bottom:20px; padding: 20px; border-bottom: 1px solid lightgray; display: block; text-align: justify;">

            <h3 style="color: red"><?php echo "Encomenda numero: #" . $a['id']; ?></h3>
            <h4>
                <?php $nome = buscarNomeBolo($a['bolo']) ?>
                <?php echo "Nome do Bolo: ". $nome; ?>
            </h4>
            <p>
                <label>
                    <?php $nome = buscarNomeCliente($a['cliente']) ?>
                    Nome do Cliente: <span style="color: green"><?php echo $nome; ?></span>
                </label>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label>
                    Data da Encomenda: <span style="color: blue"><?php echo $a['data_encomenda']; ?></span>
                </label>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label>
                    Data da Entrega: <span style="color: blue"><?php echo $a['data_entrega']; ?></span>
                </label>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label>
                    Preco do Bolo: <span style="color: blue"><?php echo $a['valor_pagar']; ?></span>
                </label>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label>
                    Estado da Encomenda: <span style="color: blue"><?php echo $a['estado']; ?></span>
                </label>
                <br>
               
                <label>
                    Endereco de Entrega: <span style="color: blue"><?php echo $a['endereco_entrega']; ?></span>
                </label>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label>
                    Contacto de Entrega: <span style="color: blue"><?php echo $a['contacto_entrega']; ?></span>
                </label>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label>
                    Forma de pagamento: <span style="color: blue"><?php echo $a['forma_pagamento']; ?></span>
                </label>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label>
                    Estado de pagamento: <span style="color: blue"><?php echo $a['estado_pagamento']; ?></span>
                </label>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label>
                    Data de pagamento: <span style="color: blue"><?php if( $a['data_pagamento'] == '0000-00-00'){echo "Ainda nao Efectuou o pagamento";}else{echo $a['data_pagamento'];} ?></span>
                </label>
                
            </p>

            <p style="text-align: right;">

                <label style="color: blue"><a href="./editarEncomenda.php?id=<?php echo $a['id']; ?>">Editar/Pagar</a></label>
                &nbsp;&nbsp;&nbsp;&nbsp;

                <label style="color: red">
                    <a href="./delete.php?id=<?php echo $a['id']; ?> ">Apagar</a></label>
                &nbsp;&nbsp;&nbsp;&nbsp;


            </p>
        </div>
    <?php } ?>

    <a href="../index.php" style="text-align: right">Voltar</a>
</body>

</html>