<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/5/18
 * Time: 19:59
 */

class ManagerFactory{
	public static function NewManager($type){
		switch ($type){
			case 'Charge':
				return new Charge();
			case 'Manager':
				return new Manager();
			case 'CTO':
				return new CTO();
			default:
				return new Charge();
		}
	}
}

abstract class BaseManager{

	private $leaderRole;

	public abstract function headle($leaveDays, $cause);

	public function setLeader($role){
		$this->leaderRole = $role;
	}
	public function getLeader(){
		return $this->leaderRole;
	}
}

class Charge extends BaseManager{
	public function headle($leaveDays, $cause){
		echo '--- 主管审批 ---';
		echo PHP_EOL;
		if($cause == "确实有事"){
			if($leaveDays < 0.5){
				echo '确实有事，并且只请半天，我批准';
				echo PHP_EOL;
				return true;
			}else{
				echo '确实有事，但是请假超过半天，我审批完之后还要提交给上级领导（经理）审批';
				echo PHP_EOL;
				$this->setLeader(ManagerFactory::NewManager("Manager"));
				return $this->getLeader()->headle($leaveDays, $cause);
			}
		}else{
			echo '无正当理由，我不批准';
			echo PHP_EOL;
			return false;
		}
	}
}

class Manager extends BaseManager{
	public function headle($leaveDays, $cause){
		echo '--- 经理审批 ---';
		echo PHP_EOL;
		if($cause == "确实有事"){
			if($leaveDays < 2){
				echo '确实有事，并且小于2天，我批准';
				echo PHP_EOL;
				return true;
			}else{
				echo '确实有事，但是请假超过两天，我审批完之后还要提交给上级领导（CTO）审批';
				echo PHP_EOL;
				$this->setLeader(ManagerFactory::NewManager("CTO"));
				return $this->getLeader()->headle($leaveDays, $cause);
			}
		}else{
			echo '无正当理由，我不批准';
			echo PHP_EOL;
			return false;
		}
	}

}

class CTO extends BaseManager{
	public function headle($leaveDays, $cause){
		echo '--- CTO审批 ---';
		echo PHP_EOL;
		if($cause == "确实有事"){
			echo '确实有事，我批准';
			echo PHP_EOL;
			return true;
		}else{
			echo '无正当理由，我不批准';
			echo PHP_EOL;
			return false;
		}
	}

}

