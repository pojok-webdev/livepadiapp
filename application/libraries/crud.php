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
    function gets($tableName,$columns,$conditions){
        $arrcolumns = array();$arrconditions = array();
        foreach($columns as $column){
            array_push($arrcolumns,$column);
        }
        foreach($conditions as $key=>$val){
            array_push($arrconditions,$key . '=' . $val . ' ');
        }
        $sql = 'select ' . implode(',',$arrcolumns) . ' ';
        $sql.= 'from ' . $tableName . ' ';
        $sql.= 'where ' . implode(' and ', $arrconditions) . ' ';
        $ci = & get_instance();
        $que = $ci->db->query($sql);
        return array(
            'cnt'=>$que->num_rows(),'res'=>$que->result()
        );
    }
}