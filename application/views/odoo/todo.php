<html>
    <head></head>
    <body>
        <table>
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