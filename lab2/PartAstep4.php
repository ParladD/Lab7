<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>built in function</title>
</head>
<body>
    <?php
        echo"<h1> This page was rendered in PHP version ".phpversion()." </h1></br>";
        echo"<h1> This page was rendered in Zend version ".zend_version()." </h1></br>";
        echo"<h1> The 'Default_mimetype' value from the php.ini file = ".ini_get("default_mimetype")." </h1>";

    ?>
</body>
</html>