<?php
try {
	$conn = new PDO('mysql:host=localhost; dbname=bancopbo', 'root', '');
	$stmt = $conn-> query ('SELECT * FROM clientes');
	while ($linha = $stmt-> fetch(PDO::FETCH_ASSOC)) {
echo "Id: {$linha['id']} - Nome: {$linha['nome']} <br />";
	 } 

} catch(PDOException $e) {
	echo 'ERROR:' . $e->getMessage();
}
?>