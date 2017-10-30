<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Film</title>
    <style type="text/css">
        table
        {
            border: 1px solid purple;
        }
        th, td
        {
            border: 1px solid red;
        }
    </style>
</head>
<body>

<h1>Film: Records</h1>
<table>
    <thead>
    <tr>
        <th>Title</th>
        <th>Description</th>

    </tr>
    </thead>
    <tbody>
    <?php
    foreach($arrayOfData as $filmData):
        ?>
        <tr>
            <td><?php echo $filmData->getTitle(); ?></td>
            <td><?php echo $filmData->getDescription(); ?></td>

        </tr>
        <?php
    endforeach;
    ?>
    </tbody>
    <tfoot></tfoot>
</table>
</body>
</html>
