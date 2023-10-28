<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container">
    <div class="row">
        <div class="col my-3">
            <h2>Daftar Anggota</h2>
            <hr>
            <a href="/anggota/tambah" class="btn btn-primary mb-3 mr-3 "><i class="bi bi-plus mr-1"></i>Tambah Anggota</a>
            <a href="/anggota/excel" class="btn btn-success mb-3 mr-3 "><i class="bi bi-file-earmark-excel-fill mr-1"></i>Excel</a>

            <!-- <a href="#" class="btn btn-warning mb-3 mr-3 shadow"><i class="bi bi-upload mr-1"></i>Import</a> -->
            <button type="button" class="btn btn-warning mb-3 mr-3 " data-toggle="modal" data-target="#modalImport">
                <i class="bi bi-upload mr-1"></i>Import
            </button>
            <div class="col-4 float-right">
                <form action="" method="POST">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Masukkan keyword pencarian..." Name="keyword">
                        <div class="input-group-append">
                            <button class="btn btn-secondary" type="submit" Name="submit"><i class="bi bi-search"></i></button>
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
                            <th scope="col">No </th>
                            <th scope="col">No_Anggota</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Kelas</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        <?php foreach ($dataAnggota as $ag) : ?>
                            <tr>
                                <th scope="row"><?= $no++; ?></th>
                                <td><?= $ag['No_Anggota']; ?></td>
                                <td><?= $ag['Nama']; ?></td>
                                <td><?= $ag['Kelas']; ?></td>
                                <td><?= $ag['Alamat']; ?></td>

                                <td>
                                    <a href="/anggota/edit/<?= $ag['No_Anggota']; ?>" class="btn btn-warning">Edit</a>
                                    <form action="/anggota/delete/<?= $ag['No_Anggota']; ?>" method="POST" class="d-inline">
                                        <?= csrf_field(); ?>
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda ingin menghapus data?'); ">Delete</button>
                                    </form>
                                </td>
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