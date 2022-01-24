function main() {

    checkPage();
    initMenu();
}

function checkPage() {
    //Recupere la page actuel
    let page = window.location.pathname.split("/").pop();
    //Selectionne la page actuel dans le menu
    switch (page) {
        case 'panel':
            document.getElementById("sensors").classList.add("selected");
            break;
        case 'account':
            document.getElementById("account").classList.add("selected");
            break;
        case 'parameter':
            document.getElementById("settings").classList.add("selected");
            break;
        case 'users':
            document.getElementById("users").classList.add("selected");
            break;
        case 'documentation':
            document.getElementById("documentation").classList.add("selected");
            break;
        default:
            break;
    }
}

function initMenu() {

    // Tableau de redirection onclick clé valeur, id element : url 
    let onClickPages = {
        "sensors": "/panel",
        "account": "/panel/account",
        "profil-picture": "/panel/account",
        "settings": "/panel/parameter",
        "users": "/panel/users",
        "documentation": "/panel/documentation"
    }

    //Pour chaque button rediriger sur la page associer 
    Object.keys(onClickPages).forEach(key => {
        let obj = document.getElementById(key);
        if (obj != null) {
            obj.onclick = function() {
                location.href = window.location.origin + onClickPages[key];

            };
        }

    });

    document.getElementById("logout").onclick = logout;
    document.getElementById("close").onclick = closeMenu;
    document.getElementById("menu").onclick = openMenu;
}

async function logout() {
    const response = await fetch('/logout', {
        method: 'post'
    });
    onSignOut();
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
    document.getElementById("home").style.filter = "blur(40px)";
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