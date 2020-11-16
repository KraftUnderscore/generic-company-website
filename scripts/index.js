
window.onload = function(){
    window.addEventListener("mousemove", getCursorXY, false);
    var answer = prompt("Chciałbyś się z nami skontaktować?","Nie");
    if(answer !== "Tak")
        removeContactInfo()

    window.addEventListener("scroll", movePicture,false)

    document.getElementById("title_name").addEventListener("click",insertIfNecessary,false)
}


function insertIfNecessary(e){
    let settings = document.getElementById("settings");
    if(settings == null){
        createSettings();
    }else{
        if(settings.style.display != "none"){
            settings.style.display = "none";
        }else{
            settings.style.display = "inline-flex";
        }
    }

}

function createSettings(){
    var settings = document.createElement("ul");
    settings.setAttribute("id","settings");

    node = document.createElement("h4");
    node.style.margin = "0";
    node.style.padding="0";
    node.appendChild(document.createTextNode("Settings"));
    settings.appendChild(node);
    settings.style.height = "2rem";
    settings.style.width = "100hv";
    child = document.createElement("li");
    child.addEventListener("click",changeFontTo1,false);
    child.appendChild(document.createTextNode("setting 1"));
    settings.appendChild(child);
    child = document.createElement("li");
    child.addEventListener("click",changeFontTo2,false);
    child.appendChild(document.createTextNode("setting 2"));
    settings.appendChild(child);
    child = document.createElement("li");
    child.addEventListener("click",changeFontTo3,false);
    child.appendChild(document.createTextNode("setting 3"));
    settings.appendChild(child);
    document.getElementById("title").appendChild(settings);
}
function changeFontTo1(e){
    document.getElementById("body").style.fontFamily = "'Roboto'";
}

function changeFontTo2(e){
    document.getElementById("body").style.fontFamily = "Big Shoulders Stencil Text";
}

function changeFontTo3(e){
    document.getElementById("body").style.fontFamily = "sans-serif";

}
function movePicture(e){
    scroll_position = Math.trunc(window.scrollY);
    picture = document.getElementById('partners_pic');
    picture.style.marginLeft = scroll_position.toString() + "px";
}

function getCursorXY(e) {
        pos_X = e.clientX
        pos_Y = e.clientY
        changeColor(pos_X,pos_Y)
}

function changeColor(pos_X,pos_Y){
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