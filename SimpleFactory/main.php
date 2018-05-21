<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/5/15
 * Time: 15:36
 */
require_once 'CashFactory.php';

$type = $argv[1];
$money = $argv[2];
$cash = SimpleFactory\CashFactory::create($type);
$pay = $cash->acceptCash($money);
var_dump($pay);