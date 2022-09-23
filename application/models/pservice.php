<?php
Class Pservice extends CI_Model{
    function __construct(){
        parent::__construct();
    }
    function getinternets(){
        $sql = 'select id,name from pricelists2.products ';
        $ci = & get_instance();
        $que = $ci->db->query($sql);
        return array(
            'res'=>$que->result(),'cnt'=>$que->num_rows(),'sql'=>$sql
        );
    }
    function getvases(){
        $sql = 'select id,name from pricelists2.vases ';
        $ci = & get_instance();
        $que = $ci->db->query($sql);
        return array(
            'res'=>$que->result(),'cnt'=>$que->num_rows(),'sql'=>$sql
        );
    }
    function getphiloins(){
        $sql = 'select id,name from pricelists2.philos ';
        $ci = & get_instance();
        $que = $ci->db->query($sql);
        return array(
            'res'=>$que->result(),'cnt'=>$que->num_rows(),'sql'=>$sql
        );
    }
    function getdevices(){
        $sql = 'select id,name from pricelists2.devices ';
        $ci = & get_instance();
        $que = $ci->db->query($sql);
        return array(
            'res'=>$que->result(),'cnt'=>$que->num_rows(),'sql'=>$sql
        );
    }
    function savesurveyservice($client_id,$servicetype,$service_id){
        $sql = 'insert into survey_client_services ';
        $sql.= '(client_id,servicetype,service_id)';
        $sql.= 'values ';
        $sql.= '('.$client_id.','.$servicetype.','.$service_id.')';
        $ci = & get_instance();
        $que = $ci->db->query($sql);
    }
    function getservicesbytype($client_id,$type){
        $sql = 'select b.id,b.name from survey_client_services a ';
        switch($type){
            case '1':
            $sql.= 'left outer join pricelists2.products b on b.id=a.service_id ';
            break;
            case '2':
            $sql.= 'left outer join pricelists2.vases b on b.id=a.service_id ';
            break;
            case '3':
            $sql.= 'left outer join pricelists2.devices b on b.id=a.service_id ';
            break;
            case '4':
            $sql.= 'left outer join pricelists2.philos b on b.id=a.service_id ';
            break;
        }
        $sql.= 'where servicetype="'.$type.'" ';
        $sql.= 'and client_id='.$client_id.' ';
        $ci = & get_instance();
        $que = $ci->db->query($sql);
        return array(
            'res'=>$que->result(),'cnt'=>$que->num_rows(),'sql'=>$sql
        );
    }
    function getinstallservicesbytype($client_id,$type){
        $sql = 'select b.id,b.name,a.ownership,a.service_id,';
        $sql.= ' case a.ownership when "1" then "Sewa di PadiNET"';
        $sql.= ' when "2" then "Pinjam di PadiNET" ';
        $sql.= ' when "2" then "Beli di PadiNET" ';
        $sql.= ' when "2" then "Beli di pihak lain" end owner ';
        $sql.= 'from install_client_services a ';
        switch($type){
            case '1':
            $sql.= 'left outer join pricelists2.products b on b.id=a.service_id ';
            break;
            case '2':
            $sql.= 'left outer join pricelists2.vases b on b.id=a.service_id ';
            break;
            case '3':
            $sql.= 'left outer join pricelists2.devices b on b.id=a.service_id ';
            break;
            case '4':
            $sql.= 'left outer join pricelists2.philos b on b.id=a.service_id ';
            break;
        }
        $sql.= 'where servicetype="'.$type.'" ';
        $sql.= 'and client_id='.$client_id.' ';
        $ci = & get_instance();
        $que = $ci->db->query($sql);
        return array(
            'res'=>$que->result(),'cnt'=>$que->num_rows(),'sql'=>$sql
        );
    }
    function getsuspectservicesbytype($client_id,$type){
        $sql = 'select b.id,b.name from suspect_client_services a ';
        switch($type){
            case '1':
            $sql.= 'left outer join pricelists2.products b on b.id=a.service_id ';
            break;
            case '2':
            $sql.= 'left outer join pricelists2.vases b on b.id=a.service_id ';
            break;
            case '3':
            $sql.= 'left outer join pricelists2.devices b on b.id=a.service_id ';
            break;
            case '4':
            $sql.= 'left outer join pricelists2.philos b on b.id=a.service_id ';
            break;
        }
        $sql.= 'where servicetype="'.$type.'" ';
        $sql.= 'and client_id='.$client_id.' ';
        $ci = & get_instance();
        $que = $ci->db->query($sql);
        return array(
            'res'=>$que->result(),'cnt'=>$que->num_rows(),'sql'=>$sql
        );
    }
    function removesuspectservice($client_id,$servicetype,$service_id){
        $sql = 'delete from suspect_client_services ';
        $sql.= 'where client_id='.$client_id.' and service_id='.$service_id . ' and servicetype='.$servicetype.' ';
        $ci = & get_instance();
        $que = $ci->db->query($sql);
        return $sql;
    }
    function removeservice($client_id,$servicetype,$service_id){
        $sql = 'delete from survey_client_services ';
        $sql.= 'where client_id='.$client_id.' and service_id='.$service_id . ' and servicetype='.$servicetype.' ';
        $ci = & get_instance();
        $que = $ci->db->query($sql);
        return $sql;
    }
    function saveinstallservice($client_id,$servicetype,$service_id,$ownership){
        $sql = 'insert into install_client_services ';
        $sql.= '(client_id,servicetype,service_id,ownership)';
        $sql.= 'values ';
        $sql.= '('.$client_id.','.$servicetype.','.$service_id.',"'.$ownership.'")';
        $ci = & get_instance();
        $que = $ci->db->query($sql);
        return $sql;
    }
    function savesuspectservice($client_id,$servicetype,$service_id){
        $sql = 'insert into suspect_client_services ';
        $sql.= '(client_id,servicetype,service_id)';
        $sql.= 'values ';
        $sql.= '('.$client_id.','.$servicetype.','.$service_id.')';
        $ci = & get_instance();
        $que = $ci->db->query($sql);
        return array('sql'=>$sql);
    }
    function removeinstallservice($client_id,$servicetype,$service_id){
        $sql = 'delete from install_client_services ';
        $sql.= 'where client_id='.$client_id.' and service_id='.$service_id . ' and servicetype='.$servicetype.' ';
        $ci = & get_instance();
        $que = $ci->db->query($sql);
    }
}