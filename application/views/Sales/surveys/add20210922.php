<!DOCTYPE html>
<html lang="en">
    <?php $this->load->view('adm/head') ?>
    <body>
		<?php $this->load->view("Sales/surveys/addModal");?>

        <script>client_id=<?php echo $obj->id;?></script>
        <?php $this->load->view("Sales/surveys/add/addinternet");?>
        <?php $this->load->view("Sales/surveys/add/adddevice");?>
        <?php $this->load->view("Sales/surveys/add/addphiloin");?>
        <?php $this->load->view("Sales/surveys/add/addvas");?>
        <?php $this->load->view("Sales/surveys/add/addptp");?>
        <div class="header" id="myheader" user_id="<?php echo $this->ionuser->id; ?>" username="<?php echo $this->session->userdata['username']; ?>">
            <a class="logo" href="/"><img src="/img/aquarius/logo.png" alt="PadiApp" title="PadiApp"/></a>
            <ul class="header_menu">
                <li class="list_icon"><a href="#">&nbsp;</a></li>
            </ul>
        </div>
	    <?php $this->load->view('adm/menu'); ?>
        <div class="content">
            <div class="breadLine">
                <ul class="breadcrumb">
                    <li><a href="/">PadiApp</a> <span class="divider">></span></li>
                    <li><a href="/survey_requests">Survey</a> <span class="divider">></span></li>
                    <li class="active">Add</li>
                </ul>
                <?php $this->load->view('adm/buttons'); ?>
            </div>
            <div class="workplace" id="workplace" client_id="<?php echo $obj->id; ?>">
                <input type="hidden" name="client_id" id="clientid" value="<?php echo $obj->id; ?>" class="surveyrequest surveysite clientsite inp_pic">
                <input type="hidden" name="sale_id" id="sale_id"value="<?php echo $this->ionuser->id; ?>" class="surveysite clientsite ">
                <input type="hidden" name="createuser" id="createuser" value="<?php echo $this->ionuser->username; ?>" class="surveysite clientsite surveyrequest">
                <input type="hidden" name="branch_id" id="branch_id" value="<?php echo $user->branch->id; ?>" class="clientsite">
                <div class="block-fluid without-head">
                    <div class="toolbar clearfix">
                        <div class="right">
                            <div class="btn-group">
                                <button class='btn btn-small btn-warning tip' title='Simpan' id='survey_save'  value='<?php echo $obj->id; ?>'><span class="icon-ok icon-white"></span> Simpan</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row-fluid">
                    <div class="span6">
                        <div class="block-fluid without-head">
                            <div class="toolbar nopadding-toolbar clearfix">
                                <h4>Data Pelanggan</h4>
                            </div>
                            <div class="row-form clearfix">
                                <div class="span3">Nama</div>
                                <div class="span9">
                                    <?php echo form_input('name', $obj->name, 'id="name" readonly'); ?>
                                </div>
                            </div>
							<div class="row-form clearfix">
                                <div class="head clearfix">
                                    <div></div>
                                    <h1>PIC Pusat</h1>
                                    <ul class="buttons">
                                    <li>
                                        <a id="btnAddPic" class="isw-plus"></a>
                                    </li>
                                    </ul>
                                </div>
                                <div class="block-fluid users" id="listusers">
                                    <?php foreach($pics as $pic){?>
                                    <div class="item clearfix piclists" picid=<?php echo $pic->id;?>>
                                    <div class="infopic">
                                        <div>
                                        <a class="name"><?php echo $pic->name;?></a><br />
                                        <?php echo $pic->position;?><p>

                                        </div>
                                        <span><?php echo $pic->email;?><br /><?php echo $pic->hp;?></span>

                                        <div class="controls">
                                            <a class="icon-pencil edit_pic"></a>
                                            <a class="icon-remove remove_pic"></a>
                                        </div>
                                    </div>
                                    </div>
                                    <?php }?>
                                </div>
						    </div>
                            <div class="row-form clearfix">
                                <div class="span3">Alamat</div>
                                <div class="span9">
                                    <?php echo form_input('address', $obj->address, 'id="address" readonly'); ?>
                                </div>
                            </div>
                            <div class="row-form clearfix">
                                <div class="span12">
                                    <div class="head clearfix">
                                        <h1>Layanan Internet</h1>
                                        <ul class="buttons">
                                            <li><a class="btnAddInternet isw-plus" id="btnAddInternet"></a></li>                                                        
                                        </ul>                        
                                    </div>
                                    <div class="block-fluid">
                                        <table cellpadding="0" cellspacing="0" width="100%" class="table" id='tInternet'>
                                            <thead>
                                                <tr>
                                                    <th width="10%">ID</th>
                                                    <th width="85%">Name</th>
                                                    <th width="5%">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                                                
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            

                            <div class="row-form clearfix">
                                <div class="span12">
                                    <div class="head clearfix">
                                        <h1>Layanan VAS</h1>
                                        <ul class="buttons">
                                            <li><a class="btnAddVas isw-plus" id="btnAddVas"></a></li>                                                        
                                        </ul>                        
                                    </div>
                                    <div class="block-fluid">
                                        <table cellpadding="0" cellspacing="0" width="100%" class="table" id='tVAS'>
                                            <thead>
                                                <tr>
                                                    <th width="10%">ID</th>
                                                    <th width="85%">Name</th>
                                                    <th width="5%">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                                                
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <div class="row-form clearfix">
                                <div class="span12">
                                    <div class="head clearfix">
                                        <h1>Layanan Perangkat</h1>
                                        <ul class="buttons">
                                            <li><a class="btnAddDevice isw-plus" id="btnAddDevice"></a></li>                                                        
                                        </ul>                        
                                    </div>
                                    <div class="block-fluid">
                                        <table cellpadding="0" cellspacing="0" width="100%" class="table" id='tDevice'>
                                            <thead>
                                                <tr>
                                                    <th width="10%">ID</th>
                                                    <th width="85%">Name</th>
                                                    <th width="5%">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                                                
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <div class="row-form clearfix">
                                <div class="span12">
                                    <div class="head clearfix">
                                        <h1>Layanan Philoins</h1>
                                        <ul class="buttons">
                                            <li><a class="btnAddPhiloin isw-plus" id="btnAddPhiloin"></a></li>                                                        
                                        </ul>                        
                                    </div>
                                    <div class="block-fluid">
                                        <table cellpadding="0" cellspacing="0" width="100%" class="table" id='tPhiloin'>
                                            <thead>
                                                <tr>
                                                    <th width="10%">ID</th>
                                                    <th width="85%">Name</th>
                                                    <th width="5%">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                                                
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <div class="row-form clearfix">
                                <div class="span3">FFR</div>
                                <div class="span9" title="<?php echo $category_description;?>">
                                    <?php echo form_dropdown("isffr",array("Ya","Tidak"),0,'id="isffr" type="selectid"');?>
                                </div>
                            </div>

                            <div class="row-form clearfix">
                                <div class="span3">Kategori</div>
                                <div class="span9" title="<?php echo $category_description;?>">
                                    <?php echo form_dropdown("clientcategory",$categories,0,'id="clientcategory" type="selectid"');?>
                                </div>
                            </div>
                            <div class="row-form clearfix">
                                <div class="span3">Punya tangga ?</div>
                                <div class="span9" title="Apakah calon Pelanggan punya tangga ?">
                                    <?php echo form_dropdown("has_ladder",array("0"=>"Tidak","1"=>"Ya"),0,'id="has_ladder" ');?>
                                </div>
                            </div>
                    </div>
				</div>
                    <div class="span6 clearfix">
                        <div class="block-fluid without-head">
                            <div class="toolbar nopadding-toolbar clearfix">
                                <h4>Data Cabang Pelanggan yang hendak disurvey, diisi jika site berbeda</h4>
                            </div>
                            <div class="row-form clearfix">
                                <div class="span3">Instalasi di Cabang PadiNET</div>
                                <div class="span9">
                                    <?php echo form_dropdown('install_area', $branches, $obj->branch_id, 'id="install_area" class="surveyrequest clientsite" type="selectid"'); ?>
                                </div>
                            </div>
                            <div class="row-form clearfix">
                                <div class="span3">Alamat Cabang</div>
                                <div class="span9">
                                    <?php echo form_input('address', $obj->address, 'id="site_address"  class="surveyrequest surveysite clientsite emptycheck"'); ?>
                                </div>
                            </div>
                            <div class="row-form clearfix">
                                <div class="span3">Kota</div>
                                <div class="span9">
                                    <?php echo form_input('city', $obj->city, 'id="site_city"  class="surveyrequest surveysite clientsite emptycheck"'); ?>
                                </div>
                            </div>
                            <div class="row-form clearfix">
                                <div class="span3">PIC Cabang</div>
                                <div class="span9">
                                    <input type="text" name="pic_name"  value='<?php echo $obj->pic->name; ?>' id='site_pic' class="surveyrequest surveysite emptycheck"/>
                                </div>
                            </div>
                            <div class="row-form clearfix">
                                <div class="span3">Telepon</div>
                                <div class="span9">
                                    <input type="text" name="pic_phone" id="pic_phone" value="<?php echo $obj->phone; ?>" class="surveyrequest surveysite clientsite emptycheck"/>
                                </div>
                            </div>
                            <div class="row-form clearfix">
                                <div class="span3">PIC Position</div>
                                <div class="span9">
                                    <input type="text" name="pic_position" id="site_pic_position" class="surveyrequest surveysite emptycheck"value="<?php echo $obj->pic->position; ?>"/>
                                </div>
                            </div>
                            <div class="row-form clearfix">
                                <div class="span3">Email PIC Cabang</div>
                                <div class="span9">
                                    <input type="text" name="pic_email"  value='<?php echo $obj->pic->email; ?>' id='site_pic_email' class="surveyrequest surveysite emptycheck" />
                                </div>
                            </div>
                            <div class="row-form clearfix">

                            <div class="row-form clearfix">
                                <div class="span3">Tgl Survey</div>
                                <div class="span5">
                                    <input type="text" name="survey_date"  id='survey_date' value="<?php echo date('d/m/Y') ?>" class="surveyrequest surveysite datepicker emptycheck" />
                                </div>
                                <div class="span2">
                                    <?php echo form_dropdown('filterhour1', $hours, 8, 'id="filterhour1" class="dttime" parent="survey_date"'); ?>
                                </div>
                                <div class="span2">
                                    <?php echo form_dropdown('filterminute1', $minutes, '', 'id="filterminute1" class="dttime" grandparent="survey_date"'); ?>
                                </div>
                            </div>
                            <div class="row-form clearfix">
                                <div class="span3">Keterangan</div>
                                <div class="span9">
                                    <textarea name="description" id="resume"></textarea>
                                </div>
                            </div>
                            <div class="row-form clearfix">
                                <div class="span12">
                                    <div class="head clearfix">
                                        <h1>Penambahan PTP</h1>
                                        <ul class="buttons">
                                            <li><a class="btnAddPTP isw-plus" id="btnAddPTP"></a></li>                                                        
                                        </ul>                        
                                    </div>
                                    <div class="block-fluid">
                                        <table cellpadding="0" cellspacing="0" width="100%" class="table" id='tPTP'>
                                            <thead>
                                                <tr>
                                                    <th width="10%">ID</th>
                                                    <th width="85%">Name</th>
                                                    <th width="5%">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                                                
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
    <script type='text/javascript' src='/js/aquarius/Sales/surveys/add20210922.js'></script>
</html>
