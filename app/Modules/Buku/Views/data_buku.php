<?= $this->extend('template/admin_template'); ?>
<?= $this->section('content'); ?>
<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 mb-4"><span class="text-muted fw-light">Buku /</span> List Buku</h4>
        <div class="row justify-content-end">
            <!-- <div class="col-xl-8">
            </div> -->
            <div class="col-xl-auto mb-4 justify-conten-end">
                <button class="btn btn-primary d-grid">Tambah Buku</button>
            </div>
        </div>
        <!-- Basic Bootstrap Table -->
        <div class="card">
            <h5 class="card-header">List Buku</h5>
            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Kode Buku</th>
                            <th>Judul Buku</th>
                            <th>Pengarang</th>
                            <th>Target Terbit</th>
                            <th>Warna</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0" id="bukuData">
                    </tbody>
                </table>
            </div>
        </div>
        <!--/ Basic Bootstrap Table -->
        <!-- Edit Modal -->
        <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="editForm" action="javascript:void(0);" method="post">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel">Edit Buku</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="kode_buku" class="form-label">kode Buku</label>
                            <input type="text" class="form-control" name="kode_buku" required>
                        </div>
                        <div class="mb-3">
                            <label for="judul_buku" class="form-label">Judul Buku</label>
                            <input type="text" class="form-control" name="judul_buku" required>
                        </div>
                        <div class="mb-3">
                            <label for="pengarang" class="form-label">Pengarang</label>
                            <input type="text" class="form-control" name="pengarang" required>
                        </div>
                        <div class="mb-3">
                            <label for="target_terbit" class="form-label">Target Terbit</label>
                            <input type="date" class="form-control" name="target_terbit" required>
                        </div>
                        <div class="mb-3">
                            <label for="warna" class="form-label">Warna</label>
                            <input type="text" class="form-control" name="warna" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function(){
        // Fetch and display the data in the table (as you already have)
        $.ajax({
            url: '<?= base_url('buku') ?>',
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                var bukuData = '';
                
                $.each(data.buku, function(index, value) {
                    bukuData += '<tr>';
                    bukuData += '<td>' + value.kode_buku + '</td>';
                    bukuData += '<td>' + value.judul_buku + '</td>';
                    bukuData += '<td>' + value.pengarang + '</td>';
                    bukuData += '<td>' + value.target_terbit + '</td>';
                    bukuData += '<td>' + value.warna + '</td>';
                    bukuData += '<td>';
                    bukuData += '<a href="#" class="btn btn-info btn-sm btn-edit" data-id="' + value.id_buku + '">Edit</a> ';
                    bukuData += '<a href="#" class="btn btn-danger btn-sm btn-delete" data-id="' + value.id_buku + '">Delete</a>';
                    bukuData += '</td>';
                    bukuData += '</tr>';
                });
                
                $('#bukuData').html(bukuData);
            },
            error: function(xhr, status, error) {
                console.log(error);
            }
        });
        function loadBuku() {
            $.ajax({
                url: '<?= base_url('buku') ?>',
                type: 'GET',
                success: function(response) {
                    // Update the employee data here
                    // For example, you can update a table or a list with the new data
                    $('data_buku').html(response);
                }
            });
        }
        // Click event to open edit modal and populate the fields
        $(document).on('click', '.btn-edit', function(e) {
            e.preventDefault();
            
            // Get the book ID from the data-id attribute
            var id = $(this).data('id_buku');

            // Fetch the book data using the id
            $.ajax({
                url: '<?= base_url('buku') ?>/' + id,  // Endpoint untuk mendapatkan data pegawai
                type: 'GET',
                dataType: 'json',
                success: function(response) {
                    console.log(response); // Inspect the response object
                    if (response && response.data_buku) {
                        // Isi form modal dengan data pegawai
                        $('#kode_buku').val(response.data_buku.kode_buku);
                        $('#judul_buku').val(response.data_buku.judul_buku);
                        $('#pengarang').val(response.data_buku.pengarang);
                        $('#target_terbit').val(response.data_buku.target_terbit);
                        $('#warna').val(response.data_buku.warna);
                    } else {
                        console.error('Response is invalid:', response);
                    }
                    
                    // Tampilkan modal
                    $('#editModal').modal('show');
                }
            });
        });

        // Submitting the edited data
        $('#editForm').on('submit', function(e) {
            e.preventDefault();

            var formData = $(this).serialize();  // Get the form data
            
            $.ajax({
                url: '<?= base_url('buku') ?>',  // Change this to your update URL
                type: 'POST',
                data: formData,
                success: function(response) {
                    alert('Data updated successfully!');

                    // Reload or refresh the table
                    location.reload(); // You can use location.reload() or fetch the table data again
                },
                error: function(xhr, status, error) {
                    console.log(error);
                }
            });
        });
    });


</script>
<!-- / Layout wrapper -->
<?= $this->endSection(); ?>