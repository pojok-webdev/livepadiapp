<div class="dialog" id="daddvas" style="display: none;" title="Layanan VAS">
    <div class="block">
        <span>Nama:</span>
        <p><?php echo form_dropdown('vas',$vases,0,'id=selectedvas');?></p>
    </div>
</div>
<script>
$(document).ready(function(){
    $('#btnAddVas').click(function(){
        $('#daddvas').dialog({
            buttons:{
                Simpan:function(){
                    $.ajax({
                            url:'/install_requests/addservice',
                            data:{
                                client_id:client_id,
                                servicetype:2,
                                product_id:$('#selectedvas').val()
                            },
                            type:'post',
                            dataType:'json'
                        })
                        .done(res=>{
                            console.log('Add VAS',res)
                            str = '<tr>'
                            str+= '<td class="id">'+$('#selectedvas').val()+'</td>'
                            str+= '<td>'+$('#selectedvas :selected').text()+'</td>'
                            str+= '<td><a class="removeservice icon-trash"></a></td>'
                            str+= '</tr>'
                            $('#tVAS tbody').append(str)
                        })
                        .fail(err=>{
                            console.log('Err Add VAS',err)
                        })
                    $(this).dialog('close');
                },
                Tutup:function(){
                    $(this).dialog('close');
                }
            }
        })
    })
    $('#tVAS').on('click','.removeservice',function(){
            $.ajax({
                url:'/install_requests/removeservice',
                data:{
                    client_id:client_id,
                    service_id:$(this).stairUp({level:2}).find('.id').text(),
                    servicetype:'2'
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
    populatevas = _=>{
        $.ajax({
            url:'/install_requests/getservicesbytype',
            data:{
                client_id:client_id,
                servicetype:'2'
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
                $('#tVAS tbody').append(str)
            })
        })
        .fail(err=>{
            console.log('Err',err)
        })
    }
    populatevas()
})
</script>