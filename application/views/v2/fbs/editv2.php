<!DOCTYPE html>
<html lang="en">
	<?php $this->load->view('adm/head');?>
	<body>
		<?php $this->load->view('Sales/subscribeforms/modalv2');?>
		<?php $this->load->view('v2/fbs/modalsv2');?>
		<?php $this->load->view('v2/fbs/modalProduct');?>
		<div class="header">
			<a class="logo" href="/">
				<img src="/img/aquarius/logo.png" alt="PadiNET" title="PadiNET"/>
			</a>
			<ul class="header_menu">
				<li class="list_icon"><a href="#">&nbsp;</a></li>
			</ul>
		</div>
		<?php $this->load->view('adm/menu');?>
		<div class="content">
			<div class="breadLine">
				<ul class="breadcrumb">
					<li><a href="/">App</a> <span class="divider">></span></li>
					<li><a href="/subscribeforms">Form Berlangganan</a> <span class="divider">></span></li>
					<li class="active">Edit</li>
				</ul>
				<?php $this->load->view('adm/buttons');?>
			</div>
			<div class="workplace">
				<input type="hidden" name="role" value="subscriber" class="inp_subscriber">
				<input type="hidden" name="role" value="resp" class="inp_resp">
				<input type="hidden" name="role" value="adm" class="inp_adm">
				<input type="hidden" name="role" value="teknis" class="inp_teknis">
				<input type="hidden" name="role" value="billing" class="inp_billing">
				<input type="hidden" name="role" value="support" class="inp_support">
				<input type="hidden" name="id" id="fb_id" value="<?php echo 0;//$fb->id;?>" class="inp_fb_">
				<input type="hidden" name="client_id" id="client_id" value="<?php echo $client_id;?>" class="inp_fb inp_subscriber inp_resp inp_adm inp_teknis inp_billing inp_support" id="client_site_id">
				<input type="hidden" name="createuser" id="createuser" value="<?php echo $username;?>" class="inp_fb inp_subscriber inp_resp inp_adm inp_teknis inp_billing inp_support" />
				<input type="hidden" class="dttime" parent="activationdate" val="00" />
				<input type="hidden" class="dttime" grandparent="activationdate" val="00" />
				<input type="hidden" class="dttime" parent="periode1" val="00" />
				<input type="hidden" class="dttime" grandparent="periode1" val="00" />
				<input type="hidden" class="dttime" parent="periode2" val="00" />
				<input type="hidden" class="dttime" grandparent="periode2" val="00" />
				<div class="toolbar clearfix">
					<div class="left">
						<span id='checkcomplete'>NO . FB (AUTOGENERATED)<span id='no_fb'><?php echo $nofb;?></span></span>
						<input type="hidden" id="nofb" name="nofb" class="inp_fb inp_subscriber inp_resp inp_teknis inp_adm inp_billing inp_support" value="<?php echo $nofb;?>">
					</div>
					<div class="right">
						<div class="btn-group">
							<button class='btn btn-small btn tip' title='Preview' id='btn_preview'>
								<span class="icon-print icon-white"></span> Lihat FB
							</button>
							<button class='btn btn-small btn tip' title='Simpan' id='btn_save'>
								<span class="icon-ok icon-white"></span> Simpan
							</button>
						</div>
					</div>
				</div>
				<div class="row-fluid">
					<div class="span6">
						<div class="block-fluid without-head">
							<div class="toolbar head clearfix">
								<div class="left">
									<b>Data Perusahaan</b>
								</div>
								<div class="right">
								</div>
							</div>
							<div class="row-form clearfix">
								<div class="span3">Nama <sup class="redsup">*</sup></div>
								<div class="span9">
									<label id="clientname" value="<?php echo $clientsite->name;?>" type="text">
										
										<input type="hidden" id="clientnameori" value="<?php echo $clientsite->name;?>" />
										<input type="text" id="clientnamefb" name="name" class="inp_fb" value="<?php echo $clientsite->fbname;?>" />
									</label>
								</div>
							</div>
							<div class="row-form clearfix">
								<div class="span3">Jenis Usaha</div>
								<div class="span9">
									<?php echo form_dropdown("businesstype",$businesstypes,$fb->businesstype,'class="inp_fb" type="select"');?>
								</div>
							</div>
							<div class="row-form clearfix" id='otherbusinesstype'>
								<div class="span3">Masukkan Jenis Usaha</div>
								<div class="span9">
									<input type="text" name="otherbusinesstype" id="otherbusinesstype" value="<?php echo $fb->otherbusinesstype;?>" class="inp_fb"/>
								</div>
							</div>
							<div class="row-form clearfix">
								<div class="span3">Alamat</div>
								<div class="span9"><input type="text" name="address" id="clientaddress" class="inp_fb" value="<?php echo $clientsite->address;?>"/></div>
							</div>
							<div class="row-form clearfix">
								<div class="span3">Telp</div>
								<div class="span4"><input type="text" name="telp" id="clientphone" class="inp_fb" value="<?php echo $clientsite->phone;?>"/></div>
								<div class="span1">Fax</div>
								<div class="span4"><input type="text" name="fax" id="clientfax" class="inp_fb" value="<?php echo $clientsite->fax;?>"/></div>
							</div>
							<div class="row-form clearfix">
								<div class="span3">Kategori FB</div>
								<div class="span9">
									<?php echo form_dropdown("fbcategory",$fbcategories,$clientsite->fbcategory,"id='fbcategory' class='inp_fb' type='select'")?>
								</div>
							</div>
							<div class="row-form clearfix">
								<div class="span3">FFR</div>
								<div class="span4">
								<?php echo form_dropdown('isffr',$isffr,$clientsite->isffr,'id="isffr"');?>
								</div>
							</div>
							<div class="row-form clearfix">
								<div class="span3">Category</div>
								<div class="span4">
								<?php echo form_dropdown('clientcategory',$clientcategories,$clientsite->clientcategory,'id="category_id"');?>
								</div>
							</div>
						</div>
					</div>
					<div class="span6">
						<div class="block-fluid without-head">
							<div class="toolbar head clearfix">
								<div class="left">
									<b>Data Pendaftaran Perusahaan</b>
								</div>
								<div class="right">
								</div>
							</div>
							<div class="row-form clearfix">
								<div class="span3">No. SIUP</div>
								<div class="span9">
									<input type="text" name="siup" id="siup" class="inp_fb mandatory toselectAll_" humanName="SIUP" value="<?php echo $clientsite->siup;?>"/>
								</div>
							</div>
							<div class="row-form clearfix">
								<div class="span3">Alamat SIUP</div>
								<div class="span9">
									<input type="text" name="siupaddress" id="siupaddress" class="inp_fb mandatory toselectAll_" humanName="SIUP Address" value="<?php echo $clientsite->siupaddress;?>"/>
								</div>
							</div>
							<div class="row-form clearfix">
								<div class="span3">No. NPWP</div>
								<div class="span9"><input type="text" name="npwp" id="npwp" class="inp_fb mandatory toselectAll_" humanName="NPWP" value="<?php echo $clientsite->npwp;?>" /></div>
							</div>
							<div class="row-form clearfix">
								<div class="span3">Alamat. NPWP</div>
								<div class="span9"><input type="text" name="npwpaddress" id="npwpaddress" class="inp_fb mandatory toselectAll_" humanName="NPWP" value="<?php echo $clientsite->npwpaddress;?>" /></div>
							</div>
							<div class="row-form clearfix">
								<div class="span3">No. SPPKP</div>
								<div class="span9"><input type="text" name="sppkp" id="sppkp" class="inp_fb mandatory toselectAll_" humanName="NPWP" value="<?php echo $clientsite->sppkp;?>" /></div>
							</div>
							<div class="row-form clearfix">
								<div class="span3">Alamat. SPPKP</div>
								<div class="span9"><input type="text" name="sppkpaddress" id="sppkpaddress" class="inp_fb mandatory toselectAll_" humanName="NPWP" value="<?php echo $clientsite->sppkpaddress;?>" /></div>
							</div>
							<div class="row-form clearfix">
								<div class="span3">Alamat Penagihan</div>
								<div class="span9"><input type="text" name="billaddress" id="billaddress" class="inp_fb  toselectAll_" humanName="billaddress" value="<?php echo $fb->billaddress;?>" /></div>
							</div>
						</div>
					</div>
				</div>
				<div class="row-fluid">
					<div class="span6">
						<div class="block-fluid without-head draggable droppable ">
							<div class="toolbar head clearfix">
								<div class="left">
									<b>Pemohon</b>
								</div>
								<div class="right">
								</div>
							</div>
							<div class="row-form clearfix hidden">
								<div class="span3">ID <sup class="redsup">*</sup></div>
								<div class="span9">
								<input type="text" name="id" id="subscriber_id" class="inp_subscriber picelement toselectAll_" elname="elid"/>
								</div>
							</div>
							<div class="row-form clearfix">
								<div class="span3">Nama <sup class="redsup">*</sup></div>
								<div class="span9">
								<input type="text" name="name" id="subscribername" class="inp_subscriber mandatory picelement toselectAll_" humanName="PIC Pemohon" elname="elpicname"/>
                                </div>
							</div>
							<div class="row-form clearfix">
								<div class="span3">Jabatan <sup class="redsup">*</sup></div>
								<div class="span9">
								<input type="text" name="position" id="subscriberposition" class="inp_subscriber picelement toselectAll_" elname="elposition"/>
								</div>
							</div>
							<div class="row-form clearfix">
								<div class="span3">No. ID (KTP) <sup class="redsup">*</sup></div>
								<div class="span9">
								<input type="text" name="idnum" id="subscriberid" class="inp_subscriber picelement toselectAll_" elname="elidnum"/>
								</div>
							</div>
							<div class="row-form clearfix">
								<div class="span3">Telp <sup class="redsup">*</sup></div>
								<div class="span4">
								<input type='text' name="phone" id="subscriberphone" class="inp_subscriber picelement toselectAll_" elname="elphone">
								</div>
								<div class="span1">HP <sup class="redsup">*</sup></div>
								<div class="span4">
								<input type='text' name="hp" id="subscriberhp" class="inp_subscriber picelement toselectAll_" elname="elhp">
								</div>
							</div>
							<div class="row-form clearfix">
								<div class="span3">Email <sup class="redsup">*</sup></div>
								<div class="span9">
								<input type="text" name="email" id="subscriberemail" class="inp_subscriber picelement toselectAll_" elname="elemail"/>
								</div>
							</div>
						</div>
					</div>
					<div class="span6">
						<div class="block-fluid without-head  draggable droppable ">
							<div class="toolbar head clearfix">
								<div class="left">
									<b>Penanggung Jawab</b>
								</div>
								<div class="right">
								</div>
							</div>
							<div class="row-form clearfix hidden">
								<div class="span3">ID <sup class="redsup">*</sup></div>
								<div class="span9"><input type="text" name="id" id="resp_id" class="inp_resp picelement toselectAll_" elname="elid"/></div>
							</div>
							<div class="row-form clearfix">
								<div class="span3">Nama <sup class="redsup">*</sup></div>
								<div class="span9">
								<input type="text" name="name" id="respname" class="inp_resp mandatory picelement toselectAll_" humanName="PIC Penanggung Jawab" elname="elpicname"/>
								</div>
							</div>
							<div class="row-form clearfix">
								<div class="span3">Jabatan <sup class="redsup">*</sup></div>
								<div class="span9">
								<input type="text" name="position" id="respposition" class="inp_resp picelement toselectAll_" elname="elposition"/>
								</div>
							</div>
							<div class="row-form clearfix">
								<div class="span3">No. ID (KTP) <sup class="redsup">*</sup></div>
								<div class="span9">
								<input type="text" name="idnum" id="respid" class="inp_resp picelement toselectAll_" elname="elidnum"/>
								</div>
							</div>
							<div class="row-form clearfix">
								<div class="span3">Telp <sup class="redsup">*</sup></div>
								<div class="span4"><input type='text' name="phone" id="respphone" class="inp_resp picelement toselectAll_" elname="elphone"></div>
								<div class="span1">HP <sup class="redsup">*</sup></div>
								<div class="span4"><input type='text' name="hp" id="resphp" class="inp_resp picelement toselectAll_" elname="elhp"></div>
							</div>
							<div class="row-form clearfix">
								<div class="span3">Email <sup class="redsup">*</sup></div>
								<div class="span9"><input type="text" name="email" id="respemail" class="inp_resp picelement toselectAll_" elname="elemail"/></div>
							</div>
						</div>
					</div>
				</div>
				<div class="row-fluid">
					<div class="span6">
						<div class="block-fluid without-head draggable droppable ">
							<div class="toolbar head clearfix">
								<div class="left">
									<b>Administrasi</b>
								</div>
								<div class="right">
								</div>
							</div>
							<div class="row-form clearfix hidden">
								<div class="span3">ID <sup class="redsup">*</sup></div>
								<div class="span9"><input type="text" name="idnum" id="adm_id" class="inp_adm picelement toselectAll_" elname="elid"/></div>
							</div>
							<div class="row-form clearfix">
								<div class="span3">Nama <sup class="redsup">*</sup></div>
								<div class="span9">
								<input type="text" name="name" id="admname" class="inp_adm picelement mandatory toselectAll_" humanName="PIC Administrasi" elname="elpicname"/>
								</div>
							</div>
							<div class="row-form clearfix" style='display:none'>
								<div class="span3">KTP <sup class="redsup">*</sup></div>
								<div class="span9"><input type="text" name="idnum" id="admid" class="inp_adm toselectAll_"/></div>
							</div>
							<div class="row-form clearfix">
								<div class="span3">Telp<sup class="redsup">*</sup></div>
								<div class="span4"><input type='text' name="phone" id="admphone" class="inp_adm picelement toselectAll_" elname="elphone"></div>
								<div class="span1">HP <sup class="redsup">*</sup></div>
								<div class="span4"><input type='text' name="hp" id="admhp" class="inp_adm picelement toselectAll_" elname="elhp"></div>
							</div>
							<div class="row-form clearfix">
								<div class="span3">Email <sup class="redsup">*</sup></div>
								<div class="span9"><input type="text" name="email" id="admemail" class="inp_adm picelement toselectAll_" elname="elemail"/></div>
							</div>
						</div>
					</div>
					<div class="span6">
						<div class="block-fluid without-head draggable droppable ">
							<div class="toolbar head clearfix">
								<div class="left">
									<b>Teknis dan Instalasi</b>
								</div>
								<div class="right">
								</div>
							</div>
							<div class="row-form clearfix hidden">
								<div class="span3">ID <sup class="redsup">*</sup></div>
								<div class="span9"><input type="text" name="idnum" id="technician_id" class="inp_teknis picelement toselectAll_" elname="elid"/></div>
							</div>
							<div class="row-form clearfix">
								<div class="span3">Nama <sup class="redsup">*</sup></div>
								<div class="span9">
								<input type="text" name="name" id="technicianname" class="inp_teknis picelement mandatory toselectAll_" humanName="PIC Teknik" elname="elpicname"/>
								</div>
							</div>
							<div class="row-form clearfix" style='display:none'>
								<div class="span3">KTP <sup class="redsup">*</sup></div>
								<div class="span9"><input type="text" name="idnum" id="technicianid" class="inp_teknis toselectAll_"/></div>
							</div>
							<div class="row-form clearfix">
								<div class="span3">Telp<sup class="redsup">*</sup></div>
								<div class="span4"><input type='text' name="phone" id="technicianphone" class="inp_teknis picelement toselectAll_" elname="elphone"></div>
								<div class="span1">HP <sup class="redsup">*</sup></div>
								<div class="span4"><input type='text' name="hp" id="technicianhp" class="inp_teknis picelement toselectAll_" elname="elhp"></div>
							</div>
							<div class="row-form clearfix">
								<div class="span3">Email <sup class="redsup">*</sup></div>
								<div class="span9"><input type="text" name="email" id="technicianemail" class="inp_teknis picelement toselectAll_" elname="elemail"/></div>
							</div>
						</div>
					</div>
				</div>
				<div class="row-fluid">
					<div class="span6">
						<div class="block-fluid without-head draggable droppable ">
							<div class="toolbar head clearfix">
								<div class="left">
									<b>Penagihan</b>
								</div>
								<div class="right">
								</div>
							</div>
							<div class="row-form clearfix hidden">
								<div class="span3">ID <sup class="redsup">*</sup></div>
								<div class="span9"><input type="text" name="idnum" id="billing_id" class="inp_billing picelement toselectAll_" elname="elid"/></div>
							</div>
							<div class="row-form clearfix">
								<div class="span3">Nama <sup class="redsup">*</sup></div>
								<div class="span9">
								<input type="text" name="name" id="billingname" class="inp_billing picelement mandatory toselectAll_" humanName="PIC Billing" elname="elpicname"/>
								</div>
							</div>
							<div class="row-form clearfix" style='display:none'>
								<div class="span3">KTP <sup class="redsup">*</sup></div>
								<div class="span9"><input type="text" name="idnum" id="billingid" class="inp_billing toselectAll_"/></div>
							</div>
							<div class="row-form clearfix">
								<div class="span3">Telp<sup class="redsup">*</sup></div>
								<div class="span4">
								<input type='text' name="phone" id="billingphone" class="inp_billing picelement toselectAll_" elname="elphone">
								</div>
								<div class="span1">HP <sup class="redsup">*</sup></div>
								<div class="span4"><input type='text' name="hp" id="billinghp" class="inp_billing picelement toselectAll_" elname="elhp"></div>
							</div>
							<div class="row-form clearfix">
								<div class="span3">Email <sup class="redsup">*</sup></div>
								<div class="span9"><input type="text" name="email" id="billingemail" class="inp_billing picelement toselectAll_" elname="elemail"/></div>
							</div>
						</div>
					</div>
					<div class="span6">
						<div class="block-fluid without-head draggable droppable ">
							<div class="toolbar head clearfix">
								<div class="left">
									<b>Support Teknis 24 jam</b>
								</div>
								<div class="right">
								</div>
							</div>
							<div class="row-form clearfix hidden">
								<div class="span3">ID <sup class="redsup">*</sup></div>
								<div class="span9">
								<input type="text" name="idnum" id="support_id" class="inp_support picelement toselectAll_" elname="elid"/>
								</div>
							</div>
							<div class="row-form clearfix">
								<div class="span3">Nama <sup class="redsup">*</sup></div>
								<div class="span9">
								<input type="text" name="name" id="supportname" class="inp_support mandatory picelement toselectAll_" humanName="PIC Support" elname="elpicname"/>
								</div>
							</div>
							<div class="row-form clearfix" style='display:none'>
								<div class="span3">KTP <sup class="redsup">*</sup></div>
								<div class="span9"><input type="text" name="idnum" id="supportid" class="inp_support toselectAll_"/></div>
							</div>
							<div class="row-form clearfix">
								<div class="span3">Telp<sup class="redsup">*</sup></div>
								<div class="span4">
								<input type='text' name="phone" id="supportphone" class="inp_support picelement toselectAll_" elname="elphone">
								</div>
								<div class="span1">HP <sup class="redsup">*</sup></div>
								<div class="span4"><input type='text' name="hp" id="supporthp" class="inp_support picelement toselectAll_" elname="elhp"></div>
							</div>
							<div class="row-form clearfix">
								<div class="span3">Email <sup class="redsup">*</sup></div>
								<div class="span9"><input type="text" name="email" id="supportemail" class="inp_support picelement toselectAll_" elname="elemail"/></div>
							</div>
						</div>
					</div>
				</div>
				<div class="row-fluid">
					<div class="span6">
						<div class="block-fluid without-head">
							<div class="toolbar head clearfix">
								<div class="left">
									<b>LAYANAN</b>
								</div>
								<div class="right">
								</div>
							</div>
							<div class="row-form clearfix">
								<div class="span3">Keterangan Internal </div>
								<div class="span9">
									<textarea  style="height: 160px;width:300px" id='internaldescription' name="internaldescription" type="textarea" class='myeditor inp_fb text'>
									<?php echo $clientsite->internaldescription;?>
									</textarea>
								</div>
							</div>
						</div>
					</div>
					<div class="span6">
						<div class="block-fluid without-head" id='fees'>
							<div class="toolbar head clearfix">
								<div class="left">
									<b>BIAYA BERLANGGANAN</b>
								</div>
								<div class="right">
								</div>
							</div>
							<div class="row-form clearfix">
								<div class="span3">Biaya</div>
								<div class="span3">DPP</div>
								<div class="span3">PPN</div>
								<div class="span3">Total</div>
							</div>
							<div class="row-form clearfix">
								<div class="span3"><b>Setup</b></div>
								<div class="span3"><input type='text' value=0 class='autonum setup toselectAll' id='setupfee' /></div>
								<div class="span3"><input type='text' value=0 class='autonum setup toselectAll' id='setupppn' /></div>
								<div class="span3" class='autonum' id='setuptotal'></div>
							</div>
							<div class="row-form clearfix">
								<div class="span3"><b>Bulanan</b></div>
								<div class="span3"><input type='text' value=0 class='autonum monthly toselectAll' id='monthlyfee' /></div>
								<div class="span3"><input type='text' value=0 class='autonum monthly toselectAll' id='monthlyppn' /></div>
								<div class="span3" class='autonum' id='monthlytotal'></div>
							</div>
							<div class="row-form clearfix">
								<div class="span3"><b>Perangkat</b></div>
								<div class="span3"><input type='text' value=0 class='autonum device toselectAll' id='devicefee' align='right' />
								</div>
								<div class="span3"><input type='text' value=0 class='autonum device toselectAll' id='deviceppn' align='right' />
								</div>
								<div class="span3" class='autonum' id='devicetotal'></div>
							</div>
						</div>
						<div class="row-form clearfix">
							<div class="span3"><b>Lainnya</b></div>
							<div class="span9" id='othertotal'>
								<button id='btnAddOtherFee' class="btn btn-mini" type="button">Penambahan Biaya</button>
							</div>
						</div>
					</div>
				</div>
				<div class="row-fluid">
					<div class="span6">
						<div class="block-fluid without-head">
							<div class="toolbar nopadding-toolbar clearfix">
								<h4>Layanan Pelanggan</h4>
							</div>
							<div class="toolbar clearfix paditablehead">
								<div class="left">
									<div class="btn-group">
										<button type="button" class="btn btn-small btn-danger btn_addservice" title="Add">
											<span class="icon-plus icon-white"></span>
										</button>
										<button type="button" class="btn btn-small btn_addservice">Penambahan Layanans</button>
									</div>
								</div>
							</div>
							<table cellpadding="0" cellspacing="0" width="100%" class="table images" id="tservice">
								<thead>
									<tr>
										<th width="60">Tipe</th>
										<th>Keterangan</th>
										<th width="40"><span class="icon-th-large"></span></th>
									</tr>
								</thead>
								<tbody>
									<?php foreach($fbservices as $service){?>
										<tr thisid='<?php echo $service->id;?>'>
											<td class="servicecategory"><?php echo $service->category;?></td>
											<td class="info">
												<a><?php echo $service->name;?></a>
												<span><?php echo $service->upl;?></span> 
												<span><?php echo $service->dnl;?></span>
											</td>
											<td>
												<div class="btn-group">
													<button data-toggle="dropdown" class="btn btn-small dropdown-toggle"  > Aksi 
													<span class="caret"></span>
													</button>
													<ul class="dropdown-menu pull-right">
														<li class="remove_service"><a>Hapus</a></li>
													</ul>
												</div>
											</td>
										</tr>
									<?php }?>
									<?php foreach($fbdevices as $device){?>
										<tr thisid='<?php echo $device->id;?>'>
											<td class="servicecategory">Perangkat</td>
											<td class="info">
												<a><?php echo $device->name;?></a>
											</td>
											<td>
												<div class="btn-group">
													<button data-toggle="dropdown" class="btn btn-small dropdown-toggle"  > Aksi 
													<span class="caret"></span>
													</button>
													<ul class="dropdown-menu pull-right">
														<li class="remove_device"><a>Hapus</a></li>
													</ul>
												</div>
											</td>
										</tr>
									<?php }?>
									<?php foreach($fbvas as $vas){?>
										<tr thisid='<?php echo $vas->id;?>'>
											<td class="servicecategory">VAS</td>
											<td class="info">
												<a><?php echo $vas->name;?></a>
											</td>
											<td>
												<div class="btn-group">
													<button data-toggle="dropdown" class="btn btn-small dropdown-toggle"  > Aksi 
													<span class="caret"></span>
													</button>
													<ul class="dropdown-menu pull-right">
														<li class="remove_vas"><a>Hapus</a></li>
													</ul>
												</div>
											</td>
										</tr>
									<?php }?>

								</tbody>
							</table>
							<div class="toolbar bottom-toolbar clearfix">
								<div class="left">
								</div>
								<div class="right">
									Total : <span id="total_service"><?php echo $fbserviceamount;?></span>
								</div>
							</div>
						</div>
					</div>
					<div class="span6">
						<div class="block-fluid without-head">
							<div class="toolbar nopadding-toolbar clearfix">
								<h4>Lain-lain</h4>
							</div>
							<div class="row-form clearfix">
								<div class="span3">Tgl Aktivasi <sup class="redsup">*</sup></div>
								<div class="span9"><input type="text" name="activationdate" id="activationdate" class="datepicker inp_fb"/></div>
								<input type='hidden' id='acthour1' parent='activationdate' value='00' class='dttime'>
								<input type='hidden' id='actminute1' grandparent='activationdate' value='00' class='dttime'>
							</div>
							<div class="row-form clearfix">
								<div class="span3">Periode Kontrak <sup class="redsup">*</sup></div>
								<div class="span4"><input type="text" name="period1" id="period1" class="datepicker inp_fb"/></div>
								<input type='hidden' id='hour1' parent='period1' value='00' class='dttime'>
								<input type='hidden' id='minute1' grandparent='period1' value='00' class='dttime'>
								<div class="span1">sd <sup class="redsup">*</sup></div>
								<div class="span4"><input type="text" name="period2" id="period2" class="datepicker inp_fb"/></div>
								<input type='hidden' id='hour2' parent='period2' value='00' class='dttime'>
								<input type='hidden' id='minute2' grandparent='period2' value='00' class='dttime'>
							</div>
						</div>
					</div>
				</div>
				<div class="row-fluid">
					<div class="span6">
						<div class="block-fluid without-head">
							<div class="toolbar head clearfix">
								<div class="left">
									<b>Jenis Penagihan</b>
								</div>
								<div class="right">
								</div>
							</div>
							<div class="row-form clearfix">
								<div class="span3">Jenis <sup class="redsup">*</sup></div>
								<div class="span9">
								<?php echo form_dropdown('accounttype',array('0'=>'Akun Baru','1'=>'Akun Existing'),$fb->accounttype,'id="accounttype" class="inp_fb" type="selectid"');?>
								</div>
							</div>
						</div>
					</div>
					<div class="span6">
						<div class="block-fluid without-head" id='fees'>
							<div class="toolbar head clearfix">
								<div class="left">
									<b>Keterangan</b>
								</div>
								<div class="right">
								</div>
							</div>
							<div class="row-form clearfix">
								<div class="span3">
								<textarea  style="height:160px; width:400px" id='description' name="description" type="textarea" class='myeditor inp_fbx text'>
									<?php echo $fb->description;?>
								</textarea>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="row-fluid">
				<div class="span6">
						<div class="block-fluid without-head">
							<div class="toolbar nopadding-toolbar clearfix">
								<h4 id="repop">Produk Pelanggan</h4>
							</div>
							<div class="toolbar clearfix paditablehead">
								<div class="left">
									<div class="btn-group">
										<button type="button" class="btn btn-small btn-danger btn_addproduct" title="Add">
											<span class="icon-plus icon-white"></span>
										</button>
										<button type="button" class="btn btn-small btn_addproduct">Penambahan Produk</button>
									</div>
								</div>
							</div>
							<table cellpadding="0" cellspacing="0" width="100%" class="table images" id="tProduct">
								<thead>
									<tr>
										<th width="60">Tipe</th>
										<th>Keterangan</th>
										<th width="40"><span class="icon-th-large"></span></th>
									</tr>
								</thead>
								<tbody>
								</tbody>
							</table>
							<div class="toolbar bottom-toolbar clearfix">
								<div class="left">
								</div>
								<div class="right">
									Total : <span id="totalProduct"><?php echo $fbserviceamount;?></span>
								</div>
							</div>
						</div>
					</div>
				<div class="span6">
                    <div class="block-fluid without-head">
                        <div class="toolbar nopadding-toolbar clearfix">
                            <h4>Checklist Dokumen</h4>
                        </div>
                        <div class="toolbar clearfix">
                            <div class="left">
                                <div class="btn-group">
                                </div>
                            </div>
                        </div>

                        <table cellpadding="0" cellspacing="0" width="100%" class="table tclientdocuments">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th width="40">Actions</th>                                
                                </tr>
                            </thead>
                            <tbody>
								<tr>
                                    <td class="info">
                                        <a class="fancybox _document" rel="group" >NPWP</a> 
                                    </td>
                                    <td>
                                        <a ><input type="checkbox" <?php echo $documentstatus['npwp']?> class="checkdocument"></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="info">
                                        <a class="fancybox _document" rel="group" >SIUP</a> 
                                    </td>
                                    <td>
									<a ><input type="checkbox" <?php echo $documentstatus['siup']?> class="checkdocument"></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="info">
                                        <a class="fancybox _document" rel="group" >SPPKP</a> 
                                    </td>
                                    <td>
									<a ><input type="checkbox" <?php echo $documentstatus['sppkp']?> class="checkdocument"></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="info">
                                        <a class="fancybox _document" rel="group" >KTP PENANGGUNG JAWAB</a> 
                                    </td>
                                    <td>
									<a ><input type="checkbox" <?php echo $documentstatus['ktp penanggung jawab']?> class="checkdocument"></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="info">
                                        <a class="fancybox _document" rel="group" >KTP PEMOHON</a> 
                                    </td>
                                    <td>
									<a ><input type="checkbox" <?php echo $documentstatus['ktp pemohon']?> class="checkdocument"></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="info">
                                        <a class="fancybox _document" rel="group" >SURAT KUASA</a> 
                                    </td>
                                    <td>
									<a ><input type="checkbox" <?php echo $documentstatus['surat kuasa']?> class="checkdocument"></a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="toolbar bottom-toolbar clearfix">
                            <div class="left">
                                <div class="btn-group">
                                </div>
                            </div>
                            <div class="right">
								<div class="pagination pagination-mini">
								</div>
                            </div>
                        </div>

                    </div>
                </div>
			</div>
			</div>
		</div>
		<script>
		nofb="<?php echo $nofb;?>"
		</script>
		<script src='/js/aquarius/pfbses/fblib.padi.js'></script>
		<script src='/js/aquarius/pfbses/editv3.js'></script>
		<script src='/js/aquarius/pfbses/modalProduct.js'></script>
	</body>
</html>
