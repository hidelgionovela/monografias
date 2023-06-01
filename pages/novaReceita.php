<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Nova Receita</title>
</head>

<body>
    <h2>Nova Receita</h2>
    <?php include __DIR__ . '/../conf/DB.php'; ?>

    <?php
    $nome = ''; // varchar
    $ingredientes = ''; //text
    $confeiteira_id = ''; //int
    $modo_preparo = ''; //mediotext
    $info_adicional = ''; //text
    $tipo = ''; //int
    // $data_criacao = ''; //date
    // $data_actualizacao = ''; //date

    ?>

    <form method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
        <p>
            <label>Nome</label><br>
            <input type="text" name="nome" class="field" value="<?php echo $nome; ?>">
        </p>

        <p>
            <label>Ingredientes</label><br>
            <input type="text" name="ingredientes" class="field" value="<?php echo $ingredientes; ?>">
        </p>

        <p>
            <label>Tipo</label><br>
            <input type="number" name="tipo" class="field" value="<?php echo $tipo; ?>">

        </p>



        <!-- requere uma consulta -->
        <?php $dados = buscaConfeiteiro();
        ?>
        <p>
            <label>Confeiteiro</label><br>
            <select class="form-select" name="id" aria-label="Default select example" style="margin-bottom: 2%;" method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
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
            <label>Modo de Preparo</label><br>
            <textarea class="field" name="modo_preparo" rows="3">
                <?php echo $modo_preparo; ?>
		    </textarea>

        </p>

        <p>
            <label>Informação Adicional</label><br>
            <textarea class="field" name="info_adicional" rows="3">
                <?php echo $info_adicional; ?>
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

        $a = buscaridConf($_POST['id']);
        $data =  date('Y-m-d');


        $nome = $_POST['nome'];
        $tipo = $_POST['tipo'];
        $confeiteira_id = $a;
        $ingredientes =  $_POST['ingredientes'];
        $modo_preparo =  $_POST['modo_preparo'];
        $info_adicional = $_POST['info_adicional'];
        $data_criacao = $data; 
        $data_actualizacao = $data;

        // echo "A confeiteira ". $_POST['id'] . " tem como id $confeiteira_id e hoje e $data";


        $sql = "INSERT INTO receita (nome, ingredientes, confeiteira_id, modo_preparo, info_adicional, tipo, data_criacao, data_actualizacao) VALUES (:nome, :ingredientes, :confeiteira_id, :modo_preparo, :info_adicional, :tipo, :data_criacao, :data_actualizacao)";
        $dados = [
            'nome' => $nome,
            'tipo' => $tipo,
            'confeiteira_id' => $confeiteira_id,
            'ingredientes' => $ingredientes,
            'modo_preparo' => $modo_preparo,
            'info_adicional' => $info_adicional,
            'data_criacao' => $data_criacao,
            'data_actualizacao' => $data_actualizacao
        ];

        create($sql, $dados);
        header('location: verReceita.php');
    }
    ?>
</body>

</html>