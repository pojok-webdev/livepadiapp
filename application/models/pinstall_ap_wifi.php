<?php
Class pinstall_ap_wifi extends CI_Model{
    function __construct(){
        parent::__construct();
    }
    function getwifisjson($params){
		$sql = 'select id,install_site_id,tipe,macboard,ip_address,essid,security_key,user,password,location,owner,ownership,user_name,createuser,create_date ';
        $sql.= 'from install_ap_wifis where install_site_id='.$params['install_site_id'];
        $ci = & get_instance();
        $que = $ci->db->query($sql);
        return array(
            'cnt'=>$que->num_rows(),'res'=>$que->result()
        );
	}
    function getwifijson($params){
		$sql = 'select id,install_site_id,tipe,macboard,ip_address,essid,security_key,user,password,location,owner,ownership,user_name,createuser,create_date ';
        $sql.= 'from install_ap_wifis where id='.$params['id'];
        $ci = & get_instance();
        $que = $ci->db->query($sql);
        return array(
            'cnt'=>$que->num_rows(),'res'=>$que->result()
        );
	}
}
