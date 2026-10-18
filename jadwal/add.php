<div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Tambah Jadwal</h1>
                    <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
                        For more information about DataTables, please visit the <a target="_blank"
                            href="https://datatables.net">official DataTables documentation</a>.</p>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Form Jadwal</h6>
                        </div>

                        <div class="card-body">


                            <div class="table-responsive">
                            <?php
                            include "../db.php";
                            $db=new db;
                            $dosen=$db->get_allDosen();
                            $matkul=$db->get_allMatkul();
                            ?>
                            <form method="POST" id="formJadwal">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Dosen</label>
                                    <select class="form-control" name="kd_dosen" required>
                                        <option value="">-- pilih dosen --</option>
                                        <?php
                                        while ($d=$dosen->fetch_array()) {
                                        ?>
                                        <option value="<?php echo $d['kd_dosen']; ?>"><?php echo $d['nama']; ?></option>
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
                                        while ($m=$matkul->fetch_array()) {
                                        ?>
                                        <option value="<?php echo $m['kd_matkul']; ?>"><?php echo $m['nama']; ?></option>
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
                                </form>

                            </div>
                        </div>
                    </div>

                </div>

                 <!-- Page level plugins -->
    <script src="asset/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="asset/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="asset/js/demo/datatables-demo.js"></script>