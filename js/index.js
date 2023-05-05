function validaform(){
    var data_in=new Date(document.check_avalaibility.data_in.value);
    var data_out=new Date(document.check_avalaibility.data_out.value);


    if(data_out<=data_in){
        alert("Check-Out date must be after Check-In");
        return false;
    }

    if(document.check_avalaibility.room.value=="deluxe_superior" &&
        parseInt(document.check_avalaibility.guest.value)>3){
            window.alert("Max number of guests for the selected Room is 3");
            return false;
    }
    if(document.check_avalaibility.room.value=="deluxe_presidential" &&
        parseInt(document.check_avalaibility.guest.value)>4){
            window.alert("Max number of guests for the selected Room is 4");
            return false;
    }
    if(document.check_avalaibility.room.value=="suite_ambassador" &&
        parseInt(document.check_avalaibility.guest.value)>4){
            window.alert("Max number of guests for the selected Room is 4");
            return false;
    }
    return true;
    

}

function verifica(){
    if(isNaN(document.ra_form.tel.value)){
        window.alert("Tel number: Format not valid");
        return false;
    }
}