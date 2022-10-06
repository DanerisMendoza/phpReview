<?php
    $arr = array(1,2,3,3,4,4.5,4.5,5.2,6,7,8,9,10);    
    $result = compute($arr);
    echo "Array: ".implode(", ",$arr)."</br>";
    echo "sum: ".$result[0]."</br>";
    echo "average: ".$result[1]."</br>";
    echo "high: ".$result[2]."</br>";
    echo "low: ".$result[3]."</br>";
    echo "mean: ".$result[4]."</br>";
    echo "range: ".$result[5]."</br>";
    echo "median: ".$result[6]."</br>";
    echo "mode: ".$result[7]."</br>";
    
    function compute($arr){
        sort($arr); //to get meadian you need to sort first
        $arr2 = array();
        $sum=0;
        $highestMode = null;
        $highestCount = 1;
        $high = $low = $arr[0];
        $modeWithCount = array();
        $multipleMode = array();

        for($i=0; $i<count($arr); $i++){
            $sum += $arr[$i];
            $high = $arr[$i]>$high? $arr[$i]:$high;
            $low = $arr[$i]<$low? $arr[$i]:$low;
            //getting median
            if(count($arr) % 2 ==0){//if even
                $sumOfMiddleEelement = $arr[count($arr)/2] + $arr[count($arr)/2-1];
                $median = $sumOfMiddleEelement/2;
            }
            else//if odd
                $median = $arr[count($arr)/2];
                
            //creating a map
            if(!array_key_exists(strval($arr[$i]),$modeWithCount)){
                $modeWithCount["$arr[$i]"] = 1;        
            }
            else{
                foreach ($modeWithCount as $key => $val)
                if($key == "$arr[$i]"){
                    $modeWithCount[strval($arr[$i])] = $val+1;
                    break;
                }
            }
        }

        //getting mode
        foreach($modeWithCount as $key => $val){
            if($val > $highestCount){
                $highestMode = $key;
                $highestCount++;
            }
        }

        //if multiple mode
        if($highestCount != 1){
            foreach($modeWithCount as $key => $val){
                if($val == $highestCount){
                    array_push($multipleMode,$key);
                }
            }
        }
        
        if($highestCount == 1)
            $highestMode = "no mode";
        elseif(count($multipleMode) != 1) 
            $highestMode = implode(", ",$multipleMode);    
  
        $mean = $average = $sum/count($arr);
        $range = $high-$low;
        array_push($arr2,$sum);
        array_push($arr2,$average);
        array_push($arr2,$high);
        array_push($arr2,$low);
        array_push($arr2,$mean);
        array_push($arr2,$range);
        array_push($arr2,$median);
        array_push($arr2,$highestMode);

        print_r($modeWithCount);
        echo "</br>";
        
        return $arr2;
    }  
?>