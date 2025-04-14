<!DOCTYPE html>
<html lang="en">
    <head>
        <?php $this->load->view("admin/_partials/head.php") ?>
        <link href="https://cdn.datatables.net/2.0.5/css/dataTables.dataTables.min.css" rel="stylesheet">
        <style>
            #datatablesSimple td, #datatablesSimple th {
                text-align: left !important;
            }
            html, body {
                height: 95%; /* atau bisa juga height: 100vh; */
            }
            .bg-gray {
                background-color: #e9ecef;
                pointer-events: none; /* Menghilangkan interaksi seperti klik */
                opacity: 1; /* Opsional: Menambahkan efek transparansi untuk visual */
            }
        </style>
    </head>
    <body class="sb-nav-fixed">
        <?php $this->load->view("admin/_partials/navbar.php") ?>
        <div id="layoutSidenav">
            <?php $this->load->view("admin/_partials/sidebar.php") ?>
            <div id="layoutSidenav_content">

                <!-- main page here -->
                <main>
                    <div class="container mt-5">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Purchase Requests Form</h3>
                            </div>
                            <div class="card-body">
                                <form id="PurchaseRequestForm" method="post">
                                    <div class="row" id="pr-id-row">
                                        <div class="col-md-2">
                                            <div class="mb-3">
                                                <label for="pr-id" class="form-label">Purchase Request ID</label>
                                                <input type="text" class="form-control bg-gray" id="pr-id" name="pr-id" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="mb-3">
                                                <label for="dropdown-status" class="form-label">Status</label>
                                                <select class="form-select" id="status" name="status">
                                                    <option value="" selected>Pilih Status</option>
                                                    <option value="draft">draft</option>
                                                    <option value="submitted">submitted</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="status-note" class="form-label">Status Note</label>
                                                <textarea class="form-control bg-gray" id="status-note" name="status-note" readonly></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="items-container">
                                        <div class="row original-row">
                                            <input type="hidden" id="item-id-0" name="items[0][id]">
                                            <div class="col-md-3">
                                                <div class="mb-3">
                                                    <label for="item-name" class="form-label">Item Name</label>
                                                    <input type="text" class="form-control" id="item-name-0" name="items[0][name]">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="mb-3">
                                                    <label for="item-desc" class="form-label">Item Description</label>
                                                    <input type="text" class="form-control" id="item-desc-0" name="items[0][desc]">
                                                </div>
                                            </div>
                                            <div class="col-md-1">
                                                <div class="mb-3">
                                                    <label for="item-qty" class="form-label">Qty</label>
                                                    <input type="text" class="form-control" id="item-qty-0" name="items[0][qty]">
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="mb-3">
                                                    <label for="dropdown" class="form-label">Unit</label>
                                                    <select class="form-select" id="item-unit-0" name="items[0][unit]">
                                                        <option value="" selected>Pilih Unit</option>
                                                        <option value="pcs">Pcs</option>
                                                        <option value="pack">Pack</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-2 d-flex align-items-end add-btn-wrapper">
                                                <div class="mb-3 w-50">
                                                    <button id="addInputBtn" class="btn btn-primary btn-sm w-100">Add Item</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary me-2">Submit</button>
                                        <button type="reset" class="btn btn-secondary">Reset</button>
                                    </div>
                                    <br>
                                    <br>
                                </form>
                                <table id="datatablesSimple" class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Purchase Request ID</th>
                                            <th>Status</th>
                                            <th>Request Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>
                <!--end of main page here -->

                <?php $this->load->view("admin/_partials/footer.php") ?>
            </div>

            <!-- Modal untuk Pesan -->
            <div class="modal fade" id="infoModal" tabindex="-1" aria-labelledby="infoModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="infoModalLabel">Notification System</h5>
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Pesan akan dimuat di sini -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
                </div>
            </div>
            </div>

            <!-- Modal untuk Konfirmasi Penghapusan -->
            <div class="modal fade" id="deleteConfirmModal" tabindex="-1" aria-labelledby="deleteConfirmModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteConfirmModalLabel">Delete Confirmation</h5>
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Are you sure want to delete this data ?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-danger" id="deleteConfirmBtn">Delete</button>
                </div>
                </div>
            </div>
            </div>

            <!-- Modal Loading -->
            <div class="modal fade" id="loadingModal" tabindex="-1" aria-labelledby="loadingModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                <div class="modal-body text-center">
                    <div class="spinner-border text-primary" role="status">
                    <span class="sr-only">Loading...</span>
                    </div>
                    <h5 class="mt-2">Loading...</h5>
                </div>
                </div>
            </div>
            </div>
        </div>
        <script src="https://unpkg.com/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="<?php echo base_url('js/scripts.js') ?>"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdn.datatables.net/2.0.5/js/dataTables.min.js"></script>
        <script>
            $(document).ready(function() {
                //Function yang dipanggil akan terload saat awal page
                loadDataTable();
                
                // Array untuk menyimpan ID yang sudah di-generate
                let generatedIds = [];

                //add random PR ID
                //const newId = getUniqueRandomId();  // Dapatkan ID acak yang unik
                //document.getElementById('pr-id').value = newId;  // Set ID ke input

                // untuk click add item
                let itemCounter = 1;
                const addButton = document.getElementById("addInputBtn");
                const itemsContainer = document.getElementById("items-container");
                const originalRow = document.querySelector(".original-row");
                addButton.addEventListener("click", function (event) {
                    event.preventDefault();

                    if (!originalRow) {
                        console.error("Original row tidak ditemukan. Pastikan ada class 'original-row'.");
                        return;
                    }

                    const newRow = originalRow.cloneNode(true);

                    // Menghapus elemen label agar tidak ikut ter-clone
                    newRow.querySelectorAll("label").forEach(label => label.remove());

                    // Update setiap input dan select di dalam row baru
                    newRow.querySelectorAll("input, select").forEach(el => {
                        const originalId = el.getAttribute("id");
                        if (originalId) {
                            const field = originalId.replace("item-", "").replace("-0", ""); // item-name => name
                            const newId = `item-${field}-${itemCounter}`;
                            const newName = `items[${itemCounter}][${field}]`;

                            el.setAttribute("id", newId);
                            el.setAttribute("name", newName);
                            el.value = "";
                        }
                    });

                    // Menambahkan input hidden baru untuk id
                    const hiddenInput = newRow.querySelector("input[type='hidden']");
                    if (hiddenInput) {
                        hiddenInput.setAttribute("id", `item-id-${itemCounter}`);
                        hiddenInput.setAttribute("name", `items[${itemCounter}][id]`);
                        hiddenInput.value = ""; // Set to empty value or some default ID value if needed
                    }

                    const btnWrapper = newRow.querySelector(".add-btn-wrapper");
                    if (btnWrapper) {
                        btnWrapper.innerHTML = ''; // Bersihkan isi sebelumnya

                        // Buat tombol close
                        const closeBtn = document.createElement("button");
                        closeBtn.classList.add("btn", "btn-danger", "btn-sm", "w-20", "d-flex", "align-items-center", "justify-content-center", "mb-3");
                        closeBtn.textContent = "X";
                        closeBtn.addEventListener("click", function () {
                            newRow.remove();
                        });

                        // Tambahkan tombol close ke dalam wrapper
                        btnWrapper.appendChild(closeBtn);
                    }

                    itemsContainer.appendChild(newRow);
                    itemCounter++;
                });

                // Fungsi untuk menghasilkan angka acak antara 10 hingga 1.000.000
                function generateRandomId() {
                    const min = 10; // Angka minimum
                    const max = 1000000; // Angka maksimum

                    // Generate angka acak dalam rentang [10, 1000000]
                    return Math.floor(Math.random() * (max - min + 1)) + min;
                }

                // Fungsi untuk memastikan ID yang dihasilkan unik
                function getUniqueRandomId() {
                    let newId = generateRandomId();

                    // Cek apakah ID sudah ada dalam array generatedIds
                    while (generatedIds.includes(newId)) {
                        newId = generateRandomId();  // Jika ada, generate ulang
                    }

                    // Simpan ID yang baru dihasilkan dalam array
                    generatedIds.push(newId);

                    return newId;
                }

                //list function yang bisa digunakan
                function updateTable(dataList) {
                    if (dataList.length === 0) {
                        tbody.append('<tr><td colspan="4">Tidak ada data yang ditemukan</td></tr>');
                        return;
                    }

                    $('#datatablesSimple').DataTable().destroy();

                    var tbody = $('#datatablesSimple tbody');
                    tbody.empty(); // Bersihkan isi tabel saat ini

                    $.each(dataList, function(index, data) {
                        var row = '<tr>' +
                                '<td>' + data.pr_id + '</td>' +
                                '<td>' + data.status + '</td>' +
                                '<td>' + data.request_date + '</td>' +
                                '<td> <button type="button" class="btn btn-primary btn-sm me-2 editBtn" data-id="' + data.pr_id + '">Edit</button> <button type="button" class="btn btn-danger btn-sm me-2 deleteBtn" data-id="' + data.pr_id + '">X</button> </td>' +
                                '</tr>';
                        tbody.append(row);
                    });

                    $('#datatablesSimple').DataTable({
                        order: [[0, 'desc']] // ⬅️ kolom ke-0 (pr_id), descending
                    });
                }

                function loadDataTable() {
                    let table = new DataTable('#datatablesSimple');
                    $.ajax({
                        url: '<?php echo site_url('admin/PurchaseRequests/get_list_by_user_id'); ?>',
                        type: 'GET',
                        dataType: 'json',
                        success: function(dataList) {
                            updateTable(dataList)
                        },
                        error: function(jqXHR, textStatus, errorThrown) {
                            console.log('Error loading kegiatans: ' + textStatus);
                        }
                    });
                }

                // simpan data
                $('#PurchaseRequestForm').submit(function(e) {
                    e.preventDefault(); // Menghentikan pengiriman formulir standar
                    // Tampilkan modal loading
                    $('#loadingModal').modal('show');

                    e.preventDefault(); // Menghentikan pengiriman formulir standar

                    var formData = $(this).serialize(); // Mengambil data dari formulir
                    //console.log(formData); // Cek data yang diserahkan melalui AJAX

                    $.ajax({
                        type: 'POST',
                        url: '<?php echo site_url('admin/PurchaseRequests/submit'); ?>', // URL untuk pengiriman AJAX
                        data: formData,
                        dataType: 'json',
                        success: function(response) {
                            $('#infoModal .modal-body').html(response.message); // Set isi modal dengan pesan sukses
                            $('#infoModal').modal('show'); // Tampilkan modal info

                            // Opsional: reload halaman atau hapus baris setelah modal info ditutup
                            $('#infoModal').on('hidden.bs.modal', function (e) {
                                location.reload();
                            });
                        },
                        error: function(jqXHR, textStatus, errorThrown) {
                            var error = jqXHR.responseJSON && jqXHR.responseJSON.error ? jqXHR.responseJSON.error : 'An error occurred';
                            $('#infoModal .modal-body').html('Error: ' + error); // Set isi modal dengan pesan error
                            $('#infoModal').modal('show'); // Tampilkan modal info
                        }
                    }).always(function() {
                        setTimeout(function() {
                            $('#loadingModal').modal('hide');
                        }, 500); // Tunggu setengah detik
                    });
                });

                $(document).on('click', '.deleteBtn', function() {
                    var programId = $(this).data('id'); // mengambil ID dari data-id attribute
                    deleteProgram(programId);       // fungsi untuk mengambil data
                });

                function deleteProgram(id) {
                    // Simpan id di tempat yang bisa diakses oleh tombol konfirmasi hapus
                    $('#deleteConfirmBtn').data('id', id);
                    $('#deleteConfirmModal').modal('show');
                }

                    // Tangani ketika tombol konfirmasi hapus diklik
                $('#deleteConfirmBtn').on('click', function() {
                    $('#deleteConfirmModal').modal('hide');
                    // Tampilkan modal loading
                    $('#loadingModal').modal('show');
                    
                    var id = $(this).data('id');  // Ambil id yang telah disimpan
                        $.ajax({
                        url: '<?php echo site_url('admin/PurchaseRequests/delete'); ?>',
                        type: 'POST',
                        data: {id: id},
                        dataType: 'json',
                        success: function(response) {
                            $('#infoModal .modal-body').html(response.message); // Set isi modal dengan pesan sukses
                            $('#infoModal').modal('show'); // Tampilkan modal info
                            
                            $('#deleteConfirmModal').modal('hide'); // Sembunyikan modal konfirmasi

                            // Opsional: reload halaman atau hapus baris setelah modal info ditutup
                            $('#infoModal').on('hidden.bs.modal', function (e) {
                                location.reload();
                            });
                        },
                        error: function(xhr) {
                            var error = xhr.responseJSON && xhr.responseJSON.error ? xhr.responseJSON.error : 'An error occurred';
                            $('#infoModal .modal-body').html('Error: ' + error); // Set isi modal dengan pesan error
                            $('#infoModal').modal('show'); // Tampilkan modal info
                            $('#deleteConfirmModal').modal('hide'); // Sembunyikan modal konfirmasi
                        }
                    }).always(function() {
                        setTimeout(function() {
                            $('#loadingModal').modal('hide');
                        }, 500); // Tunggu setengah detik
                    });
                });

                $(document).on('click', '.editBtn', function() {
                    var id = $(this).data('id'); // mengambil ID dari data-id attribute
                    fetchData(id);       // fungsi untuk mengambil data
                });

                function fetchData(id) {
                    $('#loadingModal').modal('show');

                    $.ajax({
                        url: '<?php echo site_url('admin/PurchaseRequests/get_by_id'); ?>',
                        type: 'POST',
                        data: { id: id },
                        dataType: 'json',
                        success: function(dataLists) {
                            if (Array.isArray(dataLists.items)) {
                                //console.log(dataLists);
                                initReset(); // Hapus semua input kecuali original (index 0)
                                populateItems(dataLists.items);
                            }

                            $('#status').val(dataLists.status);
                            $('#status-note').val(dataLists.status_note);

                            // Tambahkan logic readonly jika status == 'approved'
                            const isApproved = dataLists.status === 'approved';
                            console.log(dataLists.status);
                            if (isApproved) {
                                const statusSelect = $('#status');
                                const statusValue = dataLists.status;
                                if (statusSelect.find(`option[value="${statusValue}"]`).length === 0) {
                                    statusSelect.append(`<option value="${statusValue}">${statusValue}</option>`);
                                }
                                statusSelect.val(statusValue);

                                // Disable all input and select elements using jQuery
                                $('#itemsContainer input, #itemsContainer select').prop('disabled', true).addClass('bg-gray');

                                // Sembunyikan tombol close dan tombol addInputBtn untuk semua row
                                $('#itemsContainer .add-btn-wrapper button').hide();  // Sembunyikan tombol close di semua row
                                $('#addInputBtn').hide();  // Sembunyikan tombol addInputBtn jika ada

                                // Jika tombol close di dalam setiap row di-add melalui cloning, pastikan mereka tersembunyi juga
                                itemsContainer.querySelectorAll(".add-btn-wrapper button").forEach(btn => {
                                    btn.style.display = "none"; // Sembunyikan tombol close di setiap row
                                });
                            }

                        },
                        error: function() {
                            alert('Error fetching data.');
                        }
                    }).always(function() {
                        setTimeout(function() {
                            $('#loadingModal').modal('hide');
                        }, 500);
                    });
                }

                const fieldMap = {
                    desc: 'item_description',
                    qty: 'quantity',
                    unit: 'unit',
                    name: 'item_name'
                    // tambahkan sesuai kebutuhan
                };

                function populateItems(dataLists) {
                    dataLists.forEach((data, index) => {
                        if (index === 0) {
                            // Isi original row
                            const originalInputs = originalRow.querySelectorAll("input, select");
                            originalInputs.forEach(el => {
                                const field = el.getAttribute("id")?.replace("item-", "").replace("-0", "");
                                //console.log(field);
                                const dataKey = fieldMap[field] || field; // pakai mapping kalau ada

                                if (dataKey && data[dataKey] !== undefined) {
                                    el.value = data[dataKey];
                                }
                            });

                            // Isi input #pr-id jika ada di data
                            if (data['pr_id'] !== undefined) {
                                const prInput = document.getElementById("pr-id");
                                if (prInput) {
                                    prInput.value = data['pr_id'];
                                }
                            }

                            // Set the hidden input for the first row
                            const hiddenInput = originalRow.querySelector("input[type='hidden']");
                            if (hiddenInput) {
                                hiddenInput.setAttribute("id", `item-id-0`);
                                hiddenInput.setAttribute("name", `items[0][id]`);
                                hiddenInput.value = data['pr_item_id'] || ''; // Set value if available in data
                            }
                        } else {
                            cloneAndFillItem(data);
                        }
                    });
                }

                function cloneAndFillItem(data) {
                    const newRow = originalRow.cloneNode(true);

                    newRow.querySelectorAll("label").forEach(label => label.remove());

                    newRow.querySelectorAll("input, select").forEach(el => {
                        const originalId = el.getAttribute("id");
                        if (originalId) {
                            const field = originalId.replace("item-", "").replace("-0", "");
                            //console.log(field);
                            const newId = `item-${field}-${itemCounter}`;
                            const newName = `items[${itemCounter}][${field}]`;

                            el.setAttribute("id", newId);
                            el.setAttribute("name", newName);

                            // Gunakan mapping untuk ambil value dari data
                            const dataKey = fieldMap[field] || field;
                            el.value = data[dataKey] !== undefined ? data[dataKey] : "";
                        }
                    });

                    // Mengatur input hidden pada row yang di-clone
                    const hiddenInput = newRow.querySelector("input[type='hidden']");
                    if (hiddenInput) {
                        hiddenInput.setAttribute("id", `item-id-${itemCounter}`);
                        hiddenInput.setAttribute("name", `items[${itemCounter}][id]`);
                        hiddenInput.value = data['pr_item_id'] || ''; // Set value jika tersedia di data
                    }

                    const btnWrapper = newRow.querySelector(".add-btn-wrapper");
                    if (btnWrapper) {
                        btnWrapper.innerHTML = '';

                        const closeBtn = document.createElement("button");
                        closeBtn.classList.add("btn", "btn-danger", "btn-sm", "w-20", "d-flex", "align-items-center", "justify-content-center", "mb-3");
                        closeBtn.textContent = "X";
                        closeBtn.addEventListener("click", function () {
                            newRow.remove();
                        });

                        btnWrapper.appendChild(closeBtn);
                    }

                    itemsContainer.appendChild(newRow);
                    itemCounter++;
                }

                function initReset() {
                    const allRows = itemsContainer.querySelectorAll(".row");

                    allRows.forEach(row => {
                        const sampleInput = row.querySelector("input, select");
                        if (sampleInput) {
                            const id = sampleInput.getAttribute("id");
                            const match = id && id.match(/-(\d+)$/);
                            if (match && match[1] !== "0") {
                                row.remove(); // Hapus baris dengan index selain 0
                            } else {
                                // Kosongkan isi input/select
                                row.querySelectorAll("input, select").forEach(el => {
                                    el.value = "";
                                });

                                // Reset input hidden
                                const hiddenInput = row.querySelector("input[type='hidden']");
                                if (hiddenInput) {
                                    hiddenInput.setAttribute("id", `item-id-0`);
                                    hiddenInput.setAttribute("name", `items[0][id]`);
                                    hiddenInput.value = ""; // Kosongkan nilai dari hidden input
                                }
                            }
                        }
                    });

                    // Reset itemCounter ke 1
                    itemCounter = 1;
                }

                // Panggil fungsi hapusDiv saat tombol reset diklik
                document.querySelector("button[type='reset']").addEventListener("click", initReset);
            });
        </script>
    </body>
</html>