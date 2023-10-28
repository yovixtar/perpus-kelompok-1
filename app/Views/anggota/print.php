<html>

<head>
    <style>
        body {
            font-family: arial;
        }

        table {
            border-collapse: collapse;
        }
    </style>
</head>

<body>
    <center>
        <h2 style="margin-top:50px;">
            Data Anggota SMA N 1 ULUJAMI
        </h2>
    </center>
    <table border="1" cellspacing="" cellpadding="4" width="100%">
        <thead>
            <tr>
                <th scope="col">No </th>
                <th scope="col">No_Anggota</th>
                <th scope="col">Nama</th>
                <th scope="col">Kelas</th>
                <th scope="col">Alamat</th>


            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            foreach ($anggota as $ag) :
            ?>
                <tr>
                    <th scope="row"><?= $no++; ?></th>
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