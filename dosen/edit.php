<div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Edit Dosen</h1>
                    <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
                        For more information about DataTables, please visit the <a target="_blank"
                            href="https://datatables.net">official DataTables documentation</a>.</p>

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
                                <input type="hidden" name="kd_dosen_lama" value="<?php echo $result['kd_dosen']; ?>">

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Kode Dosen</label>
                                    <input type="number" class="form-control" name="kd_dosen" value="<?php echo $result['kd_dosen']; ?>">

                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nama</label>
                                    <input type="text" class="form-control" name="nama" value="<?php echo $result['nama']; ?>">

                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Alamat</label>
                                    <input type="text" class="form-control" name="alamat" value="<?php echo $result['alamat']; ?>">

                                </div>

                                <button type="submit" class="btn btn-primary" >Simpan</button>
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