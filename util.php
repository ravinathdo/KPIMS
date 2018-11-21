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

/**
 * An algorithm that works on finding best employee for assign a task 
 * considering different kind of skill aspect 
 * @param type $skill_id
 * @param type $dateTime
 * @param type $duration
 */
function findBestEmpAlgo($skill_id, $dateTime, $duration) {
    //get free employees 
    $sqlFreeEmp = "SELECT DISTINCT kpi_week_plan.assign_to,kpi_user.empno,kpi_user.first_name,kpi_user.last_name FROM kpi_week_plan
INNER JOIN kpi_user
ON kpi_user.id = kpi_week_plan.id  WHERE kpi_week_plan.plan_date != '2018-10-25'";
    $resFreeEmp = getData($sqlFreeEmp); // List1
    //skill count
    $sqlSkillCount = "SELECT SUM(score) AS ttlscore FROM kpi_skill_matrix WHERE skill_id = 7";
    $resSkillCount = getData($sqlSkillCount);
    $skillCount = 0;
    foreach ($resSkillCount as $value) {
        $skillCount = $value['ttlscore'];
    }
//    echo $skillCount;

    //Skilled employee array
    $sqlSkilledEmp = "SELECT SUM(score) AS score,employee_id FROM kpi_skill_matrix WHERE skill_id = 7
GROUP BY employee_id 
ORDER BY employee_id ";
    $resSkilledEmp = getData($sqlSkilledEmp); // array of skilled emp

    $empArray = array();
    foreach ($resSkilledEmp as $value) {
        array_push($empArray, $value['employee_id']);
    }

    echo '<ul>';

    foreach ($resFreeEmp as $value) {
        $binarySearch = binarySearch($empArray, $value['assign_to']);
        if ($binarySearch) {
            $val = getSkillHelth($resSkilledEmp, $value['assign_to'], $skillCount);
            echo '<li>['.$value['empno'].'] '.$value['first_name'].' ('.round($val,2).'%) </li>';
        }
    }

    echo '</ul>';
}

function getSkillHelth($resSkilledEmp,$user_id,$skillCount){
    $val =0;
    foreach ($resSkilledEmp as $value) {
        if($value['employee_id']==$user_id){
         $val =   ($value['score'] / $skillCount)*100;
        }
    }
    return $val;
}

function binarySearch(Array $arr, $x) {
    // check for empty array 
    if (count($arr) === 0)
        return false;
    $low = 0;
    $high = count($arr) - 1;

    while ($low <= $high) {
        // compute middle index 
        $mid = floor(($low + $high) / 2);

        // element found at mid 
        if ($arr[$mid] == $x) {
            return true;
        }

        if ($x < $arr[$mid]) {
            // search the left side of the array 
            $high = $mid - 1;
        } else {
            // search the right side of the array 
            $low = $mid + 1;
        }
    }
    // If we reach here element x doesnt exist 
    return false;
}

?>