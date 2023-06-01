
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Apagar Encomenda</title>
</head>
<body>
	<?php include __DIR__ . '/../conf/DB.php'; ?>

	<?php 
		$id = $_GET['id'];
		
        delete("delete from encomenda where id = :id", ['id' => $id]);
		
		header('Location:verEncomendas.php'); 
		
	 ?>
 
</body>
</html>