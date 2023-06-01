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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
  <link rel="stylesheet" href="static/css/style.css">
  <link rel="shortcut icon" href="static/images/icon.png" type="image/x-icon">

  <title>Book list</title>
</head>

<body>

  <nav class="navbar navbar-expand-lg bg-dark"><?php include __DIR__ . '/div.php'; ?></nav>

  <?php
  include __DIR__ . '/conf/DB.php';
  $dados = read("SELECT e.nome,e.curso,m.tema,m.data_publicacao,e.id,m.id,m.nome as mono FROM monografia m INNER JOIN estudante e on m.estudante_id = e.id");
  ?>
  <div class="container my-4 col-md-8">
    <table class="table table-striped table-hover">
      <thead class="table-dark">
        <tr>
          <th scope="col">Estudante</th>
          <th scope="col">Curso</th>
          <th scope="col">Tema</th>
          <th scope="col">Data da Publicacao</th>
          <th scope="col">Download</th>
          <!-- <th scope="col" class="text-center">Action</th> -->
        </tr>
      </thead>

      <tbody>
        <?php foreach ($dados as $a) {
          $diretorioDestino = 'upload/';

        ?>
          <tr>
            <td><?php echo $a['nome']; ?></td>
            <td><?php echo $a['curso']; ?></td>
            <td><?php echo $a['tema']; ?></td>
            <td><?php echo $a['data_publicacao']; ?></td>
            <td class="text-center"><a href="<?php echo $diretorioDestino . $a['mono']; ?>" download><i class="fa-solid fa-file-arrow-down"></i></a></td>
            <!-- <td class="text-center">
            <a href="" class="ms-2" title="Edit this Book" th:href="@{/edit_book/{id}(id=${b.id})}"><i
                class="fa-solid fa-pencil"></i></a>
            <a href="" class="" title="Delete This Book" style="color:red;" th:href="@{/deleteBook/{id}(id=${b.id})}"><i class="fa-solid fa-trash"></i></a>
          </td> -->
          </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</body>

</html>