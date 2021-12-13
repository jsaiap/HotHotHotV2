function main() {

    //Recupere la page actuel
    let page = window.location.pathname.split("/").pop();
    console.log(page)

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
        default:
            break;
    }

    document.getElementById("sensors").onclick = function() {
        location.href = window.location.origin + `/panel`;

    };

    document.getElementById("account").onclick = function() {
        location.href = window.location.origin + `/panel/account`;

    };

    document.getElementById("profil-picture").onclick = function() {
        location.href = window.location.origin + `/panel/account`;

    };
    document.getElementById("settings").onclick = function() {
        location.href = window.location.origin + `/panel/parameter`;
    };

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