<?php
$login_url = '../login.php';
require_once "../auth.php";

include "../db.php";
$db=new db;

switch ($_GET['action'])
{

    case 'save':

        $kd_dosen = $_POST['kd_dosen'];
        $nama = $_POST['nama'];
        $alamat = $_POST['alamat'];

        $query = $db->add_dosen($kd_dosen,$nama,$alamat);
        if ($query)
        {
            echo "Simpan Data Berhasil";
        }
        else
        {
            echo "Simpan Data Gagal :".$db->get_error();
        }
    break;

    case 'edit':

        $kd_dosen = $_POST['kd_dosen'];
        $nama = $_POST['nama'];
        $alamat = $_POST['alamat'];

        $query = $db->update_dosen($kd_dosen,$nama,$alamat);

        if ($query)
        {
            echo "Edit Data Berhasil";
        }
        else
        {
            echo "Edit Data Gagal :".$db->get_error();
        }
    break;

    case 'delete':

        $kd_dosen = $_POST['kd_dosen'];
        $query = $db->del_dosen($kd_dosen);
        if ($query)
        {
            echo "Hapus Data Berhasil";
        }
        else
        {
            echo "Hapus Data Gagal :" . $db->get_error();
        }
    break;
}
?>