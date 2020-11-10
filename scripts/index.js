var pos_X;
var pox_Y;
window.onload = function(){
    window.addEventListener("mousemove", getCursorXY, false);
    var answer = prompt("Chciałbyś się z nami skontaktować?","Nie");
    if(answer !== "Tak")
        removeContactInfo()

    window.addEventListener("scroll", movePicture,false)
}

function movePicture(e){
    scroll_position = Math.trunc(window.scrollY);
    picture = document.getElementById('partners_pic');
    picture.style.marginLeft = scroll_position.toString() + "px";
}

function getCursorXY(e) {
        pos_X = e.clientX
        pos_Y = e.clientY
        changeColor()
}

function changeColor(){
    title_text =  document.getElementById('title_name');
    pos_X = scaleXValue(pos_X)
    pos_Y = scaleYValue(pos_Y)
    title_text.style.color = "#00"+pos_X.toString(16)+pos_Y.toString(16);
}

function scaleXValue(value){
    max_real_value = window.screen.width
    max_value = 255
    scaled_value = max_value*value/max_real_value
    return Math.trunc(scaled_value);
}

function scaleYValue(value){
    max_real_value = window.screen.height
    max_value = 255
    scaled_value = max_value*value/max_real_value
    return Math.trunc(scaled_value);
}


function removeContactInfo(){
    contact_info = document.getElementById('contact');
    contact_info.innerHTML = "";
}