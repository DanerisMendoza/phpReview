<?php    session_start(); ?>
<!DOCTYPE html>
<html>
    <head>
        <title></title>
    </head>
    <body>
    <form method="post"><button type="submit" name="clear">clear</button></form>
    
    <?php
             //clear all variable
             if(isset($_POST['clear'])){
                
                unset($_SESSION['arrStatic']);
                unset($_SESSION['varA']);
                unset($_SESSION['varB']);
                unset($_SESSION['delayIndexA']);
                unset($_SESSION['delayIndexB']);
                unset($_SESSION['tempIndexA']);
                unset($_SESSION['tempIndexB']);
                $_SESSION['coloredIndex'] = array();
                echo"<script>window.location.replace('8.php')</script>";
            }

            //just printing for debuging purpose
            echo 'varA: '. (isset($_SESSION['varA']) ? $_SESSION['varA']:'no value'); echo '</br>';
            echo 'varB: '. (isset($_SESSION['varB']) ? $_SESSION['varB']:'no value'); echo '</br>';
            echo 'delayIndexA: '. (isset($_SESSION['delayIndexA']) ? $_SESSION['delayIndexA']:'no value'); echo '</br>';
            echo 'delayIndexB: '. (isset($_SESSION['delayIndexB']) ? $_SESSION['delayIndexB']:'no value'); echo '</br>';
            if(isset($_SESSION['coloredIndex'])){
                echo 'coloredIndex: '; print_r($_SESSION['coloredIndex']); echo '</br>';
            }
                            
           
        ?>
        <table border="2px solid green">
            <?php 
                    //setting up array random num for table but only 1-10
                    if(!isset($_SESSION['coloredIndex'])){
                        $_SESSION['coloredIndex'] = array();
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
                            elseif( (isset($_SESSION['delayIndexA']) && $id == $_SESSION['delayIndexA']) || (isset($_SESSION['delayIndexB']) && $id == $_SESSION['delayIndexB']) ){
                                echo "<td id='$id' style='background-color: red;'><a href='?url=$id,$s'>$s</a></td>";
                            }
                            else{                           
                                echo "<td id='$id'><a href='?url=$id,$s'>*</a></td>";
                            }
                            $id++;
                        }
                        echo "</tr>";
                    }
                    
                    //click
                    if(isset($_GET['url'])){
                        $url = $_GET['url'];
                        $urlArray = explode(',',$_GET['url']);
                        $id = $urlArray[0];
                        $s = $urlArray[1];
                       
                        //clear wrong pair
                        if(!isset($_SESSION['varA']) && !isset($_SESSION['varB'])){
                            unset($_SESSION['delayIndexA']);
                            unset($_SESSION['delayIndexB']);
                        }
                        
                        //set var a
                        if(!isset($_SESSION['varA'])){
                            $_SESSION['tempIndexA'] = $id;
                            $_SESSION['delayIndexA'] = $id;
                            $_SESSION['varA']= $s; 
                            echo"<script>window.location.replace('8.php')</script>";
                            return;
                        }

                        //return if click same box
                        if($_SESSION['tempIndexA'] == $id){
                            return;
                        }

                        //set var b
                        $_SESSION['tempIndexB']= $id; 
                        $_SESSION['delayIndexB']= $id; 
                        $_SESSION['varB']= $s; 
                    
                        //add to colored index if correct 
                        if($_SESSION['varA'] == $_SESSION['varB']){
                            array_push($_SESSION['coloredIndex'],$_SESSION['tempIndexA']);
                            array_push($_SESSION['coloredIndex'],$_SESSION['tempIndexB']);
                            unset($_SESSION['tempIndexA']);
                            unset($_SESSION['tempIndexB']);
                            unset($_SESSION['delayIndexA']);
                            unset($_SESSION['delayIndexB']);
                            unset($_SESSION['varA']);
                            unset($_SESSION['varB']);
                        }
                        //otherwise delay the pair
                        else{
                            $a = $_SESSION['arrStatic'][$_SESSION['tempIndexA']];
                            $b = $_SESSION['arrStatic'][$_SESSION['tempIndexB']];
                            unset($_SESSION['tempIndexA']);
                            unset($_SESSION['tempIndexB']);
                            unset($_SESSION['varA']);
                            unset($_SESSION['varB']);
                            
                        }
                        //refresh
                        echo"<script>window.location.replace('8.php')</script>";
                    }
                 
                   
            ?>
        </table>

    </body>
</html>