<?php
Class Clientproduct extends CI_Model{
    function __construct(){
        parent::__construct();
        $this->load->library('crud');
    }
    function create($params){
        return $this->crud->create('clientproducts',$params);
    }
    function getclientidbynofb($params){
        $sql = 'select client_id from fbs where nofb="'.$params['nofb'].'" ';
        $ci = & get_instance();
        $res = $ci->db->query($sql);
        if($res->num_rows()>0){
            return $res->result()[0];
        }else{
            return false;
        }
    }
    function getclientwithmorethanonefbproduct(){
        $sql = 'select count(b.nofb)cnfb,b.nofb,b.client_id from fbproducts a ';
        $sql.= 'left outer join fbs b on b.nofb=a.nofb ';
        $sql.= 'group by b.nofb,b.client_id order by b.client_id,b.nofb ';
    }
    function getallproductsofclient($client_id){
        $sql = 'select a.* from fbproducts a left outer join fbs b on b.nofb=a.nofb where client_id=' . $client_id . ' ';
        $ci = & get_instance();
        $que = $ci->db->query($sql);
        return array(
            'res'=>$que->result(),
            'cnt'=>$que->num_rows()
        );
    }
    function duplicatetoclientproduct($params){
        $sql = 'insert into clientproducts ';
        $sql.= '(client_id,product_id,category_id,detail_id,detail) ';
        $sql.= 'select '.$params['client_id'].' client_id,a.product_id,a.category_id,a.detail_id,a.detail ';
        $sql.= 'from fbproducts a left outer join fbs b on b.nofb=a.nofb ';
        $sql.= 'where client_id=' . $params['client_id'] . ' ';
        $ci = & get_instance();
        $que = $ci->db->query($sql);
        return array(
            'res'=>'success',
        );
    }
}