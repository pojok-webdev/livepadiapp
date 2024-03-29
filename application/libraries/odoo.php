<?php
Class Odoo {
    function getservices($nofb){
        $ci = & get_instance();
        $qry = 'select category,name,humanreadable1,humanreadable2,';
        $qry.= 'case when name is null then concat(name," ",humanreadable1) else concat(category," ",name) end toshow ';
        $qry.= 'from fbservices where fb_id="'.$nofb.'" ';


        $qry = "select fb_id,category, ";
        $qry.= "case category  ";
        $qry.= "when 'Symetrical Broadband Internet (SBI)'  then bandwidth  ";
        $qry.= "when 'Padi SOHO' then bandwidth ";
        $qry.= "when 'Padi Cluster' then bandwidth ";
        $qry.= "when 'Colocation'  then concat(space,' ',bandwidth)  ";
        $qry.= "when 'Enterprise'  then concat('Up : ',upm,'M ',upk,'K ',', Down : ',dnm,'M, ',dnk,'K') ";
        $qry.= "when 'IIX (IIX)'  then concat('Up : ',upm,'M ',upk,'K ',', Down : ',dnm,'M, ',dnk,'K')  ";
        $qry.= "when 'Business'  then concat('Up : ',upm,'M ')  ";
        $qry.= "when 'Custom' then concat(name) ";
        $qry.= "when 'Perangkat' then name ";
        $qry.= "when 'Local Loop' then name ";
        $qry.= "when 'Hosting & Domain' then name ";
        $qry.= "when 'oryza' then name ";
        $qry.= "when 'mix' then name ";
        $qry.= "when 'Web + Applications' then name ";
        $qry.= "when 'Others (Wifi, ADSL, dll)' then name ";
        $qry.= "end srv  ";
        $qry.= "from fbservices where fb_id='".$nofb."' ";
        $que = $ci->db->query($qry);
        return array(
            'cnt'=>$que->num_rows(),
            'res'=>$que->result(),
            'qry'=>$qry
        );
    }
    function getsites($id){
        $ci = & get_instance();
        $qry = 'select distinct id,address,pic_name,pic_phone from client_sites where client_id='.$id.' ';
        $que = $ci->db->query($qry);
        return array(
            'cnt'=>$que->num_rows(),
            'res'=>$que->result(),
            'qry'=>$qry
        );
    }
}

/*
///
select distinct a.id,d.name,a.resume,a.client_id,b.client_site_id csid,b.client_id cid,c.address,d.sale_id userid, 
f.username,d.phone_area,d.phone from survey_requests a 
left outer join survey_sites b on b.survey_request_id=a.id 
left outer join client_sites c on c.id=b.client_site_id 
left outer join clients d on d.id=c.client_id 
left outer join install_sites e on e.client_site_id=c.id 
left outer join users f on f.id=d.sale_id 
where d.name like "%cahaya garuda%";



select distinct a.id,case when d.alias is null then d.name else concat(d.name,' (',d.alias,')')  end clientname,
e.resume,a.direction,f.username,f.id userid,e.resume eresume,
    e.create_date screate_date,d.address,a.address  
    from survey_sites a left outer join client_sites b on b.id=a.client_site_id 
    left outer join branches_client_sites c on c.client_site_id=b.id 
    left outer join clients d on d.id=b.client_id 
    left outer join survey_requests e on e.id=a.survey_request_id 
    left outer join users f on f.id=d.sale_id 
    where d.sale_id in (6) 
    and a.active='1'


    select distinct a.id,case when d.alias is null then d.name else concat(d.name,' (',d.alias,')')  end clientname,
f.username,f.id userid,
    e.create_date screate_date,d.address,a.address  
    from survey_sites a left outer join client_sites b on b.id=a.client_site_id 
    left outer join branches_client_sites c on c.client_site_id=b.id 
    left outer join clients d on d.id=b.client_id 
    left outer join survey_requests e on e.id=a.survey_request_id 
    left outer join users f on f.id=d.sale_id 
    where (e.status in (1) or e.status is null) and a.resume in (1,2) and d.sale_id in (6) 
    and a.active='1'


--xxxxx
select distinct a.id,d.name,a.resume,a.client_id,b.client_site_id csid,b.client_id cid,c.address,d.sale_id userid, f.username,d.phone_area,d.phone from survey_requests a 
left outer join survey_sites b on b.survey_request_id=a.id 
left outer join client_sites c on c.id=b.client_site_id 
left outer join clients d on d.id=c.client_id 
left outer join install_sites e on e.client_site_id=c.id 
left outer join users f on f.id=d.sale_id where (e.status in (1) or e.status is null) and a.resume in (1,2) and d.sale_id in ("6") and d.name like "%cahaya garuda%";
        
select distinct e.status,a.resume,a.id aid,e.id eid,d.name,a.resume,a.client_id,b.client_id cid,substring(c.address,1,20)addr from survey_requests a 
left outer join survey_sites b on b.survey_request_id=a.id 
left outer join client_sites c on c.id=b.client_site_id 
left outer join clients d on d.id=c.client_id 
left outer join install_sites e on e.client_site_id=c.id 
left outer join users f on f.id=d.sale_id where  d.sale_id in ("6") and d.name like "%cahaya garuda%";
  



select substring(category,1,20)cate,substring(name,1,10)name,substring(humanreadable1,1,10)hr1,substring(humanreadable2,1,10)hr2,case when name is null then substring(humanreadable1,1,10) else substring(name,1,20) end toshow,upstr,dnstr,space,bandwidth from fbservices

select * from (
select fb_id,category,
case category 
when 'Symetrical Broadband Internet (SBI)'  then bandwidth 
when 'Padi SOHO' then bandwidth
when 'Padi Cluster' then bandwidth
when 'Colocation'  then concat(space," ",bandwidth) 
when 'Enterprise'  then concat("Up : ",upm,"M ",upk,"K ",", Down : ",dnm,"M, ",dnk,"K") 
when 'IIX (IIX)'  then concat("Up : ",upm,"M ",upk,"K ",", Down : ",dnm,"M, ",dnk,"K") 
when 'Business'  then concat("Up : ",upm,"M ") 
when 'Custom' then concat(name)
when 'Perangkat' then name
when 'Local Loop' then name
when 'Hosting & Domain' then name
when 'oryza' then name
when 'mix' then name
when 'Web + Applications' then name
when 'Others (Wifi, ADSL, dll)' then name
end srv 
from fbservices
)X where srv is null ;


update fbservices set category='Hosting & Domain' where category='Hosting &amp; Domain';
*/