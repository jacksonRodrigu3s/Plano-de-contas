<?php

    session_start();

    include_once("connection.php");
    include_once("url.php");

    /* SELECIONANDO SALDOS*/
    $query = "SELECT (sum(refsala) + sum(refadci)) as saldoReceita FROM receitas";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    $saldoReceita = $stmt->fetch();

    $query = "SELECT sum(dffvalr) as saldoDespesa FROM despesasfixas";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    $saldoDespesa = $stmt->fetch();

    /*VARIAVEIS AUXILIARES*/

    $saldoDespAux = $saldoDespesa['saldoDespesa'];
    $saldoDisponivel = $saldoReceita['saldoReceita'];

    $saldoRecAux = $saldoDisponivel;

    $saldoDisponivel = $saldoDisponivel - $saldoDespAux;

    if(($saldoRecAux - $saldoDespAux) >= 0){
        $saldoDespAux = 0;
    }else{
        echo " entrou";
        $saldoDisponivel = 0;
        $saldoDespAux = $saldoDespAux - $saldoRecAux;
    }
    /* ADCIONANDO DADOS*/

    $banco = $_POST;

    if(!empty($banco)){

    if($banco["type"] === "pagar"){

        $descricao = $banco["descricao"];
        $valor = $banco["valor"];
        $data = $banco["data"];

        $query = "INSERT INTO despesasfixas (dftdesc, dffvalr, dfddata) VALUES (:dftdesc, :dffvalr, :dfddata)";

        $stmt = $conn->prepare($query);
        $stmt->bindParam(":dftdesc", $descricao);
        $stmt->bindParam(":dffvalr", $valor);
        $stmt->bindParam(":dfddata", $data);

        try {
            $stmt->execute();
            $_SESSION["msg"] = "Despesa Adicionada com Sucesso!!!";
        } catch (PDOException $e) {
            
            $erro = $e->getMessage();
            echo "Erro: $error";

        }
    }else if($banco["type"] === "receber"){
        
        $descricao = $banco["descricao"];
        $salario = $banco["salario"];
        $adicionais = $banco["adicionais"];
        $data = $banco["data"];

        $query = "INSERT INTO receitas (retdesc, refsala, refadci, reddata) VALUES (:retdesc, :refsala, :refadci, :reddata)";

        $stmt = $conn->prepare($query);
        $stmt->bindParam(":retdesc", $descricao);
        $stmt->bindParam(":refsala", $salario);
        $stmt->bindParam(":refadci", $adicionais);
        $stmt->bindParam(":reddata", $data);


        try {
            $stmt->execute();
            $_SESSION["msg"] = "Receita Adicionada com Sucesso!!!";
        } catch (PDOException $e) {
            
            $erro = $e->getMessage();
            echo "Erro: $error";

        }
    }else if($banco["type"] === "editReceita"){
        
        $retdesc = $banco["retdesc"];
        $refsala = $banco["refsala"];
        $refadci = $banco["refadci"];
        $reddata = $banco["reddata"];
        $reicodg = $banco["reicodg"];

        $query = "UPDATE receitas 
                    SET retdesc = :retdesc, refsala = :refsala, refadci = :refadci, reddata = :reddata
                    WHERE reicodg = :reicodg";
        
        $stmt = $conn->prepare($query);

        $stmt->bindParam(":retdesc", $retdesc);
        $stmt->bindParam(":refsala", $refsala);
        $stmt->bindParam(":refadci", $refadci);
        $stmt->bindParam(":reddata", $reddata);
        $stmt->bindParam(":reicodg", $reicodg);

        try {
            $stmt->execute();
            $_SESSION["msg"] = "Contato alterado com sucesso!!!";
        } catch (PDOException $e) {
            //Erro na conexão

            $erro = $e->getMessage();
            echo "Erro: $error";
        }
    }else if($banco["type"] === "editDespesa"){
        $dftdesc = $banco["dftdesc"];
        $dffvalr = $banco["dffvalr"];
        $dfddata = $banco["dfddata"];
        $dficodg = $banco["dficodg"];

        $query = "UPDATE despesasfixas 
                    SET dftdesc = :dftdesc, dffvalr = :dffvalr, dfddata = :dfddata
                    WHERE dficodg = :dficodg";
        
        $stmt = $conn->prepare($query);

        $stmt->bindParam(":dftdesc", $dftdesc);
        $stmt->bindParam(":dffvalr", $dffvalr);
        $stmt->bindParam(":dfddata", $dfddata);
        $stmt->bindParam(":dficodg", $dficodg);

        try {
            $stmt->execute();
            $_SESSION["msg"] = "Contato alterado com sucesso!!!";
        } catch (PDOException $e) {
            //Erro na conexão

            $erro = $e->getMessage();
            echo "Erro: $error";
        }
        /*deletando Receita */
    }else if($banco["type"] === "delete-receita"){
        $reicodg = $banco["reicodg"];

        $query = "DELETE FROM receitas WHERE reicodg = :reicodg";

        $stmt = $conn->prepare($query);

        $stmt->bindParam(":reicodg", $reicodg);

        try {
            $stmt->execute();
            $_SESSION["msg"] = "Receita deletada com sucesso!!!";
        } catch (PDOException $e) {
            //Erro na conexão

            $erro = $e->getMessage();
            echo "Erro: $error";
        }
        /*deletando despesa*/
    }else if($banco["type"] === "delete-despesa"){
        $dficodg = $banco["dficodg"];

        $query = "DELETE FROM despesasfixas WHERE dficodg = :dficodg";

        $stmt = $conn->prepare($query);

        $stmt->bindParam(":dficodg", $dficodg);

        try {
            $stmt->execute();
            $_SESSION["msg"] = "Despesa deletada com sucesso!!!";
        } catch (PDOException $e) {
            //Erro na conexão

            $erro = $e->getMessage();
            echo "Erro: $error";
        } 
    }
        /* VOLTAR PARA A PAGINA INICIAL */
        header("Location:" . $BASE_URL . "../index.php");

    /*SELECIOANR DADOS*/    
    }else{
        /* SELECIONAR UM DADO*/ 
        
         $id;

        if(!empty($_GET)){
            $id = $_GET["id"];
        } 
        /* SELECIONANDO RECEITAS */
        if(!empty($id)){
            $query = "SELECT * FROM receitas WHERE reicodg = :reicodg";

            $stmt = $conn->prepare($query);

            $stmt->bindParam("reicodg", $id);

            $stmt->execute();

            $receita = $stmt->fetch();

           
        }
         /* SELECIONANDO DESPESAS */
        if(!empty($id)){
                $query = "SELECT * FROM despesasfixas WHERE dficodg = :dficodg";
    
                $stmt = $conn->prepare($query);
    
                $stmt->bindParam("dficodg", $id);
    
                $stmt->execute();
    
                $despesa = $stmt->fetch();
        }else{
            /* SELECIONAR TODOS OS DADOS DO BANCO DA TABELA RECEITA*/
            $receitas = [];

            /*select */

            $query = "SELECT * from receitas";
            $stmt = $conn->prepare($query);
            $stmt->execute();

            $receitas = $stmt->fetchAll();

            /* SELECIONAR TODOS OS DADOS DO BANCO DA TABELA DESPESA*/
            $despesas = [];

            /*select */

            $query = "SELECT * from despesasfixas";
            $stmt = $conn->prepare($query);
            $stmt->execute();

            $despesas = $stmt->fetchAll();
        }
    }
    
    //FECHAR CONEXÃO
    $conn = null;
?>