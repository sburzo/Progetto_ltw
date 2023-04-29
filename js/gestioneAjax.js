//id: close_rev all_rev secAjax
var btnAll = document.getElementById("all_rev");
var btnClose = document.getElementById("close_rev");

btnAll.onclick = caricaAll;
btnClose.onclick = caricaClose;

caricaClose();

function caricaAll(eve){
    var httpRequest = new XMLHttpRequest();  //CREO OGGETTO XHR !!
    httpRequest.prevTarget = eve.target;

    httpRequest.onreadystatechange = gestisciRespAll;
    httpRequest.open("GET", "../reviews.php", true);  //true => asincrona
    httpRequest.send();
    
}
function caricaClose(eve){
    var httpRequest = new XMLHttpRequest();  //CREO OGGETTO XHR !!
    //httpRequest.prevTarget = eve.target;

    httpRequest.onreadystatechange = gestisciRespClose;
    httpRequest.open("GET", "../reviewsFirst.php", true);  //true => asincrona
    httpRequest.send();
}

function gestisciRespAll(eve){
    if((eve.target.readyState == XMLHttpRequest.DONE) && (eve.target.status == 200)) {
            
        document.getElementById("secAjax").innerHTML= eve.target.responseText;      
    }
}

function gestisciRespAll(eve){
    if((eve.target.readyState == XMLHttpRequest.DONE) && (eve.target.status == 200)) {
            
        document.getElementById("secAjax").innerHTML= eve.target.responseText;      
    }
}