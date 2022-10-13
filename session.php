<?php 
session_start();
if(!isset($_SESSION['arrS'])){
    $_SESSION['arrS'] = array();
    array_push($_SESSION['arrS'],'g');
    array_push($_SESSION['arrS'],'u');
    array_push($_SESSION['arrS'],'m');
}
print_r($_SESSION['arrS']);
echo '</br>';
echo $_SESSION['arrS'][1];
unset($_SESSION['arrS']);
print_r($_SESSION['arrS']);
?>