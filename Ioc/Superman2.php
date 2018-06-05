<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/5/28
 * Time: 17:34
 */
class Superman2
{
	private $powers=[];

	public function __construct($powers)
	{
		$this->powers = $powers;
		echo "spider man comes..\n";
	}

	public function setPower(PowerInterface $power)
	{
		array_push($this->powers, $power);
	}

	public function attack()
	{
		foreach ($this->powers as $power) {
			if(!($power instanceof PowerInterface)) {
				echo "something goes wrong..\n";
				exit();
			}
			$power->activate();
		}
	}
}



