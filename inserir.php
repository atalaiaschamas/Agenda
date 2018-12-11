<?php
session_start();
if(!isset($_SESSION['logado']) || !isset($_SESSION['usuario'])){
  header("location:index.php?aviso=url");
}

if(isset($_POST['inserir'])){
  
  include 'inc/conecta.php';

  extract($_POST);
  $sql = "insert into contatos (nome,fone,email,sexo,tipo)values(?,?,?,?,?)";

  $stm = $conn->prepare($sql);
  $stm->bind_param('sssss',$nome,$fone,$email,$sexo,$tipo);
  $stm->execute();

  header("Location:gerenciar.php");
}

  include 'inc/header.php';
  include 'inc/menu.php';

?>
<div id="formulario">
  <form id="form1" name="form1" method="post" action="" class="pure-form pure-form-stacked">
    <p>&nbsp;</p>
    <table id="tabela">
      <tr>
        <th >Nome:</th>
        <td ><input type="text" name="nome"></td>
      </tr>
      <tr>
        <th>Telefone: </th>
        <td><input type="text" name="fone"></td>
      </tr>
      <tr>
        <th>email:</th>
        <td><input type="text" name="email"></td>
      </tr>
      <tr>
        <th >sexo: </th>
        <td>
          <label>
            <input type="radio" name="sexo" value="m" id="sexo_0">
            Masculino</label>
          <label>
            <input type="radio" name="sexo" value="f" id="sexo_1">
            Feminino</label>
          
        </td>
      </tr>
      <tr>
        <th>tipo: </th>
        <td><select name="tipo" id="tipo">
          <option value="par">Particular</option>
          <option value="esc">Escola</option>
          <option value="fam">Familia</option>
          <option value="tra">Trabalho</option>
        </select></td>
      </tr>
      <tr>
        <td colspan="2"><input type="hidden" name="id" id="id"></td>
      </tr>
      <tr>
        <td colspan="2">
          <input name="inserir" type="submit" id="inserir" value="Inserir" class="pure-button pure-button-primary">
        </td>
      </tr>
    </table>
  </form>
</div>
</body>
</html>
