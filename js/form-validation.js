function validateForm(){
    
    var firstname = document.getElementById("inputFirstName").value;
    var lastname = document.getElementById("inputLastName").value;
    var phonenumber = document.getElementById("inputPhoneNbr").value;
    var email = document.getElementById("inputEmail").value;
    if(firstname == ""){
 
        return false;
    }else if(lastname == ""){
        return false;
    }else if(email == ""){
        return false;
    }
    else if(phonenumber.length>0 && phonenumber.length !=10){
        return false;
    }
    else{
        return true;
    }
}