<?php

    $host = "localhost";
    $dbname = "controle_contas";
    $user = "root";
    $pass = "";

    try {
    
        $conn = new  PDO("mysql:host=$host;port=3264;dbname=$dbname", $user, $pass);
    
        //Ativar o mode de erros

        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);        
    } catch (PDOException $e) {
    
        //erro na conexão
    
        $error = $e->getMessage();
        echo "Erro: $error";
    }

?>