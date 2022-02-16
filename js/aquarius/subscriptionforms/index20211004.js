/*
 * WRITTEN by PUJI W PRAYITNO
 * 2015
 * mailto:puji@padi.net.id
 * */
console.log("index jees invoked")
$('#tSubscription').dataTable({
	"aoColumnDefs":[
		{"bVisible":false,"aTargets":[5]},
	]
});
$('#tSubscription').on('click','.btn_edit',function(){
	var id = $(this).stairUp({level:4}).attr('trid');
	window.location = '/subscribeforms/edit/'+id;
});
$('#tSubscription').on('click','.btn_print',function(){
	var id = $(this).stairUp({level:4}).attr('trid');
	window.location = '/subscribeforms/showreport/'+id;
});
$('#tSubscription').on('click','.btn_merge',function(){
	console.log("Merge FB invoked")
	tr = $(this).stairUp({level:4});
	var name = $(this).stairUp({level:4}).find('.name').text();
	var id = $(this).stairUp({level:4}).attr('trid');
	$('#clienttomerge').html('(' + id+') - '+name)
	$('#dMergeFB').dialog({
		buttons:{
			'Simpan':function(){
				console.log('save merge FB invoked',$('#clients :selected').val(),' ',$('#clients').val())
				$.ajax({
					url:'/subscribeforms/mergefb/'+id+'/'+$('#clients :selected').val(),
					type:'post',
					dataType:'json'
				})
				.done(res=>{
					console.log('Success mergeFB',res)
					tr.find('.fbcount').html('0')
				})
				.fail(err=>{
					console.log('Error mergeFB',err)
				})
				$(this).dialog('close')
			},
			'Tutup':function(){
				$(this).dialog('close')
			}
		},
		width:'800px'
	});
})
