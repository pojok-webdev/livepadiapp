<?php
class Install_switches extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->library('crud');
	}
	function save(){
		$params = $this->input->post();
		$obj = new Install_switch();
		foreach($params as $key=>$val){
			$obj->$key = $val;
		}
		$obj->save();
		echo $this->db->insert_id();
	}
	function remove(){
		$params = $this->input->post();
		$obj = new Install_switch();
		$obj->where("id",$params["id"])->get();
		$obj->delete();
		echo $obj->check_last_query();
	}
	function update(){
		$params = $this->input->post();
		echo json_encode($this->crud->update(
				'install_switches',
				array(
					'name'=>$params['name'],
					'ismanaged'=>$params['ismanaged'],
					'port'=>$params['port'],
					'ownership'=>$params['ownership']
				),
				array('id'=>$params['id'])
			)
		);
	}
	function getjsonswitch(){
		$id = $this->uri->segment(3);
		echo json_encode($this->crud->gets(
			'install_switches',
			array(
				'install_site_id',
				'name',
				'port',
				'ismanaged',
				'user',
				'password',
				'ownership',
				'createuser',
				'createdate'
			),array(
				'id'=>$id
			)));
	}
}
