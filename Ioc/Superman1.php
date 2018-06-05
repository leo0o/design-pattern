<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/5/28
 * Time: 17:34
 */
class Superman1
{
	private $powers;

	public function __construct()
	{
		echo "spider man comes..\n";
		$this->powers = [];
		$shot = new Shot(1000);        //Superman依赖Shot,Fight类，当其中某个类改动时，Superman也要跟着改动。
		$fight = new Fight(250);
		array_push($this->powers, $shot);
		array_push($this->powers, $fight);
	}

	public function attack()
	{
		foreach ($this->powers as $power) {
			if (!($power instanceof PowerInterface)) {
				echo "something goes wrong..\n";
				exit();
			}
			$power->activate();
		}
	}
}




