<?php
    $arr = array ('I','am','simple','boy!');
    $var =  implode(" ",$arr);
    echo $var;
    echo "</br>";
    //output : I am simple boy!

    $arr2 = explode(" ",$var);
    print_r($arr2);
    /*print_r — Prints human-readable information
    output: Array ( [0] => I [1] => am [2] => simple [3] => boy! )
    */
?>