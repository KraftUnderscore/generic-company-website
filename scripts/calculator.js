window.onload = function () {
    let button = document.getElementById("calcButton");

    if (button) {
        button.addEventListener("click", function () {
            doCalculation();
        });
    }
}

function calculateWorkTime() {
    let pages = parseInt(document.getElementById("pages").value);
    if (isNaN(pages)) {
        alert("Podana liczba stron nie jest liczbą całkowitą!");
    } else if (pages <= 0) {
        alert("Liczba stron musi być większa od zera!");
    } else {
        return pages * 10;
    }
    return -1;
}

function clamp(value, min, max) {
    return Math.min(Math.max(value, min), max);
}

function calculateMonthCost() {
    let income = parseFloat(document.getElementById("income").value);
    if (isNaN(income)) {
        alert("Podany dochód nie jest liczbą zmiennoprzecinkową!");
    } else if (income <= 0) {
        alert("Dochód musi być większy od zera!");
    } else {
        return clamp(income * 500, 5000, 1000000);
    }
    return -1;
}

function genRandomFloat(min, max) {
    return Math.random() * (max - min) + min;
}

function calculateTotalCost(workTime, monthCost) {
    return Math.floor(workTime / 160 * monthCost * genRandomFloat(0.95, 1.25));
}

function updatePage(workTime, monthCost, totalCost) {
    document.getElementById("workTime").innerHTML = workTime;
    document.getElementById("monthCost").innerHTML = monthCost;
    document.getElementById("totalCost").innerHTML = totalCost;
}

function sleep(ms) {
    return new Promise(resolve => setTimeout(resolve, ms));
}

async function animCalc(loops, duration) {
    let bar = "Przeliczam: ";
    document.getElementById("progressBar").innerHTML = bar;
    for (let i = 0; i < loops; i++) {
        await sleep(duration * 1000 / loops);
        bar += ".";
        document.getElementById("progressBar").innerHTML = bar;
    }
    document.getElementById("progressBar").innerHTML = "";
}

async function doCalculation() {
    workTime = calculateWorkTime()
    if (workTime == -1) return;
    monthCost = calculateMonthCost()
    if (monthCost == -1) return;
    totalCost = calculateTotalCost(workTime, monthCost);
    await animCalc(100, genRandomFloat(0.5, 1.5));
    updatePage(workTime, monthCost, totalCost);
}
