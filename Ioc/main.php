<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/5/31
 * Time: 17:10
 */

require_once 'ClassLoader.php';
$loader = new ClassLoader();

/*echo "mieba is coming\n";
$spiderman = new Superman1();
$spiderman->attack();*/

/*echo "mieba is coming\n";
$spiderman = new Superman2();
$spiderman->setPower(new Shot(1000));   //Superman不依赖Shot,Fight类，但是使用方需要知道
$spiderman->setPower(new Fight(1000));
$spiderman->attack();*/

echo "mieba is coming\n";
$container = new Container();
$container->bind('superman', function(Container $container, $params) {
	if (!is_array($params)) {
		return false;
	}
	$powers = [];
	foreach ($params as $power) {
		$powers[] = $container->make($power);
	}
	return new Superman2($powers);
});

$container->bind('shot', function(Container $container) {
	return new Shot(1000);
});

$container->bind('fight', function(Container $container) {
	return new fight(300);
});

$s = $container->make('superman', ['shot', 'fight']);
$s->attack();
