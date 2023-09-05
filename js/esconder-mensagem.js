function esconderMensagem() {
    var mensagem = document.getElementById("mensagem");
    if (mensagem) {
        mensagem.style.display = "none";
    }
    var botao = document.getElementById("botao");
    if (botao) {
        botao.style.display = "none";
    }
}