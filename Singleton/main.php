<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/5/15
 * Time: 19:54
 */


class Singleton{

	private static $instance = null;

	private function __construct(){

	}

	public static function getInstance(){
		if(empty(self::$instance)){
			self::$instance = new Singleton();
		}
		return self::$instance;
	}

}


$s1 = Singleton::getInstance();
$s2 = Singleton::getInstance();
var_dump($s1 == $s2);