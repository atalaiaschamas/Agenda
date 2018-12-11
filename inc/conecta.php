<?php


    // conectar com banco

    $host = 'localhost';
    $user = 'root';
    $pass = 'impacta';
    $bd = 'agenda';

    /*
    procedural sytle
    $conn = mysqli_connect($host,$user,$pass,$bd);
    */

    // forma de orientação objeto

    $conn = new Mysqli($host,$user,$pass,$bd);

    if($conn->connect_errno){
        echo "Ocorreu um erro na conexao com o banco de dados";
        exit;
    }
    $conn->set_charset('utf-8');
