<?php
Class Qiscus extends CI_Controller{
    function __construct(){
        parent::__construct();
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Methods: PUT, GET, POST, DELETE");
        header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept"); 
    }
    function receive_webhooks(){
        $VERIFY_TOKEN = "hello";
    }
    function index(){
        echo "CizcuZ";
    }
}
