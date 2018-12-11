<?php

  // conecta banco de dados
  include 'inc/conecta.php';
  ########################################

  session_start();
  if(!isset($_SESSION['logado']) || !isset($_SESSION['usuario'])){
    header("location:index.php?aviso=url");
  }
  // fazendo alteração 

  if(isset($_POST['alterar'])){
    extract($_POST);

    $sql = "update contatos set 
            nome = ?,
            fone = ?,
            email = ?,
            sexo = ?,
            tipo = ?
            where id_cont = ?";

   $stm = $conn->prepare($sql);
   $stm->bind_param('sssssi',$nome,$fone,$email,$sexo,$tipo,$id);
   $stm->execute();  
   
   header("Location:gerenciar.php");

  }
##########################################

// verifica navegação veio da pagina gerenciar.php 
// pois essa pagina esta enviando a variavel get id_cont

if(isset($_GET['id_cont'])){
  $sql = "select * from contatos where id_cont=?";
  $stm = $conn->prepare($sql);
  $id = (int)$_GET['id_cont'];
  $stm->bind_param('i',$id);
  $stm->execute();
  $result = $stm->get_result();

  $resposta = $result->fetch_object();
  
}
##########################################
//insere cabecalho html
  include 'inc/header.php';
  include 'inc/menu.php';
?>
<div id="formulario">
  <form id="form1" name="form1" method="post" action="" class="pure-form pure-form-stacked">
    <p>&nbsp;</p>
    <table id="tabela">
      <tr>
        <th >Nome:</th>
        <td ><input type="text" name="nome" value="<?= $resposta->nome; ?>"></td>
      </tr>
      <tr>
        <th>Telefone: </th>
        <td><input type="text" name="fone" value="<?= $resposta->fone; ?>"></td>
      </tr>
      <tr>
        <th>email:</th>
        <td><input type="text" name="email" value="<?= $resposta->email; ?>"></td>
      </tr>
      <tr>
        <th >sexo: </th>
        <td>
          <label>
            <input type="radio" name="sexo" value="m" id="sexo_0"<?= ($resposta->sexo=='m')?("checked"):(NULL) ?>>
            Masculino</label>
          <label>
            <input type="radio" name="sexo" value="f" id="sexo_1" <?= ($resposta->sexo=='f')?("checked"):(NULL) ?>>
            Feminino</label>
          
        </td>
      </tr>
      <tr>
        <th>tipo: </th>
        <td><select name="tipo" id="tipo">
          <option value="par" <?= ($resposta->tipo=='par')?("selected"):(NULL) ?>>Particular</option>
          <option value="esc" <?= ($resposta->tipo=='esc')?("selected"):(NULL) ?>>Escola</option>
          <option value="fam" <?= ($resposta->tipo=='fam')?("selected"):(NULL) ?>>Familia</option>
          <option value="tra" <?= ($resposta->tipo=='tra')?("selected"):(NULL) ?>>Trabalho</option>
        </select></td>
      </tr>
      <tr>
        <td colspan="2"><input type="hidden" name="id" id="id" value="<?= $resposta->id_cont; ?>"></td>
      </tr>
      <tr>
        <td colspan="2">
          <input name="alterar" type="submit" id="alterar" value="Alterar" class="pure-button pure-button-primary">
        </td>
      </tr>
    </table>
  </form>
</div>
</body>
</html>
