<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/5/21
 * Time: 15:51
 */
require_once 'Manager.php';
$leaveDays = $argv[1];
$cause = $argv[2];

$charge = ManagerFactory::NewManager("Charge");
$charge->headle($leaveDays, $cause);