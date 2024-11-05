<?= $this->extend('template/admin_template'); ?>
<?= $this->section('content'); ?>
<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->
    <form id="detailTiket" action="javascript:void(0);" method="get">
        <div class="form-group">

            <div class="container-xxl flex-grow-1" style="padding-bottom: 0.25rem">
                <h4 class="py-3 mb-4"><span class="text-muted fw-light">Tiket /</span> Form QR Code</h4>
                <div class="row justify-content-between align-items-start">
                    <h6 class="mb-0 text-hitam" style="font-weight: 100;">FRM.DGT.05.02/</h6>
                </div>
                <div class="row justify-content-between align-items-start">
                    <div class="col-xl-4 mb-5 d-flex justify-content-center">
                        <img src="<?= base_url('/assets/img/icons/Form QR Code.jpg') ?>"
                            style="width: 100%; max-width: 100%; max-height: 16rem; object-fit: cover;"
                            alt="Logo" />
                    </div>

                    <div class="col-xl-4 mb-5 d-flex justify-content-center">
                        <img src="<?= base_url('/assets/img/icons/C2.png') ?>"
                            style="width: 70%; max-width: 100%; max-height: 16rem; object-fit: cover;"
                            alt="Form C1" />
                    </div>
                </div>
            </div>
        </div>

        <div class="container-xxl flex-grow-1" style="padding-bottom: 0.25rem">
            <h5 class="card-header mb-0 text-hitam">FORMULIR PEMESANAN HALAMAN <i>QR CODE</i></h5>

            <div class="row mt-0 ms-0">
                <div class="col-xl-6 mb-2 px-0">
                    <div class="row mt-2 mb-2">
                        <label for="" class="col-12 col-md-3 col-form-label text-biru" style="font-size: large;">KODE BUKU</label>
                        <div class="col-12 col-md-6">
                            <input class="form-control text-hitam border-hitam w-100" type="text" value="" id="" name="" readonly />
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label for="" class="col-12 col-md-3 col-form-label text-biru" style="font-size: large;">JUDUL BUKU</label>
                        <div class="col-12 col-md-6">
                            <input class="form-control text-hitam border-hitam w-100" type="text" value="" id="" name="" readonly />
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-xxl flex-grow-1" style="padding-bottom: 0.25rem">
            <!-- Row 2 -->
            <div class="row">
                <!-- Column 1 -->
                <div class="col-xl-4 mb-2">
                    <div class="card h-100 mb-4 border border-hitam">
                        <h5 class="text-left rounded mt-4 mb-0 mx-4 py-2 px-2 warna-pink text-hitam"><i>CHECKLIST APPROVAL</i> <br>KONTEN MULTIMEDIA</h5>
                        <!-- Checkboxes and Radios -->
                        <div class="card-body pb-0 pt-2">
                            <div class="row">
                                <div class="col-md px-3">
                                    <!-- <small class="text-light fw-medium">Checkboxes</small> -->
                                    <div class="form-check mt-4">
                                        <input class="form-check-input warna-border" type="checkbox" value="pemesan" name="kelengkapan[]" id="kategori14" onclick="return false;" />
                                        <label class="form-check-label text-biru" for="kategori14"> Sudah diperiksa <i>pemesan</i> </label>
                                    </div>
                                    <div class="form-check mt-4">
                                        <input class="form-check-input warna-border" type="checkbox" value="atasan" name="kelengkapan[]" id="kategori15" onclick="return false;" />
                                        <label class="form-check-label text-biru" for="kategori15"> Sudah di-<i>approve </i>atasan </label>
                                    </div>
                                    <div class="mb-3" for="kelengkapan">
                                        <h6 class="text-left text-biru mt-4 mb-0" style="font-weight: bold;">Kelengkapan file yang di-<i>upload</i>*</h6>
                                        <div class="form-check mt-4">
                                            <input class="form-check-input warna-border" type="checkbox" value="Video Mp4" name="kelengkapan[]" id="kelengkapan1" />
                                            <label class="form-check-label text-biru" for="kelengkapan1"> Video Mp4 </label>
                                        </div>
                                        <div class="form-check mt-4">
                                            <input class="form-check-input warna-border" type="checkbox" value="Audio Mp3" name="kelengkapan[]" id="kelengkapan2" />
                                            <label class="form-check-label text-biru" for="kelengkapan2"> Audio Mp3 </label>
                                        </div>
                                        <div class="form-check mt-4">
                                            <input class="form-check-input warna-border" type="checkbox" value="PDF/RAR" name="kelengkapan[]" id="kelengkapan3" />
                                            <label class="form-check-label text-biru" for="kelengkapan3"> PDF/RAR </label>
                                        </div>
                                        <div class="form-check mt-4">
                                            <input class="form-check-input warna-border" type="checkbox" value="Fla/xfl (APK)" name="kelengkapan[]" id="kelengkapan4" />
                                            <label class="form-check-label text-biru" for="kelengkapan4"> Fla/xfl (APK) </label>
                                        </div>
                                        <div class="form-check mt-4">
                                            <input class="form-check-input warna-border" type="checkbox" value="Gambar/Foto/Ilustrasi" name="kelengkapan[]" id="kelengkapan5" />
                                            <label class="form-check-label text-biru" for="kelengkapan5"> Gambar/Foto/Ilustrasi </label>
                                        </div>
                                        <p class="text mt-3 mb-0 text-hitam" style="font-size:x-small;">
                                            *Ukuran file dari konten yang akan diupload tidak
                                            melebihi 30 MB
                                        </p>
                                        <div id="kelengkapanError" class="error-message text-danger"></div>
                                    </div>
                                    <h6 class="text-left text-biru mt-4 mb-0" style="font-weight: bold;">Kelengkapan file konten*</h6>
                                    <div class="form-check mt-4">
                                        <input class="form-check-input warna-border" type="checkbox" value="Tahap 1" name="tahap_kelengkapan[]" id="stats_kelengkapan1" />
                                        <label class="form-check-label text-biru" for="stats_kelengkapan1"> Penyerahan Tahap 1 </label>
                                    </div>
                                    <div class="form-check mt-4">
                                        <input class="form-check-input warna-border" type="checkbox" value="Tahap 2" name="tahap_kelengkapan[]" id="stats_kelengkapan2" />
                                        <label class="form-check-label text-biru" for="stats_kelengkapan2"> Penyerahan Tahap 2 </label>
                                    </div>
                                    <div class="form-check mt-4">
                                        <input class="form-check-input warna-border" type="checkbox" value="Tahap 3" name="tahap_kelengkapan[]" id="stats_kelengkapan3" />
                                        <label class="form-check-label text-biru" for="stats_kelengkapan3"> Penyerahan Tahap 3 </label>
                                    </div>
                                    <p class="text mt-3 mb-0 text-hitam" style="font-size:x-small;">
                                        *Konten <i>QR Code</i> harus dilengkapi maksimal satu
                                        bulan setelah buku terbit. Penyerahan konten
                                        dapat dilakukan sekaligus atau melalui tiga tahap.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Column 2 -->
                <div class="col-xl-8">
                    <!-- Row 2-1 -->
                    <div class="row">
                        <div class="col-xl mb-2">
                            <div class="card h-100 border border-hitam">
                                <div class="card-body pb-0">
                                    <div class="row mb-0">

                                        <div class="col-xl-5 mb-3">
                                            <h6 class="text-center rounded py-2 warna-pink text-hitam">Pemesan</h6>
                                            <div class="row mt-4 mx-0">

                                                <div class="col-xl mb-2 px-0">
                                                    <div class="card h-100 mb-5 warna-border">
                                                        <div class="card-body p-2 d-flex justify-content-left" id="CurentDate" style="height:1.5rem;">
                                                            <p class="text-start text-biru" style="font-size:xx-small;">Tanggal: </p>
                                                            <p class="text-end text-hitam" style="font-size:xx-small;"></p>
                                                        </div>
                                                        <div style="height: 1rem; background-color: transparent;"></div>
                                                        <p class="text-Start mb-0 px-1 nama-editor text-hitam" style="font-size:x-small;"><?= $namaEditor ?: '     '; ?></p>
                                                        <p class="text-center text-biru rounded-bottom mb-0 py-1 warna-pink border-atas" style="font-size:x-small">Editor</p>
                                                    </div>
                                                </div>
                                                <div class="col-xl mb-2 px-0">
                                                    <div class="card h-100 mb-5 warna-border">
                                                        <div class="card-body p-2 d-flex justify-content-left" id="CurentDate" style="height:1.5rem;">
                                                            <p class="text-start text-biru" style="font-size:xx-small;">Tanggal: </p>
                                                            <p class="text-end text-hitam" style="font-size:xx-small;"></p>
                                                        </div>
                                                        <div style="height: 1rem; background-color: transparent;"></div>
                                                        <p class="text-start mb-0 px-1 text-hitam" style="font-size:x-small;"><?= $namaKoord ?: '     '; ?></p>
                                                        <p class="text-center text-biru rounded-bottom mb-0 py-1 nama-koord warna-pink border-atas" style="font-size:x-small;">Koord. Editor</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <p class="text mt-2 mb-0 text-hitam" style="font-size:x-small;">
                                                *Tulis tanggal dan nama
                                            </p>
                                        </div>

                                        <div class="col-xl-7 mb-2">
                                            <h6 class="text-center rounded py-2 warna-pink text-hitam">Catatan</h6>
                                            <div class="row mt-4 mx-1">
                                                <textarea class="form-control warna-border" id="catatan" name="catatan" rows="5" style="height:7.5rem;"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Row 2-2 -->
                    <div class="row">
                        <div class="col-xl mb-2">
                            <div class="card h-100 border border-hitam">
                                <div class="card-body pb-0">
                                    <div class="row mb-0">

                                        <div class="col-xl-3 mb-3">
                                            <h6 class="text-center rounded py-2 warna-pink text-hitam">Memeriksa</h6>
                                            <div class="row mt-4 mx-0">

                                                <div class="col-xl mb-2 px-0">
                                                    <div class="card h-100 mb-5 warna-border">
                                                        <div class="card-body p-2 d-flex justify-content-left" id="CurentDate" style="height:1.5rem;">
                                                            <p class="text-start text-biru" style="font-size:xx-small;">Tanggal: </p>
                                                            <p class="text-end text-hitam" style="font-size:xx-small;"></p>
                                                        </div>
                                                        <div style="height: 1rem; background-color: transparent;"></div>
                                                        <p class="text-start mb-0 px-1 text-hitam" style="font-size:x-small;"><?= $namaMultimedia ?: '     '; ?></p>
                                                        <p class="text-center text-biru rounded-bottom mb-0 py-1 warna-pink border-atas" style="font-size:x-small;">Tim Multimedia</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <p class=" text mt-2 mb-0 text-hitam" style="font-size:x-small;">
                                                *Diisi oleh tim multimedia
                                            </p>
                                        </div>

                                        <div class="col-xl-9">
                                            <h6 class="text-center rounded py-2 warna-pink text-hitam">Keterangan Tanggal</h6>
                                            <div class="row mt-4 mx-1">
                                                <div class="col-xl mb-2 px-0">
                                                    <div class="card h-100 mb-3 warna-border">
                                                        <div class="card-body p-0">
                                                            <div class="row mt-2 mb-3 px-2">
                                                                <label for="tgl_selesai" class="col-12 col-md-6 col-form-label text-biru">Tgl selesai pengerjaan</label>
                                                                <div class="col-12 col-md-6">
                                                                    <input class="form-control text-hitam border-hitam w-100" type="date" value="" id="tgl_selesai" name="tgl_selesai" readonly />
                                                                </div>
                                                            </div>
                                                            <div class="row mb-2 px-2">
                                                                <label for="tgl_upload" class="col-12 col-md-6 col-form-label text-biru">Tgl <i>upload</i> konten <i>QR Code</i></label>
                                                                <div class="col-12 col-md-6">
                                                                    <input class="form-control text-hitam border-hitam w-100" type="date" value="" id="tgl_upload" name="tgl_upload" readonly />
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Row 2-3 -->
                    <div class="row">
                        <div class="col-xl mb-2">
                            <div class="card h-100 border border-hitam">
                                <div class="card-body pb-0">
                                    <div class="row mb-0">

                                        <div class="col-xl-7 mb-3">
                                            <h6 class="text-center rounded py-2 warna-pink text-hitam"><i>Approval</i></h6>
                                            <div class="row mt-4 mx-0">
                                                <div class="col-xl mb-2 px-0">
                                                    <div class="card h-100 mb-5 warna-border">
                                                        <div class="card-body p-2 d-flex justify-content-left" id="CurentDate" style="height:1.5rem;">
                                                            <p class="text-start text-biru" style="font-size:xx-small;">Tanggal: </p>
                                                            <p class="text-end text-hitam" style="font-size:xx-small;"></p>
                                                        </div>
                                                        <div style="height: 1rem; background-color: transparent;"></div>
                                                        <p class="text-start mb-0 px-1 text-hitam" style="font-size:x-small;"><?= $namaKoord ?: '     '; ?></p>
                                                        <p class="text-center text-biru rounded-bottom mb-0 warna-pink border-atas" style="font-size:x-small; padding: 0.725rem 0 0.725rem;">Koord. Editor</p>
                                                    </div>
                                                </div>
                                                <div class="col-xl mb-2 px-0">
                                                    <div class="card h-100 mb-5 warna-border">
                                                        <div class="card-body p-2 d-flex justify-content-left" id="CurentDate" style="height:1.5rem;">
                                                            <p class="text-start text-biru" style="font-size:xx-small;">Tanggal: </p>
                                                            <p class="text-end text-hitam" style="font-size:xx-small;"></p>
                                                        </div>
                                                        <div style="height: 1rem; background-color: transparent;"></div>
                                                        <p class="text-start mb-0 px-1 text-hitam" style="font-size:x-small;">Suksma</p>
                                                        <p class="text-center text-biru rounded-bottom mb-0 py-1 warna-pink border-atas" style="font-size:x-small;">Manager</br>Platform Digital</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <p class="text mt-2 mb-0 text-hitam" style="font-size:x-small;">
                                                *Tulis tanggal dan nama
                                            </p>
                                        </div>

                                        <div class="col-xl-4" style="margin-left: auto;">
                                            <h6 class="text-center rounded py-2 warna-pink text-hitam">Arsip</h6>
                                            <div class="row mt-4 mx-0">
                                                <div class="col-xl mb-2 px-0">
                                                    <div class="card h-100 mb-5 warna-border">
                                                        <div class="card-body p-2 d-flex justify-content-left" id="CurentDate" style="height:1.5rem;">
                                                            <p class="text-start text-biru" style="font-size:xx-small;">Tanggal: </p>
                                                            <p class="text-end text-hitam" style="font-size:xx-small;"></p>
                                                        </div>
                                                        <div style="height: 1rem; background-color: transparent;"></div>
                                                        <p class="text-center mb-0 px-1 text-hitam" style="font-size:x-small;"><?= $namaAdmin ?: '     '; ?></p>
                                                        <p class="text-center text-biru rounded-bottom mb-0 warna-pink border-atas" style="font-size:x-small; padding: 0.725rem 0 0.725rem;">Admin</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <?php if (isset($_SESSION['level_user']) && in_array($_SESSION['level_user'], ['Editor'])) : ?>
                <div class="container-xxl flex-grow-1" style="padding-bottom: 0.25rem">
                    <!-- Row 3 -->
                    <div class="row justify-content-center my-3">
                        <div class="col-xl-6">
                            <button class="btn btn-primary d-grid w-100" id="btnsimpan">Simpan</button>
                            <p id="errorMessage" class="text-danger" style="display:none;"></p>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

        </div>

        <div class="container-xxl flex-grow-1" style="padding-bottom: 0.25rem">
            <!-- Row 2 -->
            <div class="row">
                <!-- Column 1 (Pemesan) -->
                <div class="col-xl-5 mb-3">
                    <!-- Single Header for "Pemesan" -->
                    <h6 class="text-center border-xatas py-2 warna-pink text-hitam mb-0 mt-4">Pemesan</h6>

                    <div class="row mx-0 d-flex align-items-stretch">

                        <!-- Editor Card -->
                        <div class="col-12 col-md-6 mb-2 px-0 d-flex">
                            <div class="card h-100 mb-5 border-c2 w-100">
                                <div class="card-body p-2 d-flex justify-content-left" id="CurentDate" style="height:1.5rem;">
                                    <p class="text-start text-biru" style="font-size:xx-small;">Tanggal: </p>
                                    <p class="text-end text-hitam" style="font-size:xx-small;"></p>
                                </div>
                                <div style="height: 1rem; background-color: transparent;"></div>
                                <p class="text-start mb-0 px-1 nama-editor text-hitam" style="font-size:x-small;"><?= '     '; ?></p>
                                <p class="text-center text-biru mb-0 py-1 warna-pink border-atas2" style="font-size:x-small">Editor</p>
                            </div>
                        </div>

                        <!-- Koord Editor Card -->
                        <div class="col-12 col-md-6 mb-2 px-0 d-flex">
                            <div class="card h-100 mb-5 border-c2 w-100">
                                <div class="card-body p-2 d-flex justify-content-left" id="CurentDate" style="height:1.5rem;">
                                    <p class="text-start text-biru" style="font-size:xx-small;">Tanggal: </p>
                                    <p class="text-end text-hitam" style="font-size:xx-small;"></p>
                                </div>
                                <div style="height: 1rem; background-color: transparent;"></div>
                                <p class="text-start mb-0 px-1 text-hitam" style="font-size:x-small;"><?= '     '; ?></p>
                                <p class="text-center text-biru mb-0 py-1 nama-koord warna-pink border-atas2" style="font-size:x-small;">Koord. Editor</p>
                            </div>
                        </div>

                    </div>
                </div>

                <!-- Combined Column for "Diperiksa," "Approval," and "Arsip" -->
                <div class="col-xl-7 mb-3">
                    <div class="row mt-4 mx-0 d-flex align-items-stretch">

                        <!-- Diperiksa Card -->
                        <div class="col-12 col-md-4 mb-2 px-0 d-flex">
                            <div class="card h-100 border-c2 mb-5 w-100">
                                <h6 class="text-center border-bawah py-2 warna-pink text-hitam mb-0">Diperiksa</h6>
                                <div class="card-body p-2 d-flex justify-content-left" id="CurentDate" style="height:1.5rem;">
                                    <p class="text-start text-biru" style="font-size:xx-small;">Tanggal: </p>
                                    <p class="text-end text-hitam" style="font-size:xx-small;"></p>
                                </div>
                                <div style="height: 1rem; background-color: transparent;"></div>
                                <p class="text-start mb-0 px-1 text-hitam" style="font-size:x-small;"><?= '     '; ?></p>
                                <p class="text-center text-biru mb-0 py-1 warna-pink border-atas2" style="font-size:x-small;">Tim Multimedia</p>
                            </div>
                        </div>

                        <!-- Approval Card -->
                        <div class="col-12 col-md-4 mb-2 px-0 d-flex">
                            <div class="card h-100 border-c2 mb-5 w-100">
                                <h6 class="text-center border-bawah py-2 warna-pink text-hitam mb-0"><i>Approval</i></h6>
                                <div class="card-body p-2 d-flex justify-content-left" id="CurentDate" style="height:1.5rem;">
                                    <p class="text-start text-biru" style="font-size:xx-small;">Tanggal: </p>
                                    <p class="text-end text-hitam" style="font-size:xx-small;"></p>
                                </div>
                                <div style="height: 1rem; background-color: transparent;"></div>
                                <p class="text-start mb-0 px-1 text-hitam" style="font-size:x-small;"><?= '     '; ?></p>
                                <p class="text-center text-biru mb-0 py-1 warna-pink border-atas2" style="font-size:x-small;">Manager Platform Digital</p>
                            </div>
                        </div>

                        <!-- Arsip Card -->
                        <div class="col-12 col-md-4 mb-2 px-0 d-flex">
                            <div class="card h-100 border-c2 mb-5 w-100">
                                <h6 class="text-center border-bawah py-2 warna-pink text-hitam mb-0">Arsip</h6>
                                <div class="card-body p-2 d-flex justify-content-left" id="CurentDate" style="height:1.5rem;">
                                    <p class="text-start text-biru" style="font-size:xx-small;">Tanggal: </p>
                                    <p class="text-end text-hitam" style="font-size:xx-small;"></p>
                                </div>
                                <div style="height: 1rem; background-color: transparent;"></div>
                                <p class="text-center mb-0 px-1 text-hitam" style="font-size:x-small;"><?= '     '; ?></p>
                                <p class="text-center text-biru mb-0 py-1 warna-pink border-atas2" style="font-size:x-small;">Admin</p>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>

        <div class="container-xxl flex-grow-1" style="padding-bottom: 0.25rem">
            <!-- Row 2 -->
            <div class="row">
                <!-- Column 1 (Pemesan) -->
                <div class="col-xl-12 mb-3">
                    <div class="col-xl-12 d-flex justify-content-center">
                        <img src="<?= base_url('/assets/img/icons/C2 ket.png') ?>"
                            style="width: 100%; max-width: 100%; max-height: 16rem; object-fit: cover;"
                            alt="Logo" />
                    </div>
                </div>
            </div>
        </div>

    </form>
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
<!-- / Content wrapper -->
</div>
<!-- / Layout page -->
</div>
<!-- Overlay -->
<div class="layout-overlay layout-menu-toggle"></div>
</div>
<!-- / Layout wrapper -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>

</script>
<?= $this->endSection(); ?>