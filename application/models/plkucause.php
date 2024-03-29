<?php
Class Plkucause extends CI_Model{
    function __construct(){
        parent::__construct();
    }
    function getrpt($params){
        $sql = 'select a.id,a.kdticket,a.clientname name,b.name subrootcause,c.name mainrootcause from tickets a ';
        $sql.= 'left outer join ticketcauses b on b.id=a.cause_id ';
        $sql.= 'left outer join ticketcausecategories c on c.id=b.category_id ';
        $sql.= 'left outer join clients d on d.id=a.client_id ';
        $sql.= 'where a.requesttype="pelanggan" ';
        $sql.= 'and date(a.create_date)>="'.$params['ticketstart'].'" ';
        $sql.= 'and date(a.create_date)<="'.$params['ticketend'].'" ';
        $sql.= 'and c.id in ('.implode(',',$params['category_id']).') ';
        $sql.= 'and d.branch_id in ('.implode(',',$params['branches']).') ';
        $sql.= 'order by c.name,a.create_date ';
        $ci = & get_instance();
        $que = $ci->db->query($sql);
        return array('res'=>$que->result(),'cnt'=>$que->num_rows());
    }
    function getrow($params,$ticketcause_id){
        $sql = 'select a.id,a.kdticket,a.clientname name,b.name subrootcause,c.name mainrootcause from tickets a ';
        $sql.= 'left outer join ticketcauses b on b.id=a.cause_id ';
        $sql.= 'left outer join ticketcausecategories c on c.id=b.category_id ';
        $sql.= 'left outer join clients d on d.id=a.client_id ';
        $sql.= 'where a.requesttype="pelanggan" ';
        $sql.= 'and date(a.create_date)>="'.$params['ticketstart'].'" ';
        $sql.= 'and date(a.create_date)<="'.$params['ticketend'].'" ';
        $sql.= 'and b.id = ' . $ticketcause_id . ' ';
        $sql.= 'and b.id <> 74 ';//PTP vendor tidka ditampilkan
        $sql.= 'and d.branch_id in ('.implode(',',$params['branches']).') ';
        $sql.= 'order by c.name,a.create_date ';
        $sql.= 'limit 0,3 ';
        return $sql;
    }
    function getrow2($params,$category_id){
        $sql = 'select a.id,a.kdticket,a.clientname name,b.name subrootcause,c.name mainrootcause from ticket2021 a ';
        $sql.= 'left outer join ticketcauses b on b.id=a.cause_id ';
        $sql.= 'left outer join ticketcausecategories c on c.id=b.category_id ';
        $sql.= 'left outer join clients d on d.id=a.client_id ';
        $sql.= 'where a.requesttype="pelanggan" ';
        $sql.= 'and date(a.create_date)>="'.$params['ticketstart'].'" ';
        $sql.= 'and date(a.create_date)<="'.$params['ticketend'].'" ';
        $sql.= 'and c.id = ' . $category_id . ' ';
        $sql.= 'and b.id <> 74 ';//PTP vendor tidka ditampilkan
        $sql.= 'and d.branch_id in ('.implode(',',$params['branches']).') ';
        $sql.= 'order by c.name,a.create_date ';
       // $sql.= 'limit 0,3 ';
        return $sql;
    }
    function getcauses($cause){
        $sql = 'select id from ticketcauses where category_id in  (' . implode(',',$cause) . ') ';
        $ci = & get_instance();
        $que = $ci->db->query($sql);
        return $que->result();
    }
    function getrpt2($params){
        $catara = explode(",",$params['category_id'][0]);
        $causes = $this->getcauses($catara);$arr = array();
        foreach($causes as $ticketcause){
            array_push($arr,'('.$this->getrow($params,$ticketcause->id).')');
        }
        $sql = implode(' union ',$arr);
        $ci = & get_instance();
        $que = $ci->db->query($sql);
        return array('res'=>$que->result(),'cnt'=>$que->num_rows());
    }
    function getparents($params){
        $sql = 'select a.id, a.kdticket,a.parentid,b.id ';
        $sql.= 'from ticket2021 a ';
        $sql.= 'left outer join ticketcauses b on b.id=a.cause_id ';
        $sql.= 'left outer join ticketcausecategories c on c.id=b.category_id  ';
        $sql.= 'where c.id=12 and parentid is not null ';
        $sql.= 'and date(a.create_date)>="'.$params['ticketstart'].'" ';
        $sql.= 'and date(a.create_date)<="'.$params['ticketend'].'" ';
        //echo $sql;
        $ci = & get_instance();
        $que = $ci->db->query($sql);
        $row = $que->result();
        //echo 'num rows ' . $que->num_rows();
        return $row;
    }
    function getarditickets($params,$parentid){
        $sql = 'select a.id,a.kdticket,a.clientname name,b.name subrootcause,c.name mainrootcause from ticket2021 a ';
        $sql.= 'left outer join ticketcauses b on b.id=a.cause_id ';
        $sql.= 'left outer join ticketcausecategories c on c.id=b.category_id ';
        $sql.= 'left outer join clients d on d.id=a.client_id ';
        $sql.= 'where a.requesttype="pelanggan" ';
        $sql.= 'and date(a.create_date)>="'.$params['ticketstart'].'" ';
        $sql.= 'and date(a.create_date)<="'.$params['ticketend'].'" ';
        $sql.= 'and a.parentid = ' . $parentid . ' ';
        $sql.= 'and b.id <> 74 ';//PTP vendor tidka ditampilkan
        $sql.= 'and d.branch_id in ('.implode(',',$params['branches']).') ';
        $sql.= 'order by c.name,a.create_date ';
        $sql.= 'limit 0,3 ';
        //echo $sql;
        return $sql;
    }
    function getarditicketsnoparent($params,$category_id){
        $sql = 'select a.id,a.kdticket,a.clientname name,b.name subrootcause,c.name mainrootcause from ticket2021 a ';
        $sql.= 'left outer join ticketcauses b on b.id=a.cause_id ';
        $sql.= 'left outer join ticketcausecategories c on c.id=b.category_id ';
        $sql.= 'left outer join clients d on d.id=a.client_id ';
        $sql.= 'where a.requesttype="pelanggan" ';
        $sql.= 'and date(a.create_date)>="'.$params['ticketstart'].'" ';
        $sql.= 'and date(a.create_date)<="'.$params['ticketend'].'" ';
        $sql.= 'and a.parentid is null ';
        $sql.= 'and c.id = ' . $category_id . ' ';
        $sql.= 'and b.id <> 74 ';//PTP vendor tidka ditampilkan
        $sql.= 'and d.branch_id in ('.implode(',',$params['branches']).') ';
        $sql.= 'order by c.name,a.create_date ';
       // $sql.= 'limit 0,3 ';
        return $sql;
    }
    function getselectedparent($params){
        $parents = $this->getparents($params);
        foreach($parents as $ticket){
            $this->getarditickets($ticket->parentid);
        }
    }
    function getrpt3($params){
        $arr = array();
        $categoryarr = explode(",",$params['category_id'][0]);
        foreach($categoryarr as $cat){
            if($cat==='12'){
                $parents = $this->getparents($params);                
                foreach($parents as $ticket){
                    array_push($arr,'('.$this->getarditickets($params,$ticket->parentid).')');
                    array_push($arr,'('.$this->getarditicketsnoparent($params,12).')');
                }                
            }else{
                array_push($arr,'('.$this->getrow2($params,$cat).')');
            }
        }
        //print_r($params);
        //print_r($parents);
        $sql = implode(' union ',$arr);
        //echo $sql;
        $ci = & get_instance();
        $que = $ci->db->query($sql);
        return array('res'=>$que->result(),'cnt'=>$que->num_rows());
    }
    function lku(){
        $sql = 'select a.kdticket from (select kdticket from tickets group by parentid) a ';
        $sql.= 'where a.parentid is not null ';
        $sql = 'select * ';
        $sql.= 'FROM ( ';
        $sql.= '    select *, row_number() over (partition by id ORDER BY value DESC) AS n ';
        $sql.= '    FROM tickets ';
        $sql.= ') AS x ';
        $sql.= 'WHERE n <= 5';


        $x = 'select *, row_number() over(order by requesttype desc) AS row_num from tickets  ';
    }

    function gettop5mainrootcause($params){
        $sql = 'select * from ';
        $sql.= ' (';
        $sql.= '   select c.id,c.name, count(a.id) cnt from tickets a';
        $sql.= '   left outer join ticketcauses b on b.id=a.cause_id ';
        $sql.= '   left outer join ticketcausecategories c on c.id=b.category_id ';
        $sql.= '   left outer join clients d on d.id=a.client_id ';
        $sql.= '   where date(create_date)>="'.$params['ticketstart'].'" and date(create_date)<="'.$params['ticketend'].'" ';
        $sql.= '   and d.branch_id in ('.implode(",",$params['branches']).')';
        $sql.= '   and b.id is not null group by c.id,c.name';
        $sql.= ' )X order by cnt desc limit 0,5';
        $ci = & get_instance();
        $que = $ci->db->query($sql);
        return array('res'=>$que->result(),'cnt'=>$que->num_rows());
    }
    function gettop5mainrootcauseb($params){
        $sql = 'select W.id,W.name,W.cnt from ';
        $sql.= ' (';
        $sql.= '   select c.id,c.name, count(a.id) cnt from tickets a';
        $sql.= '   left outer join ticketcauses b on b.id=a.cause_id ';
        $sql.= '   left outer join ticketcausecategories c on c.id=b.category_id ';
        $sql.= '   left outer join clients d on d.id=a.client_id ';
        $sql.= ' left outer join backbones e on e.id=a.backbone_id ';
        $sql.= ' left outer join btstowers f on f.id=a.btstower_id ';
        $sql.= ' left outer join datacenters g on g.id=a.datacenter_id ';
        $sql.= ' left outer join ptps h on h.id=a.ptp_id ';
        $sql.= ' left outer join cores i on i.id=a.core_id ';
        $sql.= ' left outer join (';
        $sql.= '   select a.id,b.branch_id from aps a ';
        $sql.= '   left outer join btstowers b';
        $sql.= '   on b.id=a.btstower_id';
        $sql.= ' ) j on j.id=a.ap_id ';
        $sql.= '   where date(a.create_date)>="'.$params['ticketstart'].'" and date(a.create_date)<="'.$params['ticketend'].'" ';
        $sql.= '   and (d.branch_id in ('.implode(",",$params['branches']).')';
        $sql.= ' or d.branch_id in  ('.implode(",",$params['branches']).')   ';
        $sql.= ' or e.branch_id_ in  ('.implode(",",$params['branches']).')  ';
        $sql.= ' or f.branch_id in  ('.implode(",",$params['branches']).')  ';
        $sql.= ' or g.branch_id in  ('.implode(",",$params['branches']).')  ';
        $sql.= ' or h.branch_id in  ('.implode(",",$params['branches']).')  ';
        $sql.= ' or i.branch_id in  ('.implode(",",$params['branches']).')  ';
        $sql.= ' or j.branch_id in  ('.implode(",",$params['branches']).')  ';
        $sql.= ' ) ';
        $sql.= '   and b.id is not null group by c.id,c.name';
        $sql.= ' )W left outer join';
        $sql.= ' (';
        $sql.= '   select distinct cnt from(select c.id,c.name, count(a.id) cnt from tickets a';
        $sql.= '   left outer join ticketcauses b on b.id=a.cause_id ';
        $sql.= '   left outer join ticketcausecategories c on c.id=b.category_id ';
        $sql.= '   left outer join clients d on d.id=a.client_id ';
        $sql.= ' left outer join backbones e on e.id=a.backbone_id ';
        $sql.= ' left outer join btstowers f on f.id=a.btstower_id ';
        $sql.= ' left outer join datacenters g on g.id=a.datacenter_id ';
        $sql.= ' left outer join ptps h on h.id=a.ptp_id ';
        $sql.= ' left outer join cores i on i.id=a.core_id ';
        $sql.= ' left outer join (';
        $sql.= '   select a.id,b.branch_id from aps a ';
        $sql.= '   left outer join btstowers b';
        $sql.= '   on b.id=a.btstower_id';
        $sql.= ' ) j on j.id=a.ap_id ';
        $sql.= '   where date(a.create_date)>="'.$params['ticketstart'].'" and date(a.create_date)<="'.$params['ticketend'].'" ';
        $sql.= '   and (d.branch_id in ('.implode(",",$params['branches']).')';
        $sql.= ' or d.branch_id in  ('.implode(",",$params['branches']).')   ';
        $sql.= ' or e.branch_id_ in  ('.implode(",",$params['branches']).')  ';
        $sql.= ' or f.branch_id in  ('.implode(",",$params['branches']).')  ';
        $sql.= ' or g.branch_id in  ('.implode(",",$params['branches']).')  ';
        $sql.= ' or h.branch_id in  ('.implode(",",$params['branches']).')  ';
        $sql.= ' or i.branch_id in  ('.implode(",",$params['branches']).')  ';
        $sql.= ' or j.branch_id in  ('.implode(",",$params['branches']).')  ';
        $sql.= ' ) ';
        $sql.= '   and b.id is not null group by c.id,c.name order by count(a.id) desc)a ';
        if($params['numtoshow']!='All'){
        $sql.= '   limit 0,5 ';
        }
        $sql.= ' )X on X.cnt=W.cnt ';
        $sql.= 'where X.cnt is not null order by W.cnt desc; ';
        $ci = & get_instance();
        $que = $ci->db->query($sql);
        return array('res'=>$que->result(),'cnt'=>$que->num_rows());
    }
    function getticketsbymainroot($params){
        $sql = 'select a.id,a.kdticket,a.clientname,b.name from tickets a ';
        $sql.= 'left outer join ticketcauses b on b.id=a.cause_id ';
        $sql.= '   left outer join clients c on c.id=a.client_id ';


        $sql.= '   left outer join backbones e on e.id=a.backbone_id ';
        $sql.= '   left outer join btstowers f on f.id=a.btstower_id ';
        $sql.= '   left outer join datacenters g on g.id=a.datacenter_id ';
        $sql.= '   left outer join ptps h on h.id=a.ptp_id ';
        $sql.= '   left outer join cores i on i.id=a.core_id ';
        $sql.= '   left outer join (';
        $sql.= '     select a.id,b.branch_id from aps a ';
        $sql.= '     left outer join btstowers b';
        $sql.= '     on b.id=a.btstower_id';
        $sql.= '   ) j on j.id=a.ap_id ';

        $sql.= '   where date(a.create_date)>="'.$params['ticketstart'].'" and date(a.create_date)<="'.$params['ticketend'].'" ';
        $sql.= '    and b.category_id='.$params['category_id'].' ';
        $sql.= '   and (c.branch_id in ('.implode(",",$params['branches']).')';


        $sql.= ' or e.branch_id_ in  ('.implode(",",$params['branches']).')  ';
        $sql.= ' or f.branch_id in  ('.implode(",",$params['branches']).')  ';
        $sql.= ' or g.branch_id in  ('.implode(",",$params['branches']).')  ';
        $sql.= ' or h.branch_id in  ('.implode(",",$params['branches']).')  ';
        $sql.= ' or i.branch_id in  ('.implode(",",$params['branches']).')  ';
        $sql.= ' or j.branch_id in  ('.implode(",",$params['branches']).') ) ';

        $ci = & get_instance();
        $que = $ci->db->query($sql);
        return array('res'=>$que->result(),'cnt'=>$que->num_rows());
    }
    function gettop5subrootcause($params){
        $sql = 'select b.id,b.name,count(cause_id) cnt ';
        $sql.= 'from tickets a ';
        $sql.= 'left outer join ticketcauses b on b.id=a.cause_id ';
        $sql.= 'left outer join clients c on c.id=a.client_id ';
        $sql.= '   where date(create_date)>="'.$params['ticketstart'].'" and date(create_date)<="'.$params['ticketend'].'" ';
        $sql.= '   and b.category_id="'.$params['category_id'].'"  ';
        $sql.= '   and c.branch_id in ('.implode(",",$params['branches']).') ';
        $sql.= 'group by b.id,b.name ';
        $sql.= 'order by cnt desc ';
        $ci = & get_instance();
        $que = $ci->db->query($sql);
        return array('res'=>$que->result(),'cnt'=>$que->num_rows());
    }
    function gettop5subrootcauseb($params){
        $sql = 'select A.id,A.name,A.cause_id,A.cnt from  ';
        $sql.= '(';
        $sql.= '    select b.id,b.name,cause_id,count(a.id)cnt from tickets a ';
        $sql.= '    left outer join ticketcauses b on b.id=a.cause_id ';
        $sql.= '    left outer join clients c on c.id=a.client_id ';


        $sql.= '   left outer join backbones e on e.id=a.backbone_id ';
        $sql.= '   left outer join btstowers f on f.id=a.btstower_id ';
        $sql.= '   left outer join datacenters g on g.id=a.datacenter_id ';
        $sql.= '   left outer join ptps h on h.id=a.ptp_id ';
        $sql.= '   left outer join cores i on i.id=a.core_id ';
        $sql.= '   left outer join (';
        $sql.= '     select a.id,b.branch_id from aps a ';
        $sql.= '     left outer join btstowers b';
        $sql.= '     on b.id=a.btstower_id';
        $sql.= '   ) j on j.id=a.ap_id ';


        $sql.= '    where cause_id is not null ';
        $sql.= '    and date(a.create_date)>="'.$params['ticketstart'].'" ';
        $sql.= '    and date(a.create_date)<="'.$params['ticketend'].'" ';
        $sql.= '    and b.category_id='.$params['category_id'].' ';
        $sql.= '    and (c.branch_id in ('.implode(",",$params['branches']).')';


        $sql.= ' or e.branch_id_ in  ('.implode(",",$params['branches']).')  ';
        $sql.= ' or f.branch_id in  ('.implode(",",$params['branches']).')  ';
        $sql.= ' or g.branch_id in  ('.implode(",",$params['branches']).')  ';
        $sql.= ' or h.branch_id in  ('.implode(",",$params['branches']).')  ';
        $sql.= ' or i.branch_id in  ('.implode(",",$params['branches']).')  ';
        $sql.= ' or j.branch_id in  ('.implode(",",$params['branches']).') ) ';




        $sql.= '    group by cause_id order by count(a.id) desc';
        $sql.= ')A  ';
        $sql.= 'left outer join   ';
        $sql.= '(';
        $sql.= '    select distinct(cnt) from (select cause_id,count(a.id)cnt from tickets a ';
        $sql.= '    left outer join ticketcauses b on b.id=a.cause_id ';
        $sql.= '    left outer join clients c on c.id=a.client_id ';


        $sql.= '   left outer join backbones e on e.id=a.backbone_id ';
        $sql.= '   left outer join btstowers f on f.id=a.btstower_id ';
        $sql.= '   left outer join datacenters g on g.id=a.datacenter_id ';
        $sql.= '   left outer join ptps h on h.id=a.ptp_id ';
        $sql.= '   left outer join cores i on i.id=a.core_id ';
        $sql.= '   left outer join (';
        $sql.= '     select a.id,b.branch_id from aps a ';
        $sql.= '     left outer join btstowers b';
        $sql.= '     on b.id=a.btstower_id';
        $sql.= '   ) j on j.id=a.ap_id ';



        $sql.= '    where cause_id is not null ';
        $sql.= '    and date(a.create_date)>="'.$params['ticketstart'].'" ';
        $sql.= '    and date(a.create_date)<="'.$params['ticketend'].'" ';
        $sql.= '    and b.category_id='.$params['category_id'].' ';
        $sql.= '    and (c.branch_id in ('.implode(",",$params['branches']).')';
        
        
        
        $sql.= ' or e.branch_id_ in  ('.implode(",",$params['branches']).')  ';
        $sql.= ' or f.branch_id in  ('.implode(",",$params['branches']).')  ';
        $sql.= ' or g.branch_id in  ('.implode(",",$params['branches']).')  ';
        $sql.= ' or h.branch_id in  ('.implode(",",$params['branches']).')  ';
        $sql.= ' or i.branch_id in  ('.implode(",",$params['branches']).')  ';
        $sql.= ' or j.branch_id in  ('.implode(",",$params['branches']).') ) ';



        $sql.= '    group by cause_id order by count(a.id) desc)x ';
        if($params['numtoshow']!='All'){
            $sql.= '    limit 0,5 ';
            }
        $sql.= ')B on B.cnt=A.cnt  ';
        $sql.= 'where B.cnt is not null order by A.cnt desc; ';
        $ci = & get_instance();
        $que = $ci->db->query($sql);
        return array('res'=>$que->result(),'cnt'=>$que->num_rows());
    }
    function getticketsbysubroot($params){
        $sql = 'select a.id,a.kdticket,a.clientname,b.name from tickets a ';
        $sql.= 'left outer join ticketcauses b on b.id=a.cause_id ';
        $sql.= '   left outer join clients c on c.id=a.client_id ';
        $sql.= ' left outer join backbones e on e.id=a.backbone_id ';
        $sql.= ' left outer join btstowers f on f.id=a.btstower_id ';
        $sql.= ' left outer join datacenters g on g.id=a.datacenter_id ';
        $sql.= ' left outer join ptps h on h.id=a.ptp_id ';
        $sql.= ' left outer join cores i on i.id=a.core_id ';
        $sql.= '   left outer join (';
        $sql.= '     select a.id,b.branch_id from aps a ';
        $sql.= '     left outer join btstowers b';
        $sql.= '     on b.id=a.btstower_id';
        $sql.= '   ) j on j.id=a.ap_id ';
        $sql.= '   where date(a.create_date)>="'.$params['ticketstart'].'" and date(a.create_date)<="'.$params['ticketend'].'" ';
        $sql.= '    and b.id='.$params['cause_id'].' ';
        $sql.= '   and ( c.branch_id in ('.implode(",",$params['branches']).') ';
        $sql.= ' or e.branch_id_ in  ('.implode(",",$params['branches']).')  ';
        $sql.= ' or f.branch_id in  ('.implode(",",$params['branches']).')  ';
        $sql.= ' or g.branch_id in  ('.implode(",",$params['branches']).')  ';
        $sql.= ' or h.branch_id in  ('.implode(",",$params['branches']).')  ';
        $sql.= ' or i.branch_id in  ('.implode(",",$params['branches']).')  ';
        $sql.= ' or j.branch_id in  ('.implode(",",$params['branches']).')  ';
        $sql.= ' ) ';
        $ci = & get_instance();
        $que = $ci->db->query($sql);
        return array('res'=>$que->result(),'cnt'=>$que->num_rows());
    }
    function getfus($ticketid){
        $sql = 'select a.conclusion,a.description from ticket_followups a ';
        $sql.= 'where a.ticket_id='.$ticketid.' ';
        $ci = & get_instance();
        $que = $ci->db->query($sql);
        return array('res'=>$que->result(),'cnt'=>$que->num_rows());
    }
    function getcategories(){
        $sql = 'select * from ticketcausecategories ';
        $ci = & get_instance();
        $que = $ci->db->query($sql);
        return array('res'=>$que->result(),'cnt'=>$que->num_rows());
    }
    function getcategoriesbyversion($version){
        $sql = 'select * from ticketcausecategories ';
        $sql.= 'where version="'.$version.'" ';
        $ci = & get_instance();
        $que = $ci->db->query($sql);
        return array('res'=>$que->result(),'cnt'=>$que->num_rows());
    }
    function getmainrootname($id){
        $sql = 'select name from ticketcausecategories where id='.$id.'';
        $ci = & get_instance();
        $que = $ci->db->query($sql);
        $res = $que->result();
        return $res[0]->name;
    }
    function getmainrootskeyval(){
        $sql = 'select id,name from ticketcausecategories ';
        $ci = & get_instance();
        $que = $ci->db->query($sql);
        $res = $que->result();
        $arr = array();
        foreach($res as $out){
            $arr[$out->id] = $out->name;
        }
        return $arr;
    }
}