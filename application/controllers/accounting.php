<?php
Class Accounting extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('adevice');
        $this->load->model('amaterial');
        $this->load->model('asurvey');
        $this->load->model('ainstall');
        $this->load->model('atroubleshoot');
    }
    function index(){
      print_r($this->session->userdata);
      echo $this->session->userdata['username'];
    }
    function checkloggedin(){
      if($this->session->userdata['username']){
        return true;
      }
      return false;
    }
    function devices(){
      if(!$this->checkloggedin()){
        redirect('/adm/logout');
      }
        $this->load->view('Accounting/devices');
    }
    function materials(){
      if(!$this->checkloggedin()){
        redirect('/adm/logout');
      }
      $this->load->view('Accounting/materials');
    }
    function surveys(){
      if(!$this->checkloggedin()){
        redirect('/adm/logout');
      }
      $this->load->view('Accounting/surveys');
    }
    function installs(){
      if(!$this->checkloggedin()){
        redirect('/adm/logout');
      }
      $this->load->view('Accounting/installs');
    }
    function troubleshoots(){
      if(!$this->checkloggedin()){
        redirect('/adm/logout');
      }
      $this->load->view('Accounting/troubleshoots');
    }
    function surveyreport(){
      $obj = $this->asurvey->getsrelated(array("a.id"=>$this->uri->segment(3)));
      $materials = $this->asurvey->getsurveymaterials($this->uri->segment(3));
      $devices = $this->asurvey->getsurveydevices($this->uri->segment(3));
      $data['obj'] = $obj['res'][0];

      $data['surveyors'] = '';
      $data['materials'] = $materials['res'];
      $data['devices'] = $devices['res'];
      $this->load->view('Accounting/surveyreport',$data);
    }
    function installreport(){
      $obj = $this->ainstall->getsrelated(array("a.id"=>$this->uri->segment(3)));
      $materials = $this->ainstall->getinstallmaterials($this->uri->segment(3));
      $routers = $this->ainstall->getinstallrouters($this->uri->segment(3));
      $antennas = $this->ainstall->getinstallantennas($this->uri->segment(3));
      $switches = $this->ainstall->getinstallswitches($this->uri->segment(3));
      $data['obj'] = $obj['res'][0];
      $wirelessradios = $this->ainstall->getinstallwirelessradios($this->uri->segment(3));
      $pccards = $this->ainstall->getinstallpccards($this->uri->segment(3));
      $apwifis = $this->ainstall->getinstallapwifis($this->uri->segment(3));
      
      $data['routers'] = $routers['res'];
      $data['materials'] = $materials['res'];
      $data['antennas'] = $antennas['res'];
      $data['switches'] = $switches['res'];
      $data['wirelessradios'] = $wirelessradios['res'];
      $data['pccards'] = $pccards['res'];
      $data['apwifis'] = $apwifis['res'];
      $this->load->view('Accounting/installreport',$data);
    }
    function formatJson($params,$cols){
      $arr = array();
      foreach($params as $param){
        $item = array();
        foreach($cols as $col){
          array_push($item,'"'.$param->$col.'"');
        }
        array_push($arr,'['.implode(',',$item).']');
      }
      return '{"aaData":['.implode(',',$arr).']}';
    }
    function getdevices(){
      $qdevices = $this->adevice->getsrelated();
      $rdevices = $qdevices['res'];
      echo $this->formatJson($rdevices,array('id','satuan','name','satuan','description'));
    }
    function getmaterials(){
      $qmaterials = $this->amaterial->getsrelated();
      $rmaterials = $qmaterials['res'];
      echo $this->formatJson($rmaterials,array('id','tipe','name','satuan','description'));
    }
    function getsurveys(){
      $qsurveys = $this->asurvey->getsrelated(array("1"=>"1"));
      $rsurveys = $qsurveys['res'];
      echo $this->formatJson($rsurveys,array('id','name','address','username','create_date'));
    }
    function getinstalls(){
      $qinstalls = $this->ainstall->getsrelated(array("1"=>"1"));
      $rinstalls = $qinstalls['res'];
      echo $this->formatJson($rinstalls,array('id','name','address','username','create_date'));
    }
    function gettroubleshoots(){
      $qtroubleshoots = $this->atroubleshoot->getsrelated(array("1"=>"1"));
      $rtroubleshoots = $qtroubleshoots['res'];
      echo $this->formatJson($rtroubleshoots,array('id','kdticket','nameofmtype','troubleshoottype','create_date'));
    }
    function troubleshootreport(){
      $obj = $this->atroubleshoot->getsrelated(array("a.id"=>$this->uri->segment(3)));
      $materials = $this->atroubleshoot->getmaterials($this->uri->segment(3));
      $devices = $this->atroubleshoot->getdevices($this->uri->segment(3));
      $routers = $this->atroubleshoot->getrouters($this->uri->segment(3));
      $antennas = $this->atroubleshoot->getantennas($this->uri->segment(3));
      $pccards = $this->atroubleshoot->getpccards($this->uri->segment(3));
      $switches = $this->atroubleshoot->getswitches($this->uri->segment(3));
      $data['obj'] = $obj['res'][0];

      $data['surveyors'] = '';
      $data['antennas'] = $antennas['res'];
      $data['materials'] = $materials['res'];
      $data['devices'] = $devices['res'];
      $data['routers'] = $routers['res'];
      $data['pccards'] = $pccards['res'];
      $data['switches'] = $switches['res'];
      $this->load->view('Accounting/troubleshootreport',$data);
    }
}