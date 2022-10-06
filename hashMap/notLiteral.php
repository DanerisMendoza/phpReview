<?php
    $map = array();
    $map['key1'] = 'value1';
    $map['key2'] = 'value2';
    //get key
    foreach ($map as $key => $val)
        if($val == "value1"){
            echo $key."</br>";
            break;
        }
    //get value
    echo $map['key1'];

    /* output:  key1
                value1  */
    /*  print all
      foreach ($map as $key => $val)
     	echo $key." ".$val."</br>"; */
?>