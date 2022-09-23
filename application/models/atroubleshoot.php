<?php
Class Atroubleshoot extends CI_Model{
    function __construct(){
        parent::__construct();
        $this->load->library('crud');
    }
    function gets($condition){
        return $this->crud->gets('troubleshoot_requests',array('id','name','satuan','description'),$condition);
    }
    function getsrelated($conditions){
        $condition = array();
        foreach($conditions as $key=>$val){
            array_push($condition,$key.'='.$val.'');
        }
        $sql = 'select a.id,b.kdticket, b.clientname,address,troubleshoot_date,a.create_date, troubleshoottype,';
        $sql.= ' a.ticket_id ,nameofmtype, a.create_date ';
        $sql.= 'from troubleshoot_requests a ';
        $sql.= 'left outer join tickets b on b.id=a.ticket_id ';
        $sql.= 'where ' . implode(' and ',$condition) . ' ';
        $sql.= 'order by a.create_date desc ';
        $ci = & get_instance();
        $que = $ci->db->query($sql);
        return array(
            'res'=>$que->result(),'cnt'=>$que->num_rows()
        );
    }
    function getmaterials($id){
        $sql = 'select a.id,b.name, b.description,b.tipe from troubleshoot_requests a ';
        $sql.= 'left outer join troubleshoot_materials b on b.troubleshoot_request_id=a.id ';
        $sql.= 'where a.id = ' . $id . ' ';
        $sql.= 'and b.id is not null ';
        $ci = & get_instance();
        $que = $ci->db->query($sql);
        return array(
            'res'=>$que->result(),'cnt'=>$que->num_rows()
        );
    }
    function getdevices($id){
        $sql = 'select a.id,b.name, b.devicetype,b.amount from troubleshoot_requests a ';
        $sql.= 'left outer join troubleshoot_devices b on b.troubleshoot_request_id=a.id ';
        $sql.= 'where a.id = ' . $id . ' ';
        $sql.= 'and b.id is not null ';
        $ci = & get_instance();
        $que = $ci->db->query($sql);
        return array(
            'res'=>$que->result(),'cnt'=>$que->num_rows()
        );
    }
    function getrouters($id){
        $sql = 'select a.id,c.tipe, c.macboard,c.serialno from troubleshoot_requests a ';
        $sql.= 'left outer join troubleshoot_routers c on c.troubleshoot_request_id=a.id ';
        $sql.= 'where a.id = ' . $id . ' ';
        $sql.= 'and c.milikpadinet = "1" ';
        $ci = & get_instance();
        $que = $ci->db->query($sql);
        return array(
            'res'=>$que->result(),'cnt'=>$que->num_rows()
        );
    }
    function getantennas($id){
        $sql = 'select a.id,c.name, c.amount from troubleshoot_requests a ';
        $sql.= 'left outer join troubleshoot_antennas c on c.troubleshoot_request_id=a.id ';
        $sql.= 'where a.id = ' . $id . ' ';
        $ci = & get_instance();
        $que = $ci->db->query($sql);
        return array(
            'res'=>$que->result(),'cnt'=>$que->num_rows()
        );
    }
    function gettroubleshootswitches($id){
        $sql = 'select a.id,c.name, c.port from troubleshoot_requests a ';
        $sql.= 'left outer join troubleshoot_sites b on b.troubleshoot_request_id=a.id ';
        $sql.= 'left outer join troubleshoot_switches c on c.troubleshoot_request_id=b.id ';
        $sql.= 'where a.id = ' . $id . ' ';
        $sql.= 'and b.id is not null ';
        $ci = & get_instance();
        $que = $ci->db->query($sql);
        return array(
            'res'=>$que->result(),'cnt'=>$que->num_rows()
        );
    }
    function gettroubleshootwirelessradios($id){
        $sql = 'select a.id,c.tipe, c.macboard from troubleshoot_requests a ';
        $sql.= 'left outer join troubleshoot_sites b on b.troubleshoot_request_id=a.id ';
        $sql.= 'left outer join troubleshoot_wireless_radios c on c.troubleshoot_request_id=b.id ';
        $sql.= 'where a.id = ' . $id . ' ';
        $sql.= 'and b.id is not null ';
        $ci = & get_instance();
        $que = $ci->db->query($sql);
        return array(
            'res'=>$que->result(),'cnt'=>$que->num_rows()
        );
    }
    function getpccards($id){
        $sql = 'select a.id,c.name, c.description from troubleshoot_requests a ';
        $sql.= 'left outer join troubleshoot_pccards c on c.troubleshoot_request_id=a.id ';
        $sql.= 'where a.id = ' . $id . ' ';
        $ci = & get_instance();
        $que = $ci->db->query($sql);
        return array(
            'res'=>$que->result(),'cnt'=>$que->num_rows()
        );
    }
    function gettroubleshootapwifis($id){
        $sql = 'select a.id,c.tipe, c.macboard from troubleshoot_requests a ';
        $sql.= 'left outer join troubleshoot_apwifis c on c.troubleshoot_request_id=a.id ';
        $sql.= 'where a.id = ' . $id . ' ';
        $ci = & get_instance();
        $que = $ci->db->query($sql);
        return array(
            'res'=>$que->result(),'cnt'=>$que->num_rows()
        );
    }
    function getswitches($id){
        $sql = 'select a.id,c.name from troubleshoot_requests a ';
        $sql.= 'left outer join troubleshoot_switches c on c.troubleshoot_request_id=a.id ';
        $sql.= 'where a.id = ' . $id . ' ';
        $ci = & get_instance();
        $que = $ci->db->query($sql);
        return array(
            'res'=>$que->result(),'cnt'=>$que->num_rows()
        );
    }
    
}