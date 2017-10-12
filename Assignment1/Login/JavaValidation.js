

function Gender(){
    var regexG = new RegExp("^M$|^m$|^f$|^F$");
    var gender = document.getElementById('gender');
    var spanG = document.getElementById('spanG');


    if(gender.value.length ==0){

        gender.style.border = "1px solid red";
        spanG.innerHTML="No input Detected";
        spanG.style.color = "red";
        return false;
    }
    else if(!regexG.test(gender.value)){
        gender.style.border = "1px solid red";
        spanG.innerHTML="For Gender input F or M only";
        spanG.style.color = "red";
        return false;
    }
    else{
        gender.style.border = "1px solid green";
        spanG.innerHTML="Valid";
        spanG.style.color = "green";
        return true;
    }

}

function  names(name, spanN) {
    var nameU = document.getElementById(name);
    var spanNames = document.getElementById(spanN);
    var regexU = RegExp("[A-Z]{1}[a-z]{1,80}");

    if(nameU.value.length ==0){
        nameU.style.border = "1px solid red"
        spanNames.innerHTML="No input Detected"
        spanNames.style.color ="red";
        return false;
    }
    else if(!regexU.test(nameU.value)){
        nameU.style.border = "1px solid red"
        spanNames.innerHTML="First later of your name should be capital with and no characters"
        spanNames.style.color ="red";
        return false;
    }
    else{
        nameU.style.border = "1px solid green";
        spanNames.innerHTML="Valid"
        spanNames.style.color ="green";
        return true;
    }
}


function DateValidating(date, spanDate) {

    var dateV = document.getElementById(date);
    var spanDate = document.getElementById(spanDate);
    var regexD = new RegExp(/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])/);

    if(dateV.value.length ==0){
        dateV.style.border = "1px solid red";
        spanDate.innerHTML="No input Detected";
        spanDate.style.color = "red";
        return false;
    }
    else if(!regexD.test(dateV.value)){
        dateV.style.border = "1px solid red";
        spanDate.innerHTML="Invalid input for Date, use format yyyy-mm-dd";
        spanDate.style.color = "red";
        return false;
    }
    else {
        dateV.style.border ="1px solid green";
        spanDate.innerHTML="Valid";
        spanDate.style.color = "green";
        return true;
    }
    //http://www.webdeveloper.com/forum/showthread.php?190078-Javascript-Date-(yyyy-mm-dd)-validation
}

