<html>
    <head>
        <title>Checklists Todo Puji</title>
        <?php
        if(1==1){
            header("Content-Type: application/vnd.ms-excel; charset=utf-8");
            header("Content-Disposition: attachment;filename=todopuji.xls");
            header("Cache-Control: private",false);
        }
	?>
    </head>
    <body>
        <table style="width:100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Keterangan</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php $c = 0;?>
                <?php foreach($objs as $obj){?>
                <tr>
                    <?php $c++;?>
                    <td><?php echo $c;?></td>
                    <td><?php echo $obj['name']?></td>
                    <td><?php echo $obj['description']?></td>
                    <td><?php echo $obj['status']?></td>
                </tr>
                <?php }?>
            </tbody>
        </table>
    </body>
</html>