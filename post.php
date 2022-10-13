<?php 
    if(isset($_POST['input1'])){
        $rand = rand(1,100);
        $url = $_POST['input1'].','.$rand;
    }
    else{
        $url = rand(1,100);
    }
?>
<form method="post">
    <!-- <input type="text" name="input1" value="<?php echo $url?>"> -->
    <input type="hidden" name="input1" value="<?php echo $url?>">
    <button type="submit" name="submit">submit</button>
</form>

<script>
    alert('<?php echo $url?>');
</script>
