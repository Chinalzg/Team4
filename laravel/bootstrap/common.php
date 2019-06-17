<?php 

	function getTree($arr,$pid=0,$res=array()){
		foreach ($arr as $k => $v) {
			if($v['pid'] == $pid){
				$res[$k]['id']=$v['id'];
				$res[$k]['name']=$v['name'];
				$res[$k]['code']=$v['code'];
				$res[$k]['pid']=$v['pid'];
				$res[$k]['status']=$v['status'];
				$res[$k]['child']=getTree($arr,$v['id']);
			}
		}
		return $res;
	}


	function getChild($arr,$pid=0,$level=1){
		static $array = array();

		foreach ($arr as $k => $v) {
			// var_dump($v);die;
			if($v->pid == $pid){
				$v->level = $level;
				$array[] = $v;
				getChild($arr,$v->id,$level+1);
			}
		}

		return $array;
	}

 ?>