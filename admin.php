<?php 

    require_once('./config.php');
    require_once('./helper.php');
    require_once('./scripts/editusers.php');

    ?>
        <script src="./scripts/access.js"></script>
    <?php
    $userid = $_GET['id'];
    $localStorageId = "<script>document.write(id)</script>";

    $usuario = buscaUsuario($userid);
    $usuarios = listaUsuarios($userid);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyWallet | Central de <?php echo $usuario['nome'] ?></title>
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
    <link rel="stylesheet" href="./styles/admin.css">
    <script src="./scripts/logout.js"></script>
    <link rel="shortcut icon" href="./images/My.png" type="image/x-icon">
</head>

<body>
    <header>
        <h1 class="mywallet">MyWallet</h1>
        <div class="right-header">
            <span>Olá <b><?php echo $usuario['nome'] ?></b>, essa é sua central</span>
            <nav class="navigation">
                <button class="nav-button new">Novo usuario</button>
                <button class="nav-button logout" onclick="logout()">Logout</button>
            </nav>
        </div>
    </header>
    <main>
        <div class="users">
            <table>
                <thead>
                    <th>Id</th>
                    <th>Nome</th>
                    <th>Login</th>
                    <th>Tipo</th>
                    <th>Editar</th>
                </thead>
                <tbody>
                    <?php foreach($usuarios as $user): ?>
                    <tr>
                        <td><?php echo $user['id']; ?></td>
                        <td><?php echo $user['nome']; ?></td>
                        <td><?php echo $user['login']; ?></td>
                        <td><?php echo $user['tipo']; ?></td>
                        <td><button class="edit-button" data="<?php echo $user['id']; ?>" onclick="handleUser(<?php echo $user['id']; ?>)"><i data-feather="edit"></i></button></td>
                    </tr>
                    <?php endforeach; ?>                    
                </tbody>
            </table>
        </div>
    </main>

    <div class="modal">
        <div class="content">
            <h1 style="text-align:center">Novo usuário</h1>
            <form action="novoUsuario.php" method="POST" name="newUser">
                <label for="name">Nome</label>
                <input type="text" name="name" required>
                <label for="type">Tipo</label>
                <div class="type">
                    <input type="radio" name="type" id="client" value="Cliente" checked="true">
                    <label for="client">Cliente</label>
                    <input type="radio" name="type" id="admin" value="Admin">
                    <label for="admin">Admin</label>
                </div>
                <label for="login">Login</label>
                <input type="text" name="login" required>
                <label for="password">Senha</label>
                <input type="password" name="password" required>

                <div class="buttons">
                    <button type="reset">Cancelar</button>
                    <button onclick="validaNewUserForm()" type="submit">Confirmar</button>
                </div>
            </form>
        </div>
    </div>

    <div class="modal-edit">
        <div class="content">
            <h1 style="text-align:center">Editar usuário</h1>
            <form action="editarUsuario.php" method="POST" name="editUser">
                <label for="id">ID:</label>
                <input type="hidden" name="id" value="">
                <label for="name">Nome</label>
                <input type="text" name="name" required>
                <label for="type">Tipo</label>
                <div class="type">
                    <input type="radio" name="type" id="edit-client" value="Cliente">
                    <label for="edit-client">Cliente</label>
                    <input type="radio" name="type" id="edit-admin" value="Admin">
                    <label for="edit-admin">Admin</label>
                </div>
                <label for="login">Login</label>
                <input type="text" name="login" required>
                <label for="password">Senha</label>
                <input type="password" name="password" required>

                <div class="buttons">
                    <button type="reset">Cancelar</button>
                    <button onclick="validaForm()" type="submit">Confirmar</button>
                </div>
            </form>
        </div>
    </div>
</body>
<script src="./scripts/formVerifications.js"></script>
<script>
    feather.replace()
</script>

<script src="./scripts/modal.js"></script>

</html>