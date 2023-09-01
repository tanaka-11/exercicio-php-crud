function esconderMensagem() {
    var mensagem = document.getElementById("mensagem-sucesso");
    if (mensagem) {
        mensagem.style.display = "none";
    }
    var botao = document.getElementById("botao-sucesso");
    if (botao) {
        botao.style.display = "none";
    }
}