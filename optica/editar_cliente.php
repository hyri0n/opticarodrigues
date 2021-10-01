<!DOCTYPE html>
<html>
<title>Oticas Rodrigues</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel='stylesheet' type='text/css' media='screen' href='style/w3.css'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<style>
  html,body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif};
</style>
<body class="w3-light-grey" onload='loadmodaledit()'>
  <!--Barra do topo-->
  <div class="w3-container w3-bar w3-top w3-teal w3-large" style="z-index:4">
    <button class="w3-bar-item w3-button w3-hide-large w3-hover-none w3-hover-text-light-grey" onclick="w3_open();"><i class="fa fa-bars"></i>  Menu</button>
    <span class="w3-bar-item w3-right" style="text-shadow:1px 1px 0 #444">Óticas Rodrigues</span>
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
    <a href="#" class="w3-bar-item w3-button w3-padding w3-teal"><i class="fa fa-users fa-fw"></i>  Clientes</a>
    <a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-cog fa-money"></i>  Mensalidades</a><br><br>
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
        $os = $_GET['editar'];
        $stmt = $conn-> prepare ('SELECT * FROM clientes WHERE os = :os');
        $stmt ->execute(array(':os' => $os));
        $linha = $stmt->fetch();
      ?>
          <div class="w3-modal-content w3-card-4 w3-animate-zoom w3-light-grey w3-border w3-round-large" style="max-width:600px">

            <div class="w3-center"><br>
              <span class="w3-button w3-xlarge w3-hover-red w3-round-large w3-display-topright" title="Close Modal"><a href="index.php">&times;</a></span>
              <img src="img/clientedit.png" alt="Avatar" style="width:25%" class="w3-circle w3-margin-top">
            </div>

            <form class="w3-container" action="acoes_cliente.php?editar=<?php echo $linha['os']; ?>" method="POST">
              <div class="w3-section">
                <label><b>OS</b></label>
                <input class="w3-input w3-border-grey w3-round-small w3-margin-bottom" type="text" placeholder="OS do Cliente" name="os" value="<?php echo $linha['os']; ?>">
                <label><b>Nome</b></label>
                <input class="w3-input w3-border-grey w3-round-small w3-margin-bottom" type="text" placeholder="Nome do Cliente" name="nome" value="<?php echo $linha['nome']; ?>">
                <label><b>CPF</b></label>
                <input class="w3-input w3-border-grey w3-round-small w3-margin-bottom" type="text" placeholder="CPF" name="cpf" pattern="[0-9]{3}.[0-9]{3}.[0-9]{3}-[0-9]{2}" value="<?php echo $linha['cpf']; ?>">
                <label><b>Endereço</b></label>
                <input class="w3-input w3-border-grey w3-round-small w3-margin-bottom" type="text" placeholder="Endereço" name="endereco" value="<?php echo $linha['endereco']; ?>">
                <label><b>Telefone</b></label>
                <input class="w3-input w3-border-grey w3-round-small" type="tel" placeholder="Telefone" name="telefone" pattern="[0-9]{5}-[0-9]{4}" value="<?php echo $linha['telefone']; ?>">
                <button class="w3-button w3-block w3-teal w3-section w3-padding" type="submit">Editar</button>
              </div>
            </form>

            <div class="w3-container w3-border-top w3-padding-16 w3-light-grey">
              <button type="button" class="w3-button w3-red">Cancel</button>
            </div>

            </div>
          </div>
        </div>

        <!--Modal Cadastrar-->
        <div id="id01" class="w3-modal">
          <div class="w3-modal-content w3-card-4 w3-animate-zoom w3-light-grey w3-border w3-round-large" style="max-width:600px">

            <div class="w3-center"><br>
              <span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-xlarge w3-hover-red w3-round-large w3-display-topright" title="Close Modal">&times;</span>
              <img src="img/clienteadd.png" alt="Avatar" style="width:25%" class="w3-circle w3-margin-top">
            </div>

            

            <div class="w3-container w3-border-top w3-padding-16 w3-light-grey">
              <button onclick="document.getElementById('id01').style.display='none'" type="button" class="w3-button w3-red">Cancel</button>
            </div>

            </div>
          </div>
        </div>

        <?php
        include_once "conexao.php";
        $stmt = $conn-> query ('SELECT * FROM clientes');
        ?>

        <div class="w3-container">
          <header class="w3-container w3-teal w3-round-small">
           <span><button onclick="document.getElementById('id01').style.display='block'" class="w3-btn w3-small w3-round-xxlarge w3-hover-teal"><i class="fa fa-plus-circle w3-large" style="color:white;" title="Adicionar Cliente"></i></button></span>
          </header>
          <div style="height:550px;overflow-y:scroll">
          <table class="w3-table-all w3-hoverable w3-card-4" style="height:300px">
            <thead>
              <tr class="w3-teal">
                <th>Id</th>
                <th>Nome</th>
                <th>CPF</th>
                <th>Endereço</th>
                <th>Telefone</th>
                <th class="w3-center">Editar</th>
                <th class="w3-center">Excluir</th>
              </tr>
            </thead>
          <?php
            while ($linha = $stmt-> fetch(PDO::FETCH_ASSOC)){
          ?>
              <tr>
                <td> <?php  echo $linha['os']; ?> </td>
                <td> <?php  echo $linha['nome']; ?> </td>
                <td> <?php  echo $linha['cpf']; ?> </td>
                <td> <?php  echo $linha['endereco']; ?> </td>
                <td> <?php  echo $linha['telefone']; ?> </td>
                <td class="w3-center"> <?php  echo "<a href=index.php?editar=".$linha['os']."><i class='material-icons' style='color:teal'>build</i></a>"; ?> </td>
                <td class="w3-center"> <?php  echo "<a href=acoes_cliente.php?del=".$linha['os']."><i class='material-icons' style='color:teal'>delete</i></a>"; }?> </td>
              </tr>
          </table>
          </div>
        </div>
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

    function loadmodaledit(){
        document.getElementById('id02').style.display = "block";
    }
  </script>
</body>
</html>