<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/5/31
 * Time: 14:26
 */

interface PowerInterface
{
	public function activate();
}


class Shot implements PowerInterface
{
	private $distance;

	public function __construct()
	{

	}

	public function activate()
	{
		// TODO: Implement activate() method.
		echo "shot...\n";
	}
}

class Fight implements PowerInterface
{
	private $hit;

	public function __construct()
	{

	}

	public function activate()
	{
		// TODO: Implement activate() method.
		echo "fight...\n";
	}
}