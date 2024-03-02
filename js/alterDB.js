function addcomSucesso() {
    let timerInterval;
    Swal.fire({
        title: "Adicionado com sucesso! <br> Atualizando Dados.",
        html: "Fechando em <b></b> ms.",
        timer: 3000,
        icon: "success",
        timerProgressBar: true,
        didOpen: () => {
            Swal.showLoading();
            const timer = Swal.getPopup().querySelector("b");
            timerInterval = setInterval(() => {

                timer.textContent = `${Swal.getTimerLeft()}`;
            }, 100);
        },
        willClose: () => {
            clearInterval(timerInterval);
        }
    }).then((result) => {
        /* Read more about handling dismissals below */
        if (result.dismiss === Swal.DismissReason.timer) {
            console.log("fechando..");
        }
    });
}

function addErro() {
    let timerInterval;
    Swal.fire({
        title: "Erro ao Adicionar <br> Tente Novamente.",
        html: "Fechando em <b></b> ms.",
        timer: 3000,
        icon: "error",
        timerProgressBar: true,
        didOpen: () => {
            Swal.showLoading();
            const timer = Swal.getPopup().querySelector("b");
            timerInterval = setInterval(() => {

                timer.textContent = `${Swal.getTimerLeft()}`;
            }, 100);
        },
        willClose: () => {
            clearInterval(timerInterval);
        }
    }).then((result) => {
        /* Read more about handling dismissals below */
        if (result.dismiss === Swal.DismissReason.timer) {
            console.log("fechando..");
        }
    });
}


const modalGenero = document.getElementById('modalcadastroGenero');

const idGenero = document.getElementById('nomeGeneroCadastro')
const botaoGenero = document.getElementById('btnAddGenero')
const AlertaCadastro = document.getElementById('AlertaCadastro')
modalGenero.addEventListener('shown.bs.modal', () => {

})


function abrirModalEdicao(genero, idgenero) {
    var inGeneroEdit = document.getElementById('nomeGeneroEdit')
    if (inGeneroEdit) {
        inGeneroEdit.focus()
    }
    inGeneroEdit.value = genero
    document.getElementById('idGeneroEdit').value = idgenero
    // abrirModalJs('modalEditGenero', 'A')
}


function abrirModalJs(id, inID, nomeModal, abrirModal = 'A', botao, addEditDel, inFocus, formulario) {
    const formDados = document.getElementById(`${formulario}`)
    const inputFocar = document.getElementById(`${inFocus}`);
    const ModalInstacia = new bootstrap.Modal(document.getElementById(`${nomeModal}`))
    if (abrirModal === 'A') {
        ModalInstacia.show();
        inputFocar.focus();

        if (inID !== false) {
            const inputid = document.getElementById(`${inID}`);
            inputid.value = id;

        }

        const submitHandler = function (event) {
            event.preventDefault();

            botao.disabled = true;

            mostrarProcessando()
            const form = event.target;
            const formData = new FormData(form);
            if (inID !== false) {
                formData.append('id', `${id}`)
            }
            formData.append('controle', `${addEditDel}`)

            fetch('controle.php', {
                method: 'POST', body: formData,
            })
                .then(response => response.json())
                .then(data => {

                    if (data.success) {
                        addcomSucesso();
                        // AlertaCadastro.classList.remove('alert-danger');
                        // AlertaCadastro.classList.add('alert-success');
                        // AlertaCadastro.style.display = 'block';
                        // AlertaCadastro.innerHTML = data.message;
                        setTimeout(function () {
                            esconderProcessando();
                            window.location.reload(true);
                        }, 3000);
                    } else {
                        addErro()
                        console.log(data)
                        console.log(data.message)
                        // AlertaCadastro.classList.remove('alert-success');
                        // AlertaCadastro.classList.add('alert-danger');
                        // AlertaCadastro.style.display = 'block';
                        // AlertaCadastro.innerHTML = data.message;
                        setTimeout(function () {
                            esconderProcessando();
                            window.location.reload(true);
                        }, 3000);
                    }
                })
                .catch(error => {

                    addErro()
                    setTimeout(function () {
                        esconderProcessando();
                        window.location.reload(true);
                    }, 3000);
                    console.error('Erro na requisição:', error);
                });


        }
        formDados.addEventListener('submit', submitHandler);


    } else {
        alert('nem abre')
        ModalInstacia.hide();
    }
    ;
}

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