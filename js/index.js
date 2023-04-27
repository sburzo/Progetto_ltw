function validaform(){
    // if(document.check_avalaibility.date-input.date<=
    //     document.check_avalaibility.date-output.date){
    //     alert("In questa stanza il massimo numero di ospiti è 3");
    // }
    if(document.check_avalaibility.room.value=="room1" &&
        parseInt(document.check_avalaibility.guest.value)>3){
            alert("In questa stanza il massimo numero di ospiti è 3");
    }
    if(document.check_avalaibility.room.value=="room2" &&
        parseInt(document.check_avalaibility.guest.value)>4){
            alert("In questa stanza il massimo numero di ospiti è 4");
    }
    if(document.check_avalaibility.room.value=="room3" &&
        parseInt(document.check_avalaibility.guest.value)>4){
            alert("In questa stanza il massimo numero di ospiti è 4");
    }
    
}