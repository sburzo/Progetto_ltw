//id: close_rev all_rev secAjax
var btnAll = document.getElementById("all_rev");

btnAll.onclick = caricaAll;

function caricaClose(){
    var httpRequest = new XMLHttpRequest();  //CREO OGGETTO XHR !!

    httpRequest.onreadystatechange = gestisciRespAll;
    httpRequest.open("GET", "reviewsFirst.php", true);  //true => asincrona
    btnAll.innerHTML = "All the Reviews";
    
    httpRequest.send();
}
$(document).ready(function(){

    caricaClose();
});


function caricaAll(eve){
    var httpRequest = new XMLHttpRequest();  //CREO OGGETTO XHR !!

    httpRequest.onreadystatechange = gestisciRespAll;
    if(btnAll.innerHTML == "All the Reviews"){
        httpRequest.open("GET", "reviews.php", true);  //true => asincrona
        btnAll.innerHTML = "Show less";

    } else {
        httpRequest.open("GET", "reviewsFirst.php", true);  //true => asincrona
        btnAll.innerHTML = "All the Reviews";
    }
    
    httpRequest.send();
    
}

function gestisciRespAll(eve){
    if((eve.target.readyState == XMLHttpRequest.DONE) && (eve.target.status == 200)) {
            
        document.getElementById("secAjax").innerHTML= eve.target.responseText;      
    }
}

