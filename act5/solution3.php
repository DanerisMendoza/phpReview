<?php  
  if(isset($_GET['color'])){
    $string = $_GET['color'];
    $arr = explode(',',$string);
    // foreach($arr as $str){
    //   echo $str;
    // }
    // echo "</br>";
    // echo $string;
    // echo "</br>";
    // print_r($arr);
  }
?>
<!DOCTYPE html>
<html>
    <head>
        <title></title>
    </head>
    <body>
    <form>
    <select  name="color" method="get">
        <?php 
            for($i=1; $i<=100; $i++){
              if(isset($_GET['color']) && in_array($i,$arr)){
                continue;
              }
              if(isset($_GET['color'])){
                $colors = $_GET['color'] .','. $i;
              }
              else{
                $colors = $i;
              }
              echo "<option value='$colors'>$i</option>";
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
                if(isset($_GET['color'])){
                  $string = $_GET['color'];
                  $arr = explode(',',$string);
                  if(in_array($num,$arr)){
                    echo "<td style='background-color: black;''>&nbsp $num</td>";
                    // echo "in</br>";
                  }
                  else{
                    echo "<td>&nbsp $num</td>";
                    // echo "not</br>";
                  }
                  $num += 1;
                }
                else{
                  echo "<td>&nbsp $num</td>";
                  $num += 1;
                }
                  
              }
              echo "</tr>";
          }
          
      echo "</table>";
    ?>
     <form method="post"><button type="submit" name="display">display</button></form>
     <form method="post"><button type="submit" name="reset">reset</button></form>
    <?php
    if(isset($_POST['display'])){
        print_r($arr);
    }
    if(isset($_POST['reset'])){
      echo"<script>window.location.replace('getMethod.php')</script>";
    }
    ?>
    </body>
</html>
<style>
    #colored{
      background-color: green;
    }
</style>

