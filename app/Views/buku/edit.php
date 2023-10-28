<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container">
    <div class="row">
        <div class="col-6">
            <h2 class="my-3">Form Edit Data Buku</h2>


            <form action="/buku/update/<?= $Buku['NIB']; ?>" method="POST">
                <?= csrf_field(); ?>

                <form class="needs-validation" novalidate>
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label for="validationCustom01">NIB</label>
                            <input type="text" class="form-control" NIB="NIB" Name="NIB" value="<?= (old('NIB')) ? old('NIB') : $Buku['NIB'] ?>" autofocus>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="validationCustom04">Jenis Buku</label>
                            <select class="custom-select" NIB="validationCustom04" name="jenis_buku" value="<?= (old('jenis_buku')) ? old('jenis_buku') : $Buku['jenis_buku'] ?>">
                                <option selected disabled value=""></option>
                                <option value="fiksi">Fiksi</option>
                                <option value="non fiksi">Non Fiksi</option>
                            </select>
                            <div class="invalid-feedback">
                                Please select a valid state.
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="validationCustom02">Judul Buku</label>
                            _<input type="text" class="form-control" NIB="judul_buku" Name="judul_buku" value="<?= (old('judul_buku')) ? old('judul_buku') : $Buku['judul_buku'] ?>" autofocus>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="validationCustom02">No Pengarang</label>
                            <input type="text" class="form-control" NIB="no_pengarang" Name="no_pengarang" value="<?= (old('no_pengarang')) ? old('no_pengarang') : $Buku['no_pengarang'] ?>" autofocus>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="validationCustom02">No Penerbit</label>
                            <input type="text" class="form-control" NIB="no_penerbit" Name="no_penerbit" value="<?= (old('no_penerbit')) ? old('no_penerbit') : $Buku['no_penerbit'] ?>" autofocus>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="validationCustom02">Tahun Terbit</label>
                            <input type="text" class="form-control" NIB="tahun_terbit" Name="tahun_terbit" value="<?= (old('tahun_terbit')) ? old('tahun_terbit') : $Buku['tahun_terbit'] ?>" autofocus>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="validationCustom02">Edisi</label>
                            <input type="text" class="form-control" NIB="edisi" Name="edisi" value="<?= (old('edisi')) ? old('edisi') : $Buku['edisi'] ?>" autofocus>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="validationCustom02">Stok</label>
                            <input type="text" class="form-control" NIB="stok" Name="stok" value="<?= (old('stok')) ? old('stok') : $Buku['stok'] ?>" autofocus>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-9">
                        <button type="submit" class="btn btn-primary">Update Anggota</button>
                    </div>
                </form> -->




        </div>
    </div>
</div>

<?= $this->endSection(); ?>