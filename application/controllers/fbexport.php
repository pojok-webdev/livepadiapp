<?php
Class Fbexport extends CI_Controller {
    function __construct(){
        parent::__construct();
        $this->load->library('odoo');
    }
    function index(){
        $qry = 'select * from (select client_id,name,nofb from (select a.client_id,a.status,b.name,nofb from fbs a left outer join clients  b on b.id=a.client_id where b.status="1" and active="1")A  where status="1"  )A  order by client_id;
        ';
        $que = $this->db->query($qry);
        $res = $que->result();
        $this->load->view('odoo/fbexport',array(
            'objs'=>$res
        ));
    }
}