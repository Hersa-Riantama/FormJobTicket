<?= $this->extend('template/admin_template'); ?>
<?= $this->section('content'); ?>
<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->
    <form id="detailTiket" action="javascript:void(0);" method="get">
        <div class="form-group">

            <div class="container-xxl flex-grow-1" style="padding-bottom: 0.25rem">
                <h4 class="py-3 mb-4"><span class="text-muted fw-light">Form /</span> Form QR Code</h4>
                <div class="row justify-content-between align-items-start">
                    <div class="col-xl-4 mb-5 d-flex justify-content-center">
                        <img src="<?= base_url('/assets/img/icons/Form QR Code.jpg') ?>"
                            style="width: 100%; max-width: 100%; max-height: 14rem; object-fit: cover;"
                            alt="Logo" />
                    </div>

                    <div class="col-xl-3 mb-5">
                        <h4 class="card-header text-center mb-2 text-hitam">PLATFORM DIGITAL</h4>
                        <div class="card border border-hitam mx-4" style="height: auto; max-height: 14rem; overflow: hidden;">
                            <div class="card-body p-2">
                                <div class="row justify-content-between">
                                    <div class="col-7">
                                        <div class="card warna-pink oval-atas">
                                            <h3 class="text-center oval mb-0 p-2 warna-darkpink text-hitam"><i>Form</i></h3>
                                            <div class="card-body m-0 p-2">
                                                <h1 class="text-center mb-0 display-1 text-hitam" style="font-size: 4rem;">C</h1>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-5" style="padding-left:0;">
                                        <h1 class="text-center display-1 mb-0 mt-1 text-hitam" style="font-size: 7rem; overflow: hidden;">1</h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="container-xxl flex-grow-1" style="padding-bottom: 0.25rem">
                <h5 class="card-header mb-3 text-hitam">TIKET PEMESANAN DAN <i>APPROVAL</i> KONTEN MULTIMEDIA </h5>
                <!-- Row 1 -->
                <div class="row">
                    <!-- Column 1 -->
                    <div class="col-xl-4 mb-2">
                        <div class="card h-100 mb-4 border border-hitam">
                            <h5 class="text-left rounded mt-4 mb-0 mx-4 py-2 px-2 warna-pink text-hitam"><i>CHECKLIST</i> PEMBUATAN <br>KONTEN MULTIMEDIA</h5>
                            <!-- Checkboxes and Radios -->
                            <div class="card-body pb-0 pt-2">
                                <div class="row">
                                    <div class="col-md px-3">
                                        <!-- <small class="text-light fw-medium">Checkboxes</small> -->
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-check mt-4">
                                                    <input class="form-check-input warna-border" type="checkbox" value="1" name="id_kategori[]" id="kategori1" <?php echo in_array(1, $kategori) ? 'checked' : ''; ?> />
                                                    <label class="form-check-label text-biru" for="kategori1"> <i>QR CODE</i> </label>
                                                </div>
                                            </div>
                                            <div class="col mt-4">
                                                <div class="row">
                                                    <div class="form-check my-0" style="font-size:0.696rem;">
                                                        <input class="form-check-input warna-border" type="checkbox" value="2" name="id_kategori[]" id="kategori2" <?php echo in_array(2, $kategori) ? 'checked' : ''; ?> />
                                                        <label class="form-check-label text-biru" for="kategori2"> <i>DUMMY</i> </label>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-check my-0" style="font-size:0.696rem;">
                                                        <input class="form-check-input warna-border" type="checkbox" value="3" name="id_kategori[]" id="kategori3" <?php echo in_array(3, $kategori) ? 'checked' : ''; ?> />
                                                        <label class="form-check-label text-biru" for="kategori3"> KONTEN TERSEDIA </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-check mt-0">
                                            <input class="form-check-input warna-border" type="checkbox" value="4" name="id_kategori[]" id="kategori4" <?php echo in_array(4, $kategori) ? 'checked' : ''; ?> />
                                            <label class="form-check-label text-biru" for="kategori4"> <i>Link QR Code</i> </label>
                                        </div>
                                        <div class="form-check mt-4">
                                            <input class="form-check-input warna-border" type="checkbox" value="5" name="id_kategori[]" id="kategori5" <?php echo in_array(5, $kategori) ? 'checked' : ''; ?> />
                                            <label class="form-check-label text-biru" for="kategori5"> CBT/Aplikasi </label>
                                        </div>
                                        <div class="form-check mt-4">
                                            <input class="form-check-input warna-border" type="checkbox" value="6" name="id_kategori[]" id="kategori6" <?php echo in_array(6, $kategori) ? 'checked' : ''; ?> />
                                            <label class="form-check-label text-biru" for="kategori6"> Edit Video/Audio </label>
                                        </div>
                                        <div class="form-check mt-4">
                                            <input class="form-check-input warna-border" type="checkbox" value="7" name="id_kategori[]" id="kategori7" <?php echo in_array(7, $kategori) ? 'checked' : ''; ?> />
                                            <label class="form-check-label text-biru" for="kategori7"> <i>Template</i> Media Mengajar </label>
                                        </div>
                                        <div class="form-check mt-4">
                                            <input class="form-check-input warna-border" type="checkbox" value="8" name="id_kategori[]" id="kategori8" <?php echo in_array(8, $kategori) ? 'checked' : ''; ?> />
                                            <label class="form-check-label text-biru" for="kategori8"> Standarisasi Media Mengajar </label>
                                        </div>
                                        <div class="form-check mt-4">
                                            <input class="form-check-input warna-border" type="checkbox" value="9" name="id_kategori[]" id="kategori9" <?php echo in_array(9, $kategori) ? 'checked' : ''; ?> />
                                            <label class="form-check-label text-biru" for="kategori9"> <i>Template</i> Video </label>
                                        </div>
                                        <div class="form-check mt-4">
                                            <input class="form-check-input warna-border" type="checkbox" value="10" name="id_kategori[]" id="kategori10" <?php echo in_array(10, $kategori) ? 'checked' : ''; ?> />
                                            <label class="form-check-label text-biru" for="kategori10"> Animasi/<i>Motion</i> </label>
                                        </div>
                                        <div class="form-check mt-4">
                                            <input class="form-check-input warna-border" type="checkbox" value="11" name="id_kategori[]" id="kategori11" <?php echo in_array(11, $kategori) ? 'checked' : ''; ?> />
                                            <label class="form-check-label text-biru" for="kategori11"> <i>Augmented Reality</i> (AR) </label>
                                        </div>
                                        <div class="form-check mt-4">
                                            <input class="form-check-input warna-border" type="checkbox" value="12" name="id_kategori[]" id="kategori12" <?php echo in_array(12, $kategori) ? 'checked' : ''; ?> />
                                            <label class="form-check-label text-biru" for="kategori12"> <i>Game</i> Edukasi </label>
                                        </div>
                                        <div class="form-check mt-4">
                                            <input class="form-check-input warna-border" type="checkbox" value="13" name="id_kategori[]" id="kategori13" <?php echo in_array(13, $kategori) ? 'checked' : ''; ?> />
                                            <label class="form-check-label text-biru" for="kategori13"> Lainnya </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr class="m-0" />
                        </div>
                    </div>

                    <!-- Column 2 -->
                    <div class="col-xl-8 mb-2">
                        <div class="card h-100 mb-4 border border-hitam">
                            <div class="card-body pb-0">

                                <div class="mb-3 row">
                                    <label for="pemesan" class="col-md-3 col-form-label text-biru" style="font-size: var(--bs-body-font-size)">PEMESAN</label>
                                    <div class="col-md-9">
                                        <input class="form-control text-hitam border-hitam" type="text" value="<?= esc($tiketData['user_nama']) ?>" id="id_user" name="id_user" placeholder="Masukkan Pemesan" style="border: 1px solid black;" readonly />
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="kode_buku" class="form-label col-md-3 text-biru" style="font-size: var(--bs-body-font-size)">Kode Buku</label>
                                    <div class="col-md-9">
                                        <input class="form-control text-hitam border-hitam" type="text" value="<?= esc($tiketData['kode_buku']) ?>" id="kode_buku" name="kode_buku" placeholder="" style="border: 1px solid black;" readonly />
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="nomor_job" class="col-md-3 col-form-label text-biru" style="font-size: var(--bs-body-font-size)">NOMOR JOB</label>
                                    <div class="col-md-9">
                                        <input class="form-control text-hitam border-hitam" type="text" value="<?= esc($tiketData['nomor_job']) ?>" id="nomor_job" name="nomor_job" placeholder="Masukkan Nomor Job" style="border: 1px solid black;" readonly />
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="judul_buku" class="col-md-3 col-form-label text-biru" style="font-size: var(--bs-body-font-size)">JUDUL BUKU</label>
                                    <div class="col-md-9">
                                        <textarea class="form-control text-hitam border-hitam" value="" id="judul_buku" name="judul_buku" row="2" placeholder="Masukkan Judul Buku" style="border: 1px solid black;" readonly><?= esc($tiketData['judul_buku']) ?></textarea>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="pengarang" class="col-md-3 col-form-label text-biru" style="font-size: var(--bs-body-font-size)">PENULIS</label>
                                    <div class="col-md-9">
                                        <input class="form-control text-hitam border-hitam" type="text" value="<?= esc($tiketData['pengarang']) ?>" id="pengarang" name="pengarang" placeholder="Masukkan Penulis" style="border: 1px solid black;" readonly />
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="target_terbit" class="col-md-3 col-form-label text-biru" style="font-size: var(--bs-body-font-size)">TARGET TERBIT</label>
                                    <div class="col-md-9">
                                        <input class="form-control text-hitam border-hitam" type="year" value="<?= esc($tiketData['target_terbit']) ?>" id="target_terbit" name="target_terbit" placeholder="Masukkan Target Terbit" style="border: 1px solid black;" readonly />
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="jml_qr" class="col-md-3 col-form-label text-biru" style="font-size: var(--bs-body-font-size)">Jumlah <i>QR Code</i></label>
                                    <div class="col-md-9">
                                        <input class="form-control text-hitam border-hitam" type="text" value="<?= esc($tiketData['jml_qrcode']) ?>" id="jml_qrcode" name="jml_qrcode" placeholder="Masukkan Jumlah QR Code" style="border: 1px solid black;" readonly />
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="email" class="col-md-3 col-form-label text-biru" style="font-size: var(--bs-body-font-size)">Email</label>
                                    <div class="col-md-9">
                                        <input class="form-control text-hitam border-hitam" type="email" value="<?= esc($tiketData['user_email']) ?>" id="email" name="email" placeholder="Masukkan Email" style="border: 1px solid black;" readonly />
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="warna" class="col-md-3 col-form-label text-biru" style="font-size: var(--bs-body-font-size)">WARNA</label>
                                    <div class="col-md">
                                        <div class="form-check form-check-inline rounded p-2 mb-2 border-hitam" style="border: 1px solid black;">
                                            <input class="form-check-input mx-1 warna-border" type="radio" id="inlineRadio1" name="inlineRadioOption" value="BW" <?= ($tiketData['warna'] === 'BW') ? 'checked' : '' ?> />
                                            <label class="form-check-label text-biru px-2" for="inlineRadio1">BW</label>
                                        </div>
                                        <div class="form-check form-check-inline rounded p-2 mb-2 border-hitam" style="border: 1px solid black;">
                                            <input class="form-check-input mx-1 warna-border" type="radio" id="inlineRadio2" name="inlineRadioOption" value="2/2" <?= ($tiketData['warna'] === '2/2') ? 'checked' : '' ?> />
                                            <label class="form-check-label text-biru px-2" for="inlineRadio2">2/2</label>
                                        </div>
                                        <div class="form-check form-check-inline rounded p-2 mb-2 border-hitam" style="border: 1px solid black;">
                                            <input class="form-check-input mx-1 warna-border" type="radio" id="inlineRadio3" name="inlineRadioOption" value="3/3" <?= ($tiketData['warna'] === '3/3') ? 'checked' : '' ?> />
                                            <label class="form-check-label text-biru px-2" for="inlineRadio3">3/3</label>
                                        </div>
                                        <div class="form-check form-check-inline rounded p-2 mb-2 border-hitam" style="border: 1px solid black;">
                                            <input class="form-check-input mx-1 warna-border" type="radio" id="inlineRadio4" name="inlineRadioOption" value="4/4" <?= ($tiketData['warna'] === '4/4') ? 'checked' : '' ?> />
                                            <label class="form-check-label text-biru px-2" for="inlineRadio4">4/4</label>
                                        </div>
                                        <p class="text-bold mt-2 mb-0 text-hitam" style="font-size:x-small;">*keterangan warna isi buku</p>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <div class="col-md">
                                    </div>
                                </div>
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
                                            <input class="form-check-input warna-border" type="checkbox" value="14" name="kelengkapan[]" id="kategori14" <?= ($tiketData['approved_order_koord'] === "Y") ? 'checked' : ''; ?> />
                                            <label class="form-check-label text-biru" for="kategori14"> Sudah diperiksa <i>pemesan</i> </label>
                                        </div>
                                        <div class="form-check mt-4">
                                            <input class="form-check-input warna-border" type="checkbox" value="15" name="kelengkapan[]" id="kategori15" <?= ($tiketData['approved_acc_manager'] === "Y") ? 'checked' : ''; ?> />
                                            <label class="form-check-label text-biru" for="kategori15"> Sudah di-<i>approve </i>atasan </label>
                                        </div>

                                        <h6 class="text-left text-biru mt-4 mb-0" style="font-weight: bold;">Kelengkapan file yang di-<i>upload</i>*</h6>
                                        <div class="form-check mt-4">
                                            <input class="form-check-input warna-border" type="checkbox" value="Video Mp4" name="kelengkapan[]" id="kelengkapan1" <?php echo in_array('Video Mp4', $kelengkapan) ? 'checked' : ''; ?> />
                                            <label class="form-check-label text-biru" for="kelengkapan1"> Video Mp4 </label>
                                        </div>
                                        <div class="form-check mt-4">
                                            <input class="form-check-input warna-border" type="checkbox" value="Audio Mp3" name="kelengkapan[]" id="kelengkapan2" <?php echo in_array('Audio Mp3', $kelengkapan) ? 'checked' : ''; ?> />
                                            <label class="form-check-label text-biru" for="kelengkapan2"> Audio Mp3 </label>
                                        </div>
                                        <div class="form-check mt-4">
                                            <input class="form-check-input warna-border" type="checkbox" value="PDF/RAR" name="kelengkapan[]" id="kelengkapan3" <?php echo in_array('PDF/RAR', $kelengkapan) ? 'checked' : ''; ?> />
                                            <label class="form-check-label text-biru" for="kelengkapan3"> PDF/RAR </label>
                                        </div>
                                        <div class="form-check mt-4">
                                            <input class="form-check-input warna-border" type="checkbox" value="Fla/xfl (APK)" name="kelengkapan[]" id="kelengkapan4" <?php echo in_array('Fla/xfl (APK)', $kelengkapan) ? 'checked' : ''; ?> />
                                            <label class="form-check-label text-biru" for="kelengkapan4"> Fla/xfl (APK) </label>
                                        </div>
                                        <div class="form-check mt-4">
                                            <input class="form-check-input warna-border" type="checkbox" value="Gambar/Foto/Ilustrasi" name="kelengkapan[]" id="kelengkapan5" <?php echo in_array('Gambar/Foto/Ilustrasi', $kelengkapan) ? 'checked' : ''; ?> />
                                            <label class="form-check-label text-biru" for="kelengkapan5"> Gambar/Foto/Ilustrasi </label>
                                        </div>
                                        <p class="text mt-3 mb-0 text-hitam" style="font-size:x-small;">
                                            *Ukuran file dari konten yang akan diupload tidak
                                            melebihi 30 MB
                                        </p>

                                        <h6 class="text-left text-biru mt-4 mb-0" style="font-weight: bold;">Kelengkapan file konten*</h6>
                                        <div class="form-check mt-4">
                                            <input class="form-check-input warna-border" type="checkbox" value="Tahap 1" name="tahap_kelengkapan[]" id="stats_kelengkapan1" <?php echo in_array('Tahap 1', $tahap) ? 'checked' : ''; ?> />
                                            <label class="form-check-label text-biru" for="stats_kelengkapan1"> Penyerahan Tahap 1 </label>
                                        </div>
                                        <div class="form-check mt-4">
                                            <input class="form-check-input warna-border" type="checkbox" value="Tahap 2" name="tahap_kelengkapan[]" id="stats_kelengkapan2" <?php echo in_array('Tahap 2', $tahap) ? 'checked' : ''; ?> />
                                            <label class="form-check-label text-biru" for="stats_kelengkapan2"> Penyerahan Tahap 2 </label>
                                        </div>
                                        <div class="form-check mt-4">
                                            <input class="form-check-input warna-border" type="checkbox" value="Tahap 3" name="tahap_kelengkapan[]" id="stats_kelengkapan3" <?php echo in_array('Tahap 3', $tahap) ? 'checked' : ''; ?> />
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
                                                        <div class="card h-100 <?= $tiketData['approved_order_editor'] === 'Y' ? 'mb-2' : 'mb-5'; ?> warna-border">
                                                            <div class="card-body p-2 d-flex justify-content-left" id="CurentDate" style="height:1.5rem;">
                                                                <p class="text-start text-biru" style="font-size:xx-small;">Tanggal: </p>
                                                                <?php if (!empty($tiketData['tgl_order_editor']) && $tiketData['tgl_order_editor'] !== '0000-00-00' && $tiketData['tgl_order_editor'] !== '-0001-11-30'): ?>
                                                                    <p class="text-start text-biru" style="font-size:xx-small;">
                                                                        <?= date('d/m/Y', strtotime($tiketData['tgl_order_editor'])); ?>
                                                                    </p>
                                                                <?php endif; ?>
                                                            </div>
                                                            <?php if ($tiketData['approved_order_editor'] === 'Y'): ?>
                                                                <div class="approved-status">
                                                                    <img src="<?= base_url('/assets/img/icons/approved.png') ?>" style="height: 3.5rem;" alt="Approved" />
                                                                </div>
                                                            <?php else: ?>
                                                                <!-- Ruang Kosong -->
                                                                <div style="height: 1rem; background-color: transparent;"></div>
                                                            <?php endif; ?>
                                                            <p class="text-start mb-0 px-1 text-hitam" style="font-size:x-small;"><?= esc($tiketData['editor_nama'] ?? '     ') ?></p>
                                                            <p class="text-center text-biru rounded-bottom mb-0 py-1 warna-pink border-atas text-biru" style="font-size:x-small;">Editor</p>
                                                        </div>
                                                    </div>
                                                    <div class=" col-xl mb-2 px-0">
                                                        <div class="card h-100 <?= $tiketData['approved_order_koord'] === 'Y' ? 'mb-2' : 'mb-5'; ?> warna-border">
                                                            <?php $level_user = session()->get('level_user'); ?>
                                                            <div class="card-body p-2 d-flex justify-content-left" id="CurentDate" style="<?= $level_user === 'Koord Editor' && $tiketData['approved_order_koord'] !== 'Y' ? 'height:1rem;' : 'height:1.5rem;'; ?>">
                                                                <p class="text-start text-biru" style="font-size:xx-small;">Tanggal: </p>
                                                                <?php if (!empty($tiketData['tgl_order_koord']) && $tiketData['tgl_order_koord'] !== '0000-00-00' && $tiketData['tgl_order_koord'] !== '-0001-11-30'): ?>
                                                                    <p class="text-start text-biru" style="font-size:xx-small;">
                                                                        <?= date('d/m/Y', strtotime($tiketData['tgl_order_koord'])); ?>
                                                                    </p>
                                                                <?php endif; ?>
                                                            </div>
                                                            <?php
                                                            if ($level_user === 'Koord Editor' && $tiketData['approved_order_koord'] !== 'Y'): ?>
                                                                <center><button class="btn btn-success btn-approved" style="height:1.5rem; display: flex;" id="approveButton" onclick="approveTicket(<?= $tiketData['id_tiket'] ?>,'Koord Editor')">Approve</button></center>
                                                            <?php elseif ($tiketData['approved_order_koord'] === 'Y'): ?>
                                                                <div class="approved-status">
                                                                    <img src="<?= base_url('/assets/img/icons/approved.png') ?>" style="height: 3.5rem;" alt="Approved" />
                                                                </div>
                                                            <?php else: ?>
                                                                <!-- Ruang Kosong -->
                                                                <div style="height: 1rem; background-color: transparent;"></div>
                                                            <?php endif; ?>
                                                            <p class="text-start mb-0 px-1 text-hitam" style="font-size:x-small;"><?= esc($tiketData['koord_nama'] ?? '     ') ?></p>
                                                            <p class="text-center text-biru rounded-bottom mb-0 py-1 warna-pink border-atas text-biru" style="font-size:x-small;">Koord. Editor</p>
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
                                                    <textarea class="form-control warna-border" id="Textarea1" name="Textarea1" rows="5" style="height:7.5rem;"></textarea>
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
                                                        <div class="card h-100 <?= $tiketData['approved_multimedia'] === 'Y' ? 'mb-2' : 'mb-5'; ?> warna-border">
                                                            <div class=" card-body p-2 d-flex justify-content-left" id="CurentDate" style="<?= $level_user === 'Tim Multimedia' && $tiketData['approved_multimedia'] !== 'Y' ? 'height:1rem;' : 'height:1.5rem;'; ?>">
                                                                <p class="text-start text-biru" style="font-size:xx-small;">Tanggal: </p>
                                                                <?php if (!empty($tiketData['tgl_acc_multimedia']) && $tiketData['tgl_acc_multimedia'] !== '0000-00-00' && $tiketData['tgl_acc_multimedia'] !== '-0001-11-30'): ?>
                                                                    <p class="text-start text-biru" style="font-size:xx-small;">
                                                                        <?= date('d/m/Y', strtotime($tiketData['tgl_acc_multimedia'])); ?>
                                                                    </p>
                                                                <?php endif; ?>
                                                            </div>
                                                            <?php
                                                            $level_user = session()->get('level_user');
                                                            if ($level_user === 'Tim Multimedia' && $tiketData['approved_multimedia'] !== 'Y'): ?>
                                                                <center><button class="btn btn-success btn-approved" style="height:1.5rem; display: flex;" onclick="approveTicket(<?= $tiketData['id_tiket'] ?>,'Tim Multimedia')">Approve</button></center>
                                                            <?php elseif ($tiketData['approved_multimedia'] === 'Y'): ?>
                                                                <div class="approved-status">
                                                                    <img src="<?= base_url('/assets/img/icons/approved.png') ?>" style="height: 3.5rem;" alt="Approved" />
                                                                </div>
                                                            <?php else: ?>
                                                                <!-- Ruang Kosong -->
                                                                <div style="height: 1rem; background-color: transparent;"></div>
                                                            <?php endif; ?>
                                                            <p class="text-start mb-0 px-1 text-hitam" style="font-size:x-small;">
                                                                <?php if ($userData['level_user'] === 'Tim Multimedia'): ?>
                                                                    <?= esc($tiketData['multimedia_nama'] ?? $userData['nama']); ?>
                                                                <?php else: ?>
                                                                    <?= esc($tiketData['multimedia_nama'] ?? '     '); ?>
                                                                <?php endif; ?>
                                                            </p>
                                                            <p class="text-center text-biru rounded-bottom mb-0 py-1 warna-pink border-atas text-biru" style="font-size:x-small;">Tim Multimedia</p>
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
                                                                        <input class="form-control text-hitam border-hitam w-100" type="date" value="<?= esc($tiketData['tgl_selesai']) ?>" id="tgl_selesai" name="tgl_selesai" />
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-2 px-2">
                                                                    <label for="tgl_upload" class="col-12 col-md-6 col-form-label text-biru">Tgl <i>upload</i> konten <i>QR Code</i></label>
                                                                    <div class="col-12 col-md-6">
                                                                        <input class="form-control text-hitam border-hitam w-100" type="date" value="<?= esc($tiketData['tgl_upload']) ?>" id="tgl_upload" name="tgl_upload" />
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
                                                        <div class="card h-100 <?= $tiketData['approved_acc_koord'] === 'Y' ? 'mb-2' : 'mb-5'; ?> warna-border">
                                                            <div class="card-body p-2 d-flex justify-content-left" id="CurentDate" style="<?= $level_user === 'Koord Editor' && $tiketData['approved_acc_koord'] !== 'Y' ? 'height:1rem;' : 'height:1.5rem;'; ?>">
                                                                <p class="text-start text-biru" style="font-size:xx-small;">Tanggal: </p>
                                                                <?php if (!empty($tiketData['tgl_acc_koord']) && $tiketData['tgl_acc_koord'] !== '0000-00-00' && $tiketData['tgl_acc_koord'] !== '-0001-11-30'): ?>
                                                                    <p class="text-start text-biru" style="font-size:xx-small;">
                                                                        <?= date('d/m/Y', strtotime($tiketData['tgl_acc_koord'])); ?>
                                                                    </p>
                                                                <?php endif; ?>
                                                            </div>
                                                            <?php
                                                            $level_user = session()->get('level_user');
                                                            if ($level_user === 'Koord Editor' && $tiketData['approved_acc_koord'] !== 'Y'): ?>
                                                                <center><button class="btn btn-success btn-approved" style="height:1.5rem; display: flex;" onclick="approveTicket(<?= $tiketData['id_tiket'] ?>,'Acc Koord Editor')">Approve</button></center>
                                                            <?php elseif ($tiketData['approved_acc_koord'] === 'Y'): ?>
                                                                <div class="approved-status">
                                                                    <img src="<?= base_url('/assets/img/icons/approved.png') ?>" style="height: 3.5rem;" alt="Approved" />
                                                                </div>
                                                            <?php else: ?>
                                                                <!-- Ruang Kosong -->
                                                                <div style="height: 1rem; background-color: transparent;"></div>
                                                            <?php endif; ?>
                                                            <p class="text-start mb-0 px-1 text-hitam" style="font-size:x-small;"><?= esc($tiketData['koord_nama'] ?? '     ') ?></p>
                                                            <p class="text-center text-biru rounded-bottom mb-0 warna-pink border-atas text-biru" style="font-size:x-small; padding: 0.725rem 0 0.725rem;">Koord. Editor</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl mb-2 px-0">
                                                        <div class="card h-100 <?= $tiketData['approved_acc_manager'] === 'Y' ? 'mb-2' : 'mb-5'; ?> warna-border">
                                                            <div class="card-body p-2 d-flex justify-content-left" id="CurentDate" style="<?= $level_user === 'Manager Platform' && $tiketData['approved_acc_manager'] !== 'Y' ? 'height:1rem;' : 'height:1.5rem;'; ?>">
                                                                <p class="text-start text-biru" style="font-size:xx-small;">Tanggal: </p>
                                                                <?php if (!empty($tiketData['tgl_acc_manager']) && $tiketData['tgl_acc_manager'] !== '0000-00-00' && $tiketData['tgl_acc_manager'] !== '-0001-11-30'): ?>
                                                                    <p class="text-start text-biru" style="font-size:xx-small;">
                                                                        <?= date('d/m/Y', strtotime($tiketData['tgl_acc_manager'])); ?>
                                                                    </p>
                                                                <?php endif; ?>
                                                            </div>
                                                            <?php
                                                            $level_user = session()->get('level_user');
                                                            if ($level_user === 'Manager Platform' && $tiketData['approved_acc_manager'] !== 'Y'): ?>
                                                                <center><button class="btn btn-success btn-approved" style="height:1.5rem; display: flex;" onclick="approveTicket(<?= $tiketData['id_tiket'] ?>,'Manager Platform')">Approve</button></center>
                                                            <?php elseif ($tiketData['approved_acc_manager'] === 'Y'): ?>
                                                                <div class="approved-status">
                                                                    <img src="<?= base_url('/assets/img/icons/approved.png') ?>" style="height: 3.5rem;" alt="Approved" />
                                                                </div>
                                                            <?php else: ?>
                                                                <!-- Ruang Kosong -->
                                                                <div style="height: 1rem; background-color: transparent;"></div>
                                                            <?php endif; ?>
                                                            <p class="text-start mb-0 px-1 text-hitam" style="font-size:x-small;">Suksma</p>
                                                            <p class="text-center text-biru rounded-bottom mb-0 py-1 warna-pink border-atas text-biru" style="font-size:x-small;">Manager</br>Platform Digital</p>
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
                                                        <div class="card h-100 <?= $tiketData['approved_order_admin'] === 'Y' ? 'mb-2' : 'mb-5'; ?> warna-border">
                                                            <div class="card-body p-2 d-flex justify-content-left" id="CurentDate" style="<?= $level_user === 'Admin Sistem' && $tiketData['approved_order_admin'] !== 'Y' ? 'height:1rem;' : 'height:1.5rem;'; ?>">
                                                                <p class="text-start text-biru" style="font-size:xx-small;">Tanggal: </p>
                                                                <?php if (!empty($tiketData['tgl_acc_admin']) && $tiketData['tgl_acc_admin'] !== '0000-00-00' && $tiketData['tgl_acc_admin'] !== '-0001-11-30'): ?>
                                                                    <p class="text-start text-biru" style="font-size:xx-small;">
                                                                        <?= date('d/m/Y', strtotime($tiketData['tgl_acc_admin'])); ?>
                                                                    </p>
                                                                <?php endif; ?>
                                                            </div>
                                                            <?php
                                                            $level_user = session()->get('level_user');
                                                            if ($level_user === 'Admin Sistem' && $tiketData['approved_order_admin'] !== 'Y'): ?>
                                                                <center><button class="btn btn-success btn-approved" style="height:1.5rem; display: flex;" onclick="approveTicket(<?= $tiketData['id_tiket'] ?>,'Admin Sistem')">Approve</button></center>
                                                            <?php elseif ($tiketData['approved_order_admin'] === 'Y'): ?>
                                                                <div class="approved-status">
                                                                    <img src="<?= base_url('/assets/img/icons/approved.png') ?>" style="height: 3.5rem;" alt="Approved" />
                                                                </div>
                                                            <?php else: ?>
                                                                <!-- Ruang Kosong -->
                                                                <div style="height: 1rem; background-color: transparent;"></div>
                                                            <?php endif; ?>
                                                            <p class="text-center mb-0 px-1 text-hitam" style="font-size:x-small;">Andini</p>
                                                            <p class="text-center text-biru rounded-bottom mb-0 warna-pink border-atas text-biru" style="font-size:x-small; padding: 0.728rem 0 0.728rem;">Admin</p>
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

                <div class="container-xxl flex-grow-1" style="padding-bottom: 0.25rem">
                    <!-- Row 3 -->
                    <div class="row justify-content-center my-3">
                        <div class="col-xl-6">
                            <button class="btn btn-primary d-grid w-100" id="btnsimpanPerubahan" onclick="updateForm()">Simpan Perubahan</button>
                            <p id="errorMessage" class="text-danger" style="display:none;"></p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </form>
    <!-- / Content -->

    <!-- Footer -->
    <footer class="content-footer footer bg-footer-theme">
        <div class="container-xxl d-flex flex-wrap justify-content-center py-2 flex-md-row flex-column">
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
    // const dates = document.querySelectorAll('.text-end');
    // const currentDate = new Date();
    // const formattedDate = `${currentDate.getDate()}/${currentDate.getMonth() + 1}/${currentDate.getFullYear()}`;
    // dates.forEach(date => {
    //     date.textContent = formattedDate;
    // });

    // Mencegah perubahan pilihan radio
    $('input[name="inlineRadioOption"]').on('click', function(event) {
        if ($(this).is(':checked')) {
            // Mencegah pengguna untuk mengubah pilihan yang sudah tercentang
            event.preventDefault();
        }
    });

    function approveTicket(id_tiket, approvalType) {
        console.log('ID Tiket:', id_tiket);
        console.log('Approval Type:', approvalType);
        // Panggilan AJAX untuk melakukan approval
        $.ajax({
            url: "<?= base_url('approved') ?>", // URL endpoint untuk approval
            type: "POST",
            data: {
                id_tiket: id_tiket,
                approval_type: approvalType
            },
            success: function(response) {
                console.log(response);
                if (response.status === 'success') {
                    // Jika berhasil, sembunyikan tombol dan tampilkan gambar approved
                    $('#approveButton').hide();
                    $('.approved-status').html('<img src="<?= base_url('/assets/img/icons/approved.png') ?>" style="height: 3.5rem;" alt="Approved" />');
                    location.reload()
                }
            },
            error: function(xhr, status, error) {
                console.error("Error during approval:", error);
            }
        });
    }

    function updateForm() {
        const id_kategori = [];
        $('input[name="id_kategori[]"]:checked').each(function() {
            id_kategori.push($(this).val());
        });
        const kelengkapan = [];
        $('input[name="kelengkapan[]"]:checked').each(function() {
            kelengkapan.push($(this).val());
        });
        const tahap_kelengkapan = [];
        $('input[name="tahap_kelengkapan[]"]:checked').each(function() {
            tahap_kelengkapan.push($(this).val());
        });
        const id_tiket = <?= $tiketData['id_tiket'] ?>;
        $.ajax({
            url: 'http://localhost:8080/updateForm/' + id_tiket,
            method: 'POST',
            dataType: 'json',
            data: {
                id_tiket: id_tiket,
                id_kategori: id_kategori.length ? id_kategori : [''],
                kelengkapan: kelengkapan.length ? kelengkapan : [''],
                tahap_kelengkapan: tahap_kelengkapan.length ? tahap_kelengkapan : [''],
            },
            success: function(response) {
                if (response.status === 'success') {
                    $('#btnsimpanPerubahan').hide();
                    alert('Data berhasil diperbarui.');
                    // Update tampilan sesuai kebutuhan
                    $('#status_message').text(response.message);
                } else {
                    alert('Gagal memperbarui data: ' + response.message);
                }
            },
            error: function(xhr, status, error) {
                console.error(error);
                alert('Terjadi kesalahan saat memperbarui data.');
            }
        });
    }
</script>
<?= $this->endSection(); ?>