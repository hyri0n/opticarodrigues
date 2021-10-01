<!DOCTYPE html>
<html>
<head>
	<title>Conexao</title>
</head>
<body>
	<?php
        //Conexão com o servidor
        try{
            $conn = new PDO('mysql:host=localhost;dbname=oticas_rodrigues', 'root', '');
            
        } catch(PDOException $e) {
            echo "Falha na Conexão com o Banco: " . $e->getMessage();
        }
	 ?>
</body>
</html>