<?php
    $arr = array('a','b','c','d');
    $a = implode(',',$arr);
    echo "arr: $a </br>";
    unset($arr[1]);
    $a = implode(',',$arr);
    echo "arrWithRemoveIndex: $a </br>";
?>