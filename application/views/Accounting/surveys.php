<!DOCTYPE html>
<html lang="en">
<?php $this->load->view('v2/commons/head');?>
<link href="/asset/datatables/datatables.css" rel="stylesheet" />
<body>
    <div class="header">
        <a class="logo" href="/"><img src="/img/aquarius/logo.png" alt="PadiNET" title="PadiNET"/></a>
        <ul class="header_menu">
            <li class="list_icon"><a href="#">&nbsp;</a></li>
        </ul>    
    </div>
    <?php $this->load->view('Accounting/menu');?>
    <div class="content">
        <?php $this->load->view('Accounting/breadline');?>
        <div class="workplace">            
            <div class="row-fluid">
                <div class="span12">                    
                    <div class="head clearfix">
                        <div class="isw-grid"></div>
                        <h1>Surveys</h1>
                        <ul class="buttons">
                            <?php if(1==3){?>
                            <li><a href="#" class="isw-download"></a></li>    
                            <li><a href="#" class="isw-attachment"></a></li>
                            <li>
                                <a href="#" class="isw-settings"></a>
                                <ul class="dd-list">
                                    <li><a href="#"><span class="isw-plus"></span> New document</a></li>
                                    <li><a href="#"><span class="isw-edit"></span> Edit</a></li>
                                    <li><a href="#"><span class="isw-delete"></span> Delete</a></li>
                                </ul>
                            </li>
                            <?php }?>
                        </ul>
                    </div>
                    <div class="block-fluid table-sorting clearfix">
                        <table cellpadding="0" cellspacing="0" width="100%" class="table" id="tSurvey">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>NAMA</th>
                                    <th width="25%">ALAMAT</th>
                                    <th width="25%">AM</th>
                                    <th width="25%">TGL SURVEY</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="dr"><span></span></div>
        </div>
    </div>   
</body>
</html>
<script type='text/javascript' src='/asset/aqua/js/plugins/dataTables/jquery.dataTables.min.js'></script>
<script>
    $('#tSurvey').dataTable({
        bProcessing:true,
        sAjaxSource:'/accounting/getsurveys',
        sPaginationType:"full_numbers",
        aaSorting:[[0,"asc"]],
        "aoColumnDefs": [
            {
                aTargets: [5]  ,
                mData:null,
                "mRender": function ( data, type, full ) {
                    return '<a class="btn btn-primary" href="/accounting/surveyreport/'+full[0]+'">Detail</a>';
                }
            }
        ]
    })

</script>