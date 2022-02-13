document.getElementById("edit-user").onclick = function() {
    var elements = document.getElementsByClassName("input-change");

    // manually call Array.prototype.forEach on HTMLCollection
    Array.prototype.forEach.call(elements, test);

    // replace function expression with function declaration to hoist with value
    function test(element) {
        element.removeAttribute("disabled");
    }
    var form = document.getElementById("account-info");
    var input = document.createElement('input');
    input.type = 'submit';
    input.value = 'Modifier';
    input.setAttribute("id", "send-info")

    //Password
    if (document.getElementById("password") != null) document.getElementById("password").remove();
    var inputPwd = document.createElement('input');
    inputPwd.setAttribute("id", "pwd");
    inputPwd.setAttribute("name", "pwd");
    inputPwd.placeholder = "Mot de passe actuel"
    inputPwd.name = "pwd";

    var inputNewPWd = document.createElement('input');
    inputNewPWd.setAttribute("id", "new-pwd");
    inputNewPWd.setAttribute("name", "new-pwd");
    inputNewPWd.placeholder = "Nouveau mot de passe";


    var inputConfirmNewPWd = document.createElement('input');
    inputConfirmNewPWd.setAttribute("id", "conf-new-pwd");
    inputConfirmNewPWd.setAttribute("name", "conf-new-pwd");
    inputConfirmNewPWd.placeholder = "Confirmer nouveau mot de passe"
        //Verif 
    var inputExist = document.getElementById('send-info');

    if (typeof(inputExist) == 'undefined' || inputExist == null) {
        if (document.getElementById("label-password") != null) {
            form.appendChild(inputPwd);
            form.appendChild(inputNewPWd);
            form.appendChild(inputConfirmNewPWd);
        }
        form.appendChild(input);
    }

};