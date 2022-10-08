<!DOCTYPE html>
<html>
    <head>
        <title></title>
    </head>
    <body>
        <table border="1px black solid">
            <?php 
            $num = 1;
            for($i=0; $i<5; $i++){
                echo "<tr>";
                for($j=0; $j<5; $j++){
                    echo "<td>$num</td>";
                    $num++;
                }
                echo "</tr>";
            }
            $dom = new DOMDocument();

            ?>  
        </table>
    </body>
</html>
