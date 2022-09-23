<html>
    <head>
    <?php
        if(1==1){
            header("Content-Type: application/vnd.ms-excel; charset=utf-8");
            header("Content-Disposition: attachment;filename=requestsku.xls");
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
                <th>Address</th>
                <th>Layanan</th>
            </tr>
        </thead>
        <tbody>
        <?php
            $c = 0;
            foreach($clients as $obj){?>
            <?php $sites = $this->odoo->getservices($obj->nofb);?>
            <?php $c++;?>
                <tr>
                    <td><?php echo $c;?></td>
                    <td><?php echo strtoupper($obj->name);?></td>
                    <td>
                        <?php echo '<strong>'.ucfirst($obj->address).'</strong>';?>
                    </td>
                    <td></td>
                </tr>
                <?php foreach($sites['res'] as $site){?>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td><?php echo '- '.$site->category.' '.$site->srv;?></td>
                    </tr>
                <?php }?>
            <?php }
        ?>
        </tbody>
        </table>
    </body>
</html>
