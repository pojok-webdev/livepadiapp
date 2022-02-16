<?php
Class Pclient_site extends CI_Model{
    function __construct(){
        parent::__construct();
    }
    function remove($params){
        $sql = 'delete from client_sites ';
        $sql.= 'where id='.$params['id'];
        $ci = & get_instance();
        $ci->db->query($sql);
        return $sql;
    }
    function save2($params){
        $keys = array();$vals = array();
        foreach($params as $key=>$val){
            array_push($keys,$key);
            array_push($vals,$val);
        }
        $sql = 'insert into client_sites ';
        $sql.= '('.implode(",",$keys).') ';
        $sql.= 'values ';
        $sql.= '("'.implode('","',$vals).'") ';
        $ci = & get_instance();
        $ci->db->query($sql);
        return $ci->db->insert_id();
    }
    function save($params){
        $sql = 'insert into client_sites ';
        $sql.= '(';
        $sql.= 'survey_request_id,';
        $sql.= 'client_id,';
        $sql.= 'sale_id,';
        $sql.= 'branch_id__,';
        $sql.= 'address,';
        $sql.= 'city,';
        $sql.= 'install_area,';
        $sql.= 'pic_name,';
        $sql.= 'pic_phone,';
        $sql.= 'pic_email,';
        $sql.= 'pic_position,';
        $sql.= 'createuser';
        $sql.= ') ';
        $sql.= 'values ';
        $sql.= '(';
        $sql.= ''.$params['survey_request_id'].',';
        $sql.= ''.$params['client_id'].',';
        $sql.= ''.$params['sale_id'].',';
        $sql.= ''.$params['branch_id__'].',';
        $sql.= '"'.$params['address'].'",';
        $sql.= '"'.$params['city'].'",';
        $sql.= '"'.$params['install_area'].'",';
        $sql.= '"'.$params['pic_name'].'",';
        $sql.= '"'.$params['pic_phone'].'",';
        $sql.= '"'.$params['pic_email'].'",';
        $sql.= '"'.$params['pic_position'].'",';
        $sql.= '"'.$params['createuser'].'"';
        $sql.= ') ';
        $ci = & get_instance();
        $ci->db->query($sql);
        return $ci->db->insert_id();
    }
    function update($params){
        $str = '';
        $arr = array();
        foreach($params as $key=>$val){
            $str = ''.$key.'="'.$val.'"';
            array_push($arr,$str);
        }
        $sql = 'update client_sites ';
        $sql.= 'set ' . implode(',',$arr) . ' ';
        $sql.= 'where id='.$params['id'];
        $ci = & get_instance();
        $ci->db->query($sql);

    }
}
