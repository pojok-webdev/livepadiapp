<?php
Class Pricelistsservice extends CI_Model{
    function __construct(){
        parent::__construct();
    }
    function getCategories(){
        $sql = 'select category_id from pricelists2.categories ';
        $ci = & get_instance();
        $que = $ci->db->query($sql);
        return array('res'=>$que->result(),'cnt'=>$que->num_rows());
    }
}
