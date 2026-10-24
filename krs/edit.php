<div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Edit KRS</h1>
                     

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Form KRS</h6>
                        </div>

                        <div class="card-body">

                            <div class="table-responsive">

                            <?php
                            include "../db.php";
                            $id=$_GET['id'];
                            $db=new db;

                            $krs=$db->get_KrsById($id);
                            $result=$krs->fetch_array();

                            $mhs=$db->get_allMhs();
                            $jadwal=$db->get_allJadwal();
                            $semester=$db->get_allSemester();
                            ?>
                            <form method="POST" id="formEditKrs">
                                <input type="hidden" name="id" value="<?php echo $result['id']; ?>">

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Mahasiswa</label>
                                    <select class="form-control" name="nim" required>
                                        <option value="">-- pilih mahasiswa --</option>
                                        <?php
                                        while ($m=$mhs->fetch_array()) {
                                        ?>
                                        <option value="<?php echo $m['nim']; ?>" <?php echo ($m['nim']==$result['nim']) ? 'selected' : ''; ?>><?php echo $m['nama']." (".$m['nim'].")"; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>

                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Jadwal</label>
                                    <select class="form-control" name="id_jadwal" required>
                                        <option value="">-- pilih jadwal --</option>
                                        <?php
                                        while ($j=$jadwal->fetch_array()) {
                                        ?>
                                        <option value="<?php echo $j['id']; ?>" <?php echo ($j['id']==$result['id_jadwal']) ? 'selected' : ''; ?>><?php echo $j['nama_matkul']." - ".$j['nama_dosen']." - ".$j['waktu']." - ".$j['ruang']; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>

                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Semester</label>
                                    <select class="form-control" name="kd_semester" required>
                                        <option value="">-- pilih semester --</option>
                                        <?php
                                        while ($s=$semester->fetch_array()) {
                                        ?>
                                        <option value="<?php echo $s['kd_semester']; ?>" <?php echo ($s['kd_semester']==$result['kd_semester']) ? 'selected' : ''; ?>><?php echo $s['semester']; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>

                                </div>

                                <button type="submit" class="btn btn-primary">Simpan</button>
                                 <button type="button" class="btn btn-secondary" onclick="loadKrs()">Batal</button>
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