<?php
Class Adevice extends CI_Model{
    function __construct(){
        parent::__construct();
        $this->load->library('crud');
    }
    function gets($condition){
        return $this->crud->gets('devices',array('id','name','satuan','description'),$condition);
    }
    function getsrelated(){
        $sql = 'select a.id,a.name,a.satuan,a.description,b.name tipe ';
        $sql.= 'from devices a ';
        $sql.= 'left outer join devicetypes b on b.id=a.devicetype_id';
        $ci = & get_instance();
        $que = $ci->db->query($sql);
        return array(
            'res'=>$que->result(),'cnt'=>$que->num_rows()
        );
    }
}