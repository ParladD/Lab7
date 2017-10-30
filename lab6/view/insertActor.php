
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Inserting Actor</title>
</head>
<body>
<form action="<?Php $_SERVER['PHP_SELF'] ?>" id="insertName" method="post" name ="insertName">

    <p>
        <label>
            First Name:
        </label>
        <input name = "firstName" id="firstName" type="text">
    </p>
    <p>
        <label>
            Last Name:
        </label>
        <input name = "lastName" id="lastName" type="text">
    </p>

    <p>
        <input type="submit" value=" Insert Actor" id ="submit" name="insertActor">
    </p>

</form>
</body>
</html>