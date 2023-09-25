(function(win, doc) {
    'use strict';

    function confirmDel(event) {
        event.preventDefault(); // Correção: era event.preventDefult() e deve ser event.preventDefault()

        let token = doc.querySelector('input[name="_token"]').value; // Correção: era getElementsByName e deve ser querySelector para pegar o token

        if (confirm("Deseja mesmo apagar?")) {
            let ajax = new XMLHttpRequest();
            ajax.open("DELETE", event.target.parentElement.href); // Correção: era parentNote e deve ser parentElement

            ajax.setRequestHeader('X-CSRF-TOKEN', token);

            ajax.onreadystatechange = function() {
                if (ajax.readyState === 4) {
                    if (ajax.status === 200) {
                        win.location.href="books";
                    } else {
                        console.log("erro!");
                    }
                }
            };
            ajax.send();
        } else {
            return false;
        }
    }

    // Faz-se essa condição para que apenas os links com a classe 'js-del' sejam afetados
    if (doc.querySelector('.js-del')) {
        let btn = doc.querySelectorAll('.js-del'); // Seleciona todos os botões de deletar
        for (let i = 0; i < btn.length; i++) {
            btn[i].addEventListener('click', confirmDel, false);
        } // Coloca todos em loop e quando um na posição i for clicado chama confirmDel
    }
})(window, document);
