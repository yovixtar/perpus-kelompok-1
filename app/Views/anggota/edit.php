<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container">
    <div class="row">
        <div class="col-6">
            <h2 class="my-3">Form Edit Data Anggota</h2>

            <form action="/anggota/update/<?= $Anggota['No_Anggota']; ?>" method="POST">
                <?= csrf_field(); ?>
                <form class="needs-validation" novalidate>
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label for="validationCustom01"> No Anggota</label>
                            <input type="text" class="form-control" No_Anggota="No_Anggota" Name="No_Anggota" value="<?= (old('No_Anggota')) ? old('No_Anggota') : $Anggota['No_Anggota'] ?>" autofocus>
                            <!-- <input type="hidden" name="No_Anggota_Old" value="<?= $Anggota['No_Anggota'] ?>"> -->
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="validationCustom02">Name</label>
                            <input type="text" class="form-control" No_Anggota="Nama" Name="Nama" value="<?= (old('Nama')) ? old('Nama') : $Anggota['Nama'] ?>" autofocus>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label for="validationCustom03">Alamat</label>
                            <input type="text" class="form-control" No_Anggota="Alamat" Name="Alamat" value="<?= (old('Alamat')) ? old('Alamat') : $Anggota['Alamat'] ?>">
                            <div class="invalid-feedback">
                                Please provide a valid city.
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="validationCustom04">Kelas</label>
                            <select class="custom-select" No_Anggota="validationCustom04" name="Kelas">
                                <option selected disabled value=""></option>
                                <option value="10" <?= ($Anggota['Kelas'] == 10) ? 'SELECTED' : ''; ?>>10</option>
                                <option value="11" <?= ($Anggota['Kelas'] == 11) ? 'SELECTED' : ''; ?>>11</option>
                                <option value="12" <?= ($Anggota['Kelas'] == 12) ? 'SELECTED' : ''; ?>>12</option>
                            </select>
                            <div class="invalid-feedback">
                                Please select a valid state.
                            </div>
                        </div>

                    </div>

                    <div class="col-sm-9">
                        <button type="submit" class="btn btn-primary">Update Anggota</button>
                    </div>
                </form>

        </div>
    </div>
</div>

<?= $this->endSection(); ?>