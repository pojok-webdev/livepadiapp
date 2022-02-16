<div class="dialog" id="daddPTP" style="display: none;" title="Layanan PTP">
    <div class="block">
        <span>Alamat:</span>
        <p><input type="text" id="inpPTPAddress"></p>
    </div>
</div>
<script>
$(document).ready(function(){
    $('#btnAddPTP').click(function(){
        $('#daddPTP').dialog({
            buttons:{
                Simpan:function(){
                    $.ajax({
                            url:'/survey_requests/addptp',
                            data:{
                                client_id:client_id,
                                ptpAddress:$('#inpPTPAddress').val()
                            },
                            type:'post',
                            dataType:'json'
                        })
                        .done(res=>{
                            console.log('Add PTP',res)
                            str = '<tr>'
                            str+= '<td class="id">'+$('#selectedPTP').val()+'</td>'
                            str+= '<td>'+$('#inpPTPAddress').text()+'</td>'
                            str+= '<td><a class="removeservice icon-trash"></a></td>'
                            str+= '</tr>'
                            $('#tPTP tbody').append(str)
                        })
                        .fail(err=>{
                            console.log('Err Add PTP',err)
                        })
                    $(this).dialog('close');
                },
                Tutup:function(){
                    $(this).dialog('close');
                }
            }
        })
    })
    $('#tPTP').on('click','.removeservice',function(){
            $.ajax({
                url:'/survey_requests/removeptp',
                data:{
                    client_id:client_id,
                    service_id:$(this).stairUp({level:2}).find('.id').text(),
                    servicetype:'2'
                },type:'post',dataType:'json'
            })
            .done(res=>{
                $(this).stairUp({level:2}).hide()
                console.log('Success remove PTP',res)
            })
            .fail(err=>{
                console.log('Err remove',err)
            })
        })
    populatePTP = _=>{
        $.ajax({
            url:'/survey_requests/getservicesbytype',
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
                $('#tPTP tbody').append(str)
            })
        })
        .fail(err=>{
            console.log('Err',err)
        })
    }
    populatePTP()
})
</script>