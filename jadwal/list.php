<div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Jadwal</h1>
                     

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Jadwal</h6>
                        </div>

                        <div class="card-body">
                        <button class="btn btn-info btn-user" id="addJadwal" style="margin-bottom: 30px;">Tambah</button>
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Dosen</th>
                                            <th>Mata Kuliah</th>
                                            <th>Waktu</th>
                                            <th>Ruang</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                        <th>No</th>
                                            <th>Dosen</th>
                                            <th>Mata Kuliah</th>
                                            <th>Waktu</th>
                                            <th>Ruang</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>

                                    <?php
   include "../db.php";
   $db=new db;
   $jadwal=$db->get_allJadwal();
   $no=1;

   while ($result=$jadwal->fetch_array()) {
     ?>
            <tr>
                <td>
                    <?php echo $no++; ?>
                </td>
                <td>
                    <?php echo $result['nama_dosen']; ?>
                </td>
                <td>
                    <?php echo $result['nama_matkul']; ?>
                </td>
                <td>
                    <?php echo $result['waktu']; ?>
                </td>
                <td>
                    <?php echo $result['ruang']; ?>
                </td>

                <td>
                    <button class="btn btn-success btn-user" id="editJadwal" value="<?php echo $result['id']; ?>">Edit</button>
                    <button class="btn btn-danger btn-user" id="deleteJadwal" value="<?php echo $result['id']; ?>">Delete</button>
                </td>
            </tr>
            <?php
}

  ?>



                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>

                 <!-- Page level plugins -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/js/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="data:text/javascript;base64,JChkb2N1bWVudCkucmVhZHkoZnVuY3Rpb24oKSB7ICQoIiNkYXRhVGFibGUiKS5EYXRhVGFibGUoKTsgfSk7"></script>
    <script>
        $(document).ready(function(){

            $("#addJadwal").click(function(){
                $.ajax({
                    url: 'jadwal/add.php',
                    type: 'get',
                    success: function(data) {
                        $('#contentData').html(data);
                    }
                });

            });

        });
        </script>