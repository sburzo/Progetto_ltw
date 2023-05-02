function validaform(){
    var data_in=new Date(document.check_avalaibility.data_in.value);
    var data_out=new Date(document.check_avalaibility.data_out.value);


    if(data_out<=data_in){
        alert("La data di check out è precedente alla data di check in");
        return false;
    }

    if(document.check_avalaibility.room.value=="deluxe_superior" &&
        parseInt(document.check_avalaibility.guest.value)>3){
            window.alert("In questa stanza il massimo numero di ospiti è 3");
            return false;
    }
    if(document.check_avalaibility.room.value=="deluxe_presidential" &&
        parseInt(document.check_avalaibility.guest.value)>4){
            window.alert("In questa stanza il massimo numero di ospiti è 4");
            return false;
    }
    if(document.check_avalaibility.room.value=="suite_ambassador" &&
        parseInt(document.check_avalaibility.guest.value)>4){
            window.alert("In questa stanza il massimo numero di ospiti è 4");
            return false;
    }
    return true;
    

}

function verifica(){
    if(isNaN(document.ra_form.tel.value)){
        window.alert("Formato numero di telefono non valido");
        return false;
    }
}