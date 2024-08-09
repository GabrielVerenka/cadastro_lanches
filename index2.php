<?php
    include("conexao.php");

    if(!isset($_SESSION)){
        session_start();
    }
    
    if(isset($_POST['bt_senha'])){
        $senha = $_POST['bt_senha'];
        $rsenha = $_POST['bt_rsenha']; 

        $_SESSION["nome"] = $_POST['bt_nome'];

        if (isset($senha)){
            
            if($senha === $rsenha){
                /* Só vai executar os códigos abaixo
                se for VERDADEIRO. */ 
        
                
                $nome = $_POST['bt_nome'];
                $cpf = $_POST['bt_cpf'];
                $email =$_POST['bt_email'];
                $telefone =$_POST['bt_telefone'];
                $senha = $_POST['bt_senha'];
                
    
                 $mysqli->query("INSERT INTO clientes (nome, cpf, email, telefone, senha) values('$nome', '$cpf', '$email', '$telefone', '$senha')") or
                    die($mysqlierrno);
                
                
                //header("Location:banco.php"); /* Mudar de página */
                
         
            }else{
                
                /* else é o senão */
                /* Quando for falso executar os códigos
                abaixo: */
                $mensagem = "<div class='alert alert-danger mt-3'> Senha inválida </div>";
        
            }
        }
    }
     
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de clientes</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="meu_estilo.css">
</head>
<body>
    <div class="container text-center">
        <h1>Cadastro de clientes</h1>
    </div>
    <div class="container">
        <form action="" method="post">

            <label for="">Nome:</label>
            <input class="form-control" type="text" name="bt_nome">
           
            <label for="">CPF:</label>
            <input class="form-control" type="text" name="bt_cpf">

            <label for="">Email:</label>
            <input class="form-control" type="text" name="bt_email">
          
            <label for="">Telefone:</label>
            <input class="form-control" type="text" name="bt_telefone">


            <label for="">Senha:</label>
            <input class="form-control" type="password" name="bt_senha" required>

            <div class="mb-3">
                <label for="">Repetir Senha:</label>
                <input class="form-control" type="password" name="bt_rsenha" required>
            </div>
            

            <input class="btn btn-success" type="submit" value="Cadastrar">
            <input class="btn btn-danger" type="reset" value="Voltar">

            <?php

                if(isset($mensagem)){
                   
                    echo $mensagem;
                }
               
            ?>


        </form>
    </div>
    
</body>
</html>