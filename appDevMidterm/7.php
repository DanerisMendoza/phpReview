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
                    if(!isset($_SESSION['coloredIndex'])){
                        $_SESSION['coloredIndex'] = array();
                        // $_SESSION['delayIndex'] = array();
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
                            $s = $_SESSION['arrStatic'][$id];
                            if(in_array($id,$_SESSION['coloredIndex'])){
                                echo "<td id='$id' style='background-color: red;'>$s</td>";
                            }
                            elseif( (isset($_SESSION['delayIndexA']) && $id == $_SESSION['delayIndexA'])){
                                echo "<td id='$id' style='background-color: red;'><a href='?url=$id,$s'>$s</a></td>";
                                // if(count($_SESSION['delayIndex']) == 2){
                                //     $_SESSION['delayIndex'] = array();
                                // }
                            }
                            elseif(isset($_SESSION['delayIndexB']) && $id == $_SESSION['delayIndexB']){
                                echo "<td id='$id' style='background-color: red;'><a href='?url=$id,$s'>$s</a></td>";
                            }
                            else{                           
                                echo "<td id='$id'><a href='?url=$id,$s'>*</a></td>";
                            }
                            $id++;
                        }
                        echo "</tr>";
                    }
                    if(isset($_SESSION['coloredIndex'])){
                        echo 'coloredIndex: '; print_r($_SESSION['coloredIndex']); echo '</br>';

                    }
                    //click
                    if(isset($_GET['url'])){
                        $url = $_GET['url'];
                        $urlArray = explode(',',$_GET['url']);
                        $id = $urlArray[0];
                        $s = $urlArray[1];
                      
                        // array_push($_SESSION['delayIndex'],$id);
                        // echo 'delayIndex: '; print_r($_SESSION['delayIndex']); echo '</br>';
                        // echo 'delayIndexA: '. (isset($_SESSION['delayIndexA']) ? $_SESSION['delayIndexA']:'no value'); echo '</br>';
                        // echo 'delayIndexB: '. (isset($_SESSION['delayIndexB']) ? $_SESSION['delayIndexB']:'no value'); echo '</br>';
                       
                        
                        if(!isset($_SESSION['varA'])){
                            $_SESSION['tempIndexA'] = $id;
                            $_SESSION['delayIndexA'] = $id;
                            $_SESSION['varA']= $s; 
                            // echo 'varA: '. (isset($_SESSION['varA']) ? $_SESSION['varA']:'no value'); echo '</br>';
                            // echo 'varB: '. (isset($_SESSION['varB']) ? $_SESSION['varB']:'no value'); echo '</br>';
                            // echo 'delayIndexA: '. (isset($_SESSION['delayIndexA']) ? $_SESSION['delayIndexA']:'no value'); echo '</br>';
                            // echo 'delayIndexB: '. (isset($_SESSION['vadelayIndexBrB']) ? $_SESSION['delayIndexB']:'no value'); echo '</br>';
                            echo"<script>window.location.replace('7.php?url=$url')</script>";
                            return;
                        }
                        // array_push($_SESSION['delayIndex'],$id);
                        if($_SESSION['tempIndexA'] == $id){
                            return;
                        }
                        $_SESSION['tempIndexB']= $id; 
                        $_SESSION['delayIndexB']= $id; 
                        $_SESSION['varB']= $s; 
                        // echo 'varA: '; print_r($_SESSION['varA']); echo '</br>';
                        // echo 'varB: '; print_r($_SESSION['varB']); echo '</br>';
                        // echo 'delayIndexA: '; print_r($_SESSION['delayIndexA']); echo '</br>';
                        // echo 'delayIndexB: '; print_r($_SESSION['delayIndexB']); echo '</br>';
                        // echo 'tempIndexA: '; print_r($_SESSION['tempIndexA']); echo '</br>';
                        // echo 'tempIndexB: '; print_r($_SESSION['tempIndexB']); echo '</br>';
                        if($_SESSION['varA'] == $_SESSION['varB']){
                            array_push($_SESSION['coloredIndex'],$_SESSION['tempIndexA']);
                            array_push($_SESSION['coloredIndex'],$_SESSION['tempIndexB']);
                            echo"<script>window.location.replace('7.php')</script>";
                            unset($_SESSION['tempIndexA']);
                            unset($_SESSION['varA']);
                            unset($_SESSION['tempIndexB']);
                            unset($_SESSION['varB']);
                        }
                        else{
                            $aId = $_SESSION['tempIndexA'];
                            $bId = $_SESSION['tempIndexB'];
                            $a = $_SESSION['arrStatic'][$_SESSION['tempIndexA']];
                            $b = $_SESSION['arrStatic'][$_SESSION['tempIndexB']];
                            unset($_SESSION['tempIndexA']);
                            unset($_SESSION['varA']);
                            unset($_SESSION['tempIndexA']);
                            unset($_SESSION['varB']);
                            echo"<script>history.replaceState({},'','7.php');</script>";
                        }
                        echo"<script>window.location.replace('7.php?url=$url')</script>";
                    }
                 
                   
            ?>
        </table>
        <form method="post"><button type="submit" name="clear">clear</button></form>
        <?php
            if(isset($_POST['clear'])){
             
                unset($_SESSION['varA']);
                unset($_SESSION['varB']);
                unset($_SESSION['delayIndexA']);
                unset($_SESSION['delayIndexB']);
                unset($_SESSION['arrStatic']);
                unset($_SESSION['tempIndexA']);
                unset($_SESSION['tempIndexB']);
             
                $_SESSION['coloredIndex'] = array();
                $_SESSION['delayIndex'] = array();
            
                echo"<script>history.replaceState({},'','7.php');</script>";
                echo"<script>window.location.replace('7.php')</script>";
                
              
            }
        ?>
    </body>
</html>