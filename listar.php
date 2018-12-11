<?php

// conexao ao banco de dados
  include 'inc/conecta.php';


 

 // consulta banco de dados
  $sql = "select * from contatos";

  $result =  $conn->query($sql);

 // insere cabecalho do html

  include 'inc/header.php';
  include 'inc/menu.php';
?>
<div >
    <div>
        
        
        
        <br /><br />
<table id="tabela" >
  <thead class="branco">
  
  <tr>
    <td>Identificação</td>
    <td >Nome</td>
    <td>telefone</td>
    <td>email</td>

    <td>sexo</td>
    <td>tipo</td>
    <td colspan="2">
   <a class="botao" href="inserir.php">Novo Contato</a>
   </td>
  </tr>
  </thead>
  
 <?php while($resposta = $result->fetch_object()):?>

<tr>
  <td><div align="center"><?=$resposta->id_cont; ?></div></td>
  <td><?=$resposta->nome; ?> </td>
  <td><?=$resposta->fone; ?></td>
  <td><?=$resposta->email; ?></td>
  <td><?=$resposta->sexo; ?></td>
  <td><?=$resposta->tipo; ?></td> 
  <td width="69"><div align="center"><a href="alterar.php?id_cont=<?=$resposta->id_cont; ?>">alterar</a></div></td>
  <td width="69"><div align="center"><a href="excluir.php?id_cont=<?=$resposta->id_cont; ?>">excluir</a></div></td>
</tr>

<?php endwhile; ?>
  </table>

	</div>
</div>
</body>
</html>
