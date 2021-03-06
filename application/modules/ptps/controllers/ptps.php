<?php
class Ptps extends CI_Controller{
	function index(){
		$sql = "select a.id,a.name,a.description,b.name btstower from ptps a left outer join btstowers b on b.id=a.btstower_id ";
		$que = $this->db->query($sql);
		$res = $que->result();
		$objs = $res;
		$data['btses'] = $this->pbtstower->get_combo_data();
		$data['branches'] = $this->branch->get_combo_data();
		$data["objs"] = $objs;
		$data["menuFeed"] = "ptps";
		$this->load->view("adm/ptps",$data);
	}
	function save(){
		$params = $this->input->post();
		$keys = array();$vals = array();
		foreach($params as $key=>$val){
			array_push($keys,''.$key.'');
			array_push($vals,''.$val.'');
		}
		$sql = 'insert into ptps ('.implode(",",$keys).') values ("'.implode('","',$vals).'") ';
		$que = $this->db->query($sql);		
		echo $sql;
	}
	function update(){
		$params = $this->input->post();
		$arr = array();
		foreach($params as $key=>$val){
			array_push($arr,''.$key.'="'.$val.'"');
		}
		$sql = 'update ptps set '.implode(",",$arr).' where id='.$params["id"];
		$que = $this->db->query($sql);
		echo $sql;
	}
	function remove(){
		$id = $this->uri->segment(3);
		$sql = "delete from ptps where id=".$id;
		$que = $this->db->query($sql);
		echo $sql;
	}
	function get(){
		$id = $this->uri->segment(3);
		$sql = "select id,name,btstower_id,branch_id,ipaddress,description from ptps ";
		$sql.= "where id=".$id;
		$que = $this->db->query($sql);
		$res = $que->result();
		$obj = $res[0];
		$arr = array();
		foreach($this->db->list_fields('ptps') as $field){
			array_push($arr,'"'.$field.'"' . ':' . '"'.$obj->$field.'"');
		}
		echo "{".implode(",",$arr)."}";
	}
	function gets(){
		$sql = "select id,name from ptps ";
		$que = $this->db->query($sql);
		$res = $que->result();
		$objs = $res;
		$arr = array();
		foreach($objs as $obj){
			array_push($arr, '"' . $obj->id . '":"' . $obj->name . '"');
		}
		echo "{".implode(",",$arr)."}";
	}
}
