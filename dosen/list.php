<?php
$login_url = '../login.php';
require_once "../auth.php";
?>
<div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Dosen</h1>
                     

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Dosen</h6>
                        </div>

                        <div class="card-body">
                        <button class="btn btn-info btn-user" id="addDosen" style="margin-bottom: 30px;">Tambah</button>
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Kode Dosen</th>
                                            <th>Nama</th>
                                            <th>Alamat</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                        <th>No</th>
                                            <th>Kode Dosen</th>
                                            <th>Nama</th>
                                            <th>Alamat</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>

                                    <?php
   include "../db.php";
   $db=new db;
   $dosen=$db->get_allDosen();
   $no=1;

   while ($result=$dosen->fetch_array()) {
     ?>
            <tr>
                <td>
                    <?php echo $no++; ?>
                </td>
                <td>
                    <?php echo htmlspecialchars($result['kd_dosen']); ?>
                </td>
                <td>
                    <?php echo htmlspecialchars($result['nama']); ?>
                </td>
                <td>
                    <?php echo htmlspecialchars($result['alamat']); ?>
                </td>

                <td>
                    <button class="btn btn-success btn-user" id="editDosen" value="<?php echo htmlspecialchars($result['kd_dosen']); ?>">Edit</button>
                    <button class="btn btn-danger btn-user" id="deleteDosen" value="<?php echo htmlspecialchars($result['kd_dosen']); ?>">Delete</button>
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

            $("#addDosen").click(function(){
                $.ajax({
                    url: 'dosen/add.php',
                    type: 'get',
                    success: function(data) {
                        $('#contentData').html(data);
                    }
                });

            });

        });
        </script>