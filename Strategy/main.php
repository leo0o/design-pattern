<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/5/15
 * Time: 16:59
 */
require_once 'Strategy.php';

$type = $argv[1];
$money = $argv[2];
$cash = new \Strategy\CashContext();
switch ($type){
	case "1" :
		$cash->setPayStractegy(new \Strategy\CashNormal());
		break;
	case "2" :
		$cash->setPayStractegy(new \Strategy\CashDiscount(0.8));
		break;
	case "3" :
		$cash->setPayStractegy(new \Strategy\CashReturn(300, 50));
		break;
	default:
		$cash->setPayStractegy(new \Strategy\CashNormal());
}
var_dump($cash->pay($money));