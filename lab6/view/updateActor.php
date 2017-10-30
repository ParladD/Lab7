<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Actor Update</title>
    <style type="text/css">

        #actorID{
            margin-left: 2cm;
            color: red;
        }
    </style>
</head>
<body>
<h1>Edit Actor:</h1>
<form id="formUpdate" name="formUpdate" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <p>
        <label>Actor ID:<span id="actorID">Hidden</span>
            <input type="hidden" 	readonly="readonly" name="editCustId" id="editCustId" value="<?php echo $currentUpdateID->getActorID();?>"/>
        </label>
    </p>
    <p>
        <label>First Name:
            <input type="text" name="firstName" id="firstName" value="<?php echo $currentUpdateID->getFirstName();?>"/>
        </label>
    </p>
    <p>
        <label>Last Name:
            <input type="text" name="lastName" id="lastName" value="<?php echo $currentUpdateID->getLastName();?>"/>
        </label>
    </p>
    <p>
        <input type="submit" name="UpdateBtn" id="UpdateBtn" value="Update" onclick="return confirm('Do you Really want to Update?')"/>
    </p>
</form>
</body>
</html>
