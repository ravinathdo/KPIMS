<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

switch ($_SESSION['userbean']['user_role']) {
                case 'PM':
                    include './_tree_PM.php';
                    break;
                case 'ENGINEER':
                    include './_tree_ENGINEER.php';
                    break;
                case 'JENGINEER':
                    include './_tree_JENGINEER.php';
                    break;
                case 'SMANAGER':
                    include './_tree_SMANAGER.php';
                    break;
                case 'TEAMLEAD':
                    include './_tree_TEAMLEAD.php';
                    break;
                case 'HIT':
                    include './_tree_HIT.php';
                    break;
            }

?>
