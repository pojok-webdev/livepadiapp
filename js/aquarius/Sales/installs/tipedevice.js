console.log("addTidedevice invokedsss")
$.fn.doAddRow = function(options) {
    settings = $.extend({
        obj:{}
    },options)
    that = $(this) 
    row = '<tr>'
    row+= '<th width="10%">'+settings.obj.name+'</th>'
    row+= '<th width="85%">'+settings.obj.tipe+'</th>'
    row+= '<th width="5%">'+settings.obj.status+'</th>'
    row+= '</tr>';
    that.append(row)
}
createRandom = _=>{
    return Math.floor((Math.random() * 100) + 1);
}
createRandomString = length => {
        var result           = '';
        var characters       = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
        var charactersLength = characters.length;
        for ( var i = 0; i < length; i++ ) {
          result += characters.charAt(Math.floor(Math.random() * charactersLength));
       }
       return result;
    
//    console.log(makeid(5));
}
createRow = (obj,success,fail) => {
    $.ajax({
        url:'/install_requests/saveinstalldeviceinfo',
        data:{
            install_request_id:obj.install_request_id,
            'name':obj.name,
            tipe:obj.tipe,status:obj.status,token:token
        },
        type:'post',
        dataType:'json'
    })
    .done(res=>{
        success(res)
        console.log('Res',res)
    })
    .fail(err=>{
        fail(err)
        console.log('Err',err)
    })
}
$('#btnAddTipeDevice').click(function(){
    $('#daddtipedevice').dialog({
        buttons:{
            Simpan:function(){
                createRow({
                    install_request_id:1,
                    name:$('#namaPerangkat').val(),
                    tipe:$('#tipePerangkat').val(),
                    status:$('#statusperangkat').val()
                },res=>{
                    console.log('Success createRow',res)
                    $('#tTipeDevice tbody').doAddRow({
                        obj:{
                            'name':$('#namaPerangkat').val(),
                            'tipe':$('#tipePerangkat').val(),
                            'status':$('#statusperangkat :selected').text()
                        }
                    })
                    $(this).dialog('close')
                },err=>{
                        $(this).dialog('close')
                        console.log('Error createRow',err)
                })
            },
            Tutup:function(){
                console.log('tutup')
                $(this).dialog('close')
            }
        }
    })
})