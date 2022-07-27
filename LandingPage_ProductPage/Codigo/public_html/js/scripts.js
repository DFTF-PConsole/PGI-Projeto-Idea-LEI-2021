
/*
var tempo;
var n_clicks;


(function() {
    n_clicks = 0;
    tempo = + new Date();
    window.addEventListener("unload", event_unload);
    window.document.body.addEventListener("click", event_click, true);
})();
*/

function submit_email(email, form){
    var elementForm = document.getElementById(form).children[0];
    var elementWait = document.getElementById(form).children[1];
    var elementSuccess = document.getElementById(form).children[2];
    var elementError = document.getElementById(form).children[3];

    elementSuccess.className = "d-none";
    elementError.className = "d-none";
    elementWait.className = "";
    var params = 'TYPE=email&EMAIL=' + email;
    var xmlhttp;
    xmlhttp = new XMLHttpRequest();
    xmlhttp.open("POST", '/../php/index.php', true)
    xmlhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

    xmlhttp.onreadystatechange = function() {
        if(xmlhttp.readyState === 4 && xmlhttp.status === 200) {
            submit_email_response(form, xmlhttp.responseText, elementForm, elementWait, elementSuccess, elementError);
        } else {
            submit_email_response(form, "0Erro ao conectar com o servidor", elementForm, elementWait, elementSuccess, elementError);
        }
    }
    xmlhttp.send(params);
}

function submit_email_response(form, responseText, elementForm, elementWait, elementSuccess, elementError){
    elementWait.className = "d-none";

    if (responseText[0] === "0") {

        elementError.children[0].innerHTML = responseText.substring(1);
        elementError.className = "";
        elementSuccess.className = "d-none";
    } else {
        elementError.className = "d-none";
        elementSuccess.className = "";
    }
}

/*
function event_unload(){
    window.removeEventListener("unload", event_unload);

    var params = 'TYPE=analytics&CLICK=' + n_clicks + '&TEMPO=' + get_tempo();
    var xmlhttp;
    xmlhttp = new XMLHttpRequest();
    xmlhttp.open("POST", '/../php/index.php', true)
    xmlhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xmlhttp.send(params);
}


function event_click(){
    n_clicks++;
}

function get_tempo(){
    return (+ new Date()) - tempo;
}
*/
