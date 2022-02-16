<?php
function get_ts(){
	$ci = & get_instance();
	$id = $ci->session->userdata["user_id"];
	$obj = new User();
	$obj->where("id",$id)->get();
	return $obj;
}
function ts_get_installsite(){
	$userbranch = getuserbranches();
	$obj = new Install_site();
	$ci = & get_instance();
	$sql = "select a.id,a.install_request_id,case when c.alias is null then c.name else concat(c.name,' (',c.alias,')')  end name,";
	$sql.= "a.address,a.city,d.username,f.install_date,f.fix_install_date execdate,";
	$sql.= "a.pic_name,a.pic_phone_area,a.pic_phone,group_concat(g.name) branch,";
	$sql.= "a.status,case a.status when '0' then 'Belum selesai' when '1' then 'selesai' end installstatus ,f.create_date ";
	$sql.= "from install_sites a ";
	$sql.= "left outer join client_sites b on b.id=a.client_site_id ";
	$sql.= "left outer join clients c on c.id=b.client_id ";
	$sql.= "left outer join users d on d.id=c.user_id ";
	$sql.= "left outer join branches_client_sites e on e.client_site_id=b.id ";
	$sql.= "left outer join install_requests f on f.id=a.install_request_id ";
	$sql.= "left outer join branches g on g.id=e.branch_id ";
	$sql.= "group by a.id,a.install_request_id, c.alias,c.name,";
	$sql.= "a.address,a.city,d.username,f.install_date,f.fix_install_date,";
	$sql.= "a.pic_name,a.pic_phone_area,a.pic_phone,a.status,f.create_date ";



	$sql = "select a.id,c.client_id,a.install_request_id,case when d.alias is null then d.name else concat(d.name,' (',d.alias,')')  end name, ";
	$sql.= "a.address,a.city,e.username,b.install_date,b.fix_install_date execdate, ";
	$sql.= "a.pic_name,a.pic_phone_area,a.pic_phone,group_concat(distinct g.name) branch, ";
	$sql.= "group_concat(h.name) padistaff,";
	$sql.= "a.status,case a.status when '0' then 'Belum selesai' when '1' then 'selesai' end installstatus ,b.create_date  ";
	$sql.= "from install_sites a  ";
	$sql.= "left outer join install_requests b on b.id=a.install_request_id  ";
	$sql.= "left outer join client_sites c on c.id=b.client_site_id  ";
	$sql.= "left outer join clients d on d.id=c.client_id "; 
	$sql.= "left outer join users e on e.id=d.user_id  ";
	$sql.= "left outer join branches g on g.id=d.branch_id  ";
	$sql.= "left outer join install_installers h on h.install_site_id=a.id ";
	$sql.= "where d.name is not null ";
	$sql.= "group by a.id,a.install_request_id, d.alias,d.name, ";
	$sql.= "a.address,a.city,e.username,b.install_date,b.fix_install_date, ";
	$sql.= "a.pic_name,a.pic_phone_area,a.pic_phone,a.status,b.create_date ";
	$que = $ci->db->query($sql);
	$obj = $que->result();
	return $obj;	
}
function sales_get_installsite(){
	$ci = & get_instance();
	$userbranch = getuserbranches();
	$brnc = "(".implode(",",$userbranch).")";
	$id = $ci->session->userdata["user_id"];
	$arr = array();
	$users = getsubordinates($id,$arr);
	$userarr = implode(",",$users);
	$obj = new Install_site();
	$sql = "select a.id,a.install_request_id,case when c.alias is null then c.name else concat(c.name,' (',c.alias,')')  end name,";
	$sql.= "a.address,a.city,d.username,f.install_date,f.fix_install_date execdate,";
	$sql.= "a.pic_name,a.pic_phone_area,group_concat(g.name) branch,a.status ";
	$sql.= "from install_sites a ";
	$sql.= "left outer join client_sites b on b.id=a.client_site_id ";
	$sql.= "left outer join clients c on c.id=b.client_id ";
	$sql.= "left outer join users d on d.id=c.user_id ";
	//$sql.= "left outer join branches_client_sites e on e.client_site_id=b.id ";
	$sql.= "left outer join install_requests f on f.id=a.install_request_id ";
	$sql.= "left outer join branches g on g.id=c.branch_id ";
	$sql.= "where d.id in($userarr) and  c.branch_id in $brnc";
	$sql.= "group by a.id,a.install_request_id, c.alias,c.name,";
	$sql.= "a.address,a.city,d.username,f.install_date,f.fix_install_date ,";
	$sql.= "a.pic_name,a.pic_phone_area,	a.status ";
	$obj->query($sql);
	return $obj;	
}
function getresumetext($resume){
	switch($resume){
		case '0':
		$resume = 'Belum ada kesimpulan';
		break;
		case '1':
		$resume = 'Bisa dilaksanakan';
		break;
		case '2':
		$resume = 'Bisa dilaksanakan dg syarat';
		break;
		case '3':
		$resume = 'Tidak bisa dilaksanakan';
		break;
	}
}
function toremovestatus($status){
	switch($status){
		case '0':
			$out = '';
		break;
		case '1':
			$out = '<span class="pointer removevas icon-trash"></span>&nbsp;';
		break;
		case '2':
			$out = '';
		break;
	}
	return $out;
}
function gettopologivsdfiles($id){
	$directory = '/home/klien/www/padicustomer/padiapp-data/installs/vsd/'.$id;
	$filecount = 0;
	$files = glob($directory . "*.vsd");
	$arr = array();
	if ($files){
	  foreach($files as $fl){
		array_push($arr,substr($fl,55,strlen($fl) - 55));
	  }
	}      
	return($arr);
  }
function getpricelistservices($client_id){
	$sql = 'select  ';
	$sql.= 'client_id, ';
	$sql.= 'case servicetype '; 
	$sql.= 'when 1 then "Internet"'; 
	$sql.= 'when 2 then "VAS" ' ;
	$sql.= 'when 3 then "Perangkat" '; 
	$sql.= 'when 4 then "Philoin" ' ;
	$sql.= 'end servicetype ,';
	$sql.= 'a.service_id, ';
	$sql.= 'case servicetype  ';
	$sql.= 'when 1 then c.name  ';
	$sql.= 'when 2 then d.name  ';
	$sql.= 'when 3 then e.name  ';
	$sql.= 'when 4 then f.name  ';
	$sql.= 'end servicename  ';
	$sql.= 'from install_client_services a  ';
	$sql.= 'left outer join clients b on b.id=a.client_id  ';
	$sql.= 'left outer join pricelists2.products c on c.id=a.service_id ';
	$sql.= 'left outer join pricelists2.vases d on d.id=a.service_id ';
	$sql.= 'left outer join pricelists2.devices e on e.id=a.service_id ';
	$sql.= 'left outer join pricelists2.devices f on f.id=a.service_id ';
	$sql.= 'where a.client_id = ' . $client_id . ' ';
	$ci = & get_instance();
	$que = $ci->db->query($sql);
	return array(
		'res'=>$que->result(),'cnt'=>$que->num_rows()
	);
}