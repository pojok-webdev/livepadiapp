<?php
Class Lku extends CI_Controller{
    function __construct(){
        parent::__construct();
		$this->load->library("padidatetime");
		$this->load->helper("branches");
		$this->load->helper("user");
		$this->load->library("padidatetime");
		$this->load->library("common");
    }
    function index(){
        echo "sMqAWcvH-+?/hx9";
        echo "6136";
    }
    function mainrootcause(){
        $this->common->check_login();
		$this->load->model('plkucause');
		$this->load->helper('report');
		$ticketstart = $this->uri->segment(5)."-".$this->uri->segment(4)."-".$this->uri->segment(3);
		$ticketend = $this->uri->segment(8)."-".$this->uri->segment(7)."-".$this->uri->segment(6);
		$category = $this->uri->segment(10);
		$category = str_replace('-',',',$category);
		$mydate1 = date_create($ticketstart);
		$mydate2 = date_create($ticketend);
		$myday1 = date_format($mydate1,"D");
		$myday2 = date_format($mydate2,"D");
		$months = $this->padidatetime->getmonthsarray("id");
		$days = $this->padidatetime->getdaysarray("id");
		$data["userbranch"] = implode(",",getuserbranches());
		$arrbranches = getuserbranches();
		$data["userbranches"] = implode("",$arrbranches);
		$data["category"] = explode(',',$category);
		$data["arrbranch"] = getuserbranches();
		$arrbranchselected = array();
		for($c=0;$c<strlen($this->uri->segment(9));$c++){
			array_push($arrbranchselected,substr($this->uri->segment(9),$c,1));
		}
		$branchselected = "'".implode("','",$arrbranchselected)."'";		
		$tickets = $this->plkucause->getrpt3(array('category_id'=>array($category),'ticketstart'=>$ticketstart,'ticketend'=>$ticketend,'branches'=>$arrbranchselected));
		$data["tickets"] = $tickets["res"];
		$data["total"] = $tickets["cnt"];
		$data["date1"] = $days[$myday1]." ".$this->uri->segment(3)." ".$months[$this->uri->segment(4)-1]." ".$this->uri->segment(5);
		$data["date2"] = $days[$myday2]." ".$this->uri->segment(6)." ".$months[$this->uri->segment(7)-1]." ".$this->uri->segment(8);
		$data["dateselected1"] = $this->uri->segment(3)."/".$this->uri->segment(4)."/".$this->uri->segment(5);
		$data["dateselected2"] = $this->uri->segment(6)."/".$this->uri->segment(7)."/".$this->uri->segment(8);
		$categories = $this->plkucause->getcategories();
		$data['categories'] = $categories['res'];
		$this->load->view('lku/mainrootcause',$data);
    }
}