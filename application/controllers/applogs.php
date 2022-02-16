<?php
Class Applogs extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('applog');
    }
    function create(){
        $params = $this->input->post();
        $this->applog->create($params);
        echo json_encode($params);
    }
}