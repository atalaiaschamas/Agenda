<?php
    // autenticando login no banco

    if(isset($_POST['autenticar'])){
        include 'inc/conecta.php';
        extract($_POST);
        $sql = "select * from usuarios where usuario = ? and senha = ?";
        $stm = $conn->prepare($sql);
        $stm->bind_param('ss',$login,$senha);
        $stm->execute();
        $stm->store_result();

        if($stm->num_rows == 1){
            session_start();
            $_SESSION['logado']=true;
            $_SESSION['usuario']=$_POST['login'];

            if(isset($_POST['lembrar'])){

                setcookie('login',$_POST['login'],time()+10000);
                setcookie('senha',$_POST['senha'],time()+10000);
                setcookie('lembrar','checked',time()+10000);

            }else{
                
                setcookie('login',$_POST['login'],null);
                setcookie('senha',$_POST['senha'],null);
                setcookie('lembrar','checked',null);
            }

            header("location:gerenciar.php?aviso=url");

        }else{

            header("location:index.php?aviso=tentou");
        }

    }else{
        header("location:index.php?aviso=url");
    }
