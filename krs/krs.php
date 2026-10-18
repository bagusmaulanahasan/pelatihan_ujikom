<?php
include "../db.php";
$db=new db;

switch ($_GET['action'])
{

    case 'save':

        $nim = $_POST['nim'];
        $id_jadwal = $_POST['id_jadwal'];
        $kd_semester = $_POST['kd_semester'];

        if ($db->cek_krs($nim,$id_jadwal,$kd_semester))
        {
            echo "Simpan Data Gagal :KRS sudah pernah disimpan";
        }
        else
        {
            $query = $db->add_krs($nim,$id_jadwal,$kd_semester);
            if ($query)
            {
                echo "Simpan Data Berhasil";
            }
            else
            {
                echo "Simpan Data Gagal :".$db->get_error();
            }
        }
    break;

    case 'edit':

        $id = $_POST['id'];
        $nim = $_POST['nim'];
        $id_jadwal = $_POST['id_jadwal'];
        $kd_semester = $_POST['kd_semester'];

        if ($db->cek_krs($nim,$id_jadwal,$kd_semester,$id))
        {
            echo "Edit Data Gagal :KRS sudah pernah disimpan";
        }
        else
        {
            $query = $db->update_krs($id,$nim,$id_jadwal,$kd_semester);
            if ($query)
            {
                echo "Edit Data Berhasil";
            }
            else
            {
                echo "Edit Data Gagal :".$db->get_error();
            }
        }
    break;

    case 'delete':

        $id = $_POST['id'];
        $query = $db->del_krs($id);
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