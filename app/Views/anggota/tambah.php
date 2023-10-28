<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container">
    <div class="row">
        <div class="col-6">
            <h2 class="my-3">Form Tambah Data Anggota</h2>
            <form action="/anggota/save" method="POST">
                <?= csrf_field(); ?>

                <form class="needs-validation" novalidate>
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label for="validationCustom01"> No Anggota</label>
                            <input type="text" class="form-control" No_Anggota="validationCustom01" placeholder="No_Anggota" name="No_Anggota">
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="validationCustom02">Name</label>
                            <input type="text" class="form-control" No_Anggota="validationCustom02" placeholder="Nama" name="Nama" required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label for="validationCustom03">Alamat</label>
                            <input type="text" class="form-control" No_Anggota="validationCustom03" placeholder="Alamat" name="Alamat" required>
                            <div class="invalid-feedback">
                                Please provide a valid city.
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="validationCustom04">Kelas</label>
                            <select class="custom-select" No_Anggota="validationCustom04" placeholder="Kelas" name="Kelas" required>
                                <option selected disabled placeholder=""></option>
                                <option placeholder="10">10</option>
                                <option placeholder="11">11</option>
                                <option placeholder="12">12</option>
                            </select>
                            <div class="invalid-feedback">
                                Please select a valid state.
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