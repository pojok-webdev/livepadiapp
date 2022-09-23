<?php
Class Odooc extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->library('odoo');
    }
    function ceklisttodo(){
        $this->load->view('odoo/todo',array(
            'objs'=>array(
                array(
                    "no"=>1,"name"=>"SKU per Subscription","description"=>"","status"=>"X"
                ),
                array(
                    "no"=>2,"name"=>"PIC per Location","description"=>"","status"=>"X"
                ),
                array(
                    "no"=>2,"name"=>"PO BTS, AP, Upstream","description"=>"untuk penentuan lokasi","status"=>"X"
                )
            )
        ));
    }
    function excelsclientactive(){
        $sql = 'select b.id,a.name,a.telp,"" email,c.username,"" activities,b.city,';
        $sql.= 'case b.branch_id when "1" then "01" when "2" then "02" when "3" then "01" when "4" then "03" end ou,';
        $sql.= 'case b.branch_id when "1" then "Surabaya" when "2" then "Jakarta" when "3" then "Malang" when "4" then "Bali" end brn,';
        $sql.= 'b.address from fbs a ';
        $sql.= 'left outer join clients b on b.id=a.client_id ';
        $sql.= 'left outer join users c on c.id=b.sale_id ';
        $sql.= 'where a.status="1" and a.expirystatus="0" and b.active="1" and b.status="1" ';
        $sql.= 'order by b.branch_id ';
        $que = $this->db->query($sql);
        $this->load->view("odoo/excelclient",array(
            "clients"=>$que->result()
        ));
    }
}
/**
 * 2022-09-22
 * things to do:
 * sku per subscription
 * pic location u/subscription
 */

/**
 * GR good receive: beli
 * GI good issue: jual
 * RO: Rental Order
 * 
 * Bundled
 * -layanan (subscription)
 * -perangkat disewakan
 * 
 * Disewakan (saat instalasi)
 * 
 * 
 * PO -> GR
 * agar bisa di PO harus dikonfirm dulu
 * -barang ada
 * -punya serial number
 * konfirm:
 * - pastikan warranty
 */