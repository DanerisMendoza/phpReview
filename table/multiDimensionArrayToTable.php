<!DOCTYPE html>
<html>
    <head>
        <title></title>
    </head>
    <body>
        <?php
        $dish = array(
        array(
            'dish' => 'burger',
            'cost' => 56,
            ),
        array(
            'dish' => 'chicken',
            'cost' => 86,
            ),
        );
        ?>
        <table>
            <tr>
                <th>dish</th>
                <th>cost</th>
            </tr>
            <?php foreach($dish as $d){ ?>
            <tr>
                <td> <?php echo $d['dish'];?></td>
                <td> <?php echo $d['cost'];?></td>
            </tr>
            <?php }?>
        </table>
    </body>
</html>
