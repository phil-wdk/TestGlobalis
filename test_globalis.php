<?php
    function foo($param)
    {
        if (is_array($param)){   
            for($i=0; $i<count($param)-1; $i++) {
                for($j=0; $j<(count($param)-1-$i); $j++) {
                    if($param[$j][0] > $param[$j+1][0]){
                        $temp = $param[$j];
                        $param[$j] = $param[$j+1];
                        $param[$j+1] = $temp;
                    }
                }
            }     
            for($j=0; $j<(count($param)-1); $j++) {
                if($param[$j+1][1] >= $param[$j][0] && $param[$j+1][0] <= $param[$j][1]){
                    $temp = [$param[$j][0], $param[$j][1], $param[$j+1][0], $param[$j+1][1]];
                    sort($temp);
                    $param[$j] = [$temp[0], $temp[3]];
                    unset($param[$j+1]);
                    sort($param);
                    $j--;
                }                 
            }
        }
        return $param;
    }    

    $tab = [
        [[0, 3], [6, 10]],
        [[0, 5], [3, 10]],
        [[0, 5], [2, 4]], 
        [[7, 8], [3, 6], [2, 4]],
        [[3, 6], [3, 4], [15, 20], [16, 17], [1, 4], [6, 10], [3, 6]]
    ];

    foreach ($tab as $key => $value) {
        print_r("Appel :");
        print_r($value);
        print_r("Sortie :");
        print_r(foo($value));
    }    
?>