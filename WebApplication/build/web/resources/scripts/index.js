window.onload = function () {
    window.addEventListener("mousemove", getCursorXY, false);

    window.addEventListener("scroll", movePicture, false)

    document.getElementById("title_name").addEventListener("click", insertIfNecessary, false)
}

function insertIfNecessary() {
    let settings = document.getElementById("settings");
    if (settings == null) {
        createSettings();
    } else {
        if (settings.style.display != "none") {
            settings.style.display = "none";
        } else {
            settings.style.display = "inline-flex";
        }
    }
}

function createSettings() {
    var settings = document.createElement("ul");
    settings.setAttribute("id", "settings");

    node = document.createElement("h4");
    node.style.margin = "0";
    node.style.padding = "0";
    node.appendChild(document.createTextNode("Settings"));
    settings.appendChild(node);
    settings.style.height = "2rem";
    settings.style.width = "100hv";
    child = document.createElement("li");
    child.addEventListener("click", changeFontTo1, false);
    child.appendChild(document.createTextNode("setting 1"));
    settings.appendChild(child);
    child = document.createElement("li");
    child.addEventListener("click", changeFontTo2, false);
    child.appendChild(document.createTextNode("setting 2"));
    settings.appendChild(child);
    child = document.createElement("li");
    child.addEventListener("click", changeFontTo3, false);
    child.appendChild(document.createTextNode("setting 3"));
    settings.appendChild(child);
    document.getElementById("title").appendChild(settings);
}

function changeFontTo1() {
    if (window.event.ctrlKey) {
        changeBackgroudColorOfCollection("#ffeaa7", document.getElementsByTagName("section"));
    } else {
        document.getElementById("body").style.fontFamily = "Roboto";
        changeCollections(1);
    }
}

function changeFontTo2() {
    if (window.event.ctrlKey) {
        changeBackgroudColorOfCollection("red", document.getElementsByTagName("section"));
    } else {
        document.getElementById("body").style.fontFamily = "Big Shoulders Stencil Text";
        changeCollections(2);
    }
}

function changeFontTo3() {
    if (window.event.ctrlKey) {
        changeBackgroudColorOfCollection("white", document.getElementsByTagName("section"));
    } else {
        document.getElementById("body").style.fontFamily = "sans-serif";
        changeCollections(3);
    }
}

function changeBackgroudColorOfCollection(color, collection) {
    for (item of collection)
        item.style.backgroundColor = color;
}

function changeCollections(type) {
    switch (type) {
        case 1:
            changeCollection(300, 200, "sans-serif");
            break;
        case 2:
            changeCollection(600, 400, "Roboto");
            break;
        case 3:
            changeCollection(1200, 800, "Big Shoulders Stencil Text");
            break;
    }
}

function changeCollection(w, h, font) {
    imgs = document.images;
    for (let i = 0; i < imgs.length; i++) {
        imgs[i].width = w;
        imgs[i].height = h;
    }

    anchors = document.links;
    for (let i = 0; i < anchors.length; i++) {
        anchors[i].style.fontFamily = font;
    }
}

function movePicture(e) {
    scroll_position = Math.trunc(window.scrollY);
    picture = document.getElementById('partners_pic');
    picture.style.marginLeft = scroll_position.toString() + "px";
}

function getCursorXY(e) {
    pos_X = e.clientX
    pos_Y = e.clientY
    changeColor(pos_X, pos_Y)
}

function changeColor(pos_X, pos_Y) {
    title_text = document.getElementById('title_name');
    pos_X = scaleXValue(pos_X)
    pos_Y = scaleYValue(pos_Y)
    title_text.style.color = "#00" + pos_X.toString(16) + pos_Y.toString(16);
}

function scaleXValue(value) {
    max_real_value = window.screen.width
    max_value = 255
    scaled_value = max_value * value / max_real_value
    return Math.trunc(scaled_value);
}

function scaleYValue(value) {
    max_real_value = window.screen.height
    max_value = 255
    scaled_value = max_value * value / max_real_value
    return Math.trunc(scaled_value);
}
