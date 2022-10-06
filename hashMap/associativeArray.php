<?php
    $arr = array ('one' => '1', 'two' => '2');
    $arr['three'] = '3';
    //replace value in associative array
    $arr['two'] = '22';
    //print key
    $target = array_search ('22', $arr);
    echo $target.'</br>';
    //output: two
    // print_r($arr);

?>