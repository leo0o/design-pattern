<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/5/15
 * Time: 15:38
 */
namespace Strategy;

interface ICash{
	public function run($money);
}

class CashNormal implements ICash{
	public function run($money){
		return $money;
	}
}

class CashDiscount implements ICash{

	private $discount;

	public function __construct($discount)
	{
		$this->discount = $discount;
	}

	public function run($money){
		return $money * $this->discount;
	}
}

class CashReturn implements ICash{

	private $condition;
	private $bonus;

	public function __construct($condition, $bonus)
	{
		$this->condition = $condition;
		$this->bonus = $bonus;
	}

	public function run($money){
		return $money - floor($money / $this->condition) * $this->bonus;
	}
}

class CashContext {
	private $payStrategy;

	public function pay($money){
		return $this->payStrategy->run($money);
	}

	public function setPayStractegy($strategy){
		$this->payStrategy = $strategy;
	}
}

//结合工厂模式
class AnotherCashContext{
	private $payStrategy;

	public function __construct($type)
	{
		switch ($type){
			case "1" :
				$this->payStrategy = new \Strategy\CashNormal();
				break;
			case "2" :
				$this->payStrategy = new \Strategy\CashDiscount(0.8);
				break;
			case "3" :
				$this->payStrategy = new \Strategy\CashReturn(300, 50);
				break;
			default:
				$this->payStrategy = new \Strategy\CashNormal();
		}
	}

	public function pay($money){
		return $this->payStrategy->run($money);
	}

}