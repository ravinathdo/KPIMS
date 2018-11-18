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
function permutations($letters, $num) {
    $last = str_repeat($letters{0}, $num);
    $result = array();
    while ($last != str_repeat(lastchar($letters), $num)) {
        $result[] = $last;
        $last = char_add($letters, $last, $num - 1);
    }
    $result[] = $last;
    return $result;
}

function char_add($digits, $string, $char) {
    if ($string{$char} <> lastchar($digits)) {
        $string{$char} = $digits{strpos($digits, $string{$char}) + 1};
        return $string;
    } else {
        $string = changeall($string, $digits{0}, $char);
        return char_add($digits, $string, $char - 1);
    }
}

function lastchar($string) {
    return $string{strlen($string) - 1};
}

function changeall($string, $char, $start = 0, $end = 0) {
    if ($end == 0)
        $end = strlen($string) - 1;
    for ($i = $start; $i <= $end; $i++) {
        $string{$i} = $char;
    }
    return $string;
}

//Algo Codes
function findBestEmpAlgo($skill_id, $dateTime, $duration) {
    // Function to convert an arabic number ($num) to a roman numeral.  $num must be between 
    $num = 100;
    $rnum = 3;
if ($num < 0 || $num > 9999) {
        return -1;
    } // out of range 

    $r_ones = array(1 => "I", 2 => "II", 3 => "III", 4 => "IV", 5 => "V", 6 => "VI", 7 => "VII", 8 => "VIII",
        9 => "IX");
    $r_tens = array(1 => "X", 2 => "XX", 3 => "XXX", 4 => "XL", 5 => "L", 6 => "LX", 7 => "LXX",
        8 => "LXXX", 9 => "XC");
    $r_hund = array(1 => "C", 2 => "CC", 3 => "CCC", 4 => "CD", 5 => "D", 6 => "DC", 7 => "DCC",
        8 => "DCCC", 9 => "CM");
    $r_thou = array(1 => "M", 2 => "MM", 3 => "MMM", 4 => "MMMM", 5 => "MMMMM", 6 => "MMMMMM",
        7 => "MMMMMMM", 8 => "MMMMMMMM", 9 => "MMMMMMMMM");

    $ones = $num % 10;
    $tens = ($num - $ones) % 100;
    $hundreds = ($num - $tens - $ones) % 1000;
    $thou = ($num - $hundreds - $tens - $ones) % 10000;

    $tens = $tens / 10;
    $hundreds = $hundreds / 100;
    $thou = $thou / 1000;

    if ($thou) {
        $rnum .= $r_thou[$thou];
    }
    if ($hundreds) {
        $rnum .= $r_hund[$hundreds];
    }
    if ($tens) {
        $rnum .= $r_tens[$tens];
    }
    if ($ones) {
        $rnum .= $r_ones[$ones];
    }

    return $rnum;
}

?>