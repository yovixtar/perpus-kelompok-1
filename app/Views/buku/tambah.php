<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container">
    <div class="row">
        <div class="col-6">
            <h2 class="my-3">Form Tambah Data Buku</h2>
            <form action="/buku/save" method="POST">
                <?= csrf_field(); ?>

                <form class="needs-validation" novalidate>
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label for="validationCustom01">NIB</label>
                            <input type="text" class="form-control" NIB="validationCustom01" placeholder="NIB" name="NIB" required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="validationCustom04">Jenis Buku</label>
                            <select class="custom-select" NIB="validationCustom04" placeholder="jenis_buku" name="jenis_buku" required>
                                <option selected disabled placeholder=""></option>
                                <option placeholder="fiksi">Fiksi</option>
                                <option placeholder="non fiksi">Non Fiksi</option>
                            </select>
                            <div class="invalid-feedback">
                                Please select a valid state.
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="validationCustom02">Judul Buku</label>
                            <input type="text" class="form-control" NIB="validationCustom02" placeholder="judul_buku" name="judul_buku" required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="validationCustom02">No Pengarang</label>
                            <input type="text" class="form-control" NIB="validationCustom02" placeholder="no_pengarang" name="no_pengarang" required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="validationCustom02">No Penerbit</label>
                            <input type="text" class="form-control" NIB="validationCustom02" placeholder="no_penerbit" name="no_penerbit" required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="validationCustom02">Tahun Terbit</label>
                            <input type="text" class="form-control" NIB="validationCustom02" placeholder="tahun_terbit" name="tahun_terbit" required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="validationCustom02">Edisi</label>
                            <input type="text" class="form-control" NIB="validationCustom02" placeholder="edisi" name="edisi" required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="validationCustom02">Stok</label>
                            <input type="text" class="form-control" NIB="validationCustom02" placeholder="stok" name="stok" required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                    </div>


                    <button class="btn btn-primary" type="submit">Submit form</button>
                </form>

                <script>
                    // Example starter JavaScript for disabling form submissions if there are invalid fields
                    (function() {
                        'use strict';
                        window.addEventListener('load', function() {
                            // Fetch all the forms we want to apply custom Bootstrap validation styles to
                            var forms = document.getElementsByClassName('needs-validation');
                            // Loop over them and prevent submission
                            var validation = Array.prototype.filter.call(forms, function(form) {
                                form.addEventListener('submit', function(event) {
                                    if (form.checkValidity() === false) {
                                        event.preventDefault();
                                        event.stopPropagation();
                                    }
                                    form.classList.add('was-validated');
                                }, false);
                            });
                        }, false);
                    })();
                </script>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>