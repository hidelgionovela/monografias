<!doctype html>
<html lang="en" xmlns:th="https://www.thymeleaf.com">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.rtl.min.css"
    integrity="sha384-DOXMLfHhQkvFFp+rWTZwVlPVqdIhpDVYT9csOnHSgWQWPX0v5MCGtjCJbY6ERspU" crossorigin="anonymous">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">
  <link rel="stylesheet" href="./css/style.css">
  <link rel="shortcut icon" href="/images/icon.png" type="image/x-icon">

  <title>Book Register</title>
</head>

<body>

<?php include __DIR__ . '/conf/DB.php'; ?>

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

  <nav class="navbar navbar-expand-lg bg-dark" ><?php include __DIR__ . '/div.php'; ?></nav>

  <div class="container my-4 p-5 center" style="border: 1px dotted black;">
    <h4 class="text-center pb-4">Registro de nova Monografia</h4>
    <form class="col-md-4 offset-md-4" action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
      <div class="mb-3">
        <label for="name" class="form-label">Tema</label>
        <input type="text" class="form-control" name="name">
      </div>
      
      <!-- requere uma consulta -->
      <?php $dados = buscaEstudante();
        ?>
        <div class="mb-3">
            <label>Selecione o Estudante</label><br>
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

        </div>
      <div class="input-group mb-3 mt-3 pt-4">
        <input type="file" class="form-control" name="price" placeholder="Price">

      </div>
      <center> <button type="submit" class="btn btn-primary">Submit</button></center>
    </form>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"
    integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V"
    crossorigin="anonymous"></script>
</body>

</html>