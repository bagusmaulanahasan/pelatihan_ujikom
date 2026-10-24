<div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Mahasiswa</h1>
                     

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Mahasiswa</h6>
                        </div>
                        
                        <div class="card-body">
                        <button class="btn btn-info btn-user" id="addMhs" style="margin-bottom: 30px;">Tambah</button>
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>NIM</th>
                                            <th>Nama</th>
                                            <th>Alamat</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                        <th>No</th>
                                            <th>NIM</th>
                                            <th>Nama</th>
                                            <th>Alamat</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>

                                    <?php
   include "../db.php";
   $db=new db;
   $mhs=$db->get_allMhs();
   $no=1;
   
   while ($result=$mhs->fetch_array()) {
    ?>
            <tr>
                <td>
                    <?php echo $no++; ?>
                </td>
                <td>
                    <?php echo $result['nim']; ?>
                </td>
                <td>
                    <?php echo $result['nama']; ?>
                </td>
                <td>
                    <?php echo $result['alamat']; ?>
                </td>
               
                <td>
                    <button class="btn btn-success btn-user" id="editMhs" value="<?php echo $result['nim']; ?>">Edit</button>
                    <button class="btn btn-danger btn-user" id="deleteMhs" value="<?php echo $result['nim']; ?>">Delete</button>
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
    <script>
        $(document).ready(function() {
          $('#dataTable').DataTable();
        });
    </script>
    <script>
        $(document).ready(function(){  

            $("#addMhs").click(function(){
                $.ajax({
                    url: 'mahasiswa/add.php',
                    type: 'get',
                    success: function(data) {
                        $('#contentData').html(data);
                    }
                });
        
            });  

        });
        </script>

   