$('.cpfLogin').mask('000.000.000-00');
$('.cpfClienteCadastro').mask('000.000.000-00');
$('.cpfClienteUpdate').mask('000.000.000-00');

var options =  {
    onKeyPress: function(tell, e, field, options) {
        var masks = ['(00) 0 0000-0000', '(00) 0000-0000'];
        var mask = (tell.length<15) ? masks[1] : masks[0];
        $('.telefoneBR').mask(mask, options);
    }};

$('.telefoneBR').mask('(00) 0 0000-0000', options);


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




