<?php
Class Asurvey extends CI_Model{
    function __construct(){
        parent::__construct();
        $this->load->library('crud');
    }
    function gets($condition){
        return $this->crud->gets('survey_requests',array('id','name','satuan','description'),$condition);
    }
    function getsrelated($conditions){
        $condition = array();
        foreach($conditions as $key=>$val){
            array_push($condition,$key.'='.$val.'');
        }
        $sql = 'select a.id,c.name,b.address,b.city,"" servicename,business_field,a.create_date,d.username, ';
        $sql.= 'a.survey_date,date_format(a.execution_date,"%d %b %Y")execution_date ';
        $sql.= 'from survey_requests a ';
        $sql.= 'left outer join survey_sites b on b.survey_request_id=a.id ';
        $sql.= 'left outer join clients c on c.id=a.client_id ';
        $sql.= 'left outer join users d on d.id=c.user_id ';
        $sql.= 'where ' . implode(' and ',$condition);
        $ci = & get_instance();
        $que = $ci->db->query($sql);
        return array(
            'res'=>$que->result(),'cnt'=>$que->num_rows()
        );
    }
    function getsurveymaterials($id){
        $sql = 'select a.id,c.name, c.material_type,c.amount from survey_requests a ';
        $sql.= 'left outer join survey_sites b on b.survey_request_id=a.id ';
        $sql.= 'left outer join survey_materials c on c.survey_site_id=b.id ';
        $sql.= 'where c.id = ' . $id;



        $sql = 'select a.id,client_site_id,b.name,b.material_type,b.amount ';
        $sql.= 'from survey_sites a ';
        $sql.= 'left outer join survey_materials b on b.survey_site_id = a.id ';
        $sql.= 'where survey_request_id = ' . $id . ' ';

        $ci = & get_instance();
        $que = $ci->db->query($sql);
        return array(
            'res'=>$que->result(),'cnt'=>$que->num_rows()
        );
    }
    function getsurveydevices($id){
        $sql = 'select a.id,c.name, c.description,c.amount from survey_requests a ';
        $sql.= 'left outer join survey_sites b on b.survey_request_id=a.id ';
        $sql.= 'left outer join survey_devices c on c.survey_site_id=b.id ';
        $sql.= 'where c.id = ' . $id;
        $ci = & get_instance();
        $que = $ci->db->query($sql);
        return array(
            'res'=>$que->result(),'cnt'=>$que->num_rows()
        );
    }
}