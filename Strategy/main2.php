<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/5/15
 * Time: 17:30
 */
require_once 'Strategy.php';
$type = $argv[1];
$money = $argv[2];
$cash = new \Strategy\AnotherCashContext($type);
var_dump($cash->pay($money));