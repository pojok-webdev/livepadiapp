<html>
	<head>
		<!--<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">-->
		<link rel="stylesheet" href="/asset/report/bootstrap-3.3.6.min.css">
		<link href="/css/aquarius/stylesheets.css" rel="stylesheet" type="text/css" />
		<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>-->
		<script src="/asset/report/jquery-1.12.0.min.js"></script>
		<!--<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>		-->
		<script src="/asset/report/bootstrap-3.3.6.min.js"></script>
		<script type="text/javascript" src="/js/padilibs/padi.url.js"></script>
		<script type='text/javascript' src='/js/jquery-1.8.2.min.js'></script>
	    <script type='text/javascript' src='/js/jquery-ui-1.10.4.custom.min.js'></script>
		<script type='text/javascript' src='/js/aquarius/plugins/charts/excanvas.min.js'></script>    
		<script type='text/javascript' src='/js/aquarius/plugins/charts/jquery.flot.js'></script>    
		<script type='text/javascript' src='/js/aquarius/plugins/charts/jquery.flot.stack.js'></script>    
		<script type='text/javascript' src='/js/aquarius/plugins/charts/jquery.flot.pie.js'></script>
		<script type='text/javascript' src='/js/aquarius/plugins/charts/jquery.flot.resize.js'></script>

		<title>Laporan Shift TS <?php echo $date;?> </title>
	</head>
	<body>
		<div class="container">
		<div class="jumbotron">
		<h3>Laporan Bulanan Komplain Per Pelanggan , <?php echo $month;?> (<?php echo $total;?>)</h3>
		<h5>
		<input type="text" class="monthdatepicker" id="reportdate1" value ="<?php echo date("m/Y");?>">
				<?php
				foreach($arrbranch as $br){
					$ischecked = false;
					$checked = "";
					for($c=0;$c<strlen($userbranches);$c++){
						if(substr($this->uri->segment(5),$c,1)===$br){
							$ischecked = true;
						}
					}
					if($ischecked){
						$checked = "checked='checked'";
					}
					echo '<label class="checkbox-inline suspect-branches"><input type="checkbox" value="'.$br.'" '. $checked .' >';
					echo getbranch($br) . " ";
					echo '</label>';
				}	
				?>
				<button class="btn btn-success" id="btnfilter">Filter</button>			
			<a href="<?php echo base_url()?>rpt" class="btn btn-success">Home</a>
			<a href="/rpt/categorycomplaingraphicperiodic/<?php echo $this->uri->segment(3);?>/<?php echo $this->uri->segment(4);?>/<?php echo $this->uri->segment(5);?>/<?php echo $this->uri->segment(6);?>/<?php echo $this->uri->segment(7);?>/<?php echo $this->uri->segment(8);?>/<?php echo $this->uri->segment(9);?>" class="btn btn-success">Grafik</a>
		</h5>
		</div>
		<div class="row">
			<table id="rpt" class="table">
				<tbody>
					<?php $c=0;?>
					<?php foreach($objs as $ticket){?>
						<?php $c++;?>
                        <tr trid="<?php echo $ticket->clientname;?>">
                            <th><?php echo $c;?>.</th>
                            <td>
                            <span class="causedetail"><?php echo $ticket->clientname;?></span>
                            </td>
                            <td>
                                :
                            </td>
                            <td>
                            <span class="causedetail"><?php echo $ticket->cnt;?></span>
                            </td>
                        </tr>
					<?php }?>
				</tbody>
			</table>
		</div>
		</div>
		<script type="text/javascript">
			(function($){
				$(".survey").mouseover(function(){
					var dt = $(this).attr("dt");
					$(".surveydetail."+dt).css("color","red");
					console.log($(this).attr("dt"));
				});
				$(".survey").mouseout(function(){
					var dt = $(this).attr("dt");
					$(".surveydetail."+dt).css("color","black");
					console.log($(this).attr("dt"));
				});
				$(".installation").mouseover(function(){
					var dt = $(this).attr("dt");
					$(".installdetail."+dt).css("color","red");
					console.log($(this).attr("dt"));
				});
				$(".installation").mouseout(function(){
					var dt = $(this).attr("dt");
					$(".installdetail."+dt).css("color","black");
					console.log($(this).attr("dt"));
				});
				$(".troubleshoot").mouseover(function(){
					var dt = $(this).attr("dt");
					$(".troubleshootdetail."+dt).css("color","red");
					console.log($(this).attr("dt"));
				});
				$(".troubleshoot").mouseout(function(){
					var dt = $(this).attr("dt");
					$(".troubleshootdetail."+dt).css("color","black");
					console.log($(this).attr("dt"));
				});
				$("#btnfilter").click(function(){
					branch ='';
					$.each($(".suspect-branches :checked"),function(){
						branch+=$(this).val();
					})					
					if($("#reportdate1").val().trim()!==""){
						var dat1 = $("#reportdate1").val(),
							sp1 = dat1.split("/"),
							mn1 = sp1[0],yr1 = sp1[1];
						window.location.href = "/rpt/monthlycomplaint/"+mn1+"/"+yr1+"/"+branch;
					}
				})
				$(".monthdatepicker").datepicker({dateFormat:'dd/m/yy'});
			}(jQuery))
		</script>
	</body>
</html>
