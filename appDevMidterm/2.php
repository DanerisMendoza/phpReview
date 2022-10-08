<!DOCTYPE html>
<html>
    <head>
        <title></title>
    </head>
    <body>
        <table border="2px solid green">
            <?php 
                    //random table but only 1-10
                    //setting up array
                    session_start();
                    if(!isset($_SESSION['twoVar'])){
                        $_SESSION['twoVar'] = array();
                    }
                    if(!isset($_SESSION['arrStatic'])){
                        $_SESSION['arrStatic'] = array(); 
                        $CanNotBeUsedArr = array();
                        for($i=0; $i<=100; $i++){
                            $rand = rand(1,10);
                            $freq = array_count_values($_SESSION['arrStatic']);
                            foreach($freq as $key => $count){
                                if($count == 10){
                                    array_push($CanNotBeUsedArr,$key);
                                }
                            }
                            while(in_array($rand,$CanNotBeUsedArr) && $i!=100){
                                $rand = rand(1,10);
                            }
                            array_push($_SESSION['arrStatic'],$rand);
                     
                        }
                    }
                    //setting up table
                    $id = 1;
                    for($i=0; $i<10; $i++){
                    echo "<tr>";
                        for($j=0; $j<10; $j++){
                            //url have value
                            if(isset($_GET['url'])){
                                $url = $_GET['url'];
                                $arr2 = explode(',',$_GET['url']);
                                $s = $_SESSION['arrStatic'][$id];
                                $concat = $url.','.$s;
                                if(in_array($id,$arr2)){
                                    array_push($_SESSION['twoVar'],$id);
                                    echo "<td id='$id' style='background-color: red;' '><a href='?url=$id'> $s</a></td>";
                                }
                                else{
                                    echo "<td id='$id'><a href='?url=$id'>*</a></td>";
                                }
                            }
                            //first creation of table block
                            else{
                                $s = $_SESSION['arrStatic'][$id];
                                echo "<td id='$id'><a href='?url=$id'>*</a></td>";
                            }
                            $id++;
                        }
                        echo "</tr>";
                    }
              
                 
                print_r($_SESSION['twoVar']);
            ?>
        </table>
        <form method="post"><button type="submit" name="clear">clear</form>
        <?php
            if(isset($_POST['clear'])){
                $_SESSION['arrStatic'] = array(); 
                $_SESSION['twoVar'] = array(); 
                session_unset();
            }
        ?>
    </body>
</html>