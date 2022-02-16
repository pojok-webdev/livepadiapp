<?php
Class Clientproducts extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('clientproduct');
    }
    function index(){

    }
    function create(){
        $params = $this->input->post();
        echo json_encode($this->clientproduct->create($params));
    }
    function samplecreate(){
        echo $this->clientproduct->create(
            array(
                'client_id'=>1,
                'category_id'=>1,
                'product_id'=>1,
                'detail_id'=>1,
                'detail'=>'He he',
                'subscriptiontype'=>'1',
                'status'=>'1',
                'startdate'=>'2020-10-01',
                'enddate'=>'2020-12-01')
        );
    }
    function getclientidbynofb(){
        $params = $this->input->post();
        echo json_encode($this->clientproduct->getclientidbynofb($params));
    }
    function duplicatetoclientproduct(){
        $params = $this->input->post();
        //echo json_encode($params);
        echo json_encode($this->clientproduct->duplicatetoclientproduct($params));
    }
}