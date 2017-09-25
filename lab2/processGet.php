<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title></title>
</head>
<body>
    <?php
    $fname;
    $lastname;
    $day;
    $month;

    if (!empty($_GET['submit'])) {
        $fname = $_GET['fName'];
        $lastname = $_GET['lName'];
        $day = $_GET['day'];
        $month = $_GET['month'];

        echo "<p> Hello, ".$fname." ".$lastname."!</p></br>";

        if ( ( $month == 1 && $day > 19 && $day <=31) || ( $month == 2 && $day < 19 && $day >0) ) {
            echo "<p>Your Zodiac Sign is Aquarius</p>";
        }//aquarius
        elseif ( ( $month == 2&& $day > 18 && $day <=29) || ( $month == 3 && $day < 21 && $day >0) ) {
            echo "<p>Your Zodiac Sign is Pisces</p>";
        }//pisces
        elseif ( ( $month == 3&& $day > 20 && $day <=31) || ( $month == 4 && $day < 20 && $day >0) ) {
            echo "<p>Your Zodiac Sign is Aries</p>";
        }//Aries
        elseif ( ( $month == 4&& $day > 19 && $day <=31) || ( $month == 5 && $day < 21 && $day >0) ) {
            echo "<p>Your Zodiac Sign is Taurus</p>";
        }//Taurus
        elseif ( ( $month == 5&& $day > 20 && $day <=31) || ( $month == 6 && $day < 21 && $day >0) ) {
            echo "<p>Your Zodiac Sign is Gemini</p>";
        }//Gemini
        elseif ( ( $month == 6&& $day > 20 && $day <=31) || ( $month == 7&& $day < 23 && $day >0) ) {
            echo "<p>Your Zodiac Sign is Cancer</p>";
        }//Cancer
        elseif ( ( $month == 7&& $day > 22 && $day <=31) || ( $month == 8 && $day < 23 && $day >0) ) {
            echo "<p>Your Zodiac Sign is Leo</p>";
        }//LEO
        elseif ( ( $month == 8&& $day > 22 && $day <=31) || ( $month == 9&& $day < 23 && $day >0) ) {
            echo "<p>Your Zodiac Sign is Virgo</p>";
        }//Virgo
        elseif ( ( $month == 9&& $day > 22 && $day <=31) || ( $month == 10 && $day < 23 && $day >0) ) {
            echo "<p>Your Zodiac Sign is Libra</p>";
        }//Libra
        elseif ( ( $month == 10&& $day > 22 && $day <=31) || ( $month == 11 && $day < 22 && $day >0) ) {
            echo "<p>Your Zodiac Sign is Scorpio</p>";
        }//Scorpio
        elseif ( ( $month == 11&& $day > 21 && $day <=31) || ( $month == 12&& $day < 22 && $day >0) ) {
            echo "<p>Your Zodiac Sign is Sagittarius</p>";
        }//Sagittarius
        elseif ( ( $month == 12&& $day > 21 && $day <=31) || ( $month == 1 && $day < 20&& $day >0) ) {
            echo "<p>Your Zodiac Sign is Capricorn/p>";
        }//Capricon
        else{
            echo "You Must be Alien !!!";
        }
    }

    ?>

    <p><a href="getHtml.html">Go back</a></p>
</body>
</html>


