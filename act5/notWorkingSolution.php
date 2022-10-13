<?php  
/*
    POST variables may not be re-sent, 
    if they are, the browser usually does this when the user refreshes the page. 
    The POST variable will never be re-set if the user clicks a link to another page instead of refreshing. 
    If $post is a normal variable, then it will never be saved.
*/
  if(isset($_POST['color'])){
    $string = $_POST['color'];
    $arr = explode(',',$string);
    print_r($arr);
  }
?>
<!DOCTYPE html>
<html>
    <head>
        <title></title>
    </head>
    <body>
    <form>
    <select  name="color" method="Post">
        <?php 
            for($i=1; $i<=100; $i++){
              if(isset($_POST['color'])){
                $colors = $_POST['color'] .','. $i;
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
                if(isset($_POST['color'])){
                  $string = $_POST['color'];
                  $arr = explode(',',$string);
                  if(in_array($num,$arr)){
                    echo "<td style='background-color: black;''>&nbsp $num</td>";
                  }
                  else{
                    echo "<td>&nbsp $num</td>";
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
    </body>
</html>
<style>
    #colored{
      background-color: green;
    }
</style>

