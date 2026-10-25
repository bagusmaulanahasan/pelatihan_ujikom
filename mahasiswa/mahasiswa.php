<?php
$login_url = '../login.php';
require_once "../auth.php";

include "../db.php";
$db=new db;

switch ($_GET['action'])
{

    case 'save':

        $nim = $_POST['nim'];
        $nama = $_POST['nama'];
        $alamat = $_POST['alamat'];

        $query = $db->add_mhs($nim,$nama,$alamat);
        if ($query)
        {
            echo "Simpan Data Berhasil";
        }
        else
        {
            echo "Simpan Data Gagal :";
        }
    break;

    case 'edit':

        $nim = $_POST['nim'];
        $nama = $_POST['nama'];
        $alamat = $_POST['alamat'];
      
        $query = $db->update_mhs($nim,$nama,$alamat);
       
        if ($query)
        {
            echo "Edit Data Berhasil";
        }
        else
        {
            echo "Edit Data Gagal :";
        }
    break;

    case 'delete':

        $nim = $_POST['nim'];
        $query = $db->del_mhs($nim);
        if ($query)
        {
            echo "Hapus Data Berhasil";
        }
        else
        {
            echo "Hapus Data Gagal :" ;
        }
    break;
}
?>
