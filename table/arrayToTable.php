<!DOCTYPE html>
<html>
    <head>
        <title></title>
    </head>
    <body>
        <?php
            $dish = array();
            $cost = array();
            array_push($dish,"burger");
            array_push($dish,"chicken");
            array_push($dish,"sisig");
            array_push($cost,"56");
            array_push($cost,"66");
            array_push($cost,"76");
        ?>
            <table>
                <th>dish</th>
                <th>cost</th>
                <?php for($i=0; $i<count($dish); $i++){ ?>
                <tr>
                    <td><?php echo $dish[$i]; ?></td>
                    <td><?php echo $cost[$i]; ?></td>
                </tr>
                <?php }?>
            </table>
    </body>
</html>