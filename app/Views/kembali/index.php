<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container">
    <div class="row">
        <div class="col my-3">
            <h2>Daftar kembali</h2>
            <hr>
            <a href="/kembali/excel" class="btn btn-success mb-3 mr-3 "><i class="bi bi-file-earmark-excel-fill mr-1"></i>Excel</a>
            <a href="/kembali/print" target="_blank" class="btn btn-danger mb-3 mr-3  "><i class="bi bi-file-earmark-pdf-fill mr-1"></i>Print</a>
            <!-- <a href="#" class="btn btn-warning mb-3 mr-3 "><i class="bi bi-upload mr-1"></i>Import</a> -->
            <button type="button" class="btn btn-warning mb-3 mr-3 " data-toggle="modal" data-target="#modalImport">
                <i class="bi bi-upload mr-1"></i>Import
            </button>
            <div class="col-4 float-right">
                <form action="" method="POST">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Masukkan keyword pencarian..." Name="keyword">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="submit" Name="submit"><i class="bi bi-search"></i></button>
                        </div>
                    </div>
                </form>
            </div>


            <!-- menampilkan pesan telah berhasl menambahkan data -->
            <?php if (session()->getFlashdata('message')) { ?>
                <div class="alert alert-success" role="alert">
                    <?= session()->getFlashdata('message'); ?>
                </div>
            <?php } ?>

            <div class="table-responsive">
                <table id="table_id" class="table table-striped table-dark mydatatable" width="100%">
                    <thead>
                        <tr>
                            <th scope="col">No Pinjam </th>
                            <th scope="col">No Anggota</th>
                            <th scope="col">Nama</th>
                            <th scope="col">NIB</th>
                            <th scope="col">Judul Buku</th>
                            <th scope="col">Waktu Pinjam</th>
                            <th scope="col">Waktu Kembali</th>
                            <th scope="col">Denda</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        <?php foreach ($dataKembali as $kb) : ?>
                            <tr>
                                <th scope="row"><?= $no++; ?></th>
                                <td><?= $kb['no_pinjam']; ?></td>
                                <td><?= $kb['No_Anggota']; ?></td>
                                <td><?= $kb['nama']; ?></td>
                                <td><?= $kb['NIB']; ?></td>
                                <td><?= $kb['judul_buku']; ?></td>
                                <td><?= $kb['waktu_pinjam']; ?></td>
                                <td><?= $kb['waktu_kembali']; ?></td>
                                <td><?= $kb['denda']; ?></td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalImport">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Import Excel</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

        </div>
    </div>
</div>

<?= $this->endSection(); ?>