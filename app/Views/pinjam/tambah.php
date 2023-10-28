<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container">
    <div class="row">
        <div class="col-6">
            <?= date('d-m-Y') ?>
            <h2 class="my-3">Form Tambah Data Peminjaman</h2>
            <form action="/pinjam/save" method="POST">
                <?= csrf_field(); ?>

                <form class="needs-validation" novalidate>
                    <div class="form-row">

                        <div class="col-md-6 mb-3">
                            <label for="validationCustom02">No Anggota</label>
                            <input type="text" class="form-control" no_pinjam="validationCustom02" placeholder="No Anggota" name="No_Anggota" required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="validationCustom02">NIB</label>
                            <input type="text" class="form-control" no_pinjam="validationCustom02" placeholder="NIB" name="NIB" required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="validationCustom02">Waktu Pinjam</label>
                            <input type="date" class="form-control" no_pinjam="validationCustom02" placeholder="<?= date('Y-m-d') ?>" name="waktu_pinjam" required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="validationCustom02">Waktu Kembali</label>
                            <input type="date" class="form-control" no_pinjam="validationCustom02" placeholder="Waktu Kembali" name="waktu_kembali" required>
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