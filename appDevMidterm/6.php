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
                        $_SESSION['tempIndex'] = array();
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
                            echo "<td id='$id'><a href='?url=$id'>*</a></td>";
                            $id++;
                        }
                        echo "</tr>";
                    }
                    //click
                    if(isset($_GET['url'])){
                        $urlArray = explode(',',$_GET['url']);
                        $url = $_GET['url'];
                        array_push($_SESSION['twoVar'],$url);
                    }
                    echo 'twoVar: '; print_r($_SESSION['twoVar']); echo '</br>';
                    echo 'tempIndex: '; print_r($_SESSION['tempIndex']); echo '</br>';
                    echo 'coloredIndex: '; print_r($_SESSION['coloredIndex']); echo '</br>';
            ?>
        </table>
        <form method="post"><button type="submit" name="clear">clear</form>
        <?php
            if(isset($_POST['clear'])){
                $_SESSION['twoVar'] = array();
                $_SESSION['tempIndex'] = array();
                $_SESSION['coloredIndex'] = array();
                echo("<script>history.replaceState({},'','5.php');</script>");
            }
        ?>
    </body>
</html>