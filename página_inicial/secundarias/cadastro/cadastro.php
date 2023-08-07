<?php
include('conexao.php');

if(isset($_POST['submit']) && !empty($_POST['num_ape']) && !empty($_POST['senha']) && !empty($_POST['tipo']))
{

    //cadastra
    $num_ape = $_POST['num_ape'];
    $senha = $_POST['senha'];
    $tipo = $_POST['tipo'];


    $sql = "SELECT * FROM `cadastro` WHERE num_ape = '$num_ape' and senha = '$senha'";
    $result = $conn->query($sql);


    if(mysqli_num_rows($result) < 1)
    {

        $sql_dados = "INSERT INTO cadastro (num_ape, senha, tipo,) VALUES ('$num_ape', '$senha', '$tipo')";

        echo $sql_dados;
        mysqli_query($conn, $sql_dados);
        if(mysqli_affected_rows($conn) > 0) {
            echo '<script type="text/javascript">';
            echo 'alert("Cadastro concluido com sucesso!");';
            echo 'window.location.href = "cadastro.php";';
            echo '</script>';

        }
        mysqli_close($conn);
    }
    else
    {
        mysqli_close($conn);
            echo '<script type="text/javascript">';
            echo 'alert("Esse código já foi cadastrado!");';
            echo 'window.location.href = "cadastro.php";';
            echo '</script>';
    }
 }
 else
 {
     //não cadastra
     mysqli_close($conn);

        echo '<script type="text/javascript">';
        echo 'alert("Informe todos os campos!");';
        echo 'window.location.href = "cadastro.php";';
        echo '</script>';
 }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylecad.css">
    <title>Cadastro</title>
</head>
<body>
    <form action="cadastro.php" method="POST">
    <div class="main-login">
        <div class="left-login">
            <h1>É novo por aqui?<br>Faça seu cadastro e entre para o nosso time</h1>
            <img src="cad.png" class="left-login-image" alt="Time Cadastro">

        </div>
        <div class="right-login">
            <div class="card-login">
                <h1>Cadastro</h1>
                <form action="" method="POST">
                <div class="textfield">
                    <label for="usuario">Número apartamento</label>
                    <input type="text" name="usuario" placeholder="Usuário">
                </div>
                <div class="textfield">
                    <label for="senha">Senha</label>
                    <input type="password" name="senha" placeholder="Senha">
                </div>
                <div class="textfield">
                    <label for="senha">Tipo</label>
                    <input type="text" name="tipo" placeholder="Tipo">
                </div>
               
                <button class="btn-login">Cadastre-se</button>
            </div>
        </div>
    </div>
</form>
</body>
</html>