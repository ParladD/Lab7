<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>File uploader</title>
</head>
<body>
    <?php
        $tempName = $_FILES['userImage']['tmp_name'];
        $orgName = $_FILES['userImage']['name'];
        $sizeFile = $_FILES['userImage']['size'];
        $uploadError = $_FILES['userImage']['error'];
        $filName = 'uploads/';

        if(isset($orgName)){
            if (!empty($orgName)){
                echo"<p>File is ok</p></br></br>";
                echo "<p>Tmp: ".$tempName."</p>";
                echo "<p>Orig: ".$orgName."</p>";
                echo "<p>Size: ".$sizeFile."</p>";
                echo "<p>Error ".$uploadError."</p>";

                if (move_uploaded_file($tempName,$filName.$orgName)){
                    echo "<h1> File Succesfully uploaded</h1>";
                }
                else{
                    echo "<p> File couldn't upload</p>";
                }
            }
            else{
                echo "<p> Please Choose a file first</p>";
            }
        }

    ?>
    <p><a href="uploadFilehtml.html">Go back</a></p>
</body>
</html>