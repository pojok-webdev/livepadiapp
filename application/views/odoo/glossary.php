<html>
    <head>
        <title>Odoo Glossary</title>
    </head>
    <body>
        <table style="width:100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Keterangan</th>
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
                </tr>
                <?php }?>
            </tbody>
        </table>
    </body>
</html>