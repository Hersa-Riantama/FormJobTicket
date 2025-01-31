<?= $this->extend('template/admin_template'); ?>
<?= $this->section('content'); ?>
<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 mb-4"><span class="text-muted fw-light">User /</span> Profil</h4>

        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <h5 class="card-header">Detail Profil</h5>
                    <!-- Account -->
                    <div class="card-body">
                        <div class="d-flex align-items-start align-items-sm-center gap-4">
                            <img
                                src="../assets/img/avatars/<?= esc($userData['avatar']) ?>"
                                alt="user-avatar"
                                class="d-block rounded"
                                height="100"
                                width="100"
                                id="uploadedAvatar" />
                            <div class="button-wrapper">
                                <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                                    <span class="d-none d-sm-block">Upload Foto</span>
                                    <i class="bx bx-upload d-block d-sm-none"></i>
                                    <input
                                        type="file"
                                        id="upload"
                                        class="account-file-input"
                                        hidden
                                        accept="image/png, image/jpeg" />
                                </label>
                                <!-- <button type="button" class="btn btn-outline-secondary account-image-reset mb-4">
                                    <i class="bx bx-reset d-block d-sm-none"></i>
                                    <span class="d-none d-sm-block">Reset</span>
                                </button> -->

                                <p class="text-muted mb-0">Foto berupa JPG atau PNG. Maksimal 1 MB</p>
                            </div>
                        </div>
                    </div>
                    <hr class="my-0" />
                    <div class="card-body">
                        <form id="formAccountSettings" method="POST" onsubmit="return false">
                            <div class="row">
                                <div class="mb-3 col-md-6">
                                    <label for="nama" class="form-label">Nama</label>
                                    <input
                                        class="form-control"
                                        type="text"
                                        id="nama"
                                        name="nama"
                                        value="<?= esc($userData['nama']) ?>"
                                        placeholder="Masukkan Nama" />
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="nik" class="form-label">Nomor Induk Karyawan</label>
                                    <input class="form-control" type="text" name="nik" id="nik" value="<?= esc($userData['nomor_induk']) ?>" placeholder="Contoh : P1010" />
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="email" class="form-label">E-mail Corporate</label>
                                    <input
                                        class="form-control"
                                        type="text"
                                        id="email"
                                        name="email"
                                        value="<?= esc($userData['email']) ?>"
                                        placeholder="Contoh : nama@erlangga.co.id" />
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="form-label" for="no_tlp">No. Telepon</label>
                                    <div class="input-group input-group-merge">
                                        <input
                                            type="text"
                                            id="no_tlp"
                                            name="no_tlp"
                                            class="form-control"
                                            value="<?= esc($userData['no_tlp']) ?>"
                                            placeholder="Masukkan No. Telepon" />
                                    </div>
                                </div>
                                <!-- <div class="mb-3 col-md-6">
                                    <label for="jk" class="form-label">Jenis Kelamin</label>
                                    <select id="jk" class="select2 form-select">
                                        <option value="" selected disabled>Pilih Jenis Kelamin</option>
                                        <option value="Laki-Laki">Laki-Laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
                                </div> -->
                            </div>
                            <div class="row">
                                <div class="mb-3 col-md-6 form-password-toggle">
                                    <label for="password_lama" class="form-label">Password Lama</label>
                                    <div class="input-group input-group-merge">
                                        <input class="form-control" type="password" name="password_lama" id="password_lama" value="" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" />
                                        <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                    </div>
                                </div>
                                <div class="mb-3 col-md-6 form-password-toggle">
                                    <label for="password_baru" class="form-label">Password Baru</label>
                                    <div class="input-group input-group-merge">
                                        <input class="form-control" type="password" name="password_baru" id="password_baru" value="" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" />
                                        <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                    </div>
                                </div>

                                <div class="mt-2">
                                    <button type="submit" class="btn btn-primary me-2">Simpan Perubahan</button>
                                    <!-- <button type="reset" class="btn btn-outline-secondary">Cancel</button> -->
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- /Account -->
                </div>
                <div class="card">
                    <h5 class="card-header">Hapus Akun</h5>
                    <div class="card-body">
                        <div class="mb-3 col-12 mb-0">
                            <div class="alert alert-warning">
                                <h6 class="alert-heading mb-1">Apakah Anda yakin ingin menghapus akun Anda?</h6>
                                <p class="mb-0">Setelah Anda menghapus akun, tidak ada jalan kembali. Pastikan Anda yakin.</p>
                            </div>
                        </div>
                        <form id="formAccountDeactivation" onsubmit="return false">
                            <div class="form-check mb-3">
                                <input
                                    class="form-check-input"
                                    type="checkbox"
                                    name="accountActivation"
                                    id="accountActivation" />
                                <label class="form-check-label" for="accountActivation">Saya mengonfirmasi penonaktifan akun saya</label>
                            </div>
                            <button type="submit" class="btn btn-danger deactivate-account">Nonaktifkan Akun</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- / Content -->

    <!-- Footer -->
    <footer class="content-footer footer bg-footer-theme">
        <div class="container-xxl d-flex flex-wrap justify-content-center py-2 flex-md-row flex-column text-center">
            <div class="mb-2 mb-md-0">
                ©
                <script>
                    document.write(new Date().getFullYear());
                </script>
                , made with ❤️ by
                <a href="https://erlanggaonline.com/" target="_blank" class="footer-link fw-medium">ErlanggaOnline</a>
            </div>
        </div>
    </footer>
    <!-- / Footer -->

    <div class="content-backdrop fade"></div>
</div>
<!-- Content wrapper -->
</div>
<!-- / Layout page -->
</div>

<!-- Overlay -->
<div class="layout-overlay layout-menu-toggle"></div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    document.getElementById("upload").addEventListener("change", function(event) {
        let formData = new FormData();
        formData.append("upload", event.target.files[0]);

        fetch("<?= base_url('uploadAvatar') ?>", {
                method: "POST",
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.status === "success") {
                    // document.getElementById("uploadedAvatar").src = "<//?= base_url('profil') ?>" + data.filename;
                    location.reload();
                } else {
                    alert("Upload gagal!");
                }
            })
            .catch(error => console.error("Error:", error));
    });
</script>

<!-- / Layout wrapper -->
<?= $this->endSection(); ?>