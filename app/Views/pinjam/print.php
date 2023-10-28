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
            Data Peminjaman SMA N 1 ULUJAMI
        </h2>
    </center>
    <table border="1" cellspacing="" cellpadding="4" width="100%">
        <thead>
            <tr>
                <th scope="col">No Pinjam </th>
                <th scope="col">No Anggota</th>
                <th scope="col">Nama</th>
                <th scope="col">NIB</th>
                <th scope="col">Judul Buku</th>
                <th scope="col">Waktu Pinjam</th>
                <th scope="col">Waktu Kembali</th>

            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            foreach ($pinjam as $pj) :
            ?>
                <tr>

                    <th scope="row"><?= $no++; ?></th>
                    <td><?= $pj['no_pinjam']; ?></td>
                    <td><?= $pj['No_Anggota']; ?></td>
                    <td><?= $pj['Nama']; ?></td>
                    <td><?= $pj['NIB']; ?></td>
                    <td><?= $pj['judul_buku']; ?></td>
                    <td><?= $pj['waktu_pinjam']; ?></td>
                    <td><?= $pj['waktu_kembali']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <script type="text/javascript">
        window.print();
    </script>

</body>

</html>