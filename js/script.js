$('.cpfClienteCadastro').mask('000.000.000-00');
$('.cpfClienteUpdate').mask('000.000.000-00');


function limparCookies() {
    // Obtém todos os cookies atuais
    var cookies = document.cookie.split(";");

    // Itera sobre os cookies e os exclui, definindo uma data de validade no passado
    for (var i = 0; i < cookies.length; i++) {
        var cookie = cookies[i];
        var igualPos = cookie.indexOf("=");
        var nome = igualPos > -1 ? cookie.substr(0, igualPos) : cookie;
        document.cookie = nome + "=; expires=Thu, 01 Jan 1970 00:00:00 GMT; path=/";
    }
    window.location.href = "login.php";
}


