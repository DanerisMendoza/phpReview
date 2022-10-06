<!DOCTYPE html>
<html>
    <head>
        <title></title>
    </head>
    <body>
        <table border="2px solid green">
            <?php
                $usedArr = array();
                for($i=0; $i<10; $i++){
                    echo "<tr>";
                    for($j=0; $j<10; $j++){
                        do{
                            $rand = rand(1,100);
                        }
                        while(in_array($rand,$usedArr));
                        array_push($usedArr,$rand);
                        if(isset($_GET['usedArr2'])){
                            $arr = explode(',',$_GET['usedArr2']);
                            if(in_array($rand,$arr))
                                echo "<td style='background-color: red;' '>$rand</td>";
                            else
                                echo "<td>$rand</td>";
                        }
                        else{
                            echo "<td>$rand</td>";
                        }
                    }
                    echo "</tr>";
                }
            ?>  
        </table>
        <a href="?usedArr2=<?php  
        if(isset($_GET['usedArr2'])){
            if(count($arr) == 100)
                return;
            do{
            $newNum = rand(1,100);
            }
            while(in_array($newNum,$arr));
            echo $_GET['usedArr2'].','.$newNum;
        }
        else{
            echo rand(1,25);
        }?>
        ">Submit</a>
    </body>
</html>
