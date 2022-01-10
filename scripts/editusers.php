<?php
    require_once('./config.php');
    require_once('./helper.php');

    $usuarios = listaUsuarios();
?>

<script>
    function handleUser(id){
        const modalEdit = document.querySelector('.modal-edit');
        modalEdit.classList.add('active');

        window.addEventListener('keydown', ({key}) => {
        key === 'Escape' ? modalEdit.classList.remove('active') : key;
        })

        const cancelButton = modalEdit.querySelector('button[type="reset"]')

        cancelButton.addEventListener('click', event => {
            modalEdit.classList.remove('active')
        })

        modalEdit.addEventListener('click', ({target}) => {
            target === modalEdit ? modalEdit.classList.remove('active') : target
        })

        let data = {};
        <?php 
            foreach($usuarios as $usuario) :
                print("
                    if(id ==" . $usuario['id'] . "){
                        let id = '" . $usuario['id'] . "'
                        let nome = '" . $usuario['nome'] . "'
                        let login = '" . $usuario['login'] . "'
                        let tipo = '" . $usuario['tipo'] . "'

                        data = {
                            id: id,
                            nome: nome,
                            login: login,
                            tipo: tipo,
                        }
                    }
                    ");
            endforeach;
        ?>

        const userid = modalEdit.querySelector('label[for="id"]');
        const userIdInput = modalEdit.querySelector('input[name="id"]');
        const name = modalEdit.querySelector('input[name="name"]');
        const typeClient = modalEdit.querySelector('input[value="Cliente"]');
        const typeAdmin = modalEdit.querySelector('input[value="Admin"]');
        const login = modalEdit.querySelector('input[name="login"]');
        const password = modalEdit.querySelector('input[name="password"]');

        userid.innerText = "Id: " + data.id;
        userIdInput.setAttribute('value', data.id);
        name.setAttribute('value', data.nome);
        login.setAttribute('value', data.login);

        if(data.tipo === "Admin"){
            typeAdmin.checked = true;
        }else{
            typeClient.checked = true;
        }


    }
</script>