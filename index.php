<!DOCTYPE html>
<html lang="es">
	<head>
	    <title>Mineria de datos</title>
    	<meta charset="utf8">
	    <link rel = "stylesheet" type = "text/css" href = "css/styles.css"/>
	    <script src="js/jquery-1.11.3.min.js" type="text/javascript"></script> 
        <script src="js/angular.min.js"></script>
        <script src="js/script.js"></script>
        <?php include('functions.php');?>
	</head>
	<body ng-app="">
        <aside>
            <div id = "tabla">
                <?php
                    error_reporting(E_ALL ^ E_NOTICE);
                    $correcta = 0;
                    $incorrecta = 0;
                    $vacio = 0;
                    $fila = 1;
                    $cont = 0;
                    $registro = 0;
                    $correctas = "/^\s*(Private|Self-emp-not-inc|Self-emp-inc|Federal-gov|Local-gov|State-gov|Without-pay|Never-worked|Bachelors|Some-college|11th|HS-grad|Prof-school|Assoc-acdm|Assoc-voc|9th|7th-8th|12th|Masters|1st-4th|10th|Doctorate|5th-6th|Preschool|Married-civ-spouse|Divorced|Never-married|Separated|Widowed|Married-spouse-absent|Married-AF-spouse|Tech-support|Craft-repair|Other-service|Sales|Exec-managerial|Prof-specialty|Handlers-cleaners|Machine-op-inspct|Adm-clerical|Farming-fishing|Transport-moving|Priv-house-serv|Protective-serv|Armed-Forces|Wife|Own-child|Husband|Not-in-family|Other-relative|Unmarried|White|Black|Asian-Pac-Islander|Amer-Indian-Eskimo|Other|Female|Male|United-States|Cambodia|England|Puerto-Rico|Canada|Germany|Outlying-US(Guam USVI-etc)|India|Japan|Greece|South|China|Cuba|Iran|Honduras|Philippines|Italy|Poland|Jamaica|Vietnam|Mexico|Portugal|Ireland|France|Dominican-Republic|Laos|Ecuador|Taiwan|Haiti|Columbia|Hungary|Guatemala|Nicaragua|Scotland|Thailand|Yugoslavia|El-Salvador|Trinidad&Tobago|Peru|Hong|Holand-Netherlands|<=50K|>50K)$/";
                    if (($gestor = fopen("income.csv", "r")) !== FALSE) {
                        echo "<h3>Tabla CSV: </h3>";
                        echo "<table>";
                        while (($datos = fgetcsv($gestor, 1000, ",")) !== FALSE) {
                            $numero = count($datos);
                            echo "<tr>";
                            if($fila == 1){ 
                                echo "<th>" . "Registro" . "</th>";
                                for ($c=0; $c < $numero; $c++) {
                                    echo "<th>" . $datos[$c] . "</th>";
                                }
                            }
                            else{
                                echo "<td>" . ($fila-1) . "</td>";
                                for ($c=0; $c < $numero; $c++) {
                                    echo "<td>" . $datos[$c] . "</td>";
                                    $cont = $lista[$c][$datos[$c]] + 1;
                                    $lista[$c][$datos[$c]] = $cont;
                                    $newlista[$c][$fila-1] = $datos[$c];
                                    if($datos[$c] == NULL){
                                            $vacio++; 
                                            if($error["Vacio"][$c] == NULL)
                                                $error["Vacio"][$c] = ($fila-1);
                                            else
                                                $error["Vacio"][$c] .= ", " . ($fila-1);
                                        }
                                        else if($datos[$c] == "?" || $datos[$c] == " ?"){
                                            $vacio++; 
                                            if($error["?"][$c] == NULL)
                                                $error["?"][$c] = ($fila-1);
                                            else
                                                $error["?"][$c] .= ", " . ($fila-1);  
                                        }
                                    else{
                                        if(is_numeric($datos[$c]))
                                            $correcta++;
                                        else if(preg_match($correctas, $datos[$c])){
                                                $correcta++;
                                        }
                                        else{
                                            $incorrecta++;
                                            $cont = $error["Data"][$datos[$c]] + 1;
                                            $error["Data"][$datos[$c]] = $cont;
                                            if($error["Registro"][$datos[$c]] == NULL)
                                                $error["Registro"][$datos[$c]] = ($fila-1);
                                            else
                                                $error["Registro"][$datos[$c]] .= ", " . ($fila-1);
                                        }
                                    }
                                $total++;
                                }
                            }
                            $fila++;
                            echo "</tr>";
                        }
                        echo "</table>";
                        fclose($gestor);
                    }
                ?>
            </div>
            <div id = "errorData">
                <?php
                echo "<h3>Resultados del análisis</h3>";
                echo "<p>Registros vacios o predeterminados: $vacio</p>";
                echo "<p>Registros erroneos: $incorrecta</p>";
                echo "<p>Registros correctos: $correcta</p>";
                echo "<p>Total de registros: $total</p>";
                ?>
            </div>
        </aside>
        <section>
            <form id = "selectTable">
                <fieldset>
                    <label for = "chooseTable" id = "labelchoose">Selecciona la información a mostrar</label>
                        <select id = "chooseTable" name = "table">
                            <option value = "0">Elige una opción</option>
                            <option value = "1">Lista de errores</option>
                            <option value = "2">Registros vacios o predeterminados</option>
                            <option value = "3">Tabla de frecuencia</option>
                            <option value = "4">Datos estadísticos</option>
                            <option value = "5">Tabla de correlación</option>
                            <option value = "6">Distancia de levenshtein</option>
                            <option value = "7">Normalización</option>
                            <option value = "8">z-score (D. Estandar)</option>
                            <option value = "9">z-score (D. Media Absoluta)</option>
                        </select>
                </fieldset>
            </form>
            <div id = "listaErrores" style = visibility:hidden>
                <h3>Lista de errores</h3>
                <div>
                    <table>
                        <tr>
                            <th>Error</th>
                            <th>Incidencias</th>
                            <th>Registro(s)</th>
                        </tr>
                        <?php
                            while (list($clave, $valor) = each($error["Data"])) {
                                $registro = $error["Registro"][$clave];
                                echo "<tr>
                                        <td>$clave</td>
                                        <td>$valor</td>
                                        <td>$registro</td>";
                                echo "</tr>";
                            }
                        ?>
                    </table>
                </div>
            </div>
            <div id = "registrosVacios" style = visibility:hidden>
                <h3>Registros vacios o predeterminados</h3>
                <form>
                    <label>Atributo: </label>
                    <select ng-model = 'opcion'>
                        <option value = 0>all</option>
                        <option value = 1>age</option>
                        <option value = 2>workclass</option>
                        <option value = 3>fnlwgt</option>
                        <option value = 4>education</option>
                        <option value = 5>education-num</option>
                        <option value = 6>marital-status</option>
                        <option value = 7>occupation</option>
                        <option value = 8>relationship</option>
                        <option value = 9>race</option>
                        <option value = 10>sex</option>
                        <option value = 11>capital-gain</option>
                        <option value = 12>capital-loss</option>
                        <option value = 13>hours-per-week</option>
                        <option value = 14>native-country</option>
                        <option value = 15>class</option>
                    </select>
                </form>
                <hr>
                <div ng-switch = 'opcion'>
                    <table>
                        <tr>
                            <th>Caracter</th>
                            <th>Atributo</th>
                            <th>Registro(s)</th>
                        </tr>
                        <?php
                            while (list($atributo, $caracter) = each($error["Vacio"])) {
                                $registro = $error["Vacio"][$atributo];
                                echo "<tr>
                                        <td> </td>
                                        <td>$atributos[$atributo]</td>
                                        <td>$registro</td>";
                                echo "</tr>";
                            }
                            while (list($atributo, $caracter) = each($error["?"])) {
                                $registro = $error["?"][$atributo];
                                echo "<tr>
                                        <td>?</td>
                                        <td>$atributos[$atributo]</td>
                                        <td>$registro</td>";  
                                echo "</tr>";
                            }
                        ?>
                    </table>
                </div>
                <?php
                for($i = 1; $i < 16; $i++){
                    echo "<div ng-switch-when=$i>
                            <table>
                                <tr>
                                    <th>Caracter</th>
                                    <th>Registro(s)</th>
                                </tr>";
                    $registro = $error["Vacio"][$i-1];
                    if($registro != NULL){
                        echo "<tr>
                                <td> </td>
                                <td>$registro</td>";
                        echo "</tr>";
                    }
                    else{
                        echo "<tr>
                                <td> </td>
                                <td>No existe registro vacio en éste atributo.</td>";
                        echo "</tr>";
                    }
                    $registro = $error["?"][$i-1];
                    if($registro != NULL){
                        echo "<tr>
                                <td>?</td>
                                <td>$registro</td>";
                        echo "</tr>";
                    }
                    else{
                        echo "<tr>
                                <td>?</td>
                                <td>No existe registro '?' en éste atributo.</td>";
                        echo "</tr>";
                    }
                    echo "</table>";
                    echo "</div>";
                }
                ?>
            </div>
            <?php
            echo "</div>
            </div>
            <div id = 'tablaFrecuencia' style = visibility:hidden>
            <h3>Tabla de frecuencia</h3>
            <form>
                <label>Atributo: </label>
                <select ng-model = 'opcion'>
                    <option value = 0>all</option>
                    <option value = 1>age</option>
                    <option value = 2>workclass</option>
                    <option value = 3>fnlwgt</option>
                    <option value = 4>education</option>
                    <option value = 5>education-num</option>
                    <option value = 6>marital-status</option>
                    <option value = 7>occupation</option>
                    <option value = 8>relationship</option>
                    <option value = 9>race</option>
                    <option value = 10>sex</option>
                    <option value = 11>capital-gain</option>
                    <option value = 12>capital-loss</option>
                    <option value = 13>hours-per-week</option>
                    <option value = 14>native-country</option>
                    <option value = 15>class</option>
                </select>    
            </form>
            <hr>
            <div ng-switch = 'opcion'>";
            for($i = 0; $i < count($lista); $i++){
                $j = 1;
                foreach($lista[$i] as $key => $value){
                    $arrayKeys[$i][$j++] = $key;
                }
            }
            $listSort = $newlista;
            echo "<div ng-switch-when=0 id = 'overflowTable'>
            <table>
                <tr>
                    <th>Atributo</th>
                    <th>Valor</th>
                    <th>Frecuencia</th>
                </tr>";
            foreach($lista as $atributo => $valores){
                $estadistic[$atributo]["SD"] = 0;
                $media = 0;
                $cont = 0;
                $i = 0;
                foreach($valores as $key => $valor){
                    echo "<tr>
                        <td>$atributos[$atributo]</td>
                        <td>$key</td>
                        <td>$valor</td>";
                        echo "</tr>";
                    $cont += $valor;
                    if(is_numeric($key)){
                        $minimo[$atributo][$i] = $key;
                        $minimo[$atributo][$i] = $key;
                        $i++;
                        $media += $key * $valor;
                        $estadistic[$atributo]["SD"] += pow(($key - $estadistic[$atributo]["Media"]), 2) * $valor;
                    }
                }
                if(is_numeric(key($valores))){
                    asort($listSort[$atributo]);
                }
                $estadistic[$atributo]["Media"] = $media / 249;
                $estadistic[$atributo]["SD"] /= $cont;
                $estadistic[$atributo]["SD"] = sqrt($estadistic[$atributo]["SD"]);
            }
            foreach($listSort as $atributo => $valores){
                $i = 0;
                foreach($valores as $valor){
                    $mediana[$atributo][$i] = $valor;
                    $i++;
                }
                if(is_numeric(key($valores))){
                    if($i % 2 != 0){
                        $pos = ($i + 1) / 2;
                        $mediana[$atributo] = $mediana[$atributo][$pos - 1];
                    }
                    else{
                        $pos = ($i + 1) / 2;
                        $mediana[$atributo] = ($mediana[$atributo][$pos] + $mediana[$atributo][$pos - 1]) / 2;
                    }
                }
            }
            echo "</table>
            </div>";
            for($i = 1; $i < 16; $i++){
                echo "<div ng-switch-when=$i id = 'overflowTable'>
                <table>
                    <tr>
                        <th>Valor</th>
                        <th>Frecuencia</th>
                    </tr>";
                foreach($lista[$i-1] as $key => $valor){
                        echo "<tr>
                            <td>$key</td>
                            <td>$valor</td>";
                            echo "</tr>";
                }
                echo "</table>
                </div>";
            }
            echo "</div>
            </div>";
            echo "<div id = 'datosEstadisticos' style = visibility:hidden>
            <h3>Valores estadisticos</h3>
            <form>
                <label>Atributo: </label>
                <select ng-model = 'opcion'>
                    <option value = 0>all</option>
                    <option value = 1>age</option>
                    <option value = 3>fnlwgt</option>
                    <option value = 5>education-num</option>
                    <option value = 11>capital-gain</option>
                    <option value = 12>capital-loss</option>
                    <option value = 13>hours-per-week</option>
                </select>    
            </form>
            <hr>
            <div ng-switch = 'opcion'>";
            echo "<div ng-switch-when=0>";
            echo "<table>
            <tr>
                <th>Atributo</th>
                <th>Min</th>
                <th>Max</th>
                <th>Mediana</th>
                <th>Media</th>
                <th>Moda</th>
                <th>SD</th>
            </tr>";
            for($i = 0; $i < count($estadistic); $i++){
                if(is_numeric($newlista[$i][1])){
                   echo "<tr>
                        <td>$atributos[$i]</td>
                        <td>" . min($minimo[$i]) . "</td>
                        <td>" . max($minimo[$i]) . "</td>
                        <td>" . $mediana[$i] . "</td>
                        <td>" . round($estadistic[$i]["Media"], 2) . "</td>
                        <td>" . array_search(max($lista[$i]), $lista[$i]) . "</td>
                        <td>" . round($estadistic[$i]["SD"], 2) ."</td>
                    </tr>"; 
                }
            }
            echo "</table>
            </div>";
            for($i = 1; $i<16; $i++){
                if(is_numeric($newlista[$i-1][1])){
                    echo "<div ng-switch-when=$i>";
                    echo "<table>
                    <tr>
                        <th>Min</th>
                        <th>Max</th>
                        <th>Mediana</th>
                        <th>Media</th>
                        <th>Moda</th>
                        <th>SD</th>
                    </tr>";
                    //for($i = 0; $i < count($estadistic); $i++){
                           echo "<tr>
                                <td>" . min($minimo[$i-1]) . "</td>
                                <td>" . max($minimo[$i-1]) . "</td>
                                <td>" . $mediana[$i-1] . "</td>
                                <td>" . round($estadistic[$i-1]["Media"], 2) . "</td>
                                <td>" . array_search(max($lista[$i-1]), $lista[$i-1]) . "</td>
                                <td>" . round($estadistic[$i-1]["SD"], 2) ."</td>
                            </tr>"; 

                    //}
                    echo "</table>
                    </div>";
                }
            }
            echo "</div>
            </div>
            <div id = 'tablaCorrelacion' style = visibility:hidden>
            <h3>Tabla de correlación</h3>
            <div id = 'overflowTable'>
            <table>
            <tr>
                <th>Atributos</th>
                <th>Correlación</th>
            </tr>
            <tr>";
            for($atr1 = 0; $atr1 < 15; $atr1++){
                for($atr2 = 0; $atr2 < 15; $atr2++){
                    //if($atr2 != $atr1){
                        if(is_numeric($arrayKeys[$atr1][1]) && is_numeric($arrayKeys[$atr2][1])){
                            $coeficiente = 0;
                            for($i = 0; $i < 250; $i++){
                                $coeficiente += ($newlist[$atr1][$i] - $estadistic[$atr1]["Media"])*($newlist[$atr2][$i] - $estadistic[$atr2]["Media"]);
                            }  
                            $coeficiente /= 249 * ($estadistic[$atr1]["SD"]*$estadistic[$atr2]["SD"]);
                            echo"<td>" . $atributos[$atr1] . " -- " . $atributos[$atr2] . "</td>";
                            echo "<td>" . round($coeficiente, 2) . "</td>
                            </tr>";   
                        }
                        else{
                            $x = 0;
                            $e = 0;
                            echo"<td>" . $atributos[($atr1)] . " -- " . $atributos[($atr2)] . "</td>";


                            for($i = 0; $i < count($arrayKeys[$atr1]); $i++){
                                for($j = 0; $j < count($arrayKeys[$atr2]); $j++){
                                    $correlacion[$arrayKeys[$atr1][$i]][$arrayKeys[$atr2][$j]] = 0;
                                }
                            }
                            for($reg = 0; $reg < 250; $reg++){
                                $cont = $correlacion[$newlista[$atr1][$reg]][$newlista[$atr2][$reg]] + 1;
                                $correlacion[$newlista[$atr1][$reg]][$newlista[$atr2][$reg]] = $cont;
                            } 

                            for($i = 0; $i < count($arrayKeys[$atr1]); $i++){
                                $correlacion[$arrayKeys[$atr1][$i]]["Total"] = array_sum($correlacion[$arrayKeys[$atr1][$i]]);
                            }

                            for($i = 0; $i < count($arrayKeys[$atr2]); $i++){
                                $correlacion["Total"][$arrayKeys[$atr2][$i]] = array_sum(array_column($correlacion, $arrayKeys[$atr2][$i]));
                            }
                            $correlacion["Total"]["Total"] = array_sum(array_column($correlacion, "Total"));

                            foreach($correlacion as $keyRow => $row){
                                if($keyRow != "Total"){
                                    foreach($row as $key => $value){
                                        if($key != "Total"){
                                           $e = $correlacion[$keyRow]["Total"] * $correlacion["Total"][$key] / $correlacion["Total"]["Total"];
                                            if($e != 0){
                                                $x += pow(($correlacion[$keyRow][$key] - $e), 2) / $e;     
                                            } 
                                        }
                                    }
                                }
                            }

                            //if($atr1 == 0 && $atr2==1)
                                //print_r($correlacion);
                            $correlacion = NULL;
                            echo "<td>" . round($x, 2) . "</td>
                            </tr>";  
                        } 
                    //}
                }
            }

            echo "</table>
            </div>
            </div>
            <div id = 'distanciaLevenshtein' style = visibility:hidden>
            <h3>Distancia levenshtein</h3>
            <form>
                <label>Atributo: </label>
                <select ng-model = 'opcion'>
                    <option value = 0>all</option>
                    <option value = 9>race</option>
                    <option value = 10>sex</option>
                </select>    
            </form>
            <hr>
            <div ng-switch = 'opcion'>";
            echo "<div ng-switch-when=0 id = 'overflowTable'>
            <table>
            <tr>
                <th>Atributo</th>
                <th>Error</th>
                <th>Cambios necesarios</th>
                <th>Sugerecia</th>
            </tr>
            <tr>";
            $min = NULL;
            foreach($newlista as $atributo => $lista){
                if(!is_numeric($lista[1])){
                    $arrayC = array_unique(preg_grep($correctas, $lista));
                    //print_r(preg_grep($correctas, $lista, PREG_GREP_INVERT));
                    foreach($lista as $registro => $dato){
                        if(!preg_match($correctas, $dato) && $dato != "?" && $dato != " ?" && $dato != ""){
                            foreach($arrayC as $elemento){
                                if($min == NULL){
                                    $min = levensh($dato, $elemento);
                                    $newCadena = $elemento;
                                }
                                else if(levensh($dato, $elemento) < $min){
                                    $min = levensh($dato, $elemento);
                                    $newCadena = $elemento;
                                    $cambios = $min;
                                }
                            }
                            echo "<tr>
                                    <td>$atributos[$atributo]</td>
                                    <td>$dato</td>
                                    <td>$min</td>
                                    <td>$newCadena</td>
                                </tr>";
                            $min = NULL;
                        }

                    }   
                }
                else{
                    $numArray[$atributo] = preg_grep("/^[0-9]+$/", $lista);
                }
            }
            echo "</table>
            </div>";
            
            for($i = 1; $i < 16; $i++){
                echo "<div ng-switch-when=$i id = 'overflowTable'>
                <table>
                <tr>
                    <th>Error</th>
                    <th>Cambios necesarios</th>
                    <th>Sugerecia</th>
                </tr>
                <tr>";
                $min = NULL;
                foreach($newlista[$i-1] as $registro => $dato){
                    $arrayC = array_unique(preg_grep($correctas, $newlista[$i-1]));
                    if(!is_numeric($dato)){
                        if(!preg_match($correctas, $dato) && $dato != "?" && $dato != " ?" && $dato != ""){
                            foreach($arrayC as $elemento){
                                if($min == NULL){
                                    $min = levensh($dato, $elemento);
                                    $newCadena = $elemento;
                                }
                                else if(levensh($dato, $elemento) < $min){
                                    $min = levensh($dato, $elemento);
                                    $newCadena = $elemento;
                                    $cambios = $min;
                                }
                            }
                            echo "<tr>
                                    <td>$dato</td>
                                    <td>$min</td>
                                    <td>$newCadena</td>
                                </tr>";
                            $min = NULL;
                        }
                    }
                }
                echo "</table>
                </div>";
            }
            echo "</div>
            </div>";
            
            echo "<div id = 'normalizacion' style = visibility:hidden>";//1
            echo "<h3>Normalización</h3>
            <form>
                <label>Elige el tipo: </label>
                <select ng-model = 'opcion'>
                    <option value = 1>Min-Max</option>
                    <option value = 2>Z-Score</option>
                </select>    
            </form>
            <div ng-switch = 'opcion'>";//2
            echo "<div ng-switch-when=1>";//3
            echo "<div class = 'right'>";
            $newmin = NULL;
            $newmax = NULL;
            echo "<p>New min: <input type = 'text' ng-model='newmin'></p>";
            echo "<p>New max: <input type = 'text' ng-model='newmax'></p></div>";
            $newmin = "{{newmin}}";
            $newmax = "{{newmax}}";
            echo "
            <form>
                <label>Atributo: </label>
                <select ng-model = 'atr'>
                    <option value = 0>all</option>
                    <option value = 1>age</option>
                    <option value = 3>fnlwgt</option>
                    <option value = 5>education-num</option>
                    <option value = 11>capital-gain</option>
                    <option value = 12>capital-loss</option>
                    <option value = 13>hours-per-week</option>
                </select>
            </form>
            <hr>";
            echo "<div ng-switch = 'atr'>";//4
            echo "<div ng-switch-when = 0>";//5
                echo "<div id = 'overflowTable'>";//6
                echo "<table>
                <tr>
                <th>Atributo</th>
                <th>Registro</th>
                <th>Valor</th>
                </tr>";
                if(is_numeric($newmin)){
                    echo "nulo";
                    foreach($numArray as $atributo => $lista){
                        $v = minmax($lista, (int)$newmin, (int)$newmax);
                        foreach($v as $registro => $dato){
                            echo "<tr>
                                    <td>$atributos[$atributo]</td>
                                    <td>$registro</td>
                                    <td>$dato</td>
                                </tr>";
                        }
                    }
                }
                echo "</table>";
                echo "</div>";//6
            echo "</div>";//5
            for($i = 1; $i < 16; $i++){
                echo "<div ng-switch-when = $i>";//5
                echo "<div id = 'overflowTable'>";//6
                echo "<table>
                <tr>
                <th>Registro</th>
                <th>Valor</th>
                </tr>";
                foreach(minmax($numArray[$i-1], $newmin, $newmax) as $registro => $dato){
                    echo "<tr>
                            <td>$registro</td>
                            <td>$dato</td>
                        </tr>";
                }
                echo "</table>";
                echo "</div>";//6
                echo "</div>";//5
            }
            echo "</div></div>";//4//3//minmax
            
            
            
            echo "</div></div>";//2//1//normalizacion
            
            
            
            echo "<div id = 'estandar' style = visibility:hidden>
            <h3>Datos normalizados (z-score[D. Estandar])</h3>
            <div id = 'overflowTable'>
            <table>
            <tr>
                <th>Atributo</th>
                <th>Registro</th>
                <th>Valor</th>
            </tr>";
            foreach($numArray as $atributo => $lista){
                foreach(zscore($lista, "Estandar") as $registro => $dato){
                    echo "<tr>
                            <td>$atributos[$atributo]</td>
                            <td>$registro</td>
                            <td>$dato</td>
                        </tr>";
                }
            }
            echo "</table>
            </div>
            </div>
            <div id = 'mediaAbsoluta' style = visibility:hidden>
            <h3>Datos normalizados (z-score[D. Media Absoluta])</h3>
            <div id = 'overflowTable'>
            <table>
            <tr>
                <th>Atributo</th>
                <th>Registro</th>
                <th>Valor</th>
            </tr>";
            foreach($numArray as $atributo => $lista){
                foreach(zscore($lista, "Media Absoluta") as $registro => $dato){
                    echo "<tr>
                            <td>$atributos[$atributo]</td>
                            <td>$registro</td>
                            <td>$dato</td>
                        </tr>";
                }
            }
            echo "</table>";
            echo "</div>";
            ?>
        </section>
    </body>
</html>