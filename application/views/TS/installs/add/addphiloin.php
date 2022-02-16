<div class="dialog" id="daddphiloin" style="display: none;" title="Layanan Philoin">
    <div class="block">
        <span>Nama:</span>
        <p><?php echo form_dropdown('philoins',$philoins,0,'id=selectedphiloin');?></p>
    </div>
</div>
<script>
$(document).ready(function(){
    console.log('Philoin Dialog invoked')
    $('#btnAddPhiloin').click(function(){
        $('#daddphiloin').dialog({
            buttons:{
                Simpan:function(){
                    $.ajax({
                            url:'/install_requests/addservice',
                            data:{
                                client_id:client_id,
                                servicetype:4,
                                product_id:$('#selectedphiloin').val()
                            },
                            type:'post',
                            dataType:'json'
                        })
                        .done(res=>{
                            console.log('Add Philoin',res)
                            str = '<tr>'
                            str+= '<td class="id">'+$('#selectedphiloin').val()+'</td>'
                            str+= '<td>'+$('#selectedphiloin :selected').text()+'</td>'
                            str+= '<td><a class="removeservice icon-trash"></a></td>'
                            str+= '</tr>'
                            $('#tPhiloin tbody').append(str)
                        })
                        .fail(err=>{
                            console.log('Err Add Philoin',err)
                        })
                    $(this).dialog('close');
                },
                Tutup:function(){
                    $(this).dialog('close');
                }
            }
        })
    })
    $('#tPhiloin').on('click','.removeservice',function(){
            $.ajax({
                url:'/install_requests/removeservice',
                data:{
                    client_id:client_id,
                    service_id:$(this).stairUp({level:2}).find('.id').text(),
                    servicetype:'4'
                },type:'post',dataType:'json'
            })
            .done(res=>{
                $(this).stairUp({level:2}).hide()
                console.log('Success remove',res)
            })
            .fail(err=>{
                console.log('Err remove',err)
            })
        })
    populatephiloin = _=>{
            $.ajax({
                url:'/install_requests/getservicesbytype',
                data:{
                    client_id:client_id,
                    servicetype:'4'
                },
                type:'post',
                dataType:'json'
            })
            .done(res=>{
                console.log('res',res)
                res.forEach(row=>{
                    str = '<tr>'
                    str+= '<td class="id">'+row.id+'</td>'
                    str+= '<td>'+row.name+'</td>'
                    str+= '<td><a class="removeservice icon-trash"></a></td>'
                    str+= '</tr>'
                    $('#tPhiloin tbody').append(str)
                })
            })
            .fail(err=>{
                console.log('Err',err)
            })
        }
        populatephiloin()
})
</script>