<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function getLevelAccessible($initLevel, $ssnLevel) {
    if ($initLevel < $ssnLevel) {
        return TRUE;
    } else {
        return FALSE;
    }
}

function getLevelFromUserID($userid) {
    $sql = "SELECT kpi_user_role.* FROM kpi_user INNER JOIN kpi_user_role 
ON kpi_user.user_role = kpi_user_role.user_role
WHERE kpi_user.id = $userid";
    $data = getData($sql);
    foreach ($data as $value) {
        return $value;
    }
    return FALSE;
}

function getDateTime() {
    date_default_timezone_set("Asia/Colombo");
    return date("Y-m-d h:i:sa");
}


//Algo
function permutations($letters,$num){ 
    $last = str_repeat($letters{0},$num); 
    $result = array(); 
    while($last != str_repeat(lastchar($letters),$num)){ 
        $result[] = $last; 
        $last = char_add($letters,$last,$num-1); 
    } 
    $result[] = $last; 
    return $result; 
} 
function char_add($digits,$string,$char){ 
    if($string{$char} <> lastchar($digits)){ 
        $string{$char} = $digits{strpos($digits,$string{$char})+1}; 
        return $string; 
    }else{ 
        $string = changeall($string,$digits{0},$char); 
        return char_add($digits,$string,$char-1); 
    } 
} 
function lastchar($string){ 
    return $string{strlen($string)-1}; 
} 
function changeall($string,$char,$start = 0,$end = 0){ 
    if($end == 0) $end = strlen($string)-1; 
    for($i=$start;$i<=$end;$i++){ 
        $string{$i} = $char; 
    } 
    return $string; 
} 
//Algo

?>