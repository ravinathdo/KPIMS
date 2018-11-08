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

?>