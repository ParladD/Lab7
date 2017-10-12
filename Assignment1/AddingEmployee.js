

function validate() {
    var a = document.getElementById('empNO');
    var b = document.getElementById('bd');
    var c = document.getElementById('fname');
    var d = document.getElementById('lname');
    var e = document.getElementById('gender');
    var f = document.getElementById('hdate');

    if(a.value.length==0){

        a.style.border="1px solid red";
        return false;
    }
    else if(b.value.length==0){

        b.style.border="1px solid red";
        return false;
    }

   else if(c.value.length==0){

        c.style.border="1px solid red";
        return false;
    }

   else if(d.value.length==0){

        d.style.border="1px solid red";
        return false;
    }

   else if(e.value.length==0){

        e.style.border="1px solid red";
        return false;
    }


    else if(f.value.length==0){


       f.style.border="1px solid red";
        return false;
    }
    else {
        a.style.border=null;
        b.style.border=null;
        c.style.border=null;
        d.style.border=null;
        e.style.border=null;
        f.style.border=null;
        return true;
    }

}