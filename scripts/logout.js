function logout(){
    localStorage.removeItem('@mywallet');
    window.location.href = '/index.php';
}