<html>
<head>
    <title></tittle>
</head>
<body>
    <?php
        session_start();
        include_once "conexao.php";
        //Cadastro de Clientes
        if(isset($_GET['cad'])){
            try {
                $stmt = $conn->prepare('INSERT INTO mensalidades (valor, validade, statusmensalidade, os_cliente) VALUES (:valor, :validade, :statusmensalidade, :os_cliente)');
                $stmt->execute(array(
					':valor' => $_POST['valor'],
                    ':validade' => $_POST['validade'],
                    ':statusmensalidade' => $_POST['status'],
                    ':os_cliente' => $_POST['oscliente']
                ));
                header('location:mensalidades.php');
            } catch (PDOException $ex) {
                echo 'ERROR' . $ex->getMessage();
            }
        }

        if(isset($_GET['del'])){
			try{
				$id = $_GET['del'];
				$stmt = $conn->prepare('DELETE FROM mensalidades WHERE id = :id');
				$stmt->bindParam(':id', $id);
				$stmt->execute();
				header('location:mensalidades.php');
			}catch(PDOException $ex){
				echo 'Error:' . $ex->getMessage();
			}
		}

        if(isset($_GET['editar'])){
			$id = $_GET['editar'];
			$valor = $_POST['valor'];
			$validade = $_POST['validade'];
			$statusmensalidade = $_POST['status'];
			try{
				$stmt = $conn->prepare('UPDATE mensalidades SET valor=:valor, validade=:validade, statusmensalidade=:statusmensalidade WHERE id = :id');
				$stmt->execute(array(
					':id' => $id,
					':valor' => $valor,
					':validade' => $validade,
					':statusmensalidade' => $statusmensalidade
				));
				header('location:mensalidades.php');
			}catch(PDOException $ex){
				echo 'Error:' . $e->getMessage();
			}
		}
    ?>
</body>
</html>
