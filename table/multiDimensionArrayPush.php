
<!DOCTYPE html>
<html>
    <head>
        <title></title>
    </head>
    <body>
        <?php
        $dish = array();
        array_push($dish, array("dish"=>"burger","cost"=>45));
        array_push($dish, array("dish"=>"chicken","cost"=>145));
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
