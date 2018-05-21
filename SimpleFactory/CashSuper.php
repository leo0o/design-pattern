<?php
namespace SimpleFactory;
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/5/14
 * Time: 19:47
 */
abstract class CashSuper
{
	public abstract function acceptCash($money);
}


class CashNormal extends CashSuper
{
	public function acceptCash($money){
		return $money;
	}
}


class CashDiscount extends CashSuper
{
	private $discount;

	public function __construct($discount){
		$this->discount = $discount;
	}

	public function acceptCash($money){
		return $money * $this->discount;
	}
}


class CashReturn extends CashSuper
{
	private $condition;
	private $bonus;

	public function __construct($condition, $bonus){
		$this->condition = $condition;
		$this->bonus = $bonus;
	}

	public function acceptCash($money){
		if($money >= $this->condition) {
			return $money - floor($money / $this->condition) * $this->bonus;
		}
		return $money;
	}
}