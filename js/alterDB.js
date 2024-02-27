const modalGenero = document.getElementById('modalcadastroGenero');
const botaoGenero = document.getElementById('btnAddGenero')
const idGenero = document.getElementById('nomeGeneroCadastro')
if (modalGenero) {
    const formGenero = document.getElementById('frmAddGenero')
    idGenero.value = 'pneumoultramicroscopicossilicovulcanoconiótico'
    modalGenero.addEventListener('shown.bs.modal', () => {
        idGenero.focus()
    })

}


