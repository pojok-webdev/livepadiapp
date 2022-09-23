<?php
Class Amaterial extends CI_Model{
    function __construct(){
        parent::__construct();
        $this->load->library('crud');
    }
    function gets($condition){
        return $this->crud->gets('materials',array('id','name','satuan','description'),$condition);
    }
    function getsrelated(){
        $sql = 'select a.id,a.name,a.satuan,a.description,b.name tipe ';
        $sql.= 'from materials a ';
        $sql.= 'left outer join materialtypes b on b.id=a.materialtype_id';
    
        $ci = & get_instance();
        $que = $ci->db->query($sql);
        return array(
            'res'=>$que->result(),'cnt'=>$que->num_rows()
        );
    }
    
}