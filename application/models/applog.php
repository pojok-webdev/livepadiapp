<?php
Class Applog extends CI_Model{
    function __construct(){
        parent::__construct();
    }
    function create($params){
        $sql = 'insert into app_logs ';
        $sql.= '(user,subject,description,ipaddr) ';
        $sql.= 'values ';
        $sql.= '("'.$params['user'].'","'.$params['subject'].'","'.$params['description'].'","'.$_SERVER["REMOTE_ADDR"].'") ';
        $ci = & get_instance();
        $ci->db->query($sql);
    }
}