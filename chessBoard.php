<!DOCTYPE html>
<html>
    <head>
        <title></title>
    </head>
    <body>
        <table border="2px solid black">
            <?php
                for($i=0; $i<8; $i++){
                    echo "<tr>";
                    for($j=0; $j<8; $j++){
                        if(($i+$j)%2 == 0)
                            echo "<td style='background-color: blue; '>&nbsp*</td>";
                        else
                            echo "<td style='background-color: red; '>&nbsp*</td>";
                    }
                    echo "</tr>";
                }
            ?>
        </table>
    </body>
</html>