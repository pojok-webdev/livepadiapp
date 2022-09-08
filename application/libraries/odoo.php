<?php
Class Odoo {
    function getservices($nofb){
        $ci = & get_instance();
        $qry = 'select category,name,humanreadable1,humanreadable2,case when name is null then humanreadable1 else name end toshow from fbservices where fb_id="'.$nofb.'" ';
        $que = $ci->db->query($qry);
        return array(
            'cnt'=>$que->num_rows(),
            'res'=>$que->result(),
            'qry'=>$qry
        );
    }
}
