<?php

header("Content-type: application/vnc-ms-excel");
header("Content-Disposition: attachment; filename=Data Anggota SMA N 1 ULUJAMI");

?>


<html>

<body>
    <center>
        Data Anggota SMA N 1 ULUJAMI
        </h2>
    </center>
    <table border="1">
        <thead>
            <tr>
                <th scope="col">No_Anggota</th>
                <th scope="col">Nama</th>
                <th scope="col">Kelas</th>
                <th scope="col">Alamat</th>
                <th scope="col">Status</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            foreach ($anggota as $ag) :
            ?>
                <tr>
                    <th scope="row" align="center"><?= $no++ ?></th>
                    <td><?= $ag['No_Anggota']; ?></td>
                    <td><?= $ag['Nama']; ?></td>
                    <td><?= $ag['Kelas']; ?></td>
                    <td><?= $ag['Alamat']; ?></td>

                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <script type="text/javascript">
        window.print();
    </script>

</body>

</html>