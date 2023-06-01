<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Nova Encomenda</title>
</head>

<body>
    <h2>Nova Encomenda</h2>
    <?php include __DIR__ . '/../conf/DB.php'; ?>

    <?php
    $cliente = ''; // int
    $bolo = ''; //int
    $data_encomenda = ''; //date
    $data_entrega = ''; //date
    $endereco_entrega = ''; //text
    $contacto_entrega = ''; //text
    $valor_pagar = ''; //text
    $estado = ''; //estado da encomenda //pendente/concluido
    $forma_pagamento = ''; //text
    $estado_pagamento = ''; //text
    $data_pagamento = ''; //text


    ?>

    <form method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
        <!-- requere uma consulta -->
        <?php $dados = buscaCliente();
        ?>
        <p>
            <label>Selecione o Cliente</label><br>
            <select class="form-select" name="cliente" aria-label="Default select example" style="margin-bottom: 2%;" method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
                <?php if (count($dados) > 0) {
                    for ($i = 0; $i < count($dados); $i++) {
                        foreach ($dados[$i] as $k => $v) {
                            if ($k != "id") {
                                echo "<option>" . $v . "</option>";
                            }
                        }
                    }
                } ?>

            </select>

        </p>

        <!-- requere uma consulta -->
        <?php $dados = buscaBolo();
        ?>
        <p>
            <label>Selecione o Bolo</label><br>
            <select class="form-select" name="bolo" aria-label="Default select example" style="margin-bottom: 2%;" method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
                <?php if (count($dados) > 0) {
                    for ($i = 0; $i < count($dados); $i++) {
                        foreach ($dados[$i] as $k => $v) {
                            if ($k != "id") {
                                echo "<option>" . $v . "</option>";
                            }
                        }
                    }
                } ?>

            </select>

        </p>

        <p>
            <label>Escolha a Data de Entrega</label><br>
            <input type="date" name="data_entrega" class="field" value="<?php echo $data_entrega; ?>">
        </p>

        <p>
            <label>Endereço de Entrega</label><br>
            <input type="text" name="endereco_entrega" class="field" value="<?php echo $endereco_entrega; ?>">
        </p>


        <p>
            <label>Contacto de Entrega</label><br>
            <input type="number" name="contacto_entrega" class="field" value="<?php echo $tipo; ?>">

        </p>
        <h2>Dados do Pagamento da Encomenda</h2>

        <p>
            <label>Forma de Pagamento</label><br>
            <select class="form-select" name="forma_pagamento" aria-label="Default select example" style="margin-bottom: 2%;" method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
                <option selected>m-pesa</option>
                <option value="e-mola">e-mola</option>
                <option value="conta movel">conta movel</option>
                <option value="transferencia">tranferencia</option>
            </select>

        </p>

        <p>
            <label>Estado do Pagamento</label><br>
            <select class="form-select" name="estado_pagamento" aria-label="Default select example" style="margin-bottom: 2%;" method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
                <option selected>Pendente</option>
                <option value="Pago">Pago</option>
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

        $b = buscaridBolo($_POST['bolo']);
        $a = buscaridCli($_POST['cliente']);
        $c = buscarPreco($_POST['bolo']);
        $data =  date('Y-m-d');
        $e = "pendente";
        $f  = " ";


        if ( $_POST['estado_pagamento'] == "Pago") {
            $e = "concluido";
            $f = date('Y-m-d');
        }


        $cliente = "$a"; // int
        $bolo = "$b"; //int
        $data_encomenda = $data;
        $data_entrega = $_POST['data_entrega'];
        $endereco_entrega = $_POST['endereco_entrega'];
        $contacto_entrega = $_POST['contacto_entrega'];
        $valor_pagar = "$c"; //text
        $estado = $e; //estado da encomenda //pendente/concluido
        $forma_pagamento = $_POST['forma_pagamento']; //text
        $estado_pagamento = $_POST['estado_pagamento']; //text
        $data_pagamento = $f;

        // echo " O cliente ". $_POST['cliente'] . " tem como id $cliente e  O Bolo ". $_POST['bolo'] . " tem como id $bolo e Preco e $valor_pagar , <br>"; 
        // var_dump($_POST);


       $sql = "INSERT INTO encomenda (cliente, bolo, data_encomenda, data_entrega, endereco_entrega, contacto_entrega, valor_pagar, estado, forma_pagamento , estado_pagamento, data_pagamento) 
        VALUES (:cliente, :bolo, :data_encomenda, :data_entrega, :endereco_entrega, :contacto_entrega, :valor_pagar, :estado, :forma_pagamento , :estado_pagamento, :data_pagamento)";
        $dados = [
            'cliente' => $cliente,
            'bolo' => $bolo,
            'data_encomenda' => $data_encomenda,
            'data_entrega' => $data_entrega,
            'endereco_entrega' => $endereco_entrega,
            'contacto_entrega' => $contacto_entrega,
            'valor_pagar' => $valor_pagar,
            'estado' => $estado,
            'forma_pagamento' => $forma_pagamento,
            'estado_pagamento' => $estado_pagamento,
            'data_pagamento' => $data_pagamento
        ];

       create($sql, $dados);
       header('location: verEncomendas.php');
    }
    ?>
</body>

</html>