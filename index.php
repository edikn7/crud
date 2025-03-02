<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <title>Data Siswa</title>
</head>

<body>

    <div class="container" style="margin-top: 80px">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        DATA SISWA
                    </div>
                    <div class="card-body">
                        <a href="tambah-siswa.php" class="btn btn-md btn-success" style="margin-bottom: 10px">TAMBAH
                            DATA</a>
                        <table class="table table-bordered" id="myTable">
                            <thead>
                                <tr class="text-center">
                                    <th scope="col">NO.</th>
                                    <th scope="col">NISN</th>
                                    <th scope="col">NAMA LENGKAP</th>
                                    <th scope="col">ALAMAT</th>
                                    <th scope="col">AKSI</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                include 'koneksi.php';
                $no = 1;
                $query = mysqli_query($connection, "SELECT * FROM tbl_siswa");
                while ($row = mysqli_fetch_array($query)) {
                  ?>

                                <tr>
                                    <td><?php echo $no++ ?></td>
                                    <td><?php echo $row['nisn'] ?></td>
                                    <td><?php echo $row['nama_lengkap'] ?></td>
                                    <td><?php echo $row['alamat'] ?></td>
                                    <td class="text-center">
                                        <a href="edit-siswa.php?id=<?php echo $row['id_siswa'] ?>"
                                            class="btn btn-sm btn-primary">EDIT</a>
                                        <a href="hapus-siswa.php?id=<?php echo $row['id_siswa'] ?>"
                                            class="btn btn-sm btn-danger" data-toggle="modal"
                                            data-target="#hapusModal">HAPUS</a>
                                        <!-- Modal Konfirmasi Hapus -->
                                        <div class="modal fade" id="hapusModal" tabindex="-1" role="dialog"
                                            aria-labelledby="hapusModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="hapusModalLabel">Konfirmasi Hapus
                                                        </h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Apakah Anda yakin ingin menghapus item ini?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Batal</button>
                                                        <button type="button" class="btn btn-danger"
                                                            id="confirmHapusBtn">Hapus</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>

                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
        <script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
        <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
        </script>

        <script>
        // Menangani aksi ketika tombol Hapus di modal diklik
        document.getElementById('confirmHapusBtn').addEventListener('click', function() {
            alert('Item berhasil dihapus!'); // Tindakan hapus
            $('#hapusModal').modal('hide'); // Menyembunyikan modal setelah konfirmasi
        });
        </script>


</body>

</html>