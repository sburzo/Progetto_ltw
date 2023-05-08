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
    //form di book.php
    
    if(isNaN(document.ra_form.tel.value)){
        window.alert("Tel number: Format not valid");
        return false;
    }

    let ps = document.ra_form.psw.value;
    let ps2 = document.ra_form.psw2.value;
    if(ps != '' || ps2 != ''){
        if(ps2 != ps){
            alert("passwords redigited is incorrect");
            return false;
        }
    }

    if(document.ra_form.exp.value == 'MM/YYYY'){
        alert("card Expiration not valid");
        return false;
    }
}

function verificaCvv(){
    let cvv = document.ra_form.cvv.value;
    if(cvv.length != 3 || isNaN(cvv)){
        alert("invalid CVV");
        return false;
    }
    return true; 
}
function verificaRetype(){
    let ps = document.ra_form.psw.value;
    let ps2 = document.ra_form.psw2.value;
    if(ps != '' || ps2 != ''){
        if(ps2 != ps){
            $("#psw2").text("Redigited password is incorrect");
            $("#psw1").text("Check password");
            $("#psw2").css("color", "red");
            $("#psw1").css("color", "red");
            return false;
        }
        
    }
    $("#psw2").text("");
    $("#psw1").text("");
    $("#psw2").css("color", "darkgreen");
}
function verificaRetype1(){
    let ps = document.ra_form.psw.value;
    let ps2 = document.ra_form.psw2.value;
    if(ps != '' || ps2 != ''){
        if(ps2 != ps){
            $("#psw2").text("Redigit the password here");
            $("#psw1").text("s");
            $("#psw2").css("color", "darkgreen");
            $("#psw1").css("visibility", "hidden");
            return false;
        }
       
    } 
    $("#psw2").text("");
    $("#psw1").text("");
    $("#psw1").css("visibility", "visible");
}
function verificaCarta(){
    let ncard = document.ra_form.carta.value;
    if((ncard.length < 16) || (isNaN(ncard))){
        alert("invalid card number");
        return false;
    }

    let amex =  /^3[0-9]*/.test(ncard);
    if(amex){
        $("#cardType").text("American Express");
        $("#cardType").css("color", "green");
        return true;
    }
    let visa = /^4[0-9]*/.test(ncard);
    if(visa){
        $("#cardType").text("VISA");
        $("#cardType").css("color", "green");
        return true;
    }
    let msc = /^5[0-9]*/.test(ncard);
    if(msc){
        $("#cardType").text("MasterCard");
        $("#cardType").css("color", "green");
        return true;
    }
    let msc2 = /^2[0-9]*/.test(ncard);
    if(msc2){
        $("#cardType").text("MasterCard");
        $("#cardType").css("color", "green");
        return true;
    }

    $("#cardType").text("Card Circuit not recognized");
    $("#cardType").css("color", "red");
    return true;

}
