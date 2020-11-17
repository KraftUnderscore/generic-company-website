function init() {
    let ids = ['firstName', 'lastName', 'txtList', 'email', 'tel'];
    ids.forEach(addListenerToObject);
    addFormListener();
}

var lastUpperNode;
var lastLowerNode;

function addListenerToObject(id) {
    let node = document.getElementById(id);
    node.addEventListener("focus",
        function () {
            lastUpperNode = document.createElement("p");
            lastUpperNode.innerHTML = "+-+-+-+-+-+-+-+-+-+-+";
            hint = document.createElement("p");
            hint.classList.add('fill_hint');
            hint.innerHTML = chooseHintText(id);
            lastUpperNode.appendChild(hint);
            lastLowerNode = document.createElement("p");
            lastLowerNode.innerHTML = "-+-+-+-+-+-+-+-+-+-+-";
            node.parentNode.insertBefore(lastUpperNode, node);
            node.parentNode.appendChild(lastLowerNode, node);
        })

    node.addEventListener("blur",
        function () {
            node.parentNode.removeChild(lastUpperNode);
            node.parentNode.removeChild(lastLowerNode);
        })
}

function chooseHintText(id) {
    let out = "";
    switch (id) {
        case 'firstName':
            out = "(podaj swoje imię, np. Karol)";
            break;
        case 'lastName':
            out = "(podaj swoje nazwisko, np. Kowalski)";
            break;
        case 'txtList':
            out = "(należy wybrać jeden z podpowiadanych miesięcy)";
            break;
        case 'email':
            out = "(nazwa@twojadomena.pl)";
            break;
        case 'tel':
            out = "(### ### ###)";
            break;
    }
    return out;
}

function addFormListener() {
    let form = document.getElementsByTagName('form').item(0);
    form.addEventListener('submit',
        function () {
            return confirm("Na pewno chcesz przesłać formularz?");
        })
    form.addEventListener('reset',
        function () {
            return confirm("Na pewno chcesz wyczyścić formularz?");
        })
}

window.onload = function () {
    init();
}
