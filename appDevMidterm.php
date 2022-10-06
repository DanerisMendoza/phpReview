<!DOCTYPE html>
<html>
    <head>
        <title></title>
    </head>
    <body>
        <table border="2px solid green">
            <?php 
                    //random table but only 1-10
                    $arr = array();
                    $CanNotBeUsedArr = array();
                    for($i=0; $i<=100; $i++){
                        $rand = rand(1,10);
                        $freq = array_count_values($arr);
                        foreach($freq as $key => $count){
                            if($count == 10){
                                array_push($CanNotBeUsedArr,$key);
                            }
                        }
                        while(in_array($rand,$CanNotBeUsedArr) && $i!=100){
                            $rand = rand(1,10);
                        }
                        array_push($arr,$rand);
                    }
                    $num = 0;
                    for($i=0; $i<10; $i++){
                    echo "<tr>";
                    for($j=0; $j<10; $j++){
                        if(isset($_GET['usedArr2'])){
                            $arr2 = explode(',',$_GET['usedArr2']);
                            if(in_array($arr[$num],$arr2))
                                echo "<td style='background-color: red;' '><a href='?usedArr2=$arr[$num]'>$arr[$num]</a></td>";
                            else
                                echo "<td><a href='?usedArr2=$arr[$num]'>*</a></td>";
                        }
                        else{
                            echo "<td><a href='?usedArr2=$arr[$num]'>*</a></td>";
                        }
                        $num++;
                    }
                    echo "</tr>";
                }
            ?>
        </table>
    </body>
</html>