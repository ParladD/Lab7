

function Gender(){
    var regexG = new RegExp("^M$|^m$|^f$|^F$");
    var gender = document.getElementById('gender');

    if(gender.value.length == 0){
        gender.style.border = "1px solid red";
        //alert("NO INPUT FOUND");

    }else if(!regexG.test(gender.value)){
        gender.style.border = "1px solid red";
        //alert("Gender Input is only M and F");
    }
    else{
        gender.style.border = "1px solid green";
    }

}

function  names(name) {
    var nameU = document.getElementById(name);
    var regexU = RegExp("[A-Z]{1}[a-z]{1,80}");
    if(!regexU.test(nameU.value)){
        nameU.style.border = "1px solid red"
    }
    else{
        nameU.style.border = "1px solid green";
    }
}


function DateValidating(date, spanDate) {

    var dateV = document.getElementById(date);
    var spanDate = document.getElementById(spanDate);

    var regexD = new RegExp(/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])/);

    if(dateV.value.length == 0){
        spanDate.innerHTML="No input found";
        spanDate.style.color = "red";
        dateV.style.border = "1px solid red";
    }
    else if(!regexD.test(dateV.value)){
        dateV.style.border = "1px solid red";
        spanDate.innerHTML="Invalid input for Date, use format yyyy-mm-dd";
        spanDate.style.color = "red";
    }
    else {
        dateV.style.border ="1px solid green";
        spanDate.innerHTML="Valid";
        spanDate.style.color = "green";
    }
    //http://www.webdeveloper.com/forum/showthread.php?190078-Javascript-Date-(yyyy-mm-dd)-validation
}