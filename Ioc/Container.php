<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/5/31
 * Time: 14:53
 */

class Container
{
	private $instances;   //通过直接实例化生产
	private $callables;   //通过回调函数生产

	public function bind($abstract, $concret){
		if ($concret instanceof Closure) {
			$this->callables[$abstract] = $concret;
		} else {
			$this->instances[$abstract] = $concret;
		}
	}

	public function make($abstract, $params = []){
		if (isset($this->values, $abstract)) {
			return $this->values[$abstract];
		}
		return call_user_func_array($this->callables[$abstract], [$this, $params]);
	}
}