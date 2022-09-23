(function($){
		switch($("#ismanaged").val()){
			case "0":
				$(".switch_user").hide();
				$(".switch_password").hide();
				$("#switchuser").removeClass("inp_switch");
				$("#switchpassword").removeClass("inp_switch");
			break;
			case "1":
				$(".switch_user").show();
				$(".switch_password").show();
				$("#switchuser").addClass("inp_switch");
				$("#switchpassword").addClass("inp_switch");
			break;
			default:
				$(".switch_user").hide();
				$(".switch_password").hide();
				$("#switchuser").removeClass("inp_switch");
				$("#switchpassword").removeClass("inp_switch");
			break;
		}

	$(".btn_addswitch").click(function(){
		$(".updateswitch").hide();
		$(".saveswitch").show();
		$("#dSwitch").modal("show");
	});
	$(".edit_switch").click(function(){
		selected = $(this).stairUp({level:4});
		id = selected.attr('thisid');
		$("#switch tbody tr").removeClass("selected");
		selected.addClass("selected");
		$(".saveswitch").hide();
		$(".updateswitch").show();
		$(".updateswitch").attr("id",id);
		console.log('ID',id)
		$.ajax({
			url:'/install_switches/getjsonswitch/'+id,
			dataType:'json'
		})
		.done(res=>{
			console.log("RES",res)
			data = res.res[0]
			$("#switchname").setCombo({selected:data.name,comparator:'label'});
			$("#switchport").setCombo({selected:data.port});
			$("#ismanaged").setCombo({selected:data.ismanaged});
			$("#switchownership").setCombo({selected:data.ownership})
			$("#dSwitch").modal();
		})
		.fail(err=>{
			console.log("Err",err)
		})
	});
	$("#tSwitch").on("click",".remove_switch",function(){
		var selected = $(this).stairUp({level:3});
		$("#dConfirmation").removeConfirmation({
			removeUrl:thisdomain+"install_switches/remove",
			idElement:selected.attr("thisid"),
			selectedElement:selected,
			totalElement:"total_switch",
			tableElement:"tSwitch",
		});
	});
	$(".saveswitch").click(function(){
		$(".inp_switch").makekeyvalparam();
		$.ajax({
			url:"/install_switches/save",
			data:JSON.parse('{'+$(".inp_switch").attr("keyval")+'}'),
			type:"post"
		}).done(function(data){
			var ismanaged="";
			var userpassword="";
			if($("#ismanaged").val()==="1"){
				ismanaged = "Ya";
				userpassword = "<span>User/Password : "+$("#switchuser").val()+"/"+$("#switchpassword").val()+"</span>";
			}else{
				ismanaged = "Tidak";
				userpassword = "";
			}
			$("#tSwitch tbody").append('<tr thisid='+data+'><td class="edit_switch">'+$("#switchname :selected").text()+'</td><td class="info"><a>Jml Port:'+$("#switchport").val()+'</a><span>Managed : '+ismanaged+'</span>'+userpassword+'</td><td><a><span class="icon-trash pointer remove_switch" ></span></a></td></tr>');
			update_rowcount($("#total_switch"),$("#tSwitch tbody tr"));
			console.log("Result : "+data);
		}).fail(function(){alert('tidak bisa menyimpan switch, hubungi Developer');});
	});
	$(".updateswitch").click(function(){
		$(".inp_switch").makekeyvalparam();
		console.log($(".inp_switch").attr("keyval"));
		var myid = $("#tSwitch tbody tr.selected").attr("thisid");
		console.log("myid : "+myid);
		$.ajax({
			url:'/install_switches/update',
			type:'post',
			dataType:'json',
			data:{
				id:myid,
				name:$("#switchname").val(),
				ismanaged:$("#ismanaged").val(),
				port:$("#switchport").val(),
				user:$("#switchuser").val(),
				password:$("#switchpassword").val(),
				ownership:$("#switchownership").val()
			}
		})
		.done(res=>{
			console.log('Update switch success',res)
		})
		.fail(err=>{
			console.log('Update switch failed',err)
		})
		/*$.post(thisdomain+'install_switches/update/',{id:myid,tipe:$("#tipe_switch :selected").text(),macboard:$("#macboard_switch").val(),ip_public:$("#ip_public_switch").val(),ip_private:$("#ip_private_switch").val(),user:$("#user_switch").val(),password:$("#password_switch").val(),location:$("#location_switch").val()}).done(function(data){
		}).fail(function(){
			alert("Tidak dapat mengupdate switch, hubungi Developer");
		}).done(function(){
			var tipeswitch;
			if($("#pemilik_switch").val()==="0"){
				tipeswitch = $("#tipe_switch_pelanggan").val();
			}else{
				tipeswitch = $("#tipe_switch :selected").text();
			}
			$("#switch tbody tr.selected").find("switch_type").html(tipeswitch);
			$("#switch tbody tr.selected").find("info").html("tipe_switch_pelanggan");
		});*/
	});
	$("#ismanaged").change(function(){
		switch($(this).val()){
			case "0":
				$(".switch_user").hide();
				$(".switch_password").hide();
				$("#switchuser").removeClass("inp_switch");
				$("#switchpassword").removeClass("inp_switch");
			break;
			case "1":
				$(".switch_user").show();
				$(".switch_password").show();
				$("#switchuser").addClass("inp_switch");
				$("#switchpassword").addClass("inp_switch");
			break;
			default:
				$(".switch_user").hide();
				$(".switch_password").hide();
				$("#switchuser").removeClass("inp_switch");
				$("#switchpassword").removeClass("inp_switch");
			break;
		}
	});
}(jQuery))
