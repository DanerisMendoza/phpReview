<!DOCTYPE html>
<html>
    <head>
        <title>Color Number</title>
        Color Number
    </head>
    <body>
        
    <?php
        session_start();
       if(!isset($_SESSION['colored'])){
        $_SESSION['colored'] = array();
       }
        
        $colors0 = array('green', 'red', 'blue');
        $colors = array();
        
        $j = 0; 
        for($i=0; $i<100; $i++){
            array_push($colors,$colors0[$j]);
            if($j==2){
                $j=0;
            }
            $j++;
        }
        // print_r($colors);

        ?>
    <form>
    <select  name="color" method="get">
        <?php 
            for($i=1; $i<100; $i++){
                echo "<option value='$i'>$i</option>";
            }
        ?>     
      </select>
      <input type = "submit"  value = "submit"> 
    </form>
    <?php
        $num = 1;
        echo "<table border = 10>";
            for ($row=1; $row <= 10; $row++) { 
                echo "<tr>";
                for ($col=1; $col <= 10; $col++) { 
                    echo "<td id='$num'>&nbsp $num</td>";
                    $num += 1;
                }
                echo "</tr>";
            }
            
        echo "</table>";
        if(isset($_GET['color'])){
            $c = $_GET['color'];
            array_push($_SESSION['colored'],$c);
            // print_r($_SESSION['colored']);
            // echo $_SESSION['colored'][2];
            for($i=1; $i<count($_SESSION['colored']); $i++){
                if(in_array($i,$_SESSION['colored'])){
                    echo"
                    <script>
                    var myElement = document.getElementById('$i');
                    myElement.style.backgroundColor = 'black';
                    </script>
                    ";
                    echo "$i is in array ";
                }
            }
            // echo"
            // <script>
            // const myElement = document.getElementById('$c');
            // myElement.style.backgroundColor = '$colors[$c]';
            // </script>
            // ";
        } 
        ?>
        </table>
    </body>
</html>

