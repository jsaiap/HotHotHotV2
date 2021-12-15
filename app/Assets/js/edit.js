document.getElementById("edit-user").onclick = function() {
    var zoive = document.getElementsByClassName("input-change");

            // manually call Array.prototype.forEach on HTMLCollection
    Array.prototype.forEach.call(zoive, test);

    // replace function expression with function declaration to hoist with value
    function test(element) {
        element.removeAttribute("disabled");
    }
    var form = document.getElementById("account-info");
    var input = document.createElement('input');
    var inputExist = document.getElementById('send-info');

    if(typeof(inputExist) == 'undefined' || inputExist == null){
        input.type = 'submit';
        input.setAttribute("id","send-info")
        form.appendChild(input);
    }
  
};