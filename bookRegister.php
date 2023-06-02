<?php
session_start();
ob_start();


if (!isset($_SESSION['user_id'])) {
  $_SESSION['msg'] = "Precisa iniciar a Seccao como admin para cadastrar monografia";
  $_SESSION['ms'] = "bookRegister.php";

  header("Location: login.php");
}
?>



<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.rtl.min.css" integrity="sha384-DOXMLfHhQkvFFp+rWTZwVlPVqdIhpDVYT9csOnHSgWQWPX0v5MCGtjCJbY6ERspU" crossorigin="anonymous">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">
  <link rel="stylesheet" href="static/css/style.css">
  <link rel="shortcut icon" href="/static/images/icon.png" type="image/x-icon">

  <title>Book Register</title>
</head>

<body>

  <?php include __DIR__ . '/conf/DB.php'; ?>

  <?php
  $tema = ''; // int
  $nome = ''; // int
  $data_publicacao = ''; // int
  $estudante_id = ''; // int


  ?>

  <nav class="navbar navbar-expand-lg bg-dark"><?php include __DIR__ . '/div.php'; ?></nav>

  <div class="container mt-5 p-5 center bg-white shadow-lg" style="border: 1px dotted black;">
    <h4 class="text-center pb-4">Registro de nova Monografia</h4>
    <form class="col-md-4 offset-md-4" action="<?php $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
      <div class="mb-3">
        <label for="tema" class="form-label">Tema</label>
        <input type="text" class="form-control" name="tema" required>
      </div>

      <!-- requere uma consulta -->
      <?php $dados = buscaEstudante();
      ?>
      <div class="mb-3">
        <label>Selecione o Estudante</label><br>
        <select class="form-select" name="estudante" aria-label="Default select example" style="margin-bottom: 2%;" method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
          <option value="">Selecione</option>
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
      <label for="tema" class="">Carrege a Monografia em PDF</label>
      <div class="input-group mb-3 ">

        <input type="file" class="form-control" name="pdf_file" placeholder="pdf_file" required>

      </div>
      <center> <button type="submit" class="btn btn-primary">Submit</button></center>
    </form>
  </div>

  <div class="container">
    <p class="text-danger">NB: Voltando ao Home a Seccao expira</p>
  </div>

  <?php

  if ($_SERVER['REQUEST_METHOD'] == 'POST') {


    $a = buscarEstudanteId($_POST['estudante']);
    $b = date('Y-m-d');

    // Verifica se um arquivo foi enviado
    if (isset($_FILES['pdf_file']) && $_FILES['pdf_file']['error'] === UPLOAD_ERR_OK) {
      $file = $_FILES['pdf_file'];

      // Verifica se o arquivo é do tipo PDF
      if ($file['type'] === 'application/pdf') {
        $filename = $file['name'];
        $tmp_path = $file['tmp_name'];

        // Move o arquivo para o diretório desejado
        $upload_dir = 'upload'; // Substitua pelo caminho desejado
        $destination = $upload_dir . '/' . $filename;
        move_uploaded_file($tmp_path, $destination);

        // var_dump($_POST['estudante']);
        $a = buscarEstudanteId($_POST['estudante']);
        $b = date('Y-m-d');
        // var_dump($a);

        // Insere o nome do arquivo na base de dados
        $tema = $_POST['tema'];
        $nome = $filename;
        $data_publicacao = $b;
        $estudante_id = $a;

        var_dump($tema);
        echo "<br>";
        var_dump($estudante_id);
        echo "<br>";
        var_dump($data_publicacao);
        echo "<br>";
        var_dump($nome);
        echo "<br>";

        $sql = "INSERT INTO monografia (estudante_id, tema, data_publicacao, nome) 
            VALUES (:estudante_id, :tema, :data_publicacao, :nome)";
        $dados = [
          'estudante_id' => $estudante_id,
          'tema' => $tema,
          'data_publicacao' => $data_publicacao,
          'nome' => $nome
        ];

        create($sql, $dados);
        header('location: bookList.php');

        echo "Arquivo enviado com sucesso.";
      } else {
        echo '<script>';
        echo 'function saudacao() {';
        echo '  alert("Por favor carregue um ficheiro do tipo PDF");';
        echo '}';
        echo 'saudacao();'; // Chamar a função
        echo '</script>';
      }
    }
  }
  ?>



</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>

</html>