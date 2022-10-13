<?php 
    if(isset($_POST['holder']) && $_POST['holder'] != ''){
        $rand = rand(1,100);
        $a = $_POST['holder'].','.$rand;
    }
    else{
        $a = rand(1,100);
    }
    if(isset($_POST['clear'])){
        $a = '';
    }
?>
<form method="post">
    <button type="submit" name="submit" ><?php echo $a; ?></button>
    <button type="submit" name="clear">clear</button>
</form>