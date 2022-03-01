<!DOCTYPE html>
<html lang="en">
	<?php $this->load->view('adm/head');?>
	<body>
		<?php $this->load->view('Sales/subscribeforms/modal');?>
		<div class="header">
			<a class="logo" href="index.html">
				<img src="<?php echo base_url()?>img/aquarius/logo.png" alt="PadiNET" title="PadiNET"/>
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
				<input type="hidden" name="client_id" id="client_id" value="<?php echo $id;?>" class="inp_fb inp_subscriber inp_resp inp_adm inp_teknis inp_billing inp_support" id="client_site_id">
				<input type="hidden" name="createuser" id="createuser" value="<?php echo $username;?>" class="inp_fb inp_subscriber inp_resp inp_adm inp_teknis inp_billing inp_support">
				<input type="hidden" class="dttime" parent="activationdate" val="00" />
				<input type="hidden" class="dttime" grandparent="activationdate" val="00" />
				<input type="hidden" class="dttime" parent="periode1" val="00" />
				<input type="hidden" class="dttime" grandparent="periode1" val="00" />
				<input type="hidden" class="dttime" parent="periode2" val="00" />
				<input type="hidden" class="dttime" grandparent="periode2" val="00" />
				<div class="toolbar clearfix">
					<div class="left">
						NO . FB (AUTOGENERATED)<span id='no_fb'><?php echo $fb->ccc;?></span>
						<input type="hidden" id="nofb" name="nofb" class="inp_fb" value="<?php echo $fb->ccc;?>">
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
								<div class="span9"><input type="text" name="name" id="clientname" class="inp_fb"/></div>
							</div>
							<div class="row-form clearfix">
								<div class="span3">Jenis Usaha</div>
								<div class="span9">
									<select id='businesstype' name='businesstype' class='inp_fb' type='select'>
										<option value='0'>Pilihlah</option>
										<option value='1'>Corporate</option>
										<option value='2'>Game On Line</option>
										<option value='3'>Perorangan</option>
										<option value='4'>Lainnya</option>
									</select>
								</div>
							</div>
							<div class="row-form clearfix" id='otherbusinesstype'>
								<div class="span3">Masukkan Jenis Usaha</div>
								<div class="span9"><input type="text" name="address" id="otherbusinesstype" class="inp_fb"/></div>
							</div>
							<div class="row-form clearfix">
								<div class="span3">Alamat</div>
								<div class="span9"><input type="text" name="address" id="clientaddress" class="inp_fb"/></div>
							</div>
							<div class="row-form clearfix">
								<div class="span3">Telp</div>
								<div class="span4"><input type="text" name="telp" id="clientphone" class="inp_fb"/></div>
								<div class="span1">Fax</div>
								<div class="span4"><input type="text" name="fax" id="clientfax" class="inp_fb"/></div>
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
								<div class="span3">SIUP</div>
								<div class="span9"><input type="text" name="siup" id="siup" class="inp_fb" /></div>
							</div>
							<div class="row-form clearfix">
								<div class="span3">NPWP</div>
								<div class="span9"><input type="text" name="npwp" id="npwp" class="inp_fb" /></div>
							</div>
						</div>
					</div>
				</div>
				<div class="row-fluid">
					<div class="span6">
						<div class="block-fluid without-head">
							<div class="toolbar head clearfix">
								<div class="left">
									<b>Pemohon</b>
								</div>
								<div class="right">
								</div>
							</div>
							<div class="row-form clearfix hidden">
								<div class="span3">ID <sup class="redsup">*</sup></div>
								<div class="span9"><input type="text" name="id" id="subscriber_id" class="inp_subscriber"/></div>
							</div>
							<div class="row-form clearfix">
								<div class="span3">Nama <sup class="redsup">*</sup></div>
								<div class="span9"><input type="text" name="name" id="subscribername" class="inp_subscriber" value="<?php $objs->role;?>"/></div>
							</div>
							<div class="row-form clearfix">
								<div class="span3">Jabatan <sup class="redsup">*</sup></div>
								<div class="span9"><input type="text" name="position" id="subscriberposition" class="inp_subscriber"/></div>
							</div>
							<div class="row-form clearfix">
								<div class="span3">No. ID (KTP) <sup class="redsup">*</sup></div>
								<div class="span9"><input type="text" name="idnum" id="subscriberid" class="inp_subscriber"/></div>
							</div>
							<div class="row-form clearfix">
								<div class="span3">Telp <sup class="redsup">*</sup></div>
								<div class="span4"><input type='text' name="phone" id="subscriberphone" class="inp_subscriber"></div>
								<div class="span1">HP <sup class="redsup">*</sup></div>
								<div class="span4"><input type='text' name="hp" id="subscriberhp" class="inp_subscriber"></div>
							</div>
							<div class="row-form clearfix">
								<div class="span3">Email <sup class="redsup">*</sup></div>
								<div class="span9"><input type="text" name="email" id="subscriberemail" class="inp_subscriber"/></div>
							</div>
						</div>
					</div>
					<div class="span6">
						<div class="block-fluid without-head">
							<div class="toolbar head clearfix">
								<div class="left">
									<b>Penanggung Jawab</b>
								</div>
								<div class="right">
								</div>
							</div>
							<div class="row-form clearfix hidden">
								<div class="span3">ID <sup class="redsup">*</sup></div>
								<div class="span9"><input type="text" name="id" id="resp_id" class="inp_resp"/></div>
							</div>
							<div class="row-form clearfix">
								<div class="span3">Nama <sup class="redsup">*</sup></div>
								<div class="span9"><input type="text" name="name" id="respname" class="inp_resp"/></div>
							</div>
							<div class="row-form clearfix">
								<div class="span3">Jabatan <sup class="redsup">*</sup></div>
								<div class="span9"><input type="text" name="position" id="respposition" class="inp_resp"/></div>
							</div>
							<div class="row-form clearfix">
								<div class="span3">No. ID (KTP) <sup class="redsup">*</sup></div>
								<div class="span9"><input type="text" name="idnum" id="respid" class="inp_resp"/></div>
							</div>
							<div class="row-form clearfix">
								<div class="span3">Telp <sup class="redsup">*</sup></div>
								<div class="span4"><input type='text' name="phone" id="respphone" class="inp_resp"></div>
								<div class="span1">HP <sup class="redsup">*</sup></div>
								<div class="span4"><input type='text' name="hp" id="resphp" class="inp_resp"></div>
							</div>
							<div class="row-form clearfix">
								<div class="span3">Email <sup class="redsup">*</sup></div>
								<div class="span9"><input type="text" name="email" id="respemail" class="inp_resp"/></div>
							</div>
						</div>
					</div>
				</div>
				<div class="row-fluid">
					<div class="span6">
						<div class="block-fluid without-head">
							<div class="toolbar head clearfix">
								<div class="left">
									<b>Administrasi</b>
								</div>
								<div class="right">
								</div>
							</div>
							<div class="row-form clearfix hidden">
								<div class="span3">ID <sup class="redsup">*</sup></div>
								<div class="span9"><input type="text" name="idnum" id="adm_id" class="inp_adm"/></div>
							</div>
							<div class="row-form clearfix">
								<div class="span3">Nama <sup class="redsup">*</sup></div>
								<div class="span9"><input type="text" name="name" id="admname" class="inp_adm"/></div>
							</div>
							<div class="row-form clearfix">
								<div class="span3">KTP <sup class="redsup">*</sup></div>
								<div class="span9"><input type="text" name="idnum" id="admid" class="inp_adm"/></div>
							</div>
							<div class="row-form clearfix">
								<div class="span3">Telp<sup class="redsup">*</sup></div>
								<div class="span4"><input type='text' name="phone" id="admphone" class="inp_adm"></div>
								<div class="span1">HP <sup class="redsup">*</sup></div>
								<div class="span4"><input type='text' name="hp" id="admhp" class="inp_adm"></div>
							</div>
							<div class="row-form clearfix">
								<div class="span3">Email <sup class="redsup">*</sup></div>
								<div class="span9"><input type="text" name="email" id="admemail" class="inp_adm"/></div>
							</div>
						</div>
					</div>
					<div class="span6">
						<div class="block-fluid without-head">
							<div class="toolbar head clearfix">
								<div class="left">
									<b>Teknis dan Instalasi</b>
								</div>
								<div class="right">
								</div>
							</div>
							<div class="row-form clearfix hidden">
								<div class="span3">ID <sup class="redsup">*</sup></div>
								<div class="span9"><input type="text" name="idnum" id="technician_id" class="inp_teknis"/></div>
							</div>
							<div class="row-form clearfix">
								<div class="span3">Nama <sup class="redsup">*</sup></div>
								<div class="span9"><input type="text" name="name" id="technicianname" class="inp_teknis"/></div>
							</div>
							<div class="row-form clearfix">
								<div class="span3">KTP <sup class="redsup">*</sup></div>
								<div class="span9"><input type="text" name="idnum" id="technicianid" class="inp_teknis"/></div>
							</div>
							<div class="row-form clearfix">
								<div class="span3">Telp<sup class="redsup">*</sup></div>
								<div class="span4"><input type='text' name="phone" id="technicianphone" class="inp_teknis"></div>
								<div class="span1">HP <sup class="redsup">*</sup></div>
								<div class="span4"><input type='text' name="hp" id="technicianhp" class="inp_teknis"></div>
							</div>
							<div class="row-form clearfix">
								<div class="span3">Email <sup class="redsup">*</sup></div>
								<div class="span9"><input type="text" name="email" id="technicianemail" class="inp_teknis"/></div>
							</div>
						</div>
					</div>
				</div>
				<div class="row-fluid">
					<div class="span6">
						<div class="block-fluid without-head">
							<div class="toolbar head clearfix">
								<div class="left">
									<b>Penagihan</b>
								</div>
								<div class="right">
								</div>
							</div>
							<div class="row-form clearfix hidden">
								<div class="span3">ID <sup class="redsup">*</sup></div>
								<div class="span9"><input type="text" name="idnum" id="billing_id" class="inp_billing"/></div>
							</div>
							<div class="row-form clearfix">
								<div class="span3">Nama <sup class="redsup">*</sup></div>
								<div class="span9"><input type="text" name="name" id="billingname" class="inp_billing"/></div>
							</div>
							<div class="row-form clearfix">
								<div class="span3">KTP <sup class="redsup">*</sup></div>
								<div class="span9"><input type="text" name="idnum" id="billingid" class="inp_billing"/></div>
							</div>
							<div class="row-form clearfix">
								<div class="span3">Telp<sup class="redsup">*</sup></div>
								<div class="span4"><input type='text' name="phone" id="billingphone" class="inp_billing"></div>
								<div class="span1">HP <sup class="redsup">*</sup></div>
								<div class="span4"><input type='text' name="hp" id="billinghp" class="inp_billing"></div>
							</div>
							<div class="row-form clearfix">
								<div class="span3">Email <sup class="redsup">*</sup></div>
								<div class="span9"><input type="text" name="email" id="billingemail" class="inp_billing"/></div>
							</div>
						</div>
					</div>
					<div class="span6">
						<div class="block-fluid without-head">
							<div class="toolbar head clearfix">
								<div class="left">
									<b>Support Teknis 24 jam</b>
								</div>
								<div class="right">
								</div>
							</div>
							<div class="row-form clearfix hidden">
								<div class="span3">ID <sup class="redsup">*</sup></div>
								<div class="span9"><input type="text" name="idnum" id="support_id" class="inp_support"/></div>
							</div>
							<div class="row-form clearfix">
								<div class="span3">Nama <sup class="redsup">*</sup></div>
								<div class="span9"><input type="text" name="name" id="supportname" class="inp_support"/></div>
							</div>
							<div class="row-form clearfix">
								<div class="span3">KTP <sup class="redsup">*</sup></div>
								<div class="span9"><input type="text" name="idnum" id="supportid" class="inp_support"/></div>
							</div>
							<div class="row-form clearfix">
								<div class="span3">Telp<sup class="redsup">*</sup></div>
								<div class="span4"><input type='text' name="phone" id="supportphone" class="inp_support"></div>
								<div class="span1">HP <sup class="redsup">*</sup></div>
								<div class="span4"><input type='text' name="hp" id="supporthp" class="inp_support"></div>
							</div>
							<div class="row-form clearfix">
								<div class="span3">Email <sup class="redsup">*</sup></div>
								<div class="span9"><input type="text" name="email" id="supportemail" class="inp_support"/></div>
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
							<div class="row-form clearfix">
								<div class="span3">Layanan</div>
								<div class="span9">
									<textarea  style="height: 160px;" type="textarea" class='myeditor inp_fb' name="services" id='services'>
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
								<div class="span3"><input type='text' value=0 class='autonum setup' id='setupfee' /></div>
								<div class="span3"><input type='text' value=0 class='autonum setup' id='setupppn' /></div>
								<div class="span3" class='autonum' id='setuptotal'></div>
							</div>
							<div class="row-form clearfix">
								<div class="span3"><b>Bulanan</b></div>
								<div class="span3"><input type='text' value=0 class='autonum monthly' id='monthlyfee' /></div>
								<div class="span3"><input type='text' value=0 class='autonum monthly' id='monthlyppn' /></div>
								<div class="span3" class='autonum' id='monthlytotal'></div>
							</div>
							<div class="row-form clearfix">
								<div class="span3"><b>Perangkat</b></div>
								<div class="span3"><input type='text' value=0 class='autonum device' id='devicefee' align='right' />
								</div>
								<div class="span3"><input type='text' value=0 class='autonum device' id='deviceppn' align='right' />
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
			</div>
		</div>
		<script src='/js/aquarius/subscriptionforms/edit.js'></script>
	</body>
</html>