<?php
$login_url = '../login.php';
require_once "../auth.php";
?>
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Tambah Jadwal</h1>


    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Form Jadwal</h6>
        </div>

        <div class="card-body">


            <div class="table-responsive">
                <?php
                include "../db.php";
                $db = new db;
                $dosen = $db->get_allDosen();
                $matkul = $db->get_allMatkul();
                ?>
                <form method="POST" id="formJadwal">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Dosen</label>
                        <select class="form-control" name="kd_dosen" required>
                            <option value="">-- pilih dosen --</option>
                            <?php
                            while ($d = $dosen->fetch_array()) {
                                ?>
                                <option value="<?php echo htmlspecialchars($d['kd_dosen']); ?>"><?php echo htmlspecialchars($d['nama']); ?></option>
                                <?php
                            }
                            ?>
                        </select>

                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Mata Kuliah</label>
                        <select class="form-control" name="kd_matkul" required>
                            <option value="">-- pilih mata kuliah --</option>
                            <?php
                            while ($m = $matkul->fetch_array()) {
                                ?>
                                <option value="<?php echo htmlspecialchars($m['kd_matkul']); ?>"><?php echo htmlspecialchars($m['nama']); ?></option>
                                <?php
                            }
                            ?>
                        </select>

                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Waktu</label>
                        <input type="text" class="form-control" name="waktu" placeholder="19.00-20.00 WIB" required>

                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Ruang</label>
                        <input type="text" class="form-control" name="ruang" placeholder="V. 601" required>

                    </div>

                    <button type="submit" class="btn btn-primary" id="simpanJadwal">Simpan</button>
                    <button type="button" class="btn btn-secondary" onclick="loadJadwal()">Batal</button>
                </form>

            </div>
        </div>
    </div>

</div>

<!-- Page level plugins -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/js/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script
    src="data:text/javascript;base64,JChkb2N1bWVudCkucmVhZHkoZnVuY3Rpb24oKSB7ICQoIiNkYXRhVGFibGUiKS5EYXRhVGFibGUoKTsgfSk7"></script>