

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>My OO-PHP</title>
</head>
<body>

<form action="" method="post">

    <fieldset>
        <legend>Circle</legend>
        <label>Radius: </label>
        <input type="number" name="radius" id="radius" step="any" value=""/>
    </fieldset>

    <fieldset>
        <legend>Rectangle</legend>
        <label>Length: </label><input type="number" name="length" step="any" value=" "/>
        <label>Width: </label><input type="number" name="width" step="any" value=""/>
    </fieldset>

    <fieldset>
        <legend>Triangle</legend>
        <label>Base: </label><input type="number" name="base" step="any" value="" />
        <label>Height: </label><input type="number" name="height" step="any" value=""/>
    </fieldset>
    <br>
    <label>Grow or Shrink: <input type="number" step="any" name="gos"/> % </label>
    <input type="submit" id="insert" value="Calculate" name="Calculate"/>

</form>
<br>

</body>
</html>