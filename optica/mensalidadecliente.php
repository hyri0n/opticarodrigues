<!DOCTYPE html>
<html>
<title>Oticas Rodrigues</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel='stylesheet' type='text/css' media='screen' href='style/w3.css'>
<link rel='stylesheet' type='text/css' media='screen' href='style/mystyle.css'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<style>
  html,body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif};
</style>
<body class="w3-light-grey">
  <!--Barra do topo-->
  <div class="w3-container w3-bar w3-top w3-teal w3-large" style="z-index:4">
    <button class="w3-bar-item w3-button w3-hide-large w3-hover-none w3-hover-text-light-grey" onclick="w3_open();"><i class="fa fa-bars"></i>  Menu</button>
    <span class="w3-bar-item w3-right" style="text-shadow:1px 1px 0 #444">Óptica Rodrigues</span>
  </div>

  <!-- Sidebar/menu -->
<nav class="w3-sidebar w3-collapse w3-white w3-animate-left" style="z-index:3;width:300px;" id="mySidebar"><br>
  <div class="w3-container w3-row">
    <div class="w3-col s4">
      <img src="img/mainavatar.png" class="w3-circle w3-margin-right" style="width:60px">
    </div>
    <div class="w3-col s8 w3-bar">
      <span><strong>Bem-Vindo</strong></span><br>
      <a href="#" class="w3-bar-item w3-button"><i class="fa fa-envelope"></i></a>
      <a href="#" class="w3-bar-item w3-button"><i class="fa fa-user"></i></a>
      <a href="#" class="w3-bar-item w3-button"><i class="fa fa-cog"></i></a>
    </div>
  </div>
  <hr>
  <div class="w3-container">
    <h5>Funcionalidades</h5>
  </div>
  <div class="w3-bar-block">
    <a href="#" class="w3-bar-item w3-button w3-padding-16 w3-hide-large w3-dark-grey w3-hover-black" onclick="w3_close()" title="close menu"><i class="fa fa-remove fa-fw"></i>  Close Menu</a>
    <a href="index.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-users fa-fw"></i>  Clientes</a>
    <a href="mensalidades.php" class="w3-bar-item w3-button w3-padding  w3-teal"><i class="fa fa-cog fa-money"></i>  Mensalidades</a><br><br>
  </div>
</nav>


