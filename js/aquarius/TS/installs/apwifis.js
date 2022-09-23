(function($){
	$(".btn_addapwifi").click(function(){
		$('.updatewifi').hide();
		$(".savewifi").show();
		$("#dAddAPWifi").modal("show");
	});
	$("#ap_wifi").on("click",".remove_apwifi",function(){
		var selected = $(this).stairUp({level:4});
		$("#dConfirmation").removeConfirmation({
			removeUrl:thisdomain+"install_ap_wifis/remove",
			idElement:selected.attr("thisid"),
			selectedElement:selected,
			totalElement:"total_wifi",
			tableElement:"ap_wifi",
		});
	});	
	$("#savewifi").click(function(){
		$.post('/adm/wifiadd',{
				install_site_id:$("#workplace").attr("install_site_id"),
				tipe:$("#tipe_apwifi :selected").text(),
				macboard:$("#macboard_apwifi").val(),
				ip_address:$("#ip_address_apwifi").val(),
				essid:$("#essid_apwifi").val(),
				security_key:$("#security_key_apwifi").val(),
				user:$("#user_apwifi").val(),
				password:$("#password_apwifi").val(),
				location:$("#location_apwifi").val(),
				owner:$("#owner_apwifi").val(),
				user_name:$("#createuser").val(),
				createuser:$("#createuser").val(),
				ownership:$('#ownership_apwifi').val()
			}).done(function(data){
			$("#ap_wifi").appendwifi(data);
			}).fail(function(){
				alert("Tidak dapat menyimpan AP WIFI, hubungi Developer");
				});
	});
	$("#ap_wifi").on("click",".edit_apwifi",function(){
		$(".savewifi").hide();
		$(".updatewifi").show();
		var selected = $(this).stairUp({level:4});
		selected.addClass('selected');
		$(".updatewifi").attr("id",selected.attr('thisid'));
		/*$.getJSON('/install_ap_wifis/getjsonapwifi/'+selected.attr('thisid'),function(data){
			$("#tipe_apwifi").val(data['tipe']);
			$("#macboard_apwifi").val(data['macboard']);
			$("#ip_address_apwifi").val(data['ip_address']);
			$("#essid_apwifi").val(data['essid']);
			$("#security_key_apwifi").val(data['security_key']);
			$("#owner_apwifi").val(data['owner']);
			$("#user_apwifi").val(data['user']);
			$("#password_apwifi").val(data['password']);
			$("#location_apwifi").val(data['location']);
		});*/
		$.ajax({
			url:'/install_ap_wifis/getjson/'+selected.attr('thisid'),
			dataType:'json'
		})
		.done(data=>{
			d = data.res[0]
			console.log('Data retrieved',d)
			$("#tipe_apwifi").val(d.tipe);
			$("#macboard_apwifi").val(d.macboard);
			$("#ip_address_apwifi").val(d.ip_address);
			$("#essid_apwifi").val(d.essid);
			$("#security_key_apwifi").val(d.security_key);
			$("#owner_apwifi").val(d.owner);
			$("#user_apwifi").val(d.user);
			$("#password_apwifi").val(d.password);
			$("#location_apwifi").val(d.location);
			//$("#ownership_apwifi").val(d.ownership)
			$("#ownership_apwifi").setCombo({selected:d.ownership})
		})
		.fail(err=>{
			console.log("Errror getjson",err)
		})
		$("#dAddAPWifi").modal();
	});
	$(".updatewifi").click(function(){
		thisid = $(this).attr('id');
		$.post('/install_ap_wifis/update',{id:thisid,install_site_id:$("#workplace").attr("install_site_id"),tipe:$("#tipe_apwifi :selected").text(),macboard:$("#macboard_apwifi").val(),ip_address:$("#ip_address_apwifi").val(),essid:$("#essid_apwifi").val(),security_key:$("#security_key_apwifi").val(),user:$("#user_apwifi").val(),password:$("#password_apwifi").val(),location:$("#location_apwifi").val(),owner:$("#owner_apwifi").val(),user_name:$("#workplace").attr("user_name"),ownership:$('#ownership_apwifi').val()})
		.done(function(data){
			console.log("Update data",data)
			$("#ap_wifi tbody tr.selected").find('.apwifi_tipe').html('<a>'+$("#tipe_apwifi :selected").text()+'</a><span>'+$("#ip_address_apwifi").val()+'</span><span>'+$("#essid_apwifi").val()+'</span>');
			$("#ap_wifi tbody tr.selected").find('.info').html($("#macboard_apwifi").val());
			$("#ap_wifi tbody tr.selected").find('.apwifi_location').html($("#location_apwifi").val());
		}).fail(function(){
			alert('Tidak dapat mengupdate AP Wifi, silakan hubungi Developer');
		});
	});
}(jQuery))
$.fn.appendwifi = function(data){
	var tr = '';
		tr+= '<tr thisid='+data+'>';
		tr+= '<td>'+$("#tipe_apwifi :selected").text()+'</td>';
		tr+= '<td class="info"><a>'+$("#macboard_apwifi").val()+'</a> ';
		tr+= '<span>'+$("#ip_address_apwifi").val()+'</span> ';
		tr+= '<span>'+$("#essid_apwifi").val()+'</span>';
		tr+= '</td>';
		tr+= '<td>'+$("#location_apwifi").val()+'</td>';
		tr+= '<td>										<div class="btn-group">';
		tr+= '<button data-toggle="dropdown" class="btn btn-small dropdown-toggle"  > Aksi <span class="caret"></span></button>';
		tr+= '<ul class="dropdown-menu pull-right">';
		tr+= '<li class="edit_apwifi pointer"><a>Edit</a></li>';
		tr+= '<li class="divider"></li>';
		tr+= '<li class="remove_apwifi pointer"><a>Hapus</a></li>';
		tr+= '</ul>';
		tr+= '</div>';
		tr+= '</td>';
		tr+= '</tr>';
	$(this).append(tr);
	update_rowcount($("#total_wifi"),$("#ap_wifi tbody tr"));
}
