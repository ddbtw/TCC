<?php
    session_start();
    
    if(isset($_POST['submit']) && !empty($_POST['num_ape']) && !empty($_POST['senha']) && !empty($_POST['tipo']))
    {
        //acessa 
        include_once('conexão.php');
        $num_ape = $_POST['num_ape'];
        $senha = $_POST['senha'];
        $tipo = $_POST['tipo']

        $sql = "SELECT * FROM `login` WHERE num_ape = '$num_ape' and senha = '$senha'";
        $result = $conn->query($sql);

       if(mysqli_num_rows($result) < 1)
       {
        unset($_SESSION['num_ape']);
        unset($_SESSION['senha']);
        unset($_SESSION['tipo']);
        echo '<script type="text/javascript">'; 
        echo 'alert("Usuário ou senha incorreto");'; 
        echo 'window.location.href = "login.php";';
        echo '</script>';
            
        }}
       else
       {

        $sql1="SELECT * FROM login WHERE num_ape = '$num_ape'";
        

        $sql2 = "SELECT id FROM login WHERE num_ape = '$num_ape'";
        $result2 = $conn->query($sql2);
        $row = $result2->fetch_assoc();
        $_SESSION['id'] = $row['id'];

       
        $_SESSION['num_ape'] = $num_ape;
        $_SESSION['senha'] = $senha;
        

        $num_ape1 = $_SESSION['num_ape'];
        $senha12 = $_SESSION['senha'];
        $num_ape2 = "adm";
        $senha1 = "adm";
            if(($num_ape1 == $num_ape2) and ($senha12 == $senha1)){ 
                header('location: adm.php');
    }
    else
    {
        //não acessa   
        echo '<script type="text/javascript">'; 
        echo 'alert("Informe todos os campos!");'; 
        echo 'window.location.href = "login.php";';
        echo '</script>'; 
    }
       }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylelog.css">
    <title>Login</title>
</head>
<body>

    <div class="main-login">
        <div class="left-login">
            <h1>Faça seu login<br>Nosso time sentiu sua falta</h1>
            <img src="time.png" class="left-login-image" alt="Time Login">

        </div>
        <div class="right-login">
            <div class="card-login">
                <h1>Login</h1>
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
                <button class="btn-login">Login</button>
            </div>
        </div>
    </div>
</form>
</body>
</html>