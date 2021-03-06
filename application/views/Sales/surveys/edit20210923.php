<!DOCTYPE html>
<html lang="en">
<?php $this->load->view('adm/head')?>
<script type='text/javascript' src='/js/aquarius/radu.js'></script>
<script type='text/javascript' src='/js/aquarius/Sales/surveys/edit20210923.js'></script>
<body>
	<?php $this->load->view("Sales/surveys/modals");?>
	<script>client_id=<?php echo $obj->client_id;?></script>
    <?php $this->load->view("Sales/surveys/add/addinternet");?>
    <?php $this->load->view("Sales/surveys/add/adddevice");?>
    <?php $this->load->view("Sales/surveys/add/addphiloin");?>
    <?php $this->load->view("Sales/surveys/add/addvas");?>
	<div class="header" id="myheader" user_id="<?php echo $this->ionuser->id;?>" username="<?php echo $this->session->userdata['username'];?>">
		<a class="logo" href="/"><img src="/img/aquarius/logo.png" alt="PadiApp" title="PadiApp"/></a>
		<ul class="header_menu">
			<li class="list_icon"><a href="#">&nbsp;</a></li>
		</ul>
	</div>
	<?php $this->load->view('adm/menu');?>
	<div class="content">
		<div class="breadLine">
			<ul class="breadcrumb">
				<li><a href="#">PadiApp</a> <span class="divider">></span></li>
				<li><a href="#">Survey</a> <span class="divider">></span></li>
				<li class="active">Add</li>
			</ul>
			<?php $this->load->view('adm/buttons');?>
		</div>
		<div class="workplace" id="workplace" client_id="<?php echo $obj->id;?>">
			<input type="hidden" name="client_id" id="client_id" value="<?php echo $obj->client_id;?>" class="surveyrequest surveysite clientsite inp_pic ">
			<input type="hidden" id="client_site_id" name="id" value="<?php echo $obj->client_site_id;?>" class="clientsite ">
			<input type="hidden" id="survey_site_id" name="id" value="<?php echo $obj->id;?>" class="surveysite ">
			<input type="hidden" name="sale_id" value="<?php echo $this->ionuser->id;?>" class="surveysite clientsite ">
			<input type="hidden" name="id" id="survey_request_id" value="<?php echo $obj->survey_request_id;?>" class="surveyrequest">
			<input type="hidden" name="createuser" value="<?php echo $this->ionuser->username;?>" class="surveysite clientsite surveyrequest">
			<div class="block-fluid without-head">
				<div class="toolbar clearfix">
					<div class="right">
						<div class="btn-group">
							<button class='btn btn-small btn-warning tip' title='Simpan' id='survey_save'  value='<?php echo $obj->id;?>'>
								<span class="icon-ok icon-white"></span> Simpan
							</button>
						</div>
					</div>
				</div>
			</div>
			<div class="row-fluid">
				<div class="span12">
					<div class="block-fluid without-head">
						<div class="row-form clearfix">
							<div class="span3" id="tslabel">
								TS Cabang Yang menangani <?php echo $obj->client_site->branches->name;?>
							</div>
							<div class="span3">
								<?php for($i=1;$i<=count($branches);$i++){?>
									<?php
										$tocheck = true;
										foreach($obj->client_site->branch as $br){
											if($i===$br->id){
												$tocheck = false;
											}else{
											}
										}
										if(!$tocheck){
											$checked = 'checked="checked"';
										}else{
											$checked = '';
										}
									?>
									<input class="tsbranch" type="checkbox" <?php echo $checked;?> value="<?php echo $i;?>">
									<?php echo $branches[$i];?>
								<?php }?>
							</div>
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
								<?php echo form_input('name',$obj->client_site->client->name,'id="name" readonly');?>
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
								<?php foreach($obj->client_site->client->pic as $pic){?>
								<div class="item clearfix piclists" picid=<?php echo $pic->id;?>>
									<div class="infopic">
										<div>
											<a class="name"><?php echo $pic->name;?></a><br />
											<?php echo $pic->position;?><p />
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
								<?php echo form_input('address',$obj->address,'id="address" readonly');?>
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
							<div class="span3">Kategori</div>
							<div class="span9" title="<?php echo $category_description;?>">
								<?php echo form_dropdown("clientcategory",$categories,$clientcategory->clientcategory,'id="clientcategory" type="selectid"');?>
							</div>
						</div>
					</div>
				</div>
				<div class="span6 clearfix">
					<div class="block-fluid without-head">
						<div class="toolbar nopadding-toolbar clearfix">
							<h4>Data Cabang Pelanggan yang hendak disurvey</h4>
						</div>
						<div class="row-form clearfix">
							<div class="span3">Instalasi di Cabang PadiNET</div>
							<div class="span9">
								<?php echo form_dropdown('install_area',$branches,$obj->client_site->branch->id,'id="install_area" class="surveyrequest clientsite" type="selectid"');?>
							</div>
						</div>
						<div class="row-form clearfix">
							<div class="span3">Alamat Cabang</div>
							<div class="span9">
								<?php echo form_input('address',$obj->address,'id="site_address"  class="surveyrequest surveysite clientsite emptycheck"');?>
							</div>
						</div>
						<div class="row-form clearfix">
							<div class="span3">Kota</div>
							<div class="span9">
								<?php echo form_input('city',$obj->city,'id="site_city"  class="surveyrequest surveysite clientsite emptycheck"');?>
							</div>
						</div>
						<!--start of pic cabang-->
						<div class="row-form clearfix">
							<div class="head clearfix">
								<div></div>
								<h1>PIC Cabang</h1>
								<ul class="buttons">
								<li>
									<a id="btnAddPicSite" class="isw-plus"></a>
								</li>
								</ul>
							</div>
							<div class="block-fluid users" id="listpicsite">
								<?php foreach($obj->client_site->site_pic as $pic){?>
								<div class="item clearfix sitepiclists" picid=<?php echo $pic->id;?>>
									<div class="infopic">
										<div>
											<a class="name"><?php echo $pic->name;?></a><br />
											<?php echo $pic->position;?><p />
										</div>
										<span><?php echo $pic->email;?><br /><?php echo $pic->hp;?></span>
										<div class="controls">
											<a class="icon-pencil edit_sitepic"></a>
											<a class="icon-remove remove_sitepic"></a>
										</div>
									</div>
								</div>
								<?php }?>
							</div>
						</div>
						<!--end of pic cabang-->
						<!--PIC end-->
						<?php $dtpart = $this->common->longsql_to_datepart($obj->survey_date);?>
						<div class="row-form clearfix">
							<div class="span3">Tgl Survey</div>
							<div class="span4">
								<input type="text" name="survey_date"  class="datepicker surveyrequest surveysite" id='survey_date' value= '<?php echo $dtpart["day"] . "/" . $dtpart["month"] . "/" . $dtpart["year"];?>' />
							</div>
							<div class="span2">
								<?php echo form_dropdown('surveyhour',$hours,$dtpart["hour"],'id="surveyhour" class="dttime" parent="survey_date"');?>
							</div>
							<div class="span2">
								<?php echo form_dropdown('surveyminute',$minutes,$dtpart["minute"],'id="surveyminute" class="dttime" grandparent="survey_date"');?>
								<input type="hidden" name="surveysecond" id="surveysecond" value="<?php echo $dtpart["second"];?>">
							</div>
						</div>
						<div class="row-form clearfix">
							<div class="span3">Keterangan</div>
							<div class="span9">
								<textarea name="description" id="resume" class="surveyrequestx surveysitex myeditor" type="textarea"><?php echo $obj->description?></textarea>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
