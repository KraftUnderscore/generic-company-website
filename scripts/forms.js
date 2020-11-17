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
        function(){
            lastUpperNode = document.createElement("p");
            lastUpperNode.innerHTML = "+-+-+-+-+-+-+-+-+-+-+";
            lastLowerNode = document.createElement("p");
            lastLowerNode.innerHTML = "-+-+-+-+-+-+-+-+-+-+-";
            node.parentNode.insertBefore(lastUpperNode, node);
            node.parentNode.appendChild(lastLowerNode, node);
        })

    node.addEventListener("blur",
        function(){
            node.parentNode.removeChild(lastUpperNode);
            node.parentNode.removeChild(lastLowerNode);
        })
}

function addFormListener() {
    let form = document.getElementById('form');
    form.addEventListener('submit',
        function() {
            return confirm("Na pewno chcesz przesłać formularz?");
        })
    form.addEventListener('reset',
        function() {
            return confirm("Na pewno chcesz wyczyścić formularz?");
        })
}

window.onload = function() {
    init();
}