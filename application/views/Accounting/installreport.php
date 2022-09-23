<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Survey - Field Report</title>
<!-- bootstrap -->
<link rel='stylesheet' type='text/css' href='/css/aquarius/reports/padiReport.css' media="screen"/>
<script type='text/javascript' src='/js/jquery-1.8.2.min.js'></script>
<script type='text/javascript' src='/js/aquarius/links.js'></script>
<link href="/css/reports/bootstraps/bootstrap.min.css" rel="stylesheet" media="screen">
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
  <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->

<link href="/css/reports/bootstraps/custom.css" rel="stylesheet">
</head>

<body>
<div class="container" id="fromHTMLtestdiv">
	<h3>Kebutuhan Instalasi</h3>
    <h4><a href="/accounting/installs" class="btn btn-primary">Kembali</a></h4>
	<div class="row padbot10">
		<div class="table-responsive">
			<table class="table table-striped requirement">
				<thead>
					<tr class="orgtext">
						<th width="10%">No.</th>
						<th width="60%">Perangkat</th>
						<th width="30%">Keterangan</th>
					</tr>
				</thead>
				<tbody>
					<?php $c=0;?>
					<?php foreach($materials as $material){?>
					<?php $c+=1;?>
					<tr>
						<td><?php echo $c;?></td>
						<td><?php echo $material->tipe . ' ' . $material->name;?></td>
						<td><?php echo $material->description;?></td>						
					</tr>
					<?php }?>
					<?php foreach($antennas as $device){?>
					<?php $c+=1;?>
					<tr>
						<td><?php echo $c;?></td>
						<td><?php echo $device->name;?></td>
						<td><?php echo $device->amount;?></td>						
					</tr>
					<?php }?>
					<?php foreach($routers as $device){?>
					<?php $c+=1;?>
					<tr>
						<td><?php echo $c;?></td>
						<td><?php echo $device->tipe;?></td>
						<td><?php echo $device->macboard;?></td>						
					</tr>
					<?php }?>
					<?php foreach($switches as $device){?>
					<?php $c+=1;?>
					<tr>
						<td><?php echo $c;?></td>
						<td><?php echo $device->name;?></td>
						<td><?php echo $device->port;?></td>						
					</tr>
					<?php }?>
					<?php foreach($wirelessradios as $device){?>
					<?php $c+=1;?>
					<tr>
						<td><?php echo $c;?></td>
						<td><?php echo $device->tipe;?></td>
						<td><?php echo $device->macboard;?></td>						
					</tr>
					<?php }?>
					<?php foreach($pccards as $device){?>
					<?php $c+=1;?>
					<tr>
						<td><?php echo $c;?></td>
						<td><?php echo $device->name;?></td>
						<td><?php echo $device->description;?></td>						
					</tr>
					<?php }?>
					<?php foreach($apwifis as $device){?>
					<?php $c+=1;?>
					<tr>
						<td><?php echo $c;?></td>
						<td><?php echo $device->tipe;?></td>
						<td><?php echo $device->macboard;?></td>						
					</tr>
					<?php }?>
				</tbody>
			</table>
		</div><!-- table-responsive end -->		
	</div>
</div><!-- container end -->
</body>
</html>
