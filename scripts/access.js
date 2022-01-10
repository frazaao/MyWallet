const token = localStorage.getItem('@mywallet');
const tokenConverted = JSON.parse(token);

let id = document.location.search;
let path = document.location.pathname;

id = id.slice(id.indexOf('=')+1);
if(!path.includes(tokenConverted.tipo.toLowerCase())){
    window.location.href = '/'+tokenConverted.tipo.toLowerCase()+'.php?id=' + tokenConverted.id;
}
if(tokenConverted.id != id){
    if(tokenConverted.tipo == 'Cliente'){
        window.location.href = '/cliente.php?id=' + tokenConverted.id;
    }else if(tokenConverted.tipo == 'Admin'){
        window.location.href = '/admin.php?id=' + tokenConverted.id;
    }
}