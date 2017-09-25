<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>
      Fahrenheit to Celsius Converter
  </title>
    <style>
        table, th, td
        {
            border: 1px solid #cccccc;

        }
        th
        {
            background: #cccccc;
        }
        tr:nth-child(even)
        {
            background: #cccccc;
        }

    </style>



    </head>
<body>
<p><a href="DynamicsT2.php">See Celsius vs Fahrenheit</a></p>
    <table>
        <thead>
        <tr>
            <th>
                Farenheit
            </th>
            <th>
                Celsius
            </th>
        <tr>
        </thead>
        <tbody>

            <?php
            $celsius; $fah = 0;
            while($fah <= 100):
            ?>

                <tr>
                    <td>
                        <?php
                        echo $fah;
                        ?>
                    </td>
                    <td>
                        <?php
                        echo convert($fah);
                        ?>
                    </td>

                </tr>
                <?php $fah++; endwhile;?>
            <?php
            function convert($x){
                $y = round(($x -32) * (5/9));
                return $y;
            }
            ?>

        </tbody>
    </table>
</body>
</html>