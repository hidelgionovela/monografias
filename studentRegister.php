<?php
session_start();
ob_start();


if (!isset($_SESSION['user_id'])) {
  $_SESSION['msg'] = "Precisa iniciar a Seccao como admin para cadastrar estudante";
  $_SESSION['ms'] = "studentRegister.php";
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

  <title>Student Register</title>
</head>

<body>

  <?php include __DIR__ . '/conf/DB.php'; ?>

  <?php
  $curso = ''; // int
  $nome = ''; // int
  $codigo = ''; // int
  $genero = ''; // int


  ?>

  <nav class="navbar navbar-expand-lg bg-dark"><?php include __DIR__ . '/div.php'; ?></nav>

  <div class="container mt-4 p-4 center bg-white shadow-lg" style="border: 1px dotted black;">
    <h4 class="text-center pb-4">Registro de Estudante</h4>
    <form class="col-md-4 offset-md-4" action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
      <div class="mb-3">
        <label for="nome" class="form-label">Nome</label>
        <input type="text" class="form-control" name="nome" required>
      </div>

      <div class="mb-3">
        <label for="curso" class="form-label">Curso</label>
        <input type="text" class="form-control" name="curso" required>
      </div>

      <div class="mb-3">
        <label for="curso" class="form-label">Codigo</label>
        <input type="text" class="form-control" name="codigo" required>
      </div>

      <div class="mb-3">
        <label>Selecione o genero</label><br>
        <select class="form-select" name="genero" aria-label="Default select example" style="margin-bottom: 2%;" method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
          <option value="">Selecione</option>
          <option value="Masculino">Masculino</option>
          <option value="Femenino">Femenino</option>
        </select>

      </div>


      <center> <button type="submit" class="btn btn-primary">Submit</button></center>
    </form>
  </div>
  <div class="container">
    <p class="text-danger">NB: Voltando ao Home a Seccao expira</p>
  </div>

  <?php

  if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  
    $curso =  $_POST['curso'];
    $nome = $_POST['nome'];
    $codigo = $_POST['codigo'];
    $genero =  $_POST['genero'];


    $sql = "INSERT INTO estudante (nome,curso,codigo,genero) 
            VALUES (:nome,:curso,:codigo,:genero)";
    $dados = [
      'nome' => $nome,
      'curso' => $curso,
      'codigo' => $codigo,
      'genero' => $genero
    ];

    create($sql, $dados);
    // header('location: index.php');


  }
  ?>



</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>

</html>