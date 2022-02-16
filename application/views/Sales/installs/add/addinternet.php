<div class="dialog" id="daddinternet" style="display: none;" title="Layanan Internet">
    <div class="block">
        <span>Nama:</span>
        <p><?php echo form_dropdown('internet',$internets,0,'id=selectedinternet');?></p>
    </div>
</div>
<script>
    $(document).ready(function(){
        $('#btnAddInternet').click(function(){
            console.log('test Add Internet')
            $('#daddinternet').dialog({
                buttons:{
                    Simpan:function(){
                        $.ajax({
                            url:'/install_requests/addservice',
                            data:{
                                client_id:client_id,
                                servicetype:1,
                                product_id:$('#selectedinternet').val()
                            },
                            type:'post',
                            dataType:'json'
                        })
                        .done(res=>{
                            console.log('Add Internet',res)
                            str = '<tr>'
                            str+= '<td class="id">'+$('#selectedinternet').val()+'</td>'
                            str+= '<td>'+$('#selectedinternet :selected').text()+'</td>'
                            str+= '<td><a class="removeinternet icon-trash"></a></td>'
                            str+= '</tr>'
                            $('#tInternet tbody').append(str)
                        })
                        .fail(err=>{
                            console.log('Err Add Internet',err)
                        })
                    $(this).dialog('close');
                },
                Tutup:function(){
                    $(this).dialog('close');
                }
                }
            })
        })
        $('#tInternet').on('click','.removeinternet',function(){
            $.ajax({
                url:'/install_requests/removeservice',
                data:{
                    client_id:client_id,
                    service_id:$(this).stairUp({level:2}).find('.id').text(),
                    servicetype:'1'
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
        populateinternet = _=>{
            $.ajax({
                url:'/install_requests/getservicesbytype',
                data:{
                    client_id:client_id,
                    servicetype:'1'
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
                    str+= '<td><a class="removeinternet icon-trash"></a></td>'
                    str+= '</tr>'
                    $('#tInternet tbody').append(str)
                })
            })
            .fail(err=>{
                console.log('Err',err)
            })
        }
        populateinternet()
    });
</script>