<?= $this->extend('template/admin_template'); ?>
<?= $this->section('content'); ?>
<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 mb-4"><span class="text-muted fw-light">Form /</span> Kelola Tiket</h4>

        <!-- Basic Bootstrap Table -->
        <div class="card">
            <h5 class="card-header">List Tiket</h5>
            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Kode Form</th>
                            <th>Kategori</th>
                            <th>User</th>
                            <th>Nomor Job</th>
                            <th>Buku</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0" id="formData">
                    </tbody>
                </table>
            </div>
        </div>
        <!--/ Basic Bootstrap Table -->

    </div>
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
<!-- Content wrapper -->
</div>
<!-- / Layout page -->
</div>

<!-- Overlay -->
<div class="layout-overlay layout-menu-toggle"></div>
</div>
<!-- / Layout wrapper -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        loadData();
    });

    function loadData() {
        $.ajax({
            type: 'GET',
            url: 'http://localhost:8080/listform',
            dataType: 'json',
            success: function(response) {
                var kategoriMap = {};
                var bukuMap = {};
                var userMap = {};

                // Mapping kategori
                $.each(response.kategori, function(key, kategori) {
                    if (kategori.id_kategori && kategori.nama_kategori) {
                        kategoriMap[kategori.id_kategori] = kategori.nama_kategori;
                    }
                });

                // Debugging: Log isi kategoriMap
                // console.log('Kategori Map:', kategoriMap);

                // Mapping buku
                $.each(response.buku, function(key, buku) {
                    if (buku.id_buku && buku.judul_buku) {
                        bukuMap[buku.id_buku] = buku.judul_buku;
                    }
                });

                // Mapping user
                $.each(response.user, function(key, user) {
                    if (user.id_user && user.nama) {
                        userMap[user.id_user] = user.nama;
                    }
                });

                // Generate table
                var formData = '';
                $.each(response.tiket, function(key, value) {
                    // Pastikan id_kategori adalah array
                    if (typeof value.id_kategori === 'string') {
                        // Mengubah string JSON menjadi array jika diperlukan
                        try {
                            value.id_kategori = JSON.parse(value.id_kategori); // Parse JSON string
                        } catch (e) {
                            console.error('Error parsing id_kategori:', e);
                            value.id_kategori = []; // Set default kosong jika parsing gagal
                        }
                    }

                    // Debug: Log id_kategori yang akan dipetakan
                    // console.log('ID Kategori yang akan dipetakan:', value.id_kategori);

                    // Map kategori
                    var kategoriNames = value.id_kategori.map(function(id) {
                        if (kategoriMap[id]) {
                            return kategoriMap[id]; // Jika ID ditemukan, kembalikan nama kategori
                        } else {
                            console.warn('Kategori tidak ditemukan untuk ID:', id); // Log peringatan
                            return 'Unknown Kategori'; // Jika tidak ditemukan, return unknown
                        }
                    }).join(', ');

                    // Ambil judul buku dan nama user
                    var judul_buku = bukuMap[value.id_buku] || 'Unknown Buku';
                    var nama = userMap[value.id_user] || 'Unknown User';

                    // Generate HTML untuk tabel
                    formData += '<tr>';
                    formData += '<td>' + value.kode_form + '</td>';
                    formData += '<td>' + kategoriNames + '</td>';
                    formData += '<td>' + nama + '</td>';
                    formData += '<td>' + value.nomor_job + '</td>';
                    formData += '<td>' + judul_buku + '</td>';
                    formData += '<td>';
                    formData += '<div class="dropdown">';
                    formData += '<button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">';
                    formData += '<i class="bx bx-dots-horizontal-rounded"></i>';
                    formData += '</button>';
                    formData += '<div class="dropdown-menu">';
                    formData += '<a class="dropdown-item dropdown-item-edit" href="javascript:void(0);" data-id_tiket="' + value.id_tiket + '"><i class="bx bx-edit-alt me-2"></i> Edit</a>';
                    formData += '<a class="dropdown-item dropdown-item-delete" style="color: red;" href="javascript:void(0);" data-id_tiket="' + value.id_tiket + '"><i class="bx bx-trash me-2"></i> Delete</a>';
                    formData += '</div>';
                    formData += '</div>';
                    formData += '</td>';
                    formData += '</tr>';
                });

                $('#formData').html(formData);
            },
            error: function(xhr, status, error) {
                console.error('Error fetching List Form:', error);
            }
        });
    }

    // loadData() Lama
    // function loadData() {
    //     $.ajax({
    //         type: 'GET',
    //         url: 'http://localhost:8080/listform',
    //         dataType: 'json',
    //         success: function(data) {
    //             // Call API to get categories, books and user 
    //             $.when(
    //                     $.ajax({
    //                         url: 'http://localhost:8080/kategori',
    //                         dataType: 'json'
    //                     }),
    //                     $.ajax({
    //                         url: 'http://localhost:8080/buku',
    //                         dataType: 'json'
    //                     }),
    //                     $.ajax({
    //                         url: 'http://localhost:8080/user',
    //                         dataType: 'json'
    //                     })
    //                 ).done(function(kategoriResponse, bukuResponse, userResponse) {
    //                     // console.log('Kategori Response:', kategoriResponse);
    //                     // console.log('Buku Response:', bukuResponse);
    //                     // console.log('User Response:', userResponse);
    //                     var kategoriMap = {};
    //                     var bukuMap = {};
    //                     var userMap = {};

    //                     // Access the arrays inside kategoriResponse and bukuResponse using their keys
    //                     var kategoriData = kategoriResponse[0].kategori || []; // Access the 'kategori' array
    //                     var bukuData = bukuResponse[0].buku || []; // Access the 'buku' array
    //                     var userData = userResponse[0].user || []; // Access the 'user' array

    //                     // Map kategori by id
    //                     $.each(kategoriData, function(key, kategori) {
    //                         if (kategori.id_kategori && kategori.nama_kategori) {
    //                             kategoriMap[kategori.id_kategori] = kategori.nama_kategori;
    //                         } else {
    //                             console.log('Kategori missing fields:', kategori);
    //                         }
    //                     });

    //                     // Map buku by id
    //                     $.each(bukuData, function(key, buku) {
    //                         if (buku.id_buku && buku.judul_buku) {
    //                             bukuMap[buku.id_buku] = buku.judul_buku;
    //                         } else {
    //                             console.log('Buku missing fields:', buku);
    //                         }
    //                     });

    //                     // Map user by id
    //                     $.each(userData, function(key, user) {
    //                         if (user.id_user && user.nama) {
    //                             userMap[user.id_user] = user.nama;
    //                         } else {
    //                             console.log('User missing fields:', nama);
    //                         }
    //                     });

    //                     var formData = '';
    //                     $.each(data.tiket, function(key, value) {
    //                         // Parse JSON for id_kategori
    //                         var id_kategori_array = value.id_kategori; // Ambil data id_kategori

    //                         // Pastikan data sudah dalam bentuk array
    //                         if (typeof id_kategori_array === 'string') {
    //                             try {
    //                                 id_kategori_array = JSON.parse(id_kategori_array); // Parse string menjadi array
    //                             } catch (e) {
    //                                 console.error('Error parsing id_kategori_array:', e);
    //                                 id_kategori_array = []; // Set default kosong jika parsing gagal
    //                             }
    //                         }

    //                         var kategori_names = '';
    //                         //Sekarang cek apakah id_kategori_array adalah array
    //                         if (Array.isArray(id_kategori_array)) {
    //                             var kategori_names = id_kategori_array.map(function(id_kategori) {
    //                                 return kategoriMap[id_kategori] || 'Unknown Kategori';
    //                             }).join(', ');
    //                         } else {
    //                             console.error('id_kategori_array is not an array:', id_kategori_array);
    //                             var kategori_names = 'Unknown Kategori';
    //                         }

    //                         // var nama_kategori = kategoriMap[value.id_kategori] || 'Unknown Kategori';
    //                         var judul_buku = bukuMap[value.id_buku] || 'Unknown Buku';
    //                         var nama = userMap[value.id_user] || 'Unknown User';

    //                         // Log the id_kategori and id_buku to check mapping
    //                         console.log('Mapping kategori:', value.id_kategori, '->', kategori_names);
    //                         console.log('Mapping buku:', value.id_buku, '->', judul_buku);
    //                         console.log('Mapping user:', value.id_user, '->', nama);

    //                         formData += '<tr>';
    //                         formData += '<td>' + value.kode_form + '</td>';
    //                         formData += '<td>' + kategori_names + '</td>';
    //                         formData += '<td>' + nama + '</td>';
    //                         formData += '<td>' + value.nomor_job + '</td>';
    //                         formData += '<td>' + judul_buku + '</td>';
    //                         formData += '<td>';
    //                         formData += '<div class="dropdown">';
    //                         formData += '<button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">';
    //                         formData += '<i class="bx bx-dots-horizontal-rounded"></i>';
    //                         formData += '</button>';
    //                         formData += '<div class="dropdown-menu">';
    //                         formData += '<a class="dropdown-item dropdown-item-edit" href="javascript:void(0);" data-id_tiket="' + value.id_tiket + '"><i class="bx bx-edit-alt me-2"></i> Edit</a>';
    //                         formData += '<a class="dropdown-item dropdown-item-delete" style="color: red;" href="javascript:void(0);" data-id_tiket="' + value.id_tiket + '"><i class="bx bx-trash me-2"></i> Delete</a>';
    //                         formData += '</div>';
    //                         formData += '</div>';
    //                         formData += '</td>';
    //                         formData += '</tr>';
    //                     });

    //                     $('#formData').html(formData);
    //                 })
    //                 .fail(function(jqXHR, textStatus, errorThrown) {
    //                     console.error('Error fetching kategori or buku:', textStatus, errorThrown);
    //                     // console.log('Response Text:', jqXHR.responseText); // Lihat respons dari server
    //                 });
    //         },
    //         error: function(xhr, status, error) {
    //             console.error('Error fetching List Form:', error);
    //             alert('Failed to fetch data from API.');
    //         }
    //     });

    // }
</script>
<?= $this->endSection(); ?>