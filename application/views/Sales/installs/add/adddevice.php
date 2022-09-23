<div class="dialog" id="dadddevice" style="display: none;" title="Layanan Perangkat">
    <div class="block">
        <span>Nama:</span>
        <p><?php echo form_dropdown('devices',$devices,0,'id=selecteddevice');?></p>
    </div>
    <div class="block">
        <span>Status Perangkat:</span>
        <select id="statusperangkat">
            <option value="1">Sewa (milik PadiNET)</option>
            <option value="2">Dipinjamkan</option>
            <option value="3">Milik Pelanggan (Beli ke PadiNET)</option>
            <option value="4">Milik Pelanggan (Beli sendiri)</option>
        </select>
    </div>
</div>
<script>
$(document).ready(function(){
    $('#btnAddDevice').click(function(){
        $('#dadddevice').dialog({
            buttons:{
                Simpan:function(){
                    $.ajax({
                            url:'/install_requests/addservice',
                            data:{
                                client_id:client_id,
                                servicetype:3,
                                product_id:$('#selecteddevice').val(),
                                ownership:$('#statusperangkat').val()
                            },
                            type:'post',
                            dataType:'json'
                        })
                        .done(res=>{
                            console.log('Add Device',res)
                            str = '<tr>'
                            str+= '<td class="id">'+$('#selecteddevice').val()+'</td>'
                            str+= '<td>'+$('#selecteddevice :selected').text()+'</td>'
                            str+= '<td><a class="removeservice icon-trash"></a></td>'
                            str+= '</tr>'
                            $('#tDevice tbody').append(str)
                        })
                        .fail(err=>{
                            console.log('Err Add Device',err)
                        })
                    $(this).dialog('close');
                },
                Tutup:function(){
                    $(this).dialog('close');
                }
            }
        })
    })
    $('#tDevice').on('click','.removeservice',function(){
            $.ajax({
                url:'/install_requests/removeservice',
                data:{
                    client_id:client_id,
                    service_id:$(this).stairUp({level:2}).find('.id').text(),
                    servicetype:'3'
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
    populatedevice = _=>{
        $.ajax({
            url:'/install_requests/getservicesbytype',
            data:{
                client_id:client_id,
                servicetype:'3'
            },
            type:'post',
            dataType:'json'
        })
        .done(res=>{
            console.log('res',res)
            res.forEach(row=>{
                str = '<tr>'
                str+= '<td class="id">'+row.service_id+'</td>'
                str+= '<td>'+row.name+'</td>'
                str+= '<td>'+row.owner+'</td>'
                str+= '<td><a class="removeservice icon-trash"></a></td>'
                str+= '</tr>'
                $('#tDevice tbody').append(str)
            })
        })
        .fail(err=>{
            console.log('Err',err)
        })
    }
    populatedevice()
})
</script>