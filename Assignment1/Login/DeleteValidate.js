

function CheckDelete() {

    var conf = confirm("Are you sure, You want to delete this record?");
    if(conf == true){

        window.location.href='DeleteData.php';
    }
}