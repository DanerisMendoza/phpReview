<form method="post"><button type="submit" name="delay">delay</button></form>
<?php
echo "a";
if(isset($_POST['delay'])){
sleep(3);
echo "r";
}
?>