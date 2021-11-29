function main() {

    document.getElementById("sensors").onclick = function() {
        location.href = window.location.origin + `/panel`;
    };

    document.getElementById("account").onclick = function() {
        location.href = window.location.origin + `/panel/account`;
    };

    document.getElementById("settings").onclick = function() {
        location.href = window.location.origin + `/panel/parameter`;
    };

    document.getElementById("logout").onclick = logout;
    document.getElementById("close").onclick = closeMenu;
    document.getElementById("menu").onclick = openMenu;

}

function logout() {
    location.href = window.location.origin + `/home`;
}

function closeMenu() {
    document.getElementById("side-menu").style.display = "none";
    document.getElementById("close").style.display = "none";
}

function openMenu() {
    document.getElementById("side-menu").style.display = "flex";
    document.getElementById("close").style.display = "flex";
}

function openForm() {
    document.getElementById("form-box").style.display = "flex";
    document.getElementById("home").style.filter = "blur(6px)";
}

async function settings(node) {

    let settings;
    let style = document.getElementById("style");

    await fetch('/Assets/json/settings.json')
        .then(res => res.json())
        .then(json => {
            data = json.settings;
            settings = data;
        });

    let darkmodeBool = JSON.parse(settings.darkmode);
    if (darkmodeBool == true) {
        style.href = "/style/darkmode.css";
    }
}

main();

settings();