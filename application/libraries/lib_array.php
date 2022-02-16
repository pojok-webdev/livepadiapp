<?php
class Lib_array{
	function create_array($model,$arr_param){
		$output=array();
		foreach ($model as $mdl){
			$tmp=array();
			foreach ($arr_param as $arr){
				array_push($tmp, $mdl->$arr);
			}
			array_push($output, $tmp);
		}
		return $output;
	}
	function createcomboarray($objs,$key='id',$val='name'){
		$arr = array();
		foreach($objs as $obj){
			$arr[$obj->$key] = $obj->$val;
		};
		return $arr;
	}
}