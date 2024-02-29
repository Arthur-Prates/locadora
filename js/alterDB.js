const generoModalInstacia = new bootstrap.Modal(document.getElementById('modalcadastroGenero'))
const modalGenero = document.getElementById('modalcadastroGenero');
const formGenero = document.getElementById('frmAddGenero')
const idGenero = document.getElementById('nomeGeneroCadastro')
const botaoGenero = document.getElementById('btnAddGenero')
const AlertaCadastro = document.getElementById('AlertaCadastro')


modalGenero.addEventListener('shown.bs.modal', () => {
    idGenero.focus();
    const submitHandler = function (event) {
        event.preventDefault();
         botaoGenero.disabled = true;
         generoModalInstacia.hide();
        mostrarProcessando()
        const form = event.target;
        const formData = new FormData(form);

        formData.append('controle', 'generoAdd')

        fetch('controle.php', {
            method: 'POST',
            body: formData,
        })
            .then(response => response.json())
            .then(data => {
          
                if (data.success) {
                    AlertaCadastro.classList.remove('alert-danger');
                    AlertaCadastro.classList.add('alert-success');
                    AlertaCadastro.style.display = 'block';
                   AlertaCadastro.innerHTML= data.message;
                } else {
                    AlertaCadastro.classList.remove('alert-success');
                    AlertaCadastro.classList.add('alert-danger');
                    AlertaCadastro.style.display = 'block';
                    AlertaCadastro.innerHTML= data.message;
                }
            })
            .catch(error => {
                console.error('Erro na requisição:', error);
            });


    }
    formGenero.addEventListener('submit', submitHandler);
})

modalGenero.addEventListener('hidden.bs.modal', () => {
    botaoGenero.disabled = false;
    esconderProcessando()
})


function mostrarProcessando() {
    var divProcessando = document.createElement('div')
    divProcessando.id = 'processandoDiv';
    divProcessando.style.position = 'fixed';
    divProcessando.style.top = '30%';
    divProcessando.style.left = '50%';
    divProcessando.style.transform = 'translate(-50%, -50%)';
    divProcessando.innerHTML = '<img src="./img/spinnerLoop.gif"  width="70px" alt="Processando..." title="Processando..." >';
    document.body.appendChild(divProcessando);
}

function esconderProcessando() {
    var divProcessando = document.getElementById('processandoDiv')
    if (divProcessando) {
        document.body.removeChild(divProcessando);
    }
}