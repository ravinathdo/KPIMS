<?php
   
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function getDBConnection() {

    $servername = "localhost";
    $username = "root";
    $password = "123";
    $db = "kpimsdb";


// Create co nnection
    $conn = mysqli_connect($servername, $username, $password, $db);
// Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    } else {
        return $conn;
    }
}


/**
 * 
 * @param type $sql
 * @param type $msgArray    $msgArray = array('msgsuccess' => '', 'msgerror' => '');
 * @return type
 */
function setData($sql, $msgArray) {
    $conn = getDBConnection();
    $last_id = 0;
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    if (mysqli_query($conn, $sql)) {
        $last_id = mysqli_insert_id($conn);
        if ($last_id>0)
            echo '<p class="bg-success msg-success">'.$msgArray['msgsuccess'].'<p>';
    } else {
        echo '<p class="bg-danger msg-error">'.$msgArray['msgerror'].'<p>';
    }
    mysqli_close($conn);
    return $last_id;
}

function getData($sql) {
    // Create connection
    $conn = getDBConnection();
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        return $result;
    } else {
        return FALSE;
    }
    mysqli_close($conn);
}

function setUpdate($sql, $MSG) {
    $flag = TRUE;
    $conn = getDBConnection();
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    if (mysqli_query($conn, $sql)) {
        if ($MSG)
            echo '<p class="bg-success msg-success">Record updated successfully<p>';
    } else {
        if ($MSG)
            echo "Invalid Input";
        $flag = FALSE;
    }

    mysqli_close($conn);
    return $flag;
}

function setDelete($sql) {
    $flag = TRUE;
    $conn = getDBConnection();
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    if (mysqli_query($conn, $sql)) {
        //echo "Record deleted successfully";
    } else {
        // echo "Error deleting record: " . mysqli_error($conn);
    }

    mysqli_close($conn);
}


?>