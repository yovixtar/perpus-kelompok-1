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
            Data Buku SMA N 1 ULUJAMI
        </h2>
    </center>
    <table border="1" cellspacing="" cellpadding="4" width="100%">
        <thead>
            <tr>
                <th scope="col">No </th>
                <th scope="col">NIB</th>
                <th scope="col">Jenis buku</th>
                <th scope="col">Judul Buku</th>
                <th scope="col">No Pengarang</th>
                <th scope="col">No Penerbit</th>
                <th scope="col">Tahun Terbit</th>
                <th scope="col">Edisi</th>
                <th scope="col">Stok </th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            foreach ($buku as $bk) :
            ?>
                <tr>
                    <th scope="row" align="center"><?= $no++ ?></th>
                    <td><?= $bk['NIB']; ?></td>
                    <td><?= $bk['jenis_buku']; ?></td>
                    <td><?= $bk['judul_buku']; ?></td>
                    <td><?= $bk['no_pengarang']; ?></td>
                    <td><?= $bk['no_penerbit']; ?></td>
                    <td><?= $bk['tahun_terbit'] ?></td>
                    <td><?= $bk['edisi']; ?></td>
                    <td><?= $bk['stok']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <script type="text/javascript">
        window.print();
    </script>

</body>

</html>