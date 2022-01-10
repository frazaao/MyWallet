function validaEditUserForm(){
    const name = editUser.name;
    const type = editUser.type;
    const login = editUser.login;
    const password = editUser.password;
    const enviar = document.querySelector(".modal-edit form button[type='button']");
    let data = {
        name: name,
        type: type,
        login: login,
        password: password,
        enviar: enviar
    }
    editUser.addEventListener('submit', (event) => {
        if(name.value === ' ' || name.value === ''){
            name.focus();
            event.preventDefault();
        }
        if(type[0].checked === false && type[1].checked === false){
            alert('Selecione ao menos um tipo ao Usuario')
            event.preventDefault();
        }
        if(login.value === '' || login.value.includes(' ')){
            login.focus();
            event.preventDefault();
        }
    })    
}

function validaNewUserForm(){
    const name = newUser.name;
    const type = newUser.type;
    const login = newUser.login;
    const password = newUser.password;
    const enviar = document.querySelector(".modal form button[type='button']");
    let data = {
        name: name,
        type: type,
        login: login,
        password: password,
        enviar: enviar
    }
    newUser.addEventListener('submit', (event) => {
        if(name.value === ' ' || name.value === ''){
            name.focus();
            event.preventDefault();
        }
        if(type[0].checked === false && type[1].checked === false){
            alert('Selecione ao menos um tipo ao Usuario')
            event.preventDefault();
        }
        if(login.value === '' || login.value.includes(' ')){
            login.focus();
            event.preventDefault();
        }
    })    
}