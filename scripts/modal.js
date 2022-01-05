const modal = document.querySelector('.modal');
const callModal = document.querySelector('button.new');

localStorage.setItem('@myWalletLogin', JSON.stringify({
    login: 'teste',
    senha: '1234'
}))

callModal.addEventListener('click', event => {
    modal.classList.add('active')

    window.addEventListener('keydown', ({key}) => {
        key === 'Escape' ? modal.classList.remove('active') : key;
    })

    const cancelButton = document.querySelector('button[type="reset"]')

    cancelButton.addEventListener('click', event => {
        modal.classList.remove('active')
    })
})

modal.addEventListener('click', ({target}) => {
    target === modal ? modal.classList.remove('active') : target
})