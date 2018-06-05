<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/5/31
 * Time: 17:16
 */
class ClassLoader
{
	public function __construct()
	{
		spl_autoload_register([$this, "load"]);
	}

	public static function load($class)
	{
		$file = __DIR__ . DIRECTORY_SEPARATOR . $class . ".php";
		if (file_exists($file)) {
			include $file;
		} else {
			include __DIR__ . DIRECTORY_SEPARATOR  . "Power.php";
		}
	}

}
