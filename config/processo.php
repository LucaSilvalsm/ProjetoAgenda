<?php

 session_start();

 include_once("conexao.php");
 include_once("url.php");


$data = $_POST;
// MODIFICANDO NO BANCO 
if(!empty($data)){
    // criando contato

    if($data["type"] === "create"){

    $nome = $data["nome"];
    $telefone = $data["telefone"];
    $observacao = $data["observacao"];
      
   
    $query = "INSERT INTO contatos (nome, telefone, observacao) VALUES (:nome, :telefone, :observacao)";
        
    $stmt= $conn->prepare($query);
    $stmt->bindParam(":nome",$nome);
    $stmt->bindParam(":telefone",$telefone);
    $stmt->bindParam(":observacao",$observacao);

    try{

      $stmt->execute();
      $_SESSION["msg"] = "Contato Criado com Sucesso";

    }catch(PDOException $e){
        // erro na conexão
        $error = $e->getMessage();
        echo "Error: $error ";
    }




    } else if($data["type"] === "edit"){

        $nome = $data["nome"];
        $telefone = $data["telefone"];
        $observacao = $data["observacao"];
        $id = $data["id"];

        $query = "UPDATE contatos
                  SET nome = :nome, telefone = :telefone, observacao =:observacao 
                  WHERE id = :id ";

                $stmt = $conn->prepare($query);
                $stmt->bindParam(":nome",$nome);
                $stmt->bindParam(":telefone",$telefone);
                $stmt->bindParam(":observacao",$observacao);
                $stmt->bindParam(":id",$id);


                try{

                    $stmt->execute();
                    $_SESSION["msg"] = "Contato atualizado com Sucesso";
              
                  }catch(PDOException $e){
                      // erro na conexão
                      $error = $e->getMessage();
                      echo "Error: $error ";
                  }
              




    } else if($data["type"] === "delete"){

        $id = $data["id"];
        $query = "DELETE FROM contatos WHERE id = :id";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(":id",$id);
       
        

        try{

            $stmt->execute();
            $_SESSION["msg"] = "Contato deletado com Sucesso";
      
          }catch(PDOException $e){
              // erro na conexão
              $error = $e->getMessage();
              echo "Error: $error ";
          }
      



    }

// redirect HOME


    header("Location:" . $BASE_URL . "../index.php");

    

    // SELEÇÃO DE DADOS
} else {
    
 $id;
 if(!empty($_GET)){
    $id = $_GET["id"];
 }

 // retorna apenas um contato   
 if(!empty($id)){
// Utilizando o PDO 
    $query = "SELECT * FROM  contatos WHERE id = :id";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(":id",$id);
    $stmt->execute();
    $contatos = $stmt->fetch();

 } else {
     // retorna todos os contatos
 $contatos = [];

 $query = "SELECT * FROM contatos";



 $stmt = $conn->prepare($query);

 $stmt->execute();

 $contatos = $stmt->fetchAll();



 }

}

// fechando conexão com o banco

$conn = null;






















?>