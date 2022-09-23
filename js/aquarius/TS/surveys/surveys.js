$(document).ready(function(){
console.log("TS Survey");
	var dtSurvey = $("#tSurveys").dataTable({
		"aLengthMenu": [[5, 10, 20, -1], [5, 10, 20, "All"]],
		"iDisplayLength": 5,
		"aoColumns": [
			{ "sWidth": "95px", "sClass": "updatable" ,"fieldName":"kdticket"},
			null,
			null,
			{ "sWidth": "95px", "sClass": "updatable" ,"fieldName":"ticketend"},
			{ "sWidth": "95px", "sClass": "updatable" ,"fieldName":"status"},
			{ "sWidth": "95px", "sClass": "updatable" ,"fieldName":"duration"},
			null,null,
			null,null
		],
		"aaSorting":[[2,"desc"]]
	});
	var nNodes = dtSurvey.fnGetNodes();
	$(this).fieldUpdater({
		url:"/surveys/feedData",
		cellClass:'updatable',
		fieldName:'fieldName',
		idAttr:'myid',
		enabled:true
	});
	setInterval(function(){
		var maxid = dtSurvey.getDataTableMaxAttr({idAttr:"myid"});
		$.ajax({
			url:'/surveys/getRecordOver/'+maxid,
			type:"get",
			dataType:"json"
		}).done(function(data){
			$.each(data,function(key,val){
				$.each(val,function(a,b){
					$.each(b,function(x,y){
						console.log(x+' and '+y+' or '+b[x] );
					});
				//	newRow = dtSurvey.fnAddData([b["name"],b["createuser"],b["create_date"],b["address"],'','',b["surveydirection"],'',b['surveyresult'],'<button class="btn btn_edit" type="button">Edit</button>']);

					newid = 1*maxid+1
					console.log('newid',newid)
					newRow = dtSurvey.fnAddData([b["name"],b["createuser"],b["create_date"],b["address"],'','',b["surveydirection"],'',b['surveyresult'],'<div class="btn-group"><button data-toggle="dropdown" class="btn dropdown-toggle">Action <span class="caret"></span></button><ul class="dropdown-menu pull-right"><li class="btn_edit pointer" ><a href="/surveys/edit/'+newid+'">Edit</a></li><li class="divider"></li><li class="btn_reportx pointer"><a href="/surveys/showreport/'+newid+'">Report</a></li></ul></div>']);




					var row = dtSurvey.fnGetNodes(newRow);
					$(row).attr('myid', maxid+1);
					var nTr = dtSurvey.fnSettings().aoData[newRow[0]].nTr;
					var nTds = $('td', nTr);
					nTds.eq(5).addClass('updatable');
					nTds.eq(5).attr('fieldName','duration');
					/*$(".updatable").live("DOMNodeInserted",function(){
						var row = tSurveys.fnGetNodes(newRow);
						$(row).attr('thisid', maxid+1);
					})*/
				});
			});
		}).fail(function(){
			console.log("Tidak dapat memeriksa Record baru, silakan hubungi Developer");
		});
	},2000);
	$('#permintaansurvey').click(function(){
		window.location.href = '/preclients/lookup';
	});
	$(nNodes).find(".tohuman").sql2idformat();
	$(nNodes).find(".tohumandate").formatiddate();
	$(nNodes).find(".tohumanhourminute").formatidtime();
	$(".header").click(function(){
		$(".menu").toggleClass("pmenu");
		$(".content").toggleClass("pcontent");
	});
	$("#tSurveys").on("click","tbody tr .btn_edit",function(){
		//window.location.href = thisdomain+'surveys/edit/'+$(this).attr('survey_id');
		window.location.href = '/surveys/edit/'+$(this).stairUp({level:4}).attr('myid');
	});
	$("#tSurveys").on("click","tbody tr .btn_report",function(){
		window.location.href = "/surveys/showreport/"+$(this).stairUp({level:4}).attr("myid");
		//window.open('http://database.padinet.com:4000/survey/'+$(this).stairUp({level: 4}).attr("myid"));
	});
});
