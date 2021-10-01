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
                $stmt = $conn->prepare('INSERT INTO clientes (os,nome, cpf, endereco, telefone) VALUES (:os,:nome, :cpf, :endereco, :telefone)');
                $stmt->execute(array(
					':os' => $_POST['os'],
                    ':nome' => $_POST['nome'],
                    ':cpf' => $_POST['cpf'],
                    ':endereco' => $_POST['endereco'],
                    ':telefone' => $_POST['telefone']
                ));
                header('location:index.php');
            } catch (PDOException $ex) {
                echo 'ERROR' . $ex->getMessage();
            }
        }

        if(isset($_GET['del'])){
			try{
				$os = $_GET['del'];
				$stmt = $conn->prepare('DELETE FROM clientes WHERE clientes.os = :os');
				$stmt->bindParam(':os', $os);
				$stmt->execute();
				header('location:index.php');
			}catch(PDOException $ex){
				echo 'Error:' . $ex->getMessage();
			}
		}

        if(isset($_GET['editar'])){
			$oldos = $_GET['editar'];
			$os = $_POST['os'];
			$nome = $_POST['nome'];
			$cpf = $_POST['cpf'];
			$endereco = $_POST['endereco'];
			$telefone = $_POST['telefone'];
			try{
				$stmt = $conn->prepare('UPDATE clientes SET os=:os, nome=:nome, cpf=:cpf, endereco=:endereco, telefone=:telefone WHERE os = :oldos');
				$stmt->execute(array(
					':oldos' => $oldos,
					':os' => $os,
					':nome' => $nome,
					':cpf' => $cpf,
					':endereco' => $endereco,
					':telefone' => $telefone
				));
				header('location:index.php');
			}catch(PDOException $ex){
				echo 'Error:' . $e->getMessage();
			}
		}
    ?>
</body>
</html>
