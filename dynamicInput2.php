<form method="post">
    <input required type="text" placeholder="name" name="name">
    <input required type="text" placeholder="section" name="section">
    <select name="year">
        <option value="1stYear">1stYear</option>
        <option value="2ndYear">2ndYear</option>
        <option value="3rdYear">3rdYear</option>
        <option value="4thYear">4thYear</option>
    </select>
   <button name="submit">submit</button>
</form>
<form method="post"><button name="showList">showList</button></form>
<form method="post"><button name="clear">clear</button></form>
<?php
    if(isset($_POST['submit'])){
        $arr = array('name'=> $_POST['name'], 'section' => $_POST['section'], 'year' => $_POST['year']);
        foreach($arr as $string){
            if(isset($arrString)) 
                $arrString.= ' '.$string;
            else
                $arrString = $string;
        }
        if(!isset($_GET['multiArr']))
        echo"<script>window.location.replace('dynamicInput2.php?multiArr=$arrString')</script>";
        else{
        $arrString2 = $_GET['multiArr'] .','.$arrString;
        echo"<script>window.location.replace('dynamicInput2.php?multiArr=$arrString2')</script>";
        }
    }
    if(isset($_POST['showList'])){
        $multiArr = explode(",",$_GET['multiArr']);
        foreach($multiArr as $str){
            echo $str.'</br>'; 
        }
    }
    if(isset($_POST['clear']))
        echo"<script>window.location.replace('dynamicInput2.php?')</script>";
?>