<?php
Class Crud {
    function create($tableName,$params){
        $keys = array();$vals = array();
        foreach($params as $key=>$val){
            array_push($keys,$key);
            array_push($vals,$val);
        }
        $sql = 'insert into ' . $tableName . ' ';
        $sql.= '('.implode(",",$keys).')';
        $sql.= 'values ';
        $sql.= '("'.implode('","',$vals).'")';
        $ci = & get_instance();
        $ci->db->query($sql);
        return $ci->db->insert_id();
    }
}