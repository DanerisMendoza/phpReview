<?php
session_start();
if(!isset($_SESSION['multiArr'])){
    $_SESSION['multiArr'] = array();
}
?>
<form method="post">
    <input required type="text" placeholder="name" name="name">
    <input required type="text" placeholder="section" name="section">

    <select name="year">
        <option value="1st year">1st year</option>
        <option value="2nd year">2nd year</option>
        <option value="3rd year">3rd year</option>
        <option value="4th year">4th year</option>
    </select>
   <button name="submit">submit</button>
</form>
<form method="post"><button name="showList">showList</button></form>
<form method="post"><button name="clear">clear</button></form>
<?php
    if(isset($_POST['submit'])){
        $arr = array('name'=> $_POST['name'], 'section' => $_POST['section'], 'year' => $_POST['year']);
        array_push($_SESSION['multiArr'],$arr);
    }
    if(isset($_POST['showList'])){
        foreach($_SESSION['multiArr'] as $arr){
           echo(implode(",",$arr));
           echo'</br>';
        }
    }
    if(isset($_POST['clear'])){
        unset($_SESSION['multiArr']);
    }
?>