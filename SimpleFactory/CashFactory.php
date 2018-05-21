<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/5/14
 * Time: 19:47
 */
//简单工厂模式
namespace SimpleFactory;

class CashFactory
{
	public static function create($type){
		switch ($type){
			case "1" :
				return new CashNormal();
				break;
			case "2" :
				return new CashDiscount(0.8);
				break;
			case "3" :
				return new CashReturn(300, 50);
				break;
			default:
				return new CashNormal();
		}
	}
}