<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

  <div class="w3-main" style="margin-top:3.5%;margin-left:300px">
    <div class="w3-container w3-round">
      <div class="w3-container">
      
      <!--Modal Editar-->
      <div id="id02" class="w3-modal">
        <?php
        session_start();
        include_once 'conexao.php';
        $id = $_GET['consultar'];
        $stmt = $conn-> prepare ('SELECT * FROM clientes WHERE id = :id');
        $stmt ->execute(array(':id' => $id));
        $linha = $stmt->fetch();
      ?>
          <div class="w3-modal-content w3-card-4 w3-animate-zoom w3-light-grey w3-border w3-round-large" style="max-width:600px">

            <div class="w3-center"><br>
              <span onclick="document.getElementById('id02').style.display='none'" class="w3-button w3-xlarge w3-hover-red w3-round-large w3-display-topright" title="Close Modal">&times;</span>
              <img src="img/clienteadd.png" alt="Avatar" style="width:25%" class="w3-circle w3-margin-top">
            </div>

            <form class="w3-container" action="acoes_cliente.php?editar=<?php echo $linha['id']; ?>" method="post">
              <div class="w3-section">
                <label><b>Nome</b></label>
                <input class="w3-input w3-border-grey w3-round-small w3-margin-bottom" type="text" placeholder="Nome do Cliente" name="nome" value="<?php echo $linha['nome']; ?>" required>
                <label><b>CPF</b></label>
                <input class="w3-input w3-border-grey w3-round-small w3-margin-bottom" type="text" placeholder="CPF" name="cpf" pattern="[0-9]{3}.[0-9]{3}.[0-9]{3}-[0-9]{2}" value="<?php echo $linha['cpf']; ?>" required>
                <label><b>Endereço</b></label>
                <input class="w3-input w3-border-grey w3-round-small w3-margin-bottom" type="text" placeholder="Endereço" name="endereco" value="<?php echo $linha['endereco']; ?>" required>
                <label><b>Telefone</b></label>
                <input class="w3-input w3-border-grey w3-round-small" type="tel" placeholder="Telefone" name="telefone" pattern="[0-9]{5}-[0-9]{4}" value="<?php echo $linha['telefone']; ?>" required>
                <button class="w3-button w3-block w3-teal w3-section w3-padding" type="submit">Editar</button>
              </div>
            </form>

            <div class="w3-container w3-border-top w3-padding-16 w3-light-grey">
              <button onclick="document.getElementById('id01').style.display='none'" type="button" class="w3-button w3-red">Cancel</button>
            </div>

            </div>
          </div>
        </div>
        <?php
        include_once "conexao.php";
        $os = $_GET['consultar'];
        $stmt = $conn-> prepare ('SELECT mensalidades.*, clientes.nome, clientes.cpf, clientes.endereco, clientes.telefone FROM mensalidades INNER JOIN clientes ON os = mensalidades.os_cliente WHERE os_cliente = :os ORDER BY mensalidades.validade DESC;');
        $stmt ->execute(array(':os' => $os));
        $linha = $stmt->fetch();
        ?>
        <!--Modal Cadastrar-->
        <div id="id01" class="w3-modal">
          <div class="w3-modal-content w3-card-4 w3-animate-zoom w3-light-grey w3-border w3-round-large" style="max-width:600px">

            <div class="w3-center"><br>
              <span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-xlarge w3-hover-red w3-round-large w3-display-topright" title="Close Modal">&times;</span>
              <img src="img/mensalidade.png" alt="Avatar" style="width:25%" class="w3-margin-top">
            </div>

            <form class="w3-container" action="acoes_mensalidade.php?cad=true" method="post">
              <div class="w3-section">
                <label><b>Valor</b></label>
                <input class="w3-input w3-border-grey w3-round-small w3-margin-bottom" type="number" step="0.01" placeholder="Valor da Mensalidade" name="valor" required>
                <label><b>Validade</b></label>
                <input class="w3-input w3-border-grey w3-round-small w3-margin-bottom" type="date" placeholder="Validade da Mensalidade" name="validade" pattern="[0-9]{2}-[0-9]{2}-[0-9]{4}" required>
                <label><b>Status</b></label>
                <select class="w3-select w3-border-grey w3-round-small w3-margin-bottom" name="status">
                    <option value="" disabled selected>Status da Mensalidade</option>
                    <option value="Pendente">Pendente</option>
                    <option value="Paga">Paga</option>
                    <option value="Expirada">Expirada</option>
                </select>
                <label><b>OS do Cliente</b></label>
                <select class="w3-select w3-border-grey w3-round-small" name="oscliente">
                    <?php
                    include_once "conexao.php";
                    $stmt = $conn-> query ('SELECT os,nome FROM clientes');
                    while ($linhashow = $stmt-> fetch(PDO::FETCH_ASSOC)){
                    ?>
                    <?php echo"<option readonly selected value='".$linhashow['os']."'>"; ?><?php echo $linhashow['os']." - ".$linhashow['nome']; echo "</option>";}; ?>
                </select>
                <button class="w3-button w3-block w3-teal w3-section w3-padding" type="submit">Cadastrar</button>
              </div>
            </form>

            <div class="w3-container w3-border-top w3-padding-16 w3-light-grey">
              <button onclick="document.getElementById('id01').style.display='none'" type="button" class="w3-button w3-red">Cancel</button>
            </div>

            </div>
          </div>
        </div>

        
        <div class="w3-container">
          <div class="w3-container w3-border w3-border-teal w3-teal">
            <h4><i class='material-icons' style='color:whitesmoke'>person</i> <?php  echo $linha['nome'];?> - <?php echo $linha['os_cliente'];?></h4>
          </div>
          <div class="w3-container w3-border w3-border-teal w3-white">
            <p><strong>CPF: </strong><?php echo $linha['cpf']?></p>
            <p><strong>Telefone: </strong><?php echo $linha['telefone']?></p>
            <p><strong>Endereço: </strong><?php echo $linha['endereco']?></p>
          </div>
        </div>
        <div class="w3-container">
          <header class="w3-container w3-teal w3-round-small">
           <span><i class="fa fa-money fa-fw"></i>  <strong class="w3-large">Mensalidades do Cliente</strong></span>
           <span><button onclick="document.getElementById('id01').style.display='block'" class="w3-btn w3-small w3-round-xxlarge w3-hover-teal"><i class="fa fa-plus-circle w3-large" style="color:white;" title="Adicionar Cliente"></i></button></span>
           <span><input type="text" id="myInputC" onkeyup="myFunctionShow()" placeholder="Buscar Por Data de Validade"></span>
           <!-- <span><select class="w3-select w3-teal w3-border-light-grey" id="procurapor" style="width:150px;">
           <option value="1" selected>Nome do cliente</option>
           <option value="2">Data de validade</option>
           </select></span> -->
          </header>
          <div style="height:550px;overflow-y:scroll">
          <table class="w3-table-all w3-hoverable w3-card-4" style="height:300px" id="myTable">
            <thead>
              <tr class="w3-teal">
                <th>Id</th>
                <th>Valor</th>
                <th>Validade</th>
                <th>Status</th>
                <th class="w3-center">Editar</th>
                <th class="w3-center">Excluir</th>
              </tr>
            </thead>
          <?php
            $os = $_GET['consultar'];
            $stmt = $conn-> prepare ('SELECT mensalidades.*, clientes.nome, clientes.cpf, clientes.endereco, clientes.telefone FROM mensalidades INNER JOIN clientes ON os = mensalidades.os_cliente WHERE os_cliente = :os ORDER BY mensalidades.validade DESC;');
            $stmt ->execute(array(':os' => $os));
            while ($linha = $stmt-> fetch(PDO::FETCH_ASSOC)){
          ?>
              <tr>
                <td> <?php  echo $linha['id']; ?> </td>
                <td>R$ <?php  echo $linha['valor']; ?> </td>
                <td> <?php  echo $linha['validade']; ?> </td>
                <td> <?php  echo $linha['statusmensalidade']; ?> </td>
                <td class="w3-center"> <?php  echo "<a href=editar_mensalidade.php?editar=".$linha['id']."><i class='material-icons' style='color:teal'>build</i></a>"; ?> </td>
                <td class="w3-center"> <?php  echo "<a href=acoes_mensalidade.php?del=".$linha['id']."><i class='material-icons' style='color:teal'>delete</i></a>";} ;?> </td>
              </tr>
          </table>
          </div>
        </div>
        <footer class="w3-container w3-padding-16 w3-teal w3-center" style="margin-top:5px; opacity:0,3;">
          <h4 style="text-shadow:1px 1px 0 #444">Óptica Rodrigues</h4>
          <h5 style="text-shadow:1px 1px 0 #444">Sistema de Administração</h3>
          <small>Por: João</small>
      </div>

    </div>
  </div>

  <script>
    // Get the Sidebar
    var mySidebar = document.getElementById("mySidebar");

    // Get the DIV with overlay effect
    var overlayBg = document.getElementById("myOverlay");

    // Toggle between showing and hiding the sidebar, and add overlay effect
    function w3_open() {
      if (mySidebar.style.display === 'block') {
        mySidebar.style.display = 'none';
        overlayBg.style.display = "none";
      } else {
        mySidebar.style.display = 'block';
        overlayBg.style.display = "block";
      }
    }

    // Close the sidebar with the close button
    function w3_close() {
      mySidebar.style.display = "none";
      overlayBg.style.display = "none";
    }

    function myFunctionShow() {
  // Declare variables
  var input, filter, table, tr, td, i, txtValue, selectoption, opcao, opcaotexto;
  input = document.getElementById("myInputB");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  selectoption = document.getElementById("procurapor");
  opcao = selectoption.value;

  // Loop through all table rows, and hide those who don't match the search query
  if (opcao == "1"){
    for (i = 0; i < tr.length; i++) {
      td = tr[i].getElementsByTagName("td")[5];
      if (td) {
        txtValue = td.textContent || td.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
          tr[i].style.display = "";
          tr[i].style.height = "40px";
        } else {
          tr[i].style.display = "none";
        }
      }
    }
  }else if(opcao == "2"){
  
    for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[2];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
        tr[i].style.height = "40px";
      } else {
        tr[i].style.display = "none";
      }
    }
    }
  }
    
}
  </script>
</body>
</html>