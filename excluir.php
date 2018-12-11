<?php
session_start();
if(!isset($_SESSION['logado']) || !isset($_SESSION['usuario'])){
  header("location:index.php?aviso=url");
}
// fazendo a exclusão no banco

if(isset($_GET['id_cont'])){
    include 'inc/conecta.php';
    $id_cont = $_GET['id_cont'];
    $sql = 'delete from contatos where id_cont = ?';
    $stm = $conn->prepare($sql);
    $stm->bind_param('i',$id_cont);
    $stm->execute();
    header("Location:gerenciar.php");
}
?>