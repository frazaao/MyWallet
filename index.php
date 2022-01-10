<?php

require_once('./config.php');
require_once('./helper.php');

$usuarioTeste = [
    "nome" => 'Admin',
    "login" => 'admin',
    "senha" => 12345,
    "tipo" => 'Admin'
];

?>
<script>
    if(localStorage.getItem('@mywallet')){
        window.location.href = '/cliente.php'
    }
</script>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyWallet</title>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;400&family=Pushster&family=Ubuntu&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="./styles/global.css">
    <link rel="shortcut icon" href="./images/My.png" type="image/x-icon">
</head>

<body>
    <main>
        <div class="presentation">
            <h1 class="mywallet">MyWallet</h1>
            <span>by</span>
            <div class="futuro-logo">
                <img src="./images/futuro-logo.svg" alt="Futuro Crédito">
                <h1>Futuro<br>Crédito</h1>
            </div>
        </div>
        <div class="division">

        </div>
        <div class="login">
            <form method="POST" action="./login.php">
                <label for="login">Login</label>
                <input type="text" name="login" id="login">
                <label for="password">Senha</label>
                <input type="password" name="password" id="password">

                <button type="submit" class="submit">Entrar</button>
            </form>
        </div>
    </main>
</body>

<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
<script>
    feather.replace()
</script>

</html>

