document.getElementById('emailLogin').focus()

function fazerLogin() {

    var formLogin = document.getElementById('formLogin')
    var emailLogin = document.getElementById('emailLogin').value
    var senhaLogin = document.getElementById('senhaLogin').value
    var errorMsg = document.getElementById('erroMsg')
    if (emailLogin === '') {
        errorMsg.style.display = 'block'
        errorMsg.innerHTML = 'o Campo de email está vazio. Por favor, preencha o e-mail.'
        document.getElementById('emailLogin').focus()
        return
    }
    if (senhaLogin === '') {
        errorMsg.classList.remove('alert-success');
        errorMsg.classList.add('alert-danger');
        errorMsg.style.display = 'block'
        errorMsg.innerHTML = 'o Campo da senha está vazio.'
        document.getElementById('senhaLogin').focus()
        return
    } else {
        if (senhaLogin.length < 8) {
            errorMsg.style.display = 'block'
            errorMsg.classList.remove('alert-success');
            errorMsg.classList.add('alert-danger');
            errorMsg.innerHTML = 'A senha deve conter 8 digitos'
            return
        } else {
            errorMsg.style.display = 'none'

        }
    }

    mostrarProcessando();
    fetch('logar.php', {
        method: 'POST', headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        }, body: 'email=' + encodeURIComponent(emailLogin) + '&senha=' + encodeURIComponent(senhaLogin),
    })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                setTimeout(function () {
                esconderProcessando();
                    window.location.href = 'adm.php';

                }, 1000);
                errorMsg.classList.remove('alert-danger');
                errorMsg.classList.add('alert-success');
                errorMsg.innerHTML = data.message;
                errorMsg.style.display = 'block';
            } else {
                errorMsg.style.display = 'block';
                errorMsg.classList.remove('alert-success');
                errorMsg.classList.add('alert-danger');
                errorMsg.innerHTML = data.message;
            }
        })
        .catch(error => {
            console.error('Erro na requisição:', error);
        });

}

function mostrarProcessando() {
    var divProcessando = document.createElement('div')
    divProcessando.id = 'processandoDiv';
    divProcessando.style.position = 'fixed';
    divProcessando.style.top = '44%';
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


var verSenha = document.getElementById('verSenha')
var senhaExtenso = document.getElementById('senhaLogin')
verSenha.addEventListener('click', function () {
    if (senhaExtenso.type === "password") {
        document.getElementById("senhaLogin").type = "text";
        document.getElementById('verSenha').classList.add("mdi-eye");
        document.getElementById('verSenha').classList.remove("mdi-eye-off");
    } else {
        document.getElementById('verSenha').classList.add("mdi-eye-off");
        document.getElementById('verSenha').classList.remove("mdi-eye");
        document.getElementById("senhaLogin").type = "password";
    }

})




