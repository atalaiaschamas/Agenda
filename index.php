<?php 
if(isset($_GET['aviso']) AND $_GET['aviso']=="tentou"){
	echo "<script language=\"JavaScript\" type=\"text/javascript\"> \n";
	echo "<!-- \n";
	echo "alert(\"\\tNão autorizado! \\n\\nUsuário e/ou senha incorretos\"); \n";
	echo "//--> \n";
	echo "</script> \n";
	
}
if(isset($_GET['aviso']) AND $_GET['aviso']=="url"){
	echo "<script language=\"JavaScript\" type=\"text/javascript\"> \n";
	echo "<!-- \n";
	echo "alert(\"\\t Área Restrita!!!! \\n\\nUsuario precisa ser autenticado\"); \n";
	echo "//--> \n";
	echo "</script> \n";
	
}
############################################################################################
if(isset($_COOKIE['lembrar'])){
  extract($_COOKIE);
}else{
  $login = null;
  $senha = null;
  $lembrar = null;
}
?><!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>

<link href="css/estilos.css" rel="stylesheet" type="text/css">

</head>

<body style="padding:50px;">

<form method="post" action="autentica.php" class="pure-form pure-form-stacked">
  <table  id="tabela" >
    <tr>
      <td >Usuario:</td>
      <td >
        <input type="text" name="login" value="<?=$login?>">
      </td>
    </tr>
    <tr>
      <td > Senha: </td>
      <td >
        <input type="password" name="senha" value="<?=$senha?>">
      </td>
    </tr>
    <tr>
      <td><label for="lembrar">Lembrar </label></td>
      <td ><input type="checkbox" name="lembrar" id="lembrar" <?=$lembrar?>>
     </td>
    </tr>
    <tr>
      <td colspan="2" class="centro">
        <input type="submit" name="autenticar" value="Login" class="pure-button pure-button-primary">
      </td>
    </tr>
  </table>
  
</form>

</body>
</html>


