<?php
$atributos = array(0 => "age", 1 => "workclass", 2 => "fnlwgt", 3 => "education", 4 => "education-num", 5 => "marital-status", 6 => "occupation", 7 => "relationship", 8 => "race", 9 => "sex", 10 => "capital-gain", 11 => "capital-loss", 12 => "hours-per-week", 13 => "native-country", 14 => "class"); 

//Funciones
function levensh($cadena1, $cadena2){
    $cant1 = strlen($cadena1);
    $cant2 = strlen($cadena2);

    for($i = 0; $i <= $cant1; $i++){
        $leven[$i][0] = $i;
    }
    for($j = 0; $j <= $cant2; $j++){
        $leven[0][$j] = $j;
    } 
    for($i = 1; $i <= $cant1; $i++){
        for($j = 1; $j <= $cant2; $j++){
            $c = $leven[$i - 1][$j - 1];
            if($cadena1[$i - 1] != $cadena2[$j - 1])
                $c += 1;
            $leven[$i][$j] = min($leven[$i-1][$j] + 1, $leven[$i][$j-1] + 1, $c);
        }
    }
    //echo "Cambios necesarios: " . $leven[$cant1][$cant2];
    return $leven[$cant1][$cant2];
}

function minmax($valores, $newmin, $newmax){
    echo $newmax;
    $min = min($valores);
    $max = max($valores);
    for($i = 0; $i < count($valores); $i++){
        $v[$i] = ($valores[$i] - $min) / ($max - $min) * ($newmax - $newmin) + 0;
    }
    return $v;  
}

function zscore($valores, $tipo){
    $m = array_sum($valores) / count($valores);
    if($tipo == "Estandar"){
        foreach($valores as $valor){
            $d += pow(($valor - $m), 2);
        }
        $d /= count($valores);
        $d = sqrt($d);
        for($i = 0; $i < count($valores); $i++){
            $v[$i] = round(($valores[$i] - $m) / $d, 4);
        }
        return $v;
    }
    else if($tipo == "Media Absoluta"){
        foreach($valores as $valor){
            $s += abs($valor - $m); 
        }
        $s = $s / count($valores);
        for($i = 0; $i < count($valores); $i++){
            $v[$i] = round(($valores[$i] - $m) / $s, 4);
        }
        return $v;
    }
}
?>