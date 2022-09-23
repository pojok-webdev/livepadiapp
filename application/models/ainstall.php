<?php
Class Ainstall extends CI_Model{
    function __construct(){
        parent::__construct();
        $this->load->library('crud');
    }
    function gets($condition){
        return $this->crud->gets('install_requests',array('id','name','satuan','description'),$condition);
    }
    function getsrelated($conditions){
        $condition = array();
        foreach($conditions as $key=>$val){
            array_push($condition,$key.'='.$val.'');
        }
        $sql = 'select a.id,c.name,b.address,b.city,"" servicename,business_field,a.create_date,d.username, ';
        $sql.= 'a.install_date,a.fix_install_date ';
        $sql.= 'from install_requests a ';
        $sql.= 'left outer join install_sites b on b.install_request_id=a.id ';
        $sql.= 'left outer join clients c on c.id=a.client_id ';
        $sql.= 'left outer join users d on d.id=c.user_id ';
        $sql.= 'where ' . implode(' and ',$condition) . ' ';
        $sql.= 'and b.id is not null ';
        $sql.= 'and c.id is not null ';
        $ci = & get_instance();
        $que = $ci->db->query($sql);
        return array(
            'res'=>$que->result(),'cnt'=>$que->num_rows()
        );
    }
    function getinstallmaterials($id){
        $sql = 'select a.id,c.name, c.description,c.tipe from install_requests a ';
        $sql.= 'left outer join install_sites b on b.install_request_id=a.id ';
        $sql.= 'left outer join install_materials c on c.install_site_id=b.id ';
        $sql.= 'where c.id = ' . $id . ' ';
        $sql.= 'and b.id is not null ';
        $ci = & get_instance();
        $que = $ci->db->query($sql);
        return array(
            'res'=>$que->result(),'cnt'=>$que->num_rows()
        );
    }
    function getinstallrouters($id){
        $sql = 'select a.id,c.tipe, c.macboard,c.serialno from install_requests a ';
        $sql.= 'left outer join install_sites b on b.install_request_id=a.id ';
        $sql.= 'left outer join install_routers c on c.install_site_id=b.id ';
        $sql.= 'where c.id = ' . $id . ' ';
        $sql.= 'and b.id is not null ';
        $sql.= 'and c.milikpadinet = "1" ';
        $ci = & get_instance();
        $que = $ci->db->query($sql);
        return array(
            'res'=>$que->result(),'cnt'=>$que->num_rows()
        );
    }
    function getinstallantennas($id){
        $sql = 'select a.id,c.name, c.amount from install_requests a ';
        $sql.= 'left outer join install_sites b on b.install_request_id=a.id ';
        $sql.= 'left outer join install_antennas c on c.install_site_id=b.id ';
        $sql.= 'where c.id = ' . $id . ' ';
        $sql.= 'and b.id is not null ';
        $ci = & get_instance();
        $que = $ci->db->query($sql);
        return array(
            'res'=>$que->result(),'cnt'=>$que->num_rows()
        );
    }
    function getinstallswitches($id){
        $sql = 'select a.id,c.name, c.port from install_requests a ';
        $sql.= 'left outer join install_sites b on b.install_request_id=a.id ';
        $sql.= 'left outer join install_switches c on c.install_site_id=b.id ';
        $sql.= 'where c.id = ' . $id . ' ';
        $sql.= 'and b.id is not null ';
        $ci = & get_instance();
        $que = $ci->db->query($sql);
        return array(
            'res'=>$que->result(),'cnt'=>$que->num_rows()
        );
    }
    function getinstallwirelessradios($id){
        $sql = 'select a.id,c.tipe, c.macboard from install_requests a ';
        $sql.= 'left outer join install_sites b on b.install_request_id=a.id ';
        $sql.= 'left outer join install_wireless_radios c on c.install_site_id=b.id ';
        $sql.= 'where c.id = ' . $id . ' ';
        $sql.= 'and b.id is not null ';
        $ci = & get_instance();
        $que = $ci->db->query($sql);
        return array(
            'res'=>$que->result(),'cnt'=>$que->num_rows()
        );
    }
    function getinstallpccards($id){
        $sql = 'select a.id,c.name, c.description from install_requests a ';
        $sql.= 'left outer join install_sites b on b.install_request_id=a.id ';
        $sql.= 'left outer join install_pccards c on c.install_site_id=b.id ';
        $sql.= 'where c.id = ' . $id . ' ';
        $sql.= 'and b.id is not null ';
        $ci = & get_instance();
        $que = $ci->db->query($sql);
        return array(
            'res'=>$que->result(),'cnt'=>$que->num_rows()
        );
    }
    function getinstallapwifis($id){
        $sql = 'select a.id,c.tipe, c.macboard from install_requests a ';
        $sql.= 'left outer join install_sites b on b.install_request_id=a.id ';
        $sql.= 'left outer join install_ap_wifis c on c.install_site_id=b.id ';
        $sql.= 'where c.id = ' . $id . ' ';
        $sql.= 'and b.id is not null ';
        $ci = & get_instance();
        $que = $ci->db->query($sql);
        return array(
            'res'=>$que->result(),'cnt'=>$que->num_rows()
        );
    }
    
}