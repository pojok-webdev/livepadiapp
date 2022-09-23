<html>
    <head>
    <?php
        if(1==2){
            header("Content-Type: application/vnd.ms-excel; charset=utf-8");
            header("Content-Disposition: attachment;filename=pelanggan.xls");
            header("Cache-Control: private",false);
        }
	?>
    </head>
    <body>
    <table>
        <thead>
            <tr>
                <th rowspan=2>No</th>
                <th rowspan=2>Pelanggan</th>
                <th rowspan=2>Address</th>
                <th rowspan=2>OU<th>
                <th rowspan=2>CabangAsal<th>
                <th colspan=4 style="alignment:center">Site</th>
            </tr>
            <tr>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <td>ID</td><td>address</td><td>PIC</td><td>Phone</td>
            </tr>
        </thead>
        <tbody>
        <?php
            $c = 0;
            foreach($clients as $obj){?>
            <?php $sites = $this->odoo->getsites($obj->id);?>
            <?php $c++;?>
                <tr>
                    <td><?php echo $c;?></td>
                    <td><?php echo strtoupper($obj->name);?></td>
                    <td>
                        <?php echo '<strong>'.$obj->address.'</strong>';?>
                    </td>
                    <td>
                        <?php echo '<strong>'.$obj->ou.'</strong>';?>
                    </td>
                    <td>
                        <?php echo '<strong>'.$obj->brn.'</strong>';?>
                    </td>
                    <td></td><td></td><td></td><td></td>
                </tr>
                <?php foreach($sites['res'] as $site){?>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td><?php echo $site->id;?></td>
                        <td><?php echo $site->address;?></td>
                        <td><?php echo $site->pic_name;?></td>
                        <td><?php echo $site->pic_phone;?></td>
                    </tr>
                <?php }?>
            <?php }
        ?>
        </tbody>
        </table>
    </body>
</html>
