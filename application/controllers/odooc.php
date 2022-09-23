<?php
Class Odooc extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->library('odoo');
    }
    function clientcleansing(){
        $sql = 'use teknis;';
        $sql.= 'drop table if exists clientcleansing ;';
        $sql = 'create table clientcleansing select max(id) id,b.name,b.branch_id from ';
        $sql.= '(select distinct name from clients where status="1" and active="1") a ';
        $sql.= 'left outer join clients b on b.name=a.name  group by a.name,b.branch_id ';
        $que = $this->db->query($sql);
    }
    function clientcleansing2(){
        $sql = 'create table clientcleansing2 select a.id,a.name,a.branch_id,b.address,b.city,b.sale_id from ';
        $sql.= 'clientcleansing a ';
        $sql.= 'left outer join clients b on b.id=a.id';
        $que = $this->db->query($sql);
    }
    function ceklisttodo(){
        $this->load->view('odoo/todo',array(
            'objs'=>array(
                array(
                    "no"=>1,"name"=>"SKU per Subscription","description"=>"","status"=>"request SKU sedang diproses, telah dikirim ke Pak Ketut"
                ),
                array(
                    "no"=>2,"name"=>"PIC per Location","description"=>"","status"=>"telah meminta ke CS (Rendy) untuk cek/melengkapi file excel yang telah dikirim"
                ),
                array(
                    "no"=>2,"name"=>"PO BTS, AP, Upstream","description"=>"untuk penentuan lokasi","status"=>"Perlu dilengkapi"
                )
            )
        ));
    }
    function excelsclientactive(){
        $sql = 'select b.id,a.name,a.telp,"" email,c.username,"" activities,b.city,';
        $sql.= 'case b.branch_id when "1" then "01" when "2" then "02" when "3" then "01" when "4" then "03" end ou,';
        $sql.= 'case b.branch_id when "1" then "Surabaya" when "2" then "Jakarta" when "3" then "Malang" when "4" then "Bali" end brn,';
        $sql.= 'b.address from fbs a ';
        $sql.= 'left outer join clientcleansing2 b on b.id=a.client_id ';
        $sql.= 'left outer join users c on c.id=b.sale_id ';
        $sql.= 'where a.status="1" and a.expirystatus="0" and b.id is not null ';
        $sql.= 'order by b.branch_id ';
        $que = $this->db->query($sql);
        $this->load->view("odoo/excelclient",array(
            "clients"=>$que->result()
        ));
    }
    function formsku(){
        $sql = 'select b.id,a.name,a.telp,a.nofb,"" email,c.username,"" activities,b.city,';
        $sql.= 'case b.branch_id when "1" then "01" when "2" then "02" when "3" then "01" when "4" then "03" end ou,';
        $sql.= 'case b.branch_id when "1" then "Surabaya" when "2" then "Jakarta" when "3" then "Malang" when "4" then "Bali" end brn,';
        $sql.= 'b.address from fbs a ';
        $sql.= 'left outer join clientcleansing2 b on b.id=a.client_id ';
        //$sql.= 'left outer join fbservices d on d.fb_id=a.nofb ';
        $sql.= 'left outer join users c on c.id=b.sale_id ';
        $sql.= 'where a.status="1" and a.expirystatus="0"  and b.id is not null ';
        $sql.= 'order by b.branch_id ';
        $que = $this->db->query($sql);
        $this->load->view("odoo/formsku",array(
            "clients"=>$que->result()
        ));
    }
    function glossary(){
        $this->load->view('odoo/glossary',array(

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
 * COGS: Cost of Good Sold = HPP Harga Pokok Penjualan
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
 * 
 * 
 * saat troubleshoot harus ada RO ?
 * 
 * restitusi terpisah dari invoice, karena pengaruh ke pajak
 * 
 * 10/30 * harga
 * 12 berikutnya normal
 * 
 * tagging dan analytical account untuk memaksimalkan fungsi odoo
 */

/*
select b.id,a.name,a.telp,"" email,c.username,"" activities,b.city,
case b.branch_id when "1" then "01" when "2" then "02" when "3" then "01" when "4" then "03" end ou,
case b.branch_id when "1" then "Surabaya" when "2" then "Jakarta" when "3" then "Malang" when "4" then "Bali" end brn,
b.address from fbs a 
left outer join clientcleansing2 b on b.id=a.client_id 
left outer join users c on c.id=b.sale_id 
where a.status="1" and a.expirystatus="0"
order by b.branch_id*/