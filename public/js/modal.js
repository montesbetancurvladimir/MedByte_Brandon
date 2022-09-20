const abrirmodal = document.getElementById('abrirmodal')
const cerrarmodal= document.getElementById('cerrarmodal')
const modal_container = document.getElementById('modal_container')

abrirmodal.addEventListener('click', (e) => {
    e.preventDefault();
    modal_container.classList.add("modal-show")

})

cerrarmodal.addEventListener('click', (e) => {
    e.preventDefault();
    modal_container.classList.remove("modal-show")

})

