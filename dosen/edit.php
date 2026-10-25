<?php
$login_url = '../login.php';
require_once "../auth.php";
?>
<div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Edit Dosen</h1>
                     

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Form Dosen</h6>
                        </div>

                        <div class="card-body">

                            <div class="table-responsive">

                            <?php
                            include "../db.php";
                            $kd_dosen=$_GET['kd_dosen'];
                            $db=new db;

                            $dosen=$db->get_DosenByKd($kd_dosen);
                            $result=$dosen->fetch_array();
                            ?>
                            <form method="POST" id="formEditDosen">
                                <input type="hidden" name="kd_dosen" value="<?php echo htmlspecialchars($result['kd_dosen']); ?>">

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nama</label>
                                    <input type="text" class="form-control" name="nama" value="<?php echo htmlspecialchars($result['nama']); ?>">

                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Alamat</label>
                                    <input type="text" class="form-control" name="alamat" value="<?php echo htmlspecialchars($result['alamat']); ?>">

                                </div>

                                <button type="submit" class="btn btn-primary">Simpan</button>
                                 <button type="button" class="btn btn-secondary" onclick="loadDosen()">Batal</button>
                                </form>

                            </div>
                        </div>
                    </div>

                </div>

                 <!-- Page level plugins -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/js/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="data:text/javascript;base64,JChkb2N1bWVudCkucmVhZHkoZnVuY3Rpb24oKSB7ICQoIiNkYXRhVGFibGUiKS5EYXRhVGFibGUoKTsgfSk7"></script>