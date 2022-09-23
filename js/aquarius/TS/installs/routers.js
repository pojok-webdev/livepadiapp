(function($){
	adaptRouter = obj=>{
		switch(obj.routerval){
				case "1":
				$("#router_pelanggan").hide();
				$("#router_padinet").show();
				$("#tipe_router_pelanggan").removeClass("inp_router");
				$("#tipe_router").addClass("inp_router");
			break;
			case "2":
				$("#router_pelanggan").hide();
				$("#router_padinet").show();
				$("#tipe_router_pelanggan").removeClass("inp_router");
				$("#tipe_router").addClass("inp_router");
			break;
			case "3":
				$("#router_pelanggan").show();
				$("#router_padinet").hide();
				$("#tipe_router_pelanggan").addClass("inp_router");
				$("#tipe_router").removeClass("inp_router");
			break;
			case "4":
				$("#router_pelanggan").show();
				$("#router_padinet").hide();
				$("#tipe_router_pelanggan").addClass("inp_router");
				$("#tipe_router").removeClass("inp_router");
			break;
		}
	}
	$(".btn_addrouter").click(function(){
		$(".updaterouter").hide();
		$(".saverouter").show();
		$("#dAddRouter").modal("show");
	});
	adaptRouter({routerval:$("#milikpadinet").val()})
	$("#milikpadinet").change(function(){
		adaptRouter({routerval:$(this).val()})
	})
	$("#router").on("click",".edit_router",function(){
		var selected = $(this).stairUp({level:4}),
			id = selected.attr('myid');
		$("#router tbody tr").removeClass("selected");
		selected.addClass("selected");
		$(".saverouter").hide();
		$(".updaterouter").show();
		$(".updaterouter").attr("id",id);
		$.getJSON('/install_routers/getjsonrouter/'+id,function(data){
			//$("#pemilik_router").val(data['milikpadinet']);
			$("#milikpadinet").val(data['milikpadinet']);
			console.log("data retrieved",data);
			adaptRouter({routerval:$('#milikpadinet').val()})
			$.each($("#tipe_router option"),function(x,y){
				if(data['tipe']==$(this).text()){
					$(this).attr("selected","selected");
				}
			})
			$("#tipe_router_pelanggan").val(data['tipe']);
			$("#macboard_router").val(data['macboard']);
			$("#ip_public_router").val(data['ip_public']);
			$("#ip_private_router").val(data['ip_private']);
			$("#user_router").val(data['user']);
			$("#password_router").val(data['password']);
			$("#location_router").val(data['location']);
			$("#serialno_router").val(data['serialno']);
			$("#barcode_router").val(data['barcode']);
		});
		$("#dAddRouter").modal();
	});
	$("#router").on("click",".remove_router",function(){
		var selected = $(this).stairUp({level:4});
		$("#dConfirmation").removeConfirmation({
			removeUrl:thisdomain+"install_routers/remove",
			idElement:selected.attr("myid"),
			selectedElement:selected,
			totalElement:"total_router",
			tableElement:"router",
		});
	});
	$(".saverouter").click(function(){
		$(".inp_router").makekeyvalparam();
		$.ajax({
			url:"/install_routers/save",
			data:JSON.parse('{'+$(".inp_router").attr("keyval")+'}'),
			type:"post",
		}).done(function(data){
			$("#router").appendrouter(data);
			update_rowcount($("#total_router"),$("#router tbody tr"));
			console.log("Inserted Router",data)
		}).fail(function(){
			console.log("Tidak dapat menyimpan Router, silakan hubungi Developer");
		});
	});
	$(".updaterouter").click(function(){
		$(".inp_router").makekeyvalparam();
		var myid = $("#router tbody tr.selected").attr("myid");
		console.log("router id",myid)
		$.post('/install_routers/update/',
		{
			id:myid,tipe:$("#tipe_router :selected").text(),
			macboard:$("#macboard_router").val(),
			ip_public:$("#ip_public_router").val(),
			ip_private:$("#ip_private_router").val(),
			user:$("#user_router").val(),
			serialno:$("#serialno_router").val(),
			barcode:$("#barcode_router").val(),
			password:$("#password_router").val(),
			location:$("#location_router").val(),
			//milikpadinet:$('#pemilik_router').val()
			milikpadinet:$('#milikpadinet').val()
			}).done(function(data){
		}).fail(function(){
			alert("Tidak dapat mengupdate router, hubungi Developer");
		}).done(function(res){
			console.log('update result',res)
			var tiperouter;
			/*if($("#pemilik_router").val()==="0"){
				tiperouter = $("#tipe_router_pelanggan").val();
			}else{
				tiperouter = $("#tipe_router :selected").text();
			}*/
			switch($("#milikpadinet").val()){
				case "1":
					tiperouter = $("#tipe_router :selected").text();
					break
				case "2":
					tiperouter = $("#tipe_router :selected").text();
					break
				case "3":
					tiperouter = $("#tipe_router_pelanggan").val();
					break
				case "4":
					tiperouter = $("#tipe_router_pelanggan").val();
					break
				}
			$("#router tbody tr.selected").find("router_type").html(tiperouter);
			$("#router tbody tr.selected").find("info").html("tipe_router_pelanggan");
		});
	});
}(jQuery))
$.fn.appendrouter = function(data){
	var tr='<tr myid='+data+'>'
//	tipe = ($("#pemilik_router").val()=='1')?$('#tipe_router :selected').text():$("#tipe_router_pelanggan").val();
	switch($("#milikpadinet").val()){
		case "1":
			tipe=$('#tipe_router :selected').text()
			break;
		case "2":
			tipe=$('#tipe_router :selected').text()
			break;
		case "3":
			tipe=$("#tipe_router_pelanggan").val()
			break;
		case "4":
			tipe=$("#tipe_router_pelanggan").val()
			break;
		}//?$('#tipe_router :selected').text():$("#tipe_router_pelanggan").val();
	tr+='<td>'+tipe+'</td>';
	tr+='<td class="info">';
	tr+='<a>'+$("#macboard_router").val()+'</a> ';
	tr+='<span>'+$("#ip_public_router").val()+'</span> ';
	tr+='<span>'+$("#ip_private_router").val()+'</span>';
	tr+='</td>';
	tr+='<td>'+$("#location_router").val()+'</td><td><div class="btn-group">';
	tr+='<button data-toggle="dropdown" class="btn btn-small dropdown-toggle"  > Aksi <span class="caret"></span></button>';
	tr+='<ul class="dropdown-menu pull-right">';
	tr+='<li class="edit_router pointer"><a>Edit</a></li>';
	tr+='<li class="divider"></li>';
	tr+='<li class="remove_router pointer"><a>Hapus</a></li>';
	tr+='</ul>';
	tr+='</div></td></tr>';
	$(this).append(tr);

}
