<?php 

    require_once('./config.php');
    require_once('./helper.php');

    ?>
        <script src="./scripts/access.js"></script>
    <?php
    $userid = $_GET['id'];
    $localStorageId = "<script>document.write(id)</script>";

    $usuario = buscaUsuario($userid);
    $transacoes = listaTransacao($userid);
    $entradas = 0;
    $saidas = 0;
    foreach($transacoes as $transacao) : 
        if($transacao['tipo'] === 'Entrada'){
            $entradas = $entradas + $transacao['valor'];
        }else if($transacao['tipo'] === 'Saida'){
            $saidas = $saidas + $transacao['valor'];
        }
    endforeach;
    $total = $entradas - $saidas;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyWallet | Carteira de <?php echo $usuario['nome'] ?></title>
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
    <link rel="stylesheet" href="./styles/dashboard.css">
    <script src="./scripts/logout.js"></script>
    <link rel="shortcut icon" href="./images/My.png" type="image/x-icon">
</head>

<body>
    <header>
        <h1 class="mywallet">MyWallet</h1>
        <div class="right-header">
            <span>Olá <b><?php echo $usuario['nome'] ?></b>, essa é sua carteira</span>
            <nav class="navigation">
                <button class="nav-button new">Nova transação</button>
                <button class="nav-button logout" onclick="logout()">Logout</button>
            </nav>
        </div>
    </header>
    <main>
        <div class="display">
            <div class="box income">
                <span>Entrada</span>
                <span class="value-box">R$<?php echo $entradas ?></span>
            </div>
            <div class="box outcome">
                <span>Saida</span>
                <span class="value-box ">R$<?php echo $saidas ?></span>
            </div>
            <div class="box balance">
                <span>Saldo</span>
                <span class="value-box">R$<?php echo $total ?></span>
            </div>
        </div>

        <div class="transactions">
            <table>
                <thead>
                    <th>Titulo</th>
                    <th>Tipo</th>
                    <th>Descrição</th>
                    <th>Valor</th>
                </thead>
                <tbody>
                    <?php foreach($transacoes as $transacao): ?>
                    <tr>
                        <td><?php echo $transacao['titulo'] ?></td>
                        <td><?php echo $transacao['tipo'] ?></td>
                        <td><?php echo $transacao['descricao'] ?></td>
                        <td>R$<?php echo number_format( $transacao['valor'], 2, ',', '.' ) ?></td>
                    </tr>
                    <?php endforeach; ?>                    
                </tbody>
            </table>
        </div>
    </main>

    <div class="modal">
        <div class="content">
            <h1 style="text-align:center">Nova transação</h1>
            <form action="novaTransacao.php" method="POST">
                <label for="title">Titulo</label>
                <input type="text" name="title" required>
                <label for="type">Tipo</label>
                <div class="type">
                    <input type="radio" name="type" id="income" value="Entrada" checked="true">
                    <label for="income">Entrada</label>
                    <input type="radio" name="type" id="outcome" value="Saida">
                    <label for="outcome">Saída</label>
                </div>
                <label for="description">Descrição</label>
                <input type="text" name="description" required>
                <label for="value">Valor</label>
                <input type="text" name="value" required>
                <input type="hidden" name="userid" value="<?php echo $userid; ?>">

                <div class="buttons">
                    <button type="reset">Cancelar</button>
                    <button type="submit">Confirmar</button>
                </div>
            </form>
        </div>
    </div>
</body>

<script>
    feather.replace()
</script>

<script src="./scripts/modal.js"></script>

</html>