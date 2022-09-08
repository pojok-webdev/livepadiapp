<html>
    <head>
    <?php
        if(1==1){
            header("Content-Type: application/vnd.ms-excel; charset=utf-8");
            header("Content-Disposition: attachment;filename=FB.xls");
            header("Cache-Control: private",false);
        }
	?>
    </head>
    <body>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Pelanggan</th>
                <th>Kd FB</th>
                <th>Layanan</th>
            </tr>
        </thead>
        <tbody>
        <?php
            $c = 0;
            foreach($objs as $obj){?>
            <?php $services = $this->odoo->getservices($obj->nofb);?>
            <?php $c++;?>
                <tr>
                    <td><?php echo $c;?></td>
                    <td><?php echo strtoupper($obj->name);?></td>
                    <td><?php echo $obj->nofb;?></td>
                    <td>
                        <?php echo ($services['cnt']==0)?'':'<strong>Layanan ('.$services['cnt'].'):</strong>';?>
                    </td>
                </tr>
                <?php foreach($services['res'] as $srv){?>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td><?php echo '- '.$srv->category .' '.$srv->toshow;?></td>
                    </tr>
                <?php }?>
            <?php }
        ?>
        </tbody>
        </table>
    </body>
</html>
