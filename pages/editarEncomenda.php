<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Editar Evento</title>
</head>
<body>
	<h2>Editar Encomenda</h2>
	<?php include __DIR__. '/../conf/DB.php'; ?>

	<?php 
		$id = $_GET['id'];
		$dados = readOne("select * from encomenda where id = :id", ['id' => $id]);


        $data_entrega = $dados['data_entrega'];
        $contacto_entrega = $dados['contacto_entrega'];
        $endereco_entrega = $dados['endereco_entrega'];
       // $valor_pagar = $dados['nome'];
       // $estado = $dados['nome'];
        $forma_pagamento = $dados['forma_pagamento']; //text
        $estado_pagamento = $dados['estado_pagamento']; //text
        $data_pagamento = $dados['data_pagamento'];

     ?>  

		 
		

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
            <input type="number" name="contacto_entrega" class="field" value="<?php echo $contacto_entrega; ?>">

        </p>
        <!-- <h2>Dados do Pagamento da Encomenda</h2>

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

        </p> -->



        <hr>

        <p style="text-align: right">
            <input type="submit" value="Gravar">
        </p>
        <a href="../index.php" style="text-align: right">Voltar</a>
    </form>
	

	 <?php 
	 
	 	if ($_SERVER['REQUEST_METHOD']=='POST') {
           
      
        $data_entrega = $_POST['data_entrega'];
        $endereco_entrega = $_POST['endereco_entrega'];
        $contacto_entrega = $_POST['contacto_entrega'];
        // $forma_pagamento = $_POST['forma_pagamento']; //text
        // $estado_pagamento = $_POST['estado_pagamento']; //text
        // $e = "pendente";
        // $f  = " ";


        // if ( $_POST['estado_pagamento'] == "Pago") {
        //     $e = "concluido";
        //     $f = date('Y-m-d');
        // }

            $dados = [
            'data_entrega' => $data_entrega,
            'endereco_entrega' => $endereco_entrega,
            'contacto_entrega' => $contacto_entrega
            // 'forma_pagamento' => $forma_pagamento,
            // 'estado_pagamento' => $estado_pagamento,
            // 'estado' => $e,
            // 'data_pagamento' => $f

            ];
            
            update("update encomenda set data_entrega = :data_entrega, endereco_entrega = :endereco_entrega, contacto_entrega = :contacto_entrega WHERE id = :id", $dados);

	 		header('Location:verEncomendas.php');
	 	}
	 	
	  ?>
</body>
</html>