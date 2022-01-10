<?php

require_once('./config.php');

$login = $_POST['login'];
$senha = $_POST['password'];

$data = [
    'login' => $login,
    'senha' => $senha,
];

function validaSenha($data){
    $login = $data['login'];
    $senha = md5($data['senha']);

    global $pdo;

    $query = $pdo->prepare("SELECT * FROM `usuario` WHERE login LIKE ?");
    $query->execute(array($login));

    $result = $query->fetch();

    if($result['login'] === $login){
        if($result['senha'] == $senha){

            $_SESSION['logado'] = true;
            $_SESSION['id_usuario'] = $result['id'];            

            ?>

            <script>      
                async function createToken(){
                    const id = '<?php echo $result['id'] ?>';
                    const nome = '<?php echo $result['nome'] ?>';
                    const login = '<?php echo $result['login'] ?>';
                    const tipo = '<?php echo $result['tipo'] ?>';
                    const sessao = {
                        id: id,
                        nome: nome,
                        login : login,
                        tipo: tipo,
                    }

                    await localStorage.setItem('@mywallet', JSON.stringify(sessao));

                    if(tipo === 'Cliente'){
                        window.location.href = '/cliente.php?id=' + id;
                    }else if(tipo === 'Admin'){
                        window.location.href = '/admin.php?id=' + id;
                    }else{
                        alert("Usuário cadastrado não corresponde a nenhum tipo válido, contate um administrador!");
                        window.location='index.php';
                    }
                    
                }

                createToken();
                
            </script>

            <?php
            
        }else{
            ?>
                <script>
                    alert("Senha errada!");
                    window.location='index.php';
                </script>
            <?php
        }
    }else{
        ?>
            <script>
                alert("Usuário não encontrado!");
                window.location='index.php';
            </script>
        <?php
    }

}
validaSenha($data);