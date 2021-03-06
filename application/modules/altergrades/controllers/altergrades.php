<?php
class Altergrades extends CI_Controller{
	var $data,$path = array();
	var $ionuser;
	function __construct(){
		parent::__construct();
		$this->path = array(
			'csspath' => base_url() . 'css/aquarius/',
			'jspath' => base_url() . 'js/aquarius/',
			'imagepath' => base_url() . 'img/aquarius/',
		);
		$this->data = array(
			'csspath' => base_url() . 'css/aquarius/',
			'jspath' => base_url() . 'js/aquarius/',
			'imagepath' => base_url() . 'img/aquarius/',
			'path'=>$this->path
		);
		if($this->ion_auth->logged_in()){
			$this->ionuser = $this->ion_auth->user()->row();
			$this->data['user'] = $this->user->get_user_by_id($this->ionuser->id);
		}
	}
	function add(){
		$this->check_login();
		$client_id = $this->uri->segment(3);
		$this->data['client'] = $this->client_site->get_obj_by_id($client_id);
		$this->data['officers']=$this->user->get_user_by_group('TS');
		$this->data['apwifis']=$this->device->get_combo_data(13);
		$this->data['pccards']=$this->device->get_combo_data(1);
		$this->data['antennas']=$this->device->get_combo_data(8);
		$this->data['routers']=$this->device->get_combo_data(14);
		$this->data['btstowers']=$this->pbtstower->get_combo_data();
		$this->data['clients']=$this->client->get_combo_data();
		$this->data['clientsites']=$this->client_site->get_combo_data_address();
		$this->data['devices']=$this->device->get_combo_data();
		$this->data['materials']=$this->material->get_combo_data();
		$this->data['materialtypes']=$this->materialtype->get_combo_data();
		$this->data['services'] = $this->service->get_combo_data();
		$this->data['obj'] = $this->client_site->get_obj_by_id($client_id);
		$this->data['menuFeed'] = 'altergrade';
		switch($this->session->userdata["role"]){
			case 'Sales':
			$this->load->view('Sales/altergrades/altergrade_add',$this->data);
			break;
			case 'TS':
			$this->load->view('TS/altergrades/add',$this->data);
			break;
		}
	}
	function add_antenna(){
		$params = $this->input->post();
		echo Site_antenna::add($params);
	}
	function add_router(){
		$params = $this->input->post();
		echo Site_router::add($params);
	}
	function add_ap_wifi(){
		$params = $this->input->post();
		echo Site_ap_wifi::add($params);
	}
	function add_executor(){
		$params = $this->input->post();
		echo Alterexecutor::add($params);
	}
	function add_pccard(){
		$params = $this->input->post();
		$out = '';
		echo Site_pccard::add($params);
	}
	function add_wireless_radio(){
		$params = $this->input->post();
		echo Site_wireless_radio::add($params);
	}
	function check_login(){
		if(!$this->ion_auth->logged_in()){
			redirect(base_url() . 'index.php/adm/login');
		}
	}
	function edit(){
		$this->check_login();
		$id = $this->uri->segment(3);
		$this->data['obj'] = $this->altergrade->get_obj_by_id($id);
		$this->data['officers']=$this->user->get_user_by_group('TS');
		$this->data['apwifis']=$this->device->get_combo_data(13);
		$this->data['hours']=$this->common->gethours();
		$this->data['minutes']=$this->common->getminutes();
		$this->data['pccards']=$this->device->get_combo_data(1);
		$this->data['antennas']=$this->device->get_combo_data(8);
		$this->data['routers']=$this->device->get_combo_data(14);
		$this->data['btstowers']=$this->pbtstower->get_combo_data();
		$this->data['clients']=$this->client->get_combo_data();
		$this->data['clientsites']=$this->client->get_combo_data_address();
		$this->data['devices']=$this->device->get_combo_data();
		$this->data['materials']=$this->material->get_combo_data();
		$this->data['materialtypes']=$this->materialtype->get_combo_data();
		$this->data['services'] = $this->service->get_combo_data();
		$this->data['menuFeed'] = 'altergrade';
		switch($this->session->userdata["role"]){
			case 'Sales':
			$this->load->view('Sales/altergrades/altergrade_edit',$this->data);
			break;
			case 'TS':
			$this->load->view('TS/altergrades/altergrade_edit',$this->data);
			break;
		}
	}
	function index(){
		$this->check_login();
		$this->data['objs'] = $this->altergrade->populate();
		$this->data['menuFeed'] = 'altergrade';
		switch($this->session->userdata["role"]){
			case 'Sales':
			$this->load->view('Sales/altergrades/altergrades',$this->data);
			break;
			case 'TS':
			$this->load->view('TS/altergrades/index',$this->data);
			break;
		}
	}
	function operatorremove(){
		$params = $this->input->post();
		$obj = new Alterexecutor();
		$obj->where('id',$params['id'])->get();
		$obj->delete();
		echo $obj->check_last_query();
	}
	function operatorsave(){
		$params = $this->input->post();
		$obj = new Alterexecutor();
		foreach($params as $key=>$val){
			$obj->$key = $val;
		}
		$obj->save();
		echo $this->db->insert_id();
	}
	function remove(){
		$params = $this->input->post();
		echo $this->altergrade->remove($params);
	}
	function getclient(){
		echo json_encode($this->client_site->get_combo_data(1));
	}
	function getservice($id){
		$obj = new Service();
		$obj->where('id',$id)->get();
		return $obj;
	}
	function save(){
		$params = $this->input->post();
		echo $this->altergrade->add($params);
	}
	function update(){
		$params = $this->input->post();
		$obj = new Altergrade();
		$obj->where('id',$params['id'])->update($params);
		echo 'test yo';
//		$this->altergrade->edit($params);
	}
}
