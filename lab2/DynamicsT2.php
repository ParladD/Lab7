
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>
        Celsius to Fahrenheit Converter
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

<p><a href="DynamicsTable.php">See Farenheit vs Celsius</a></p>
    <table>
        <thead>
        <tr>
            <th>
                Celcsius
            </th>
            <th>
                Farenheit
            </th>
        <tr>
        </thead>
        <tbody>

        <?php
        $cel = 0;
        while($cel<= 100):
            ?>

            <tr>
                <td>
                    <?php
                    echo $cel;
                    ?>
                </td>
                <td>
                    <?php
                    echo convert($cel);
                    ?>
                </td>

            </tr>
            <?php $cel++; endwhile;?>
        <?php
        function convert($x){
            $y = round(($x * (9/5) + 32));
            return $y;
        }
        ?>

        </tbody>
    </table>
</body>
</html>